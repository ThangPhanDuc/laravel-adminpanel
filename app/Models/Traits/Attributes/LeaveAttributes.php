<?php

namespace App\Models\Traits\Attributes;

trait LeaveAttributes
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group" role="group" aria-label="'.trans('labels.backend.access.users.user_actions').'">'.
                $this->getShowButtonAttribute('view-leave', 'admin.leaves.show').
              
                '</div>';
    }
}
