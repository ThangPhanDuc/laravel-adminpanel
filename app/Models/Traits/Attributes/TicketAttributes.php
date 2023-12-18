<?php

namespace App\Models\Traits\Attributes;

trait TicketAttributes
{
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group" role="group" aria-label="' . trans('labels.backend.access.users.user_actions') . '">' .
            $this->getShowButtonAttribute('view-ticket', 'admin.tickets.show') .
            $this->getEditButtonAttribute('edit-ticket', 'admin.tickets.edit') .
            $this->getDeleteButtonAttribute('delete-ticket', 'admin.tickets.destroy') .
            '</div>';
    }
}
