<?php

namespace App\Events\Backend\TicketChats;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketChatCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $chat;
    public function __construct($chat)
    {
       $this->chat = $chat; 
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        // return new PrivateChannel('ticket-chat.' . $this->chat->ticket_id);
        // return new PrivateChannel('ticket-chat.1');
        return new Channel('ticket-chat.' . $this->chat->ticket_id);
    }
}
