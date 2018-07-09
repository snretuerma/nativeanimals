<?php

namespace App\Models;
use App\Models\Animal;
use App\Models\FamilyProperty;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
  protected $table = 'family_members';
  public $timestamps = false;
  protected $fillable = [
      'date_start', 'date_end'
    ];

  public function families()
  {
    return $this->belongsTo('App\Models\Family');
  }

  public function animals()
  {
    return $this->belongsTo('App\Models\Animal');
  }

  public function getAnimalInstance()
  {
    $animal = Animal::where('id', $this->animal_id)->first();
    return $animal;
  }

  public function getFamilyProperties()
  {
    $properties = FamilyProperty::where('family_id', $this->family_id)->get();
    return $properties;
  }

  public function getMemberGender()
  {
      $animal = Animal::where('id', $this->animal_id)->first();
      return $animal->getGender();
  }

}
