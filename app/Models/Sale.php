<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Sale extends Model
{

  protected $table = 'sales';
  protected $fillable = [
      'weight',
      'age'
  ];

  public function sales()
  {
    return $this->belongsTo('App\Models\Animal');
  }

  public function getAnimal(){
    $animal = Animal::where('id', $this->animal_id)->first();
    $return $animal;
  }

}
