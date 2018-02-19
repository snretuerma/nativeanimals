<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreederRemoval extends Model
{
  protected $table = 'breeder_removals';
  public $timestamps = false;
  protected $fillable = [
      'status', 'reason', 'date_removed', 'weight', 'price'
    ];

  public function breederremoval()
  {
    return $this->hasMany('App\Models\Animal');
  }
}
