<?php

namespace App\Models\Auth\Traits\Relationships;

use App\Models\Auth\PasswordHistory;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\Auth\SocialAccount;
use App\Models\jobTitle;
use App\Models\Position;

trait UserRelationships
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Many-to-Many relations with Permission.
     * ONLY GETS PERMISSIONS ARE NOT ASSOCIATED WITH A ROLE.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }

    public function position()
    {
        return $this->hasOneThrough(
            Position::class,
            JobTitle::class,
            'id',
            'id',
            'job_title_id',
            'position_id'
        );
    }
}
