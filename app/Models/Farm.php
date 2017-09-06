<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Farm extends Model
{
    public $timestamps = false;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'farms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'auth_code','farm_name', 'farm_id', 'farm_type', 
    	'region', 'province', 'town', 'barangay', 
    	'tel_no', 'mobile_no'
    ];

    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function getName()
    {   
        $user = User::where('userable_id', '=', $this->id)->where('userable_type', '=', 'App\Models\Farm')->firstOrFail()->name;
        return $user;
    }

     public function getEmail()
    {   
        $user = User::where('userable_id', '=', $this->id)->where('userable_type', '=', 'App\Models\Farm')->firstOrFail()->email;
        return $user;
    }

}
