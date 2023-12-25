<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;

class ClearTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hard delete tickets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Ticket::onlyTrashed()->forceDelete();

        $this->info('Tickets hard deleted successfully!');
    }
}
