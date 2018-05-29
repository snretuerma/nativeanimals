<?php

// For Breeder Methods

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

class PoultryBreederController extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->middleware(function($request, $next){
        $this->user = Auth::user();
        return $next($request);
    });
  }

  /*
    Helper Methods
  */
  public function carbonParseDate($date)
  {
    $converted = Carbon::parse($date)->format('Y-m-d');
    return $converted;
  }

  public function createProperty($propname, $propfname, $propdesc)
  {
    $property = new Property;
    $property->name = $propname;
    $property->fname = $propfname;
    $property->description = $propdesc;
    $property->save();

    return;
  }

  public function addAnimalProperty($animalid, $propid, $value, $date)
  {
    $aniprop = new AnimalProperty;
    $aniprop->animal_id = $animalid;
    $aniprop->property_id = $propid;
    $aniprop->value = $value;
    $aniprop->date_collected = $date;
    $aniprop->save();

    return;
  }

  public function addFamilyProperty($famid, $propid, $value, $date)
  {
    $famprop = new FamilyProperty;
    $famprop->family_id = $famid;
    $famprop->property_id = $propid;
    $famprop->value = $value;
    $famprop->date_added = $date;
    $famprop->save();

    return;
  }

  public function removeBreeders($animal, $status, $reason, $date_removed, $weight, $price)
  {
    $pen = Pen::where('id', $family_member->getAnimalInstance()->pen_id)->first();
    $pen->current_capacity = $pen->current_capacity + 1;
    $pen->save();

    $animal = Animal::where('id', $animal)->first();
    $animal->status = $status;
    $animal->save();

    $breeder_removal = new BreederRemoval;
    $breeder_removal->animal_id = $animal->id;
    $breeder_removal->status = $status;
    $breeder_removal->$reason = $reason;
    $breeder_removal->animal_id = $weight;
    $breeder_removal->animal_id = $price;
    $breeder_removal->save();

    return;
  }

  /*
    Form 1 : Family Records
  */
  public function familyRecordsMenu()
  {
    $families = Family::paginate(10);
    foreach ($families as $family) {
      $pen_number = Pen::where('id', $family->pen_id)->first()->number;
      $family->pen_number = $pen_number;
    }
    return view('poultry.chicken.breeder.familylist', compact('families'));
  }

  public function getAddFamily()
  {
    $generations = Generation::where('is_active', true)->get();
    $lines = Line::where('is_active', true)->get();
    $families = Family::where('is_active', true)->get();
    $notIncluded = [];
    foreach ($families as $family) {
      array_push($notIncluded, $family->pen_id);
    }
    $pens = Pen::whereNotIn('id', $notIncluded)->where('pen_type', 'layer')->where('current_capacity', '>', 0)->get();
    return view('poultry.chicken.breeder.familyrecord', compact('generations', 'lines', 'pens'));
  }

  public function getFamilyRecord(Request $request)
  {
    $this->validate(request(), [
      'family_id' => 'required',
      'date_transferred' => 'required',
      'generation' => 'required',
      'date_hatched' => 'required',
      'line' => 'required',
      'pen_no' => 'required'
    ]);
    $now = new Carbon;
    $family_id = str_pad($request->family_id, 4, "0", STR_PAD_LEFT);
    $family = new Family;
    $family->number = $family_id;
    $family->line_id = $request->line;
    $family->is_active = true;
    $family->pen_id = $request->pen_no;
    $family->save();

    // $animalid, $propid, $value, $date
    $this->addFamilyProperty($family->id, 29, $family->number, $now);
    $this->addFamilyProperty($family->id, 30, $this->carbonParseDate($request->date_transferred), $now);
    $this->addFamilyProperty($family->id, 31, $request->generation, $now);
    $this->addFamilyProperty($family->id, 32, $this->carbonParseDate($request->date_hatched), $now);
    $this->addFamilyProperty($family->id, 33, $request->line, $now);
    if($request->age_first_egg === null){
      $this->addFamilyProperty($family->id, 34, null, $now);
    }else{
      $this->addFamilyProperty($family->id, 34, $this->carbonParseDate($request->date_first_egg), $now);
    }
    $request->session()->flash('family-create', 'Family added');
    return Redirect::back()->with('message','Animal successfully added');
  }

  public function showAvailableMales($family_id)
  {
    $family = Family::where('id', $family_id)->first();
    $animals = Animal::where('status', 'replacement')->where('phenotypic', true)->where('morphometric', true)->get();
    $line = Line::where('id', $family->line_id)->first();
    $family_animals = [];
    foreach ($animals as $animal) {
      if($family->checkAnimalMembership($animal->getFamily()->value, $animal->getLine()->value)){
        if($animal->getGender() == "M"){
          array_push($family_animals, $animal);
        }

      }
    }
    $add_animals = collect($family_animals);
    return $add_animals;
  }

  public function addMaleToFamily(Request $request)
  {
    $now = Carbon::now();
    if(empty($request->animals)){
      $request->session()->flash('add-male-empty', 'No male animal selected');
      return Redirect::back()->with('message','No animal selected');
    }else{
      $family = Family::where('id', $request->family_id)->first();
      foreach ($request->animals as $animal) {
        $new_pen = Pen::where('id', $family->pen_id)->first();
        if($new_pen->current_capacity > 0){
          $selected = Animal::where('id', $animal)->first();
          $prev_pen = Pen::where('id', $selected->pen_id)->first();
          $prev_pen->current_capacity++;
          $prev_pen->save();
          $selected->pen_id = $family->pen_id;
          $selected->status = "breeder";
          $selected->save();
          $new_pen->current_capacity--;
          $new_pen->save();
          $member = new FamilyMember;
          $member->family_id = $family->id;
          $member->animal_id = $selected->id;
          $member->date_start = $this->carbonParseDate($now);
          $member->save();
          if($family->male_id === null){
              $family->male_id = $animal;
              $family->save();
          }
          $request->session()->flash('add-male-success', 'Males added to family');
          return Redirect::back()->with('message','Males added to family');
        }
      }
    }
  }

  public function showAvailableFemales($family_id)
  {
    $animals = Animal::where('family_id', '!=', $family_id)->get();
    $families = array();
    foreach ($animals as $animal) {
      if($animal->getGender() == "F"){
        $index = $animal->family_id;
        $search = array_search($index, $families);
        $familyInfo = Family::where('id', $animal->family_id)->first();
        $animal->family_number = $familyInfo->number;
        if($search!=false){
          array_push($families[$search], $animal);
        }else{
          $families[$index] = array();
          array_push($families[$index], $animal);
        }
      }
    }
    $keys = array_keys($families);
    return view('poultry.chicken.breeder.display_female', compact('families', 'family_id', 'keys'));
  }

  public function getFemalePerFamily(Request $request)
  {
    $add_to_family = $request->add_to_family;
    $animals = Animal::where('family_id', $request->family)->where('status', 'replacement')->get();
    $females = [];
    $family = Family::where('id', $request->family)->first();
    foreach ($animals as $animal) {
      if($animal->getGender() == "F"){
        array_push($females, $animal);
      }
    }
    return view('poultry.chicken.breeder.females_per_family', compact('females', 'family', 'add_to_family'));
  }

  public function addFemaleToFamily(Request $request)
  {
    $now = Carbon::now();
    if(empty($request->animals)){
      $request->session()->flash('add-female-empty', 'No female animal selected');
      return $this->familyRecordsMenu();
    }else{
      $family = Family::where('id', $request->family_id)->first();
      foreach ($request->animals as $animal) {
        $new_pen = Pen::where('id', $family->pen_id)->first();
        if($new_pen->current_capacity > 0){
          $selected = Animal::where('id', $animal)->first();
          $prev_pen = Pen::where('id', $selected->pen_id)->first();
          $prev_pen->current_capacity++;
          $prev_pen->save();
          $selected->pen_id = $family->pen_id;
          $selected->status = "breeder";
          $selected->save();
          $new_pen->current_capacity--;
          $new_pen->save();
          $member = new FamilyMember;
          $member->family_id = $request->add_to_family;
          $member->animal_id = $selected->id;
          $member->date_start = $this->carbonParseDate($now);
          $member->save();
          $request->session()->flash('add-female-success', 'Females added to family');
          return $this->familyRecordsMenu();
        }else{
          $request->session()->flash('add-female-empty', 'No female animal added');
          return $this->familyRecordsMenu();
        }
      }
    }
    $request->session()->flash('add-female-empty', 'No female animal selected');
    return Redirect::back()->with('message','No animal selected');
  }

  public function addToCreatedFamily($id)
  {
    $family = Family::where('id', $id)->first();
    $members = FamilyMember::where('family_id', $id)->where('date_end', null)->get();
    $animals = Animal::where('status', 'replacement')->where('phenotypic', true)->where('morphometric', true)->get();
    $line = Line::where('id', $family->line_id)->first();
    $family_animals = [];
    foreach ($animals as $animal) {
      if($family->checkAnimalMembership($animal->getFamily()->value, $animal->getLine()->value)){
         array_push($family_animals, $animal);
      }
    }
    $add_animals = collect($family_animals);

    return view('poultry.chicken.breeder.addanimalstocreatedfamily', compact('family', 'members', 'add_animals'));
  }

  public function addAnimalsToFamily(Request $request)
  {
    $now = Carbon::now();
    foreach ($request->animals as $animal) {
      $addmember = new FamilyMember;
      $addmember->family_id = $request->family_id;
      $addmember->animal_id = $animal;
      $addmember->date_start = $now;
      $addmember->save();
      $breeder = Animal::where('id', $animal)->first();
      $breeder->status = "breeder";
      $breeder->save();
    }

    return Redirect::back()->with('message','Animal successfully added');
  }

  //@TODO View of Family Summary
  public function fetchFamilyRecord($id)
  {
    $animals = Animal::where("family_id", $id)->where("status", "breeder")->get();
    foreach ($animals as $key => $value) {
      # code...
    }
  }

  /***************Daily Records**************/
  public function familylistDailyRecords()
  {
    $families = Family::where('is_active', true)->get();
    return view('poultry.chicken.breeder.familylist_dailyrecord', compact('families'));
  }

  public function dailyRecords($id)
  {
    $family = Family::where('id', $id)->first();
    $feedings = PenFeeding::where('family_id', $id)->paginate(10);
    $eggcollections = EggCollection::where('family_id', $id)->paginate(10);
    return view('poultry.chicken.breeder.daily_record_log', compact('family', 'feedings', 'eggcollections'));
  }

  public function eggProductionForm($id)
  {
    $family = Family::where('id', $id)->first();
    return view('poultry.chicken.breeder.daily_records_egg_prod', compact('family'));
  }

  public function eggProductionSubmit(Request $request)
  {
    $request->validate([
      'family' => 'required',
      'date_eggs_collected' => 'required',
      'total_eggs_collected' => 'required',
      'total_egg_weight' => 'required',
    ]);

    $eggprod = new EggCollection;
    $eggprod->family_id = $request->family;
    $eggprod->number_of_eggs = $request->total_eggs_collected;
    $eggprod->weight = $request->total_egg_weight;
    $eggprod->broken_eggs = $request->no_broken;
    $eggprod->soft_shelled_eggs = $request->no_shell;
    $eggprod->date_collected = $request->date_eggs_collected;
    $eggprod->remarks = $request->remarks;
    $eggprod->save();

    $request->session()->flash('add-egg_prod-success', 'Egg production recorded');
    return Redirect::back()->with('message','recorded');
  }

  public function feedingRecordForm($id)
  {
    $family = Family::where('id', $id)->first();
    return view('poultry.chicken.breeder.daily_records_feeding_rec', compact('family'));
  }

  public function feedingRecordSubmit(Request $request)
  {
    $request->validate([
      'family' => 'required',
      'pen' => 'required',
      'date_collected' => 'required',
      'type_offered' => 'required',
      'type_refused' => 'required',
      'amount_offered' => 'required',
      'amount_refused' => 'required',
    ]);

    $feeding = new PenFeeding;
    $feeding->family_id = $request->family;
    $feeding->pen_id = $request->pen;
    $feeding->type_offered = $request->type_offered;
    $feeding->type_refused = $request->type_refused;
    $feeding->date_fed = $request->date_collected;
    $feeding->amount_offered = $request->amount_offered;
    $feeding->amount_refused = $request->amount_refused;
    $feeding->remarks = $request->remarks;
    $feeding->save();
    $request->session()->flash('add-feeding_rec-success', 'Feeding data recorded');
    return Redirect::back()->with('message','recorded');
  }

  public function eggProductionEditForm($id)
  {
    $eggcollection = EggCollection::where('id', $id)->firstOrFail();
    $family = Family::where('id', $eggcollection->family_id)->firstOrFail();
    return view('poultry.chicken.breeder.daily_records_egg_prod_edit', compact('eggcollection', 'family'));
  }

  public function eggProductionEditFormSubmit(Request $request)
  {
    $record = EggCollection::where('id',$request->eggcollectionid)->firstOrFail();
    $request->validate([
      'family' => 'required',
      'date_eggs_collected' => 'required',
      'total_eggs_collected' => 'required',
      'total_egg_weight' => 'required',
    ]);

    $record->family_id = $request->family;
    $record->number_of_eggs = $request->total_eggs_collected;
    $record->weight = $request->total_egg_weight;
    $record->broken_eggs = $request->no_broken;
    $record->soft_shelled_eggs = $request->no_shell;
    $record->date_collected = $request->date_eggs_collected;
    $record->remarks = $request->remarks;
    $record->save();
    return $this->dailyRecords($request->family);
  }

  public function eggProductionDeleteRecord(Request $request)
  {
    $edit = EggCollection::where('id', $request->delete)->firstOrFail();
    $edit->delete();
    return $this->dailyRecords($request->del_family);
  }

  public function feedingRecordEditForm($id)
  {
    $feedingrec = PenFeeding::where('id', $id)->firstOrFail();
    $family = Family::where('id', $feedingrec->family_id)->firstOrFail();
    return view('poultry.chicken.breeder.daily_records_feeding_rec_edit', compact('feedingrec', 'family'));
  }

  public function feedingRecordEditFormSubmit(Request $request)
  {
    $feeding = PenFeeding::where('id', $request->feedingrecid)->firstOrFail();
    $request->validate([
      'date_collected' => 'required',
      'type_offered' => 'required',
      'type_refused' => 'required',
      'amount_offered' => 'required',
      'amount_refused' => 'required',
    ]);

    $feeding->type_offered = $request->type_offered;
    $feeding->type_refused = $request->type_refused;
    $feeding->date_fed = $request->date_collected;
    $feeding->amount_offered = $request->amount_offered;
    $feeding->amount_refused = $request->amount_refused;
    $feeding->remarks = $request->remarks;
    $feeding->save();
    return $this->dailyRecords($request->family);
  }

  public function feedingRecordDeleteRecord(Request $request)
  {
    $edit = PenFeeding::where('id', $request->delete)->firstOrFail();
    $edit->delete();
    $request->session()->flash('feeding-delete', 'Feeding record deleted');
    return $this->dailyRecords($request->del_family);
  }

      /***************Egg Quality**************/
      

}
