<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
  protected $table = 'families';
  public $timestamps = false;
  protected $fillable = [
      'number', 'is_active'
    ];

  public function pens()
  {
    return $this->belongsTo('App\Models\Pen');
  }

  public function lines()
  {
    return $this->belongsTo('App\Models\Line');
  }

  public function familyMembers()
  {
    return $this->hasMany('App\Models\FamilyMember');
  }

  public function familyProperties()
  {
    return $this->belongsTo('App\Models\FamilyProperty');
  }

  public function chicks()
  {
    return $this->hasMany('App\Models\Chick');
  }

  public function eggCollections()
  {
    return $this->hasMany('App\Models\EggCollection');
  }

  public function eggQualities()
  {
    return $this->belongsTo('App\Models\EggQuality');
  }

}
