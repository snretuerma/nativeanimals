<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChickWeight extends Model
{
  protected $table = 'chicks';
  public $timestamps = false;
  protected $fillable = [
      'male_qty', 'male_wt', 'female_qty',
      'female_wt', 'total', 'total_wt',
      'date_collected'
    ];

  public function chick()
  {
    return $this->hasMany('App\Models\Chick');
  }

}
