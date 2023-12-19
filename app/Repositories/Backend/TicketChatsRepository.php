<?php

namespace App\Repositories\Backend;

use App\Events\Backend\TicketChats\TicketChatCreated;
use App\Exceptions\GeneralException;
use App\Models\TicketChat;
use App\Models\Ticket;
use App\Repositories\BaseRepository;


class TicketChatsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = TicketChat::class;

    public function getChatsByTicket($ticket)
    {
        $chats = $this->query()
            ->where('ticket_id', $ticket->id)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        if ($chats) {
            return $chats;
        }

        throw new GeneralException('No chats found for the given ticket');
    }



    public function create($request, Ticket $ticket)
    {

        $content = $request->input('content');
        $user = auth()->user();

        $chat = $this->query()->create([
            'ticket_id' => $ticket->id,
            'user_id' => $user->id,
            'content' => $content,
        ]);

        event(new TicketChatCreated());
        $chat->load('user');
        return $chat;
    }
}
