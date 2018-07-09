<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplacementFeeding extends Model
{
  protected $table = 'replacement_feedings';
  public $timestamps = false;
  protected $fillable = [
      'date_fed', 'amount_offered','amount_refused', 'remarks',
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
