<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
  protected $table = 'generations';
  public $timestamps = false;
  protected $fillable = [
      'number', 'is_active'
    ];

  public function lines()
  {
    return $this->hasMany('App\Models\Line');
  }

  public function hasLine($line)
  {
      $check = Lines::where('generation_id', $this->id)->get();
      if($check->contains('number', $line)){
          return true;
      }else{
          return false;
      }
  }

  public function getFamilies()
  {
      $families = Family::get();
      $included = collect([]);
      foreach ($families as $family){
          if($family->getGeneration()->id === $this->id){
              $included->push($family);
          }
      }
      return $included;
  }
}
