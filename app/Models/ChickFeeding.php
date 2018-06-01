<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChickFeeding extends Model
{
  protected $table = 'chick_feedings';
  public $timestamps = false;
  protected $fillable = [
      'feed_offered', 'feed_refused', 'feed_type',
      'date_fed', 'amount_fed', 'amount_refused',
      'remarks', 'classification'
    ];

  public function chick()
  {
    return $this->belongsTo('App\Models\Chick');
  }
}
