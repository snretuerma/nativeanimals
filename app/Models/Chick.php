<?php

namespace App\Models;
use App\Models\Generation;
use App\Models\Line;
use App\Models\Family;
use App\Models\Pen;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Chick extends Model
{
  use SoftDeletes;

  protected $table = 'chicks';
  public $timestamps = false;
  protected $dates = ['deleted_at'];
  protected $fillable = [
      'date_eggs_set', 'number_eggs_set', 'week_of_lay',
      'fertile_eggs', 'date_hatched', 'hatched_eggs',
      'remarks', 'hatchery_record'
    ];

  public function family()
  {
    return $this->belongsTo('App\Models\Family');
  }

  public function pen()
  {
    return $this->belongsTo('App\Models\Pen');
  }

  public function chickmovements()
  {
    return $this->hasMany('App\Models\ChickMovement');
  }

  public function getFamily()
  {
    $family = Family::where('id', $this->family_id)->first();
    return $family->number;
  }

  public function getLine()
  {
    $family = Family::where('id', $this->family_id)->first();
    $line = Line::where('id', $family->line_id)->first();
    return $line->number;
  }

  public function getGeneration()
  {
    $family = Family::where('id', $this->family_id)->first();
    $line = Line::where('id', $family->line_id)->first();
    $generation = Generation::where('id', $line->generation_id)->first();
    return $generation->number;
  }

  public function getPen()
  {
    $pen = Pen::where('id', $this->current_pen_id)->firstOrFail();
    return $pen->number;
  }


}
