<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenFeeding extends Model
{
  protected $table = 'pen_feedings';
  public $timestamps = false;
  protected $fillable = [
      'feed_offered', 'feed_refused', 'date_fed'
    ];

  public function pens()
  {
    return $this->belongsTo('App\Models\Pen');
  }

}