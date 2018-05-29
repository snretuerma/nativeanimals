<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyProperty extends Model
{
  protected $table = 'family_properties';
  public $timestamps = false;
  protected $fillable = [
      'value', 'date_added'
    ];

  public function properties()
  {
    return $this->belongsTo('App\Models\Property');
  }

  public function families()
  {
    return $this->belongsTo('App\Models\Family');
  }

  public function getPropertyName()
  {
    $property = Property::where('id', $this->property_id)->first();
    return $property->name;
  }

}
