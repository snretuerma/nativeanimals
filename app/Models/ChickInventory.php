<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChickInventory extends Model
{
  protected $table = 'chick_inventories';
  public $timestamps = false;
  protected $fillable = [
      'male_qty', 'female_qty', 'total',
      'activity', 'date', 'remarks', 'days'
    ];

  public function chick()
  {
    return $this->hasMany('App\Models\Chick');
  }

  public function animal()
  {
    return $this->hasMany('App\Models\Animal');
  }
}
