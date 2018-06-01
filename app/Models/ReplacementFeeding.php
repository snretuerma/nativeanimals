<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplacementFeeding extends Model
{
  use SoftDeletes;

  protected $table = 'replacement_feedings';
  public $timestamps = false;
  protected $fillable = [
      'feed_offered', 'feed_refused', 'date_fed',
      'amount_offered','amount_refused', 'remarks',
      'deleted_at'
    ];

  public function pens()
  {
    return $this->belongsTo('App\Models\Pen');
  }
  public function animals()
  {
    return $this->belongsTo('App\Models\Animal');
  }
}
