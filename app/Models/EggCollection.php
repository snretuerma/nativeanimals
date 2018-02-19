<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EggCollection extends Model
{
  protected $table = 'egg_collections';
  public $timestamps = false;
  protected $fillable = [
      'number_of_eggs', 'weight', 'broken_eggs',
      'soft_shelled_eggs', 'date_collected'
    ];

  public function family()
  {
    return $this->hasMany('App\Models\Family');
  }
}
