<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Blogs\BlogCreated;
use App\Events\Backend\Blogs\BlogDeleted;
use App\Events\Backend\Blogs\BlogUpdated;
use App\Exceptions\GeneralException;
use App\Models\Ticket;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Events\Backend\Tickets\TicketCreated;
use App\Events\Backend\Tickets\TicketDeleted;
use App\Events\Backend\Tickets\TicketUpdated;

class  TicketsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Ticket::class;

    protected $upload_path;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'content',
        'type',
        'flag',
        'expected',
        'status',
        'link',
        'image_path',
        'response',
        'created_at',
        'updated_at',
    ];

    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'ticket' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable)
            ? $options['order_by']
            : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'owner',
                'updater',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('users', 'users.id', '=', 'tickets.user_id')
            ->leftjoin('ticket_flags', 'ticket_flags.id', '=', 'tickets.ticket_flag_id')
            ->select([
                'tickets.id',
                'tickets.content',
                'tickets.type',
                'tickets.ticket_flag_id',
                'tickets.status',
                'tickets.link',
                'tickets.response',
                'tickets.user_id',
                'tickets.created_at',
                'users.first_name as user_name',
                'ticket_flags.name as flag_name',
            ]);
    }

    public function create(array $input)
    {

        try {
            return DB::transaction(function () use ($input) {
                $input['user_id'] = auth()->user()->id;
                $input = $this->uploadImage($input);

                if ($ticket = Ticket::create($input)) {

                    event(new TicketCreated($ticket));
                    return $ticket;
                }

                throw new GeneralException(__('exceptions.backend.tickets.create_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.tickets.create_error'), $e->getCode(), $e);
        }
    }

    public function update(Ticket $ticket, array $input)
    {
        try {
            // Uploading Image
            if (array_key_exists('image_path', $input)) {
                $this->deleteOldFile($ticket);
                $input = $this->uploadImage($input);
            }

            return DB::transaction(function () use ($ticket, $input) {
                if ($ticket->update($input)) {

                    event(new TicketUpdated());

                    return $ticket->fresh();
                }

                throw new GeneralException(__('exceptions.backend.tickets.update_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.tickets.update_error'), $e->getCode(), $e);
        }
    }
    public function delete(Ticket $ticket)
    {
        try {
            DB::transaction(function () use ($ticket) {
                if ($ticket->delete()) {
                    //Delete OldFile
                    $this->deleteOldFile($ticket);

                    event(new TicketDeleted());
                    return true;
                }

                throw new GeneralException(__('exceptions.backend.tickets.delete_error'));
            });
        } catch (\Exception $e) {
            throw new GeneralException(__('exceptions.backend.tickets.update_error'), $e->getCode(), $e);
        }
    }

    public function uploadImage($input)
    {
        if (isset($input['image_path']) && !empty($input['image_path'])) {
            $avatar = $input['image_path'];
            $fileName = time() . $avatar->getClientOriginalName();

            $this->storage->put($this->upload_path . $fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image_path' => $fileName]);
        }

        return $input;
    }

    public function deleteOldFile($model)
    {
        $fileName = $model->image_path;

        return $this->storage->delete($this->upload_path . $fileName);
    }
}
