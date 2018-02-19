<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chick extends Model
{
  protected $table = 'chicks';
  public $timestamps = false;
  protected $fillable = [
      'date_eggs_set', 'number_eggs_set', 'week_of_lay',
      'fertile_eggs', 'date_hatched', 'hatched_eggs'
    ];

  public function family()
  {
    return $this->belongsTo('App\Models\Family');
  }

  public function pen()
  {
    return $this->belongsTo('App\Models\Pen');
  }
}
