<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChickMovement extends Model
{
  protected $table = 'chick_movements';
  public $timestamps = false;
  protected $fillable = [
      'remarks'
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
