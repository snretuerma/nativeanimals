<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnimalProperty;
use App\Models\FamilyMember;
use App\Models\Pen;

class Animal extends Model
{

  protected $table = 'animals';
  protected $fillable = [
      'registryid',
      'status',
      'growth'
  ];

  /*
    Eloquent ORM
  */
  public function farms(){
    return $this->belongsTo('App\Models\Farm');
  }

  public function animaltype()
  {
      return $this->belongsTo('App\Models\AnimalType');
  }

  public function breeds()
  {
    return $this->belongsTo('App\Models\Breed');
  }

  public function groupings()
  {
    return $this->hasMany('App\Models\Grouping');
  }

  public function animalproperties()
  {
    return $this->belongsTo('App\Models\AnimalProperty');
  }

  public function sales()
  {
    return $this->hasOne('App\Models\Sale');
  }

  public function weights()
  {
    return $this->hasMany('App\Models\Weight');
  }

  public function mortalities()
  {
    return $this->hasOne('App\Models\Mortality');
  }

  public function pens()
  {
    return $this->belongsTo('App\Models\Pen');
  }

  public function penassignments()
  {
    return $this->belongsTo('App\Models\PenAssignment');
  }

  /*
    Model Functions
  */
  public function getAnimalType()
  {
    return $this->animaltype_id;
  }

  public function getFarmId()
  {
    return $this->farm_id;
  }

  public function getBreedId()
  {
    return $this->breed_id;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setAnimalType($animaltype_id)
  {
      $this->animaltype = $animaltype_id;
  }

  public function setBreed($breed_id){
      $this->breed_id = $breed_id;
  }

  public function setFarm($farm_id)
  {
    $this->farm_id = $farm_id;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getAnimalProperties()
  {
    $properties = AnimalProperty::where('animal_id', $this->id)->get();
    return $properties;
  }

  public function getFamily()
  {
    $family = AnimalProperty::where('animal_id', $this->id)->where('property_id', 5)->first();
    return $family;
  }

  public function getFamilyId()
  {
    $member = FamilyMember::where('animal_id', $this->id)->where('date_end', null)->first();
    return $member->family_id;
  }

  public function getLine()
  {
    $line = AnimalProperty::where('animal_id', $this->id)->where('property_id', 4)->first();
    return $line;
  }

  public function getGeneration(){
    $generation = AnimalProperty::where('animal_id', $this->id)->where('property_id', 3)->first();
    return $generation;
  }

  public function getPen()
  {
    $pen = Pen::where('id', $this->pen_id)->first();
    return $pen->number;
  }

  public function getGender()
  {
    $gender = AnimalProperty::where('property_id', 6)->where('animal_id', $this->id)->first();
    return $gender->value;
  }

  // property id 9-21
  public function getPhenotypicCharacteristic()
  {
    $properties = AnimalProperty::where('animal_id', $this->id)->whereIn('property_id', range(9,21))->get();
    return $properties;
  }
  // property id 22-27
  public function getMorphometricCharacteristic()
  {
    $properties = AnimalProperty::where('animal_id', $this->id)->whereIn('property_id', range(22,27))->get();
    return $properties;
  }

}
