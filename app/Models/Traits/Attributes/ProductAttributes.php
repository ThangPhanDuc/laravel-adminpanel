<?php

namespace App\Models\Traits\Attributes;

trait ProductAttributes
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group" role="group" aria-label="'.trans('labels.backend.access.users.user_actions').'">'.
                $this->getShowButtonAttribute('view-product', 'admin.products.show').
                $this->getEditButtonAttribute('edit-product', 'admin.products.edit').
                $this->getDeleteButtonAttribute('delete-product', 'admin.products.destroy').
                '</div>';
    }

    /**
     * Get Display Status Attribute.   
     *
     * @var string
     */
    // public function getDisplayStatusAttribute(): string
    // {
    //     return $this->statuses[$this->status] ?? null;
    // }

    // /**
    //  * Get Statuses Attribute.
    //  *
    //  * @var string
    //  */
    // public function getStatusesAttribute(): array
    // {
    //     return $this->statuses;
    // }
}
