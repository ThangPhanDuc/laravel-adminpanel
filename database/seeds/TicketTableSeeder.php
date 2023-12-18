<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        for ($i = 1; $i <= 10; $i++) {
            $user_id = rand(2, 5);
            $ticket_flag_id = rand(1, 3);
            Ticket::create([
                'content' => "Content for Ticket $i",
                'type' => 'Issue',
                'expected' => "Expectation for Ticket $i",
                'user_id' => $user_id,
                'ticket_flag_id' => $ticket_flag_id,
                'status' => 'Pending',
                'link' => "https://example.com/ticket/$i",
                'image_path' => "/images/ticket_$i.jpg",
                'response' => "Response for Ticket $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
