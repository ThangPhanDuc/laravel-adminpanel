<?php

namespace App\Repositories\Backend;


use App\Exceptions\GeneralException;
use App\Models\Leave;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeavesRepository extends BaseRepository
{
    const MODEL = Leave::class;

    public function getForDataTable()
    {
        $user = auth()->user();
        $positionName = $user->position->name;

        $query = $this->query()
            ->leftjoin('users', 'users.id', '=', 'leaves.user_id')
            ->select([
                'leaves.id',
                'leaves.user_id',
                'leaves.leave_type',
                'leaves.start_date',
                'leaves.end_date',
                'leaves.status',
                'leaves.created_at',
                'users.first_name as user_name',
            ]);

        if ($positionName == "Employee") {
            $query->where('leaves.user_id', $user->id);
        } elseif ($positionName == "Department Head") {
            $jobTitleName = $user->jobTitle->name;
            $query->join('job_titles', 'job_titles.id', '=', 'users.job_title_id')
                ->where('job_titles.name', $jobTitleName);
        }

        return $query->get();
    }

    public function show(Leave $leave, $request)
    {
        try {
            $isHRManager = false;
            $isDepartmentHead = false;

            $user = auth()->user();
            $positionName = $user->position->name;
            $jobTitleName = $user->jobTitle->name;
            if ($positionName == "HR Manager") {
                $isHRManager = true;
            } elseif ($positionName == "Department Head" && $jobTitleName == $leave->user->jobTitle->name) {
                $isDepartmentHead = true;
            }

            return [
                'isHRManager' => $isHRManager,
                'isDepartmentHead' => $isDepartmentHead,
            ];
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.leaves.show_error'), $e->getCode(), $e);
        }
    }



    public function create(array $input)
    {
        try {
            return DB::transaction(function () use ($input) {
                $input['start_date'] = Carbon::parse($input['start_date']);
                $input['end_date'] = Carbon::parse($input['end_date']);
                $input['user_id'] = auth()->user()->id;

                if ($leave = Leave::create($input)) {
                    return $leave;
                }

                throw new GeneralException(__('exceptions.backend.leaves.create_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.leaves.create_error'), $e->getCode(), $e);
        }
    }

    public function update(Leave $leave, $action)
    {
        try {
            $user = auth()->user();
            $positionName = $user->position->name;
            if ($positionName == "Department Head") {
                if ($action == 'approve') {
                    $leave->update(['manager_confirmation' => true]);
                } elseif ($action == 'reject') {
                    $leave->update(['manager_confirmation' => false]);
                }
            } elseif ($positionName == "HR Manager") {
                if ($action == 'approve') {
                    $leave->update(['hr_confirmation' => true]);
                } elseif ($action == 'reject') {
                    $leave->update(['hr_confirmation' => false]);
                }
            }

            if ($leave->manager_confirmation && $leave->hr_confirmation) {
                $leave->update(['status' => 'approved']);
            }

            return $leave->fresh();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
