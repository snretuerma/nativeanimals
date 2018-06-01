<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChickMovement extends Model
{
  protected $table = 'chick_movements';
  public $timestamps = false;
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  
  protected $fillable = [
      'remarks',
    ];

  public function chick()
  {
    return $this->belongsTo('App\Models\Chick');
  }

  public function pen()
  {
    return $this->belongsTo('App\Models\Pen');
  }
}
