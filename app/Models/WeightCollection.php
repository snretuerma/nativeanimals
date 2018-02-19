<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightCollection extends Model
{
  protected $table = 'weight_collections';
  public $timestamps = false;
  protected $fillable = [
      'weight', 'date_collected'
    ];

  public function weights()
  {
    return $this->belongsTo('App\Models\Animal');
  }
}
