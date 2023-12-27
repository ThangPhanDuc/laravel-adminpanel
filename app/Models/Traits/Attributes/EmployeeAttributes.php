<?php

namespace App\Models\Traits\Attributes;

trait EmployeeAttributes
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group" role="group" aria-label="'.trans('labels.backend.access.users.user_actions').'">'.
                $this->getShowButtonAttribute('view-employee', 'admin.employees.show').
                $this->getEditButtonAttribute('edit-employee', 'admin.employees.edit').
                $this->getDeleteButtonAttribute('delete-employee', 'admin.employees.destroy').
                '</div>';
    }

   
}
