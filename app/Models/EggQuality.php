<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EggQuality extends Model
{
  protected $table = 'egg_qualities';
  public $timestamps = false;
  protected $fillable = [
      'sample_no', 'egg_weight', 'egg_color', 'egg_shape',
      'egg_length', 'egg_width', 'shell_weight',
      'thickness_top', 'thickness_mid', 'thickness_bot',
      'albumen_height', 'yolk_color', 'date_collected', 'count'
    ];

  public function family()
  {
    return $this->belongsTo('App\Models\Family');
  }


}
