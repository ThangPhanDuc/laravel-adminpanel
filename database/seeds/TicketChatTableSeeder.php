<?php

use Illuminate\Database\Seeder;
use App\Models\TicketChat;
use Faker\Factory as Faker;

class TicketChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketChat::truncate();
        $faker = Faker::create();

        // Loop through each ticket and create random chats
        for ($ticketId = 1; $ticketId <= 10; $ticketId++) {
            // Set a random number of chats for each ticket (e.g., between 1 and 5)
            $numberOfChats = rand(1, 5);

            for ($i = 1; $i <= $numberOfChats; $i++) {
                TicketChat::create([
                    'user_id' => rand(1, 5),
                    'ticket_id' => $ticketId,
                    'content' => $faker->sentence,
                    'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
                ]);
            }
        }
    }
}
