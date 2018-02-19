<?php

namespace App\Models;

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
}
