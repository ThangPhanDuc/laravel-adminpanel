<?php

use Illuminate\Database\Seeder;
use App\Models\Leave;
use App\Models\Auth\User;
class LeaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leave::truncate();
        
        $userIds = User::pluck('id');

        $numberOfRecords = 10;

        $leaves = [];

        for ($i = 0; $i < $numberOfRecords; $i++) {
            $leaves[] = [
                'user_id' => $userIds->random(),
                'leave_type' => $this->generateRandomLeaveType(),
                'start_date' => now(),
                'end_date' => now()->addDays(random_int(1, 5)),
                'reason' => $this->generateRandomReason(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Leave::insert($leaves);
    }

    /**
     * Generate a random leave type.
     *
     * @return string
     */
    private function generateRandomLeaveType()
    {
        $leaveTypes = ['sick', 'annual', 'other'];
        return $leaveTypes[array_rand($leaveTypes)];
    }

    /**
     * Generate a random reason for leave.
     *
     * @return string
     */
    private function generateRandomReason()
    {
        $reasons = [
            'Feeling unwell',
            'Family emergency',
            'Personal reasons',
            'Attending an event',
            'Vacation',
        ];

        return $reasons[array_rand($reasons)];
    }
}
