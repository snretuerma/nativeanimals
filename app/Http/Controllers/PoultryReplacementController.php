<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\Farm;
use App\Models\Animal;
use App\Models\Property;
use App\Models\AnimalType;
use App\Models\AnimalProperty;
use App\Models\Breed;
use App\Models\Grouping;
use App\Models\GroupingMember;
use App\Models\Mortality;
use App\Models\Sale;
use App\Models\WeightCollection;
use App\Models\Generation;
use App\Models\Line;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\FamilyProperty;
use App\Models\Pen;
use App\Models\EggQuality;
use App\Models\Chick;
use App\Models\ChickMovement;
use App\Models\ChickInventory;
use App\Models\ChickWeight;
use App\Models\ChickFeeding;
use App\Models\EggCollection;
use App\Models\PenFeeding;
use App\Models\BreederRemoval;
use App\Models\Sessions;

class PoultryReplacementController extends Controller
{
  protected $user;

  public function __construct()
  {
    $this->middleware(function($request, $next)
    {
        $this->user = Auth::user();
        return $next($request);
    });
  }

  public function fetchLine($id)
  {
    $lines = Line::where('generation_id', $id)->where('is_active', true)->get();
    return $lines;
  }

  public function fetchFamily($id)
  {
    $families = Family::where('line_id', $id)->where('is_active', true)->get();
    return $families;
  }
}
