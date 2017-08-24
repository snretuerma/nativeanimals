<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Administrator extends Model
{
    
    public $timestamps = false;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administrators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function users()
    {
        return $this->morphMany(User::class, 'userable');
    }
}
