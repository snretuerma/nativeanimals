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

  public function animals()
  {
    return $this->hasMany('App\Models\Animal');
  }

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

  public function getLine()
  {
    $lines = Line::where("id", $this->line_id)->first();
    return $lines;
  }

  public function getGeneration()
  {
    $line = $this->getLine();
    $generation = Generation::where('id', $line->generation_id)->first();
    return $generation;
  }

  public function checkAnimalMembership($animal_family, $animal_line)
  {
    $line = $this->getLine();
    if($line->number === $animal_line && $this->number === $animal_family)
    {
      return true;
    }else{
      return false;
    }

  }

  public function getNumberOfMaleAndFemale()
  {
    $members = FamilyMember::where('family_id', $this->id)->get();
    $count = [];
    $male = 0;
    $female = 0;
    foreach ($members as $member) {
      if($member->getAnimalInstance()->getGender() === 'M'){
        $male = $male + 1;
      }else{
        $female = $female + 1;
      }
    }
    array_push($count, $male, $female);
    return $count;
  }

  public function getPen()
  {
    $pen = Pen::where('id', $this->pen_id)->first();
    return $pen;
  }

  public function getDateOfFirstEgg()
  {

    $date = FamilyProperty::where('property_id', 34 )->where('family_id', $this->id)->firstOrFail();
    return $date;
  }

  public function getDateOfFirstLay()
  {
    $date = FamilyProperty::where('property_id', 28)->where('family_id', $this->id)->firstOrFail();
    return $date;
  }

}
