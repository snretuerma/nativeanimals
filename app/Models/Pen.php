<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pen extends Model
{
  protected $table = 'pens';
  public $timestamps = false;
  protected $fillable = [
      'number',
      'capacity'
  ];

  public function animals()
  {
      return $this->hasMany('App\Models\Animal');
  }

  public function chickmovements()
  {
    return $this->belongsTo('App\Models\ChickMovement');
  }

  public function chicks()
  {
    return $this->belongsTo('App\Models\Chick');
  }

  public function penfeedings()
  {
    return $this->belongsTo('App\Models\PenFeeding');
  }

  public function families()
  {
    return $this->belongsTo('App\Models\Family');
  }
}
