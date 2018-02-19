<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
  protected $table = 'generations';
  public $timestamps = false;
  protected $fillable = [
      'number', 'is_active'
    ];

  public function lines()
  {
    return $this->hasMany('App\Models\Line');
  }

}
