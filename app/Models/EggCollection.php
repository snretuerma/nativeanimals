<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EggCollection extends Model
{
  use SoftDeletes;

  protected $table = 'egg_collections';
  public $timestamps = false;
  protected $fillable = [
      'number_of_eggs', 'weight', 'broken_eggs',
      'soft_shelled_eggs', 'date_collected', 'deleted_at'
    ];

  public function family()
  {
    return $this->hasMany('App\Models\Family');
  }
}
