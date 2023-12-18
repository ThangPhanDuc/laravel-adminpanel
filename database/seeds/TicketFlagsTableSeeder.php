<?php

use Illuminate\Database\Seeder;
use App\Models\TicketFlag;

class TicketFlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        TicketFlag::create(['name' => 'Default']);
        TicketFlag::create(['name' => 'High Priority']);
        TicketFlag::create(['name' => 'Urgent']);
    }
}
