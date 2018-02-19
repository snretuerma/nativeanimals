<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
  protected $table = 'lines';
  public $timestamps = false;
  protected $fillable = [
      'number', 'is_active'
    ];

  public function generations()
  {
    return $this->belongsTo('App\Models\Generation');
  }

  public function families()
  {
    return $this->hasMany('App\Models\Family');
  }
}
