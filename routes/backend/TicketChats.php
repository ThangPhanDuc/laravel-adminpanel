<?php
use App\Http\Controllers\Backend\TicketChats\TicketChatsController;
Route::group(['namespace' => 'TicketChats', 'prefix' => 'tickets'], function () {

    Route::get('{ticket}/chats', [TicketChatsController::class, 'index'])->name('tickets.chats.index');

    Route::post('{ticket}/chats', [TicketChatsController::class, 'store'])->name('tickets.chats.store');

});
