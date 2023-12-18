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
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
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
            ->select([
                'tickets.id',
                'tickets.content',
                'tickets.type',
                'tickets.expected',
                'tickets.status',
                'tickets.link',
                'tickets.response',
                'tickets.user_id',
                'tickets.created_at',
                'users.first_name as user_name',
            ]);
    }

   
}
