<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

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
use App\Models\ReplacementFeeding;
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

  public function feedingRecordList()
  {
    $pens = Pen::where('pen_type', 'grower')->where('capacity', '!=', 'current_capacity')->paginate(15);
    return view('poultry.chicken.replacement.feeding_records_list', compact('pens'));
  }

  public function feedingRecordLog($id)
  {
    $pen = Pen::where('id', $id)->firstOrFail();
    $feedings = ReplacementFeeding::where('pen_id', $id)->paginate(15);
    return view('poultry.chicken.replacement.feeding_records_log', compact('feedings', 'pen'));
  }

  public function feedingRecordForm($id)
  {
    $pen = Pen::where('id', $id)->firstOrFail();
    return view('poultry.chicken.replacement.feeding_form', compact('pen'));
  }

  public function feedingFetchData(Request $request)
  {
    $this->validate(request(), [
      'date_fed' => 'required',
      'amount_offered' => 'required',
      'amount_refused' => 'required',
    ]);
    $feeding = new ReplacementFeeding;
    $feeding->pen_id = $request->pen_id;
    $feeding->date_fed = $request->date_fed;
    $feeding->amount_offered = $request->amount_offered;
    $feeding->amount_refused = $request->amount_refused;
    $feeding->remarks = $request->remarks;
    $feeding->save();
    return $this->feedingRecordLog($feeding->pen_id);
  }
  public function feedingRecordEdit($id)
  {
    $feeding = ReplacementFeeding::where('id', $id)->firstOrFail();
    $pen = Pen::where('id', $feeding->pen_id)->firstOrFail();
    return view('poultry.chicken.replacement.feeding_record_edit', compact('pen', 'feeding'));
  }

  public function feedingFetchDataEdit(Request $request)
  {
    $this->validate(request(), [
      'date_fed' => 'required',
      'amount_offered' => 'required',
      'amount_refused' => 'required'
    ]);
    $feeding = ReplacementFeeding::where('id', $request->record_id)->firstOrFail();
    $feeding->date_fed = $request->date_fed;
    $feeding->amount_offered = $request->amount_offered;
    $feeding->amount_refused = $request->amount_refused;
    $feeding->remarks = $request->remarks;
    $feeding->save();
    return $this->feedingRecordLog($feeding->pen_id);
  }

  public function feedingFetchDataDelete(Request $request)
  {
    $edit = ReplacementFeeding::where('id', $request->delete)->firstOrFail();
    $edit->delete();
    return $this->feedingRecordLog($request->delete_pen);
  }
}
