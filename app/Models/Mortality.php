<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;


class Mortality extends Model
{

  protected $table = 'mortalities';
  protected $fillable = [
      'remarks'
  ];
  public function mortalities()
  {
    return $this->belongsTo('App\Models\Animal');
  }

  public function getAnimal(){
    $animal = Animal::where('id', $this->animal_id)->first();
    $return $animal;
  }
}
