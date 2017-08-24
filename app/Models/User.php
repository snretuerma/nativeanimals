<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the roles that the user has
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function userable()
    {

        return $this->morphTo();
    
    }

    /**
     * Assign Role to a User
     *
     * @param  String   $role
     */
    public function assignRole($role)
    {
        if(is_string($role)){
            return $this->roles()->attach(
                Role::whereTitle($role)->firstOrFail()
            );
        }

        return $this->roles()->save($role);
    }

    /**
     * Check User if it has a certain role
     *
     * @param   String  $role
     * @return  Boolean
     */
    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('title',$role);
        }

        return !! $role->intersect($this->roles)->count();
    }
    
}
