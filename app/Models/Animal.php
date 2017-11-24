<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

  protected $table = 'animals';
  protected $fillable = [
      'registryid'
  ];

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

  public function getAnimalType(){
    return $this->animaltype_id;
  }
  public function getFarmId(){
    return $this->farm_id;
  }

  public function getBreedId(){
    return $this->breed_id;
  }

  public function setAnimalType($animaltype_id){
      $this->animaltype = $animaltype_id;
  }

  public function setBreed($breed_id){
      $this->breed_id = $breed_id;
  }

  public function setFarm($farm_id){
    $this->farm_id = $farm_id;
  }

}
