<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Sale extends Model
{

  protected $table = 'sales';
  public $timestamps = false;
  protected $fillable = [
    'date_sold', 'classification', 'quantity', 'price', 'remarks'
  ];

  public function sales()
  {
    return $this->belongsTo('App\Models\Animal');
  }

  public function getAnimal()
  {
    $animal = Animal::where('id', $this->animal_id)->first();
    return $animal;
  }

}
