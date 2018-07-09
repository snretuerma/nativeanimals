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
    $flag = false;
    $checks = Family::where('is_active', true)->get();
    foreach ($checks as $check)
    {
        if(str_pad($request->family_id, 4, "0", STR_PAD_LEFT)==$check->number){
            $flag = true;
        }
    }
    if(!$flag){
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
    }else{
        $request->session()->flash('family-fail', 'Family not added');
        return Redirect::back()->with('message','Family not added');
    }
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
        else{
          $request->session()->flash('add-male-empty', 'Pen full');
          return Redirect::back()->with('message','No animal selected');
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
    $animals = Animal::where('family_id', $request->family)->where('status', 'replacement')->where('phenotypic', true)->where('morphometric', true)->get();
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
//          $request->session()->flash('add-female-success', 'Females added to family');
//          return $this->familyRecordsMenu();
        }
//        else{
//          $request->session()->flash('add-female-empty', 'No female animal added');
//          return $this->familyRecordsMenu();
//        }
      }
    }
      $request->session()->flash('add-female-success', 'Females added to family');
      return $this->familyRecordsMenu();
//    $request->session()->flash('add-female-empty', 'No female animal selected');
//    return Redirect::back()->with('message','No animal selected');
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
      'amount_offered' => 'required',
      'amount_refused' => 'required',
    ]);

    $feeding = new PenFeeding;
    $feeding->family_id = $request->family;
    $feeding->pen_id = $request->pen;
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
      'amount_offered' => 'required',
      'amount_refused' => 'required',
    ]);

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
  public function familylistEggQuality()
  {
    $families = Family::where('is_active', true)->paginate(15);
    return view('poultry.chicken.breeder.eggquality_familylist', compact('families'));
  }

  public function eggQualityRecords($id)
  {
    $family = Family::where('id', $id)->firstOrFail();
    $eggqualities = EggQuality::where('family', $id)->paginate(10);
    return view('poultry.chicken.breeder.egg_quality_log', compact('family', 'eggqualities'));
  }

  public function eggQualityForm($id)
  {
    $family = Family::where('id', $id)->firstOrFail();
    return view('poultry.chicken.breeder.egg_quality_form', compact('family'));
  }

  public function eggQualityFormSubmit(Request $request)
  {
    $this->validate(request(), [
      'egg_quality_at' => 'required',
      'generation' => 'required',
      'line' => 'required',
      'family' => 'required',
      'egg_weight' => 'required',
      'egg_color' => 'required',
      'egg_shape' => 'required',
      'egg_length' => 'required',
      'egg_width' => 'required',
      'albumen_height' => 'required',
      'albumen_weight' => 'required',
      'yolk_weight' => 'required',
      'yolk_color' => 'required',
      'shell_weight' => 'required',
      'thickness_top' => 'required',
      'thickness_mid' => 'required',
      'thickness_bot' => 'required',
      'date_collected' => 'required'
    ]);
    $now = new Carbon;
    $data = new EggQuality;
    $eggqualities = EggQuality::where('family', $request->family)->get()->last();
    $data->egg_quality_at = $request->egg_quality_at;
    if(!empty($eggqualities)){
      $data->sample_no = $eggqualities->id+1;
    }else{
      $data->sample_no = 1;
    }
    $data->generation = $request->generation;
    $data->line = $request->line;
    $data->family = $request->family;
    $data->egg_weight = $request->egg_weight;
    $data->egg_color = $request->egg_color;
    $data->egg_shape = $request->egg_shape;
    $data->egg_length = $request->egg_length;
    $data->egg_width = $request->egg_width;
    $data->albumen_height = $request->albumen_height;
    $data->albumen_weight = $request->albumen_weight;
    $data->yolk_weight = $request->yolk_weight;
    $data->yolk_color = $request->yolk_color;
    $data->shell_weight = $request->shell_weight;
    $data->thickness_top = $request->thickness_top;
    $data->thickness_mid = $request->thickness_mid;
    $data->thickness_bot = $request->thickness_bot;
    $data->date_collected = $this->carbonParseDate($request->date_collected);
    $data->save();

    return $this->eggQualityRecords($request->family);
  }

  public function eggQualityFormEdit($id)
  {
    $eggquality = EggQuality::where('id', $id)->firstOrFail();
    $family = Family::where('id', $eggquality->family)->firstOrFail();
    return view('poultry.chicken.breeder.egg_quality_form_edit', compact('eggquality', 'family'));
  }

  public function eggQualityFormEditSubmit(Request $request)
  {
    $this->validate(request(), [
      'egg_quality_at' => 'required',
      'family' => 'required',
      'egg_weight' => 'required',
      'egg_color' => 'required',
      'egg_shape' => 'required',
      'egg_length' => 'required',
      'egg_width' => 'required',
      'albumen_height' => 'required',
      'albumen_weight' => 'required',
      'yolk_weight' => 'required',
      'yolk_color' => 'required',
      'shell_weight' => 'required',
      'thickness_top' => 'required',
      'thickness_mid' => 'required',
      'thickness_bot' => 'required',
      'date_collected' => 'required'
    ]);

    $data = EggQuality::where('id', $request->record)->firstOrFail();
    $data->egg_quality_at = $request->egg_quality_at;
    $data->egg_weight = $request->egg_weight;
    $data->egg_color = $request->egg_color;
    $data->egg_shape = $request->egg_shape;
    $data->egg_length = $request->egg_length;
    $data->egg_width = $request->egg_width;
    $data->albumen_height = $request->albumen_height;
    $data->albumen_weight = $request->albumen_weight;
    $data->yolk_weight = $request->yolk_weight;
    $data->yolk_color = $request->yolk_color;
    $data->shell_weight = $request->shell_weight;
    $data->thickness_top = $request->thickness_top;
    $data->thickness_mid = $request->thickness_mid;
    $data->thickness_bot = $request->thickness_bot;
    $data->date_collected = $this->carbonParseDate($request->date_collected);
    $data->save();

    return $this->eggQualityRecords($request->family);
  }

  public function eggQualityFormDelete(Request $request)
  {
    $edit = EggQuality::where('id', $request->delete)->firstOrFail();
    $edit->delete();
    return $this->eggQualityRecords($request->del_family);
  }

  /***************Hatchery Parameters**************/
  public function hatcheryFamilyList()
  {
    $families = Family::where('is_active', true)->paginate(15);
    return view('poultry.chicken.breeder.hatchery_familylist', compact('families'));
  }

  public function hatcheryFamilyLogs($id)
  {
    $family = Family::where('id', $id)->firstOrFail();
    $chicks = Chick::where('family_id', $id)->paginate(15);
    return view('poultry.chicken.breeder.hatchery_family_log', compact('family', 'chicks'));
  }

  public function hatcheryPartialForm1($id)
  {
    $family = Family::where('id', $id)->firstOrFail();
    return view('poultry.chicken.breeder.hatchery_form1' ,compact('family'));
  }

  public function hatcheryPartialForm1Submit(Request $request)
  {
    $this->validate(request(), [
      'date_eggs_set' => 'required',
      'no_eggs_set' => 'required',
    ]);
    $family = Family::where('id', $request->family)->firstOrFail();
    $date_first_egg = Carbon::parse($family->getDateOfFirstEgg()->value);
    $chick = new Chick;
    $chick->family_id = $request->family;
    $chick->date_eggs_set = $this->carbonParseDate($request->date_eggs_set);
    $chick->number_eggs_set = $request->no_eggs_set;
    $chick->week_of_lay = $date_first_egg->diffInWeeks(Carbon::parse($request->date_eggs_set));
    $chick->hatchery_record = "01";
    $chick->save();

    return $this->hatcheryFamilyLogs($request->family);
  }

  public function hatcheryPartialForm1Edit()
  {

  }

  public function hatcheryPartialForm2($id)
  {
    $chick = Chick::where('id', $id)->firstOrFail();
    $family = Family::where('id', $chick->family_id)->firstOrFail();
    return view('poultry.chicken.breeder.hatchery_form2' ,compact('family', 'chick'));
  }

  public function hatcheryPartialForm2Submit(Request $request)
  {
    $this->validate(request(), [
      'fertile_eggs' => 'required'
    ]);

    $chick = Chick::where('id', $request->chick)->firstOrFail();
    $family = Family::where('id', $request->family)->firstOrFail();
    $chick->fertile_eggs = $request->fertile_eggs;
    $chick->hatchery_record = "10";
    $chick->save();
    return $this->hatcheryFamilyLogs($request->family);
  }

  public function hatcheryPartialForm2Edit()
  {

  }


  public function hatcheryPartialForm3($id)
  {
    $chick = Chick::where('id', $id)->firstOrFail();
    $family = Family::where('id', $chick->family_id)->firstOrFail();
    $pens = Pen::where('pen_type', 'brooder')->where('current_capacity', '>=' ,$chick->fertile_eggs)->get();
    return view('poultry.chicken.breeder.hatchery_form3' ,compact('family', 'chick', 'pens'));
  }

  public function hatcheryPartialForm3Submit(Request $request)
  {
    $this->validate(request(), [
      'hatched_eggs' => 'required',
      'date_hatched' => 'required',
      'moved_to_pen' => 'required',
      'remarks' => 'required',
    ]);

    $chick = Chick::where('id', $request->chick)->first();
    $chick->date_hatched = $this->carbonParseDate($request->date_hatched);
    $chick->hatched_eggs = $request->hatched_eggs;
    $chick->current_pen_id = $request->moved_to_pen;
    $chick->remarks = $request->remarks;
    $chick->hatchery_record = '11';
    $chick->save();

    $movement = new ChickMovement;
    $movement->chick_id = $chick->id;
    $movement->pen_id = $chick->current_pen_id;
    $movement->date_moved = $this->carbonParseDate($request->date_hatched);
    $movement->remarks = null;
    $movement->save();

    $pen = Pen::where('id', $chick->current_pen_id)->firstOrFail();
    $pen->current_capacity = $pen->current_capacity - $chick->hatched_eggs;
    $pen->save();
    return $this->hatcheryFamilyLogs($request->family);
  }

  public function hatcheryPartialForm3Edit()
  {

  }

  public function hatcheryFamilyLogsDelete(Request $request)
  {
    $delete = Chick::where('id', $request->delete)->firstOrFail();
    if($delete->current_pen_id != NULL){
      $pen = Pen::where('id', $delete->current_pen_id)->firstOrFail();
      $pen->current_capacity = $pen->current_capacity + $chick->hatched_eggs;
      $pen->save();
      $movement = ChickMovement::where('chick_id', $delete->id)->where('date_moved', $delete->date_hatched)->where('pen_id', $delete->current_pen_id)->firstOrFail();
      $movement->delete;
      $movement->save();
    }
    $delete->delete();
    return $this->hatcheryFamilyLogs($request->family);
  }

    /**********Breeder Summary**********/
    public function viewsummaryList()
    {
        $checks = Family::where('is_active', true)->get();
        $families = collect();
        foreach($checks as $check)
        {
            $member = FamilyMember::where('family_id', $check->id)->first();
            if($member != null){
                $families->push($check);
            }
        }
        return view('poultry.chicken.breederlist', compact('families'));
    }

    // @TODO Delete after Records Done
    public function viewSummary($id)
    {
        $family = Family::where('id', $id)->firstOrFail();
        $members = FamilyMember::where('family_id', $id)->get();
        $hatcheryrec = Chick::where('family_id', $id)->get(['fertile_eggs', 'number_eggs_set', 'hatched_eggs']);
        //Set all phenotypic characteristics
        $pheno = [];
        $plumcolor = array("White" => 0, "Black" => 0, "Red" => 0, "Orange" => 0, "Brown" => 0, "Yellow" => 0);
        $plumpattern = array("Plain" => 0, "Barred" => 0, "Wild Type" => 0, "Laced" => 0, "Mottled" => 0);
        $hacklecol = array("Yellow" => 0, "Orange" => 0, "Brown" => 0, "Red" => 0, "Black" => 0);
        $hacklepat = array("Plain" => 0, "Laced" => 0, "Barred" => 0);
        $bodycarriage = array("Upright" => 0, "Slight Upright" => 0);
        $combtype = array("Single" => 0, "Pea" => 0, "Rose" => 0);
        $combcolor = array("Red" => 0, "Pink" => 0, "Black" => 0);
        $earlobecolor = array("White" => 0, "Red" => 0, "Red-White" => 0);
        $iriscolor = array("Red" => 0, "Orange" => 0, "Brown" => 0, "Yellow" => 0);
        $beakcolor = array("White" => 0, "Black" => 0, "Brown" => 0, "Yellow" => 0);
        $shankcolor = array("White" => 0, "Black" => 0, "Yellow" => 0, "Green " => 0, "Grey" => 0);
        $skincolor = array("White" => 0, "Yellow" => 0  );
        $morpho = [];
        $height = [];
        $weight = [];
        $bodylen = [];
        $chestcirc = [];
        $wingspan = [];
        $shanklen = [];
        $percentfertility = [];
        $percenthatchability = [];
        if(!empty($members)){
            foreach ($members as $member)
            {
                $props = AnimalProperty::where('animal_id', $member->animal_id)->get();
                foreach ($props as $prop)
                {
                    if($prop->property_id == 9){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $plumcolor)){
                                $plumcolor[$val]++;
                            }else{
                                $plumcolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 10){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $plumpattern)){
                                $plumpattern[$val]++;
                            }else{
                                $plumpattern[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 11){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $hacklecol)){
                                $hacklecol[$val]++;
                            }else{
                                $hacklecol[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 12){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $hacklepat)){
                                $hacklepat[$val]++;
                            }else{
                                $hacklepat[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 13){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $bodycarriage)){
                                $bodycarriage[$val]++;
                            }else{
                                $bodycarriage[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 14){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $combtype)){
                                $combtype[$val]++;
                            }else{
                                $combtype[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 15){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $combcolor)){
                                $combcolor[$val]++;
                            }else{
                                $combcolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 16){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $earlobecolor)){
                                $earlobecolor[$val]++;
                            }else{
                                $earlobecolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 17){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $iriscolor)){
                                $iriscolor[$val]++;
                            }else{
                                $iriscolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 18){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $beakcolor)){
                                $beakcolor[$val]++;
                            }else{
                                $beakcolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 19){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $shankcolor)){
                                $shankcolor[$val]++;    
                            }else{
                                $shankcolor[$val] = 1;
                            }
                        }
                    }
                    if($prop->property_id == 20){
                        $propval = explode(',', $prop->value);
                        foreach($propval as $val){
                            if(array_key_exists($val, $skincolor)){
                                $skincolor[$val]++;
                            }else{
                                $skincolor[$val] = 1;
                            }
                        }
                    }

                    if($prop->property_id == 22){
                        array_push($height, $prop->value);
                    }

                    if($prop->property_id == 23){
                        array_push($weight, $prop->value);
                    }

                    if($prop->property_id == 24){
                        array_push($bodylen, $prop->value);
                    }

                    if($prop->property_id == 25){
                        array_push($chestcirc, $prop->value);
                    }

                    if($prop->property_id == 26){
                        array_push($wingspan, $prop->value);
                    }

                    if($prop->property_id    == 27){
                        array_push($shanklen, $prop->value);
                    }
                }
            }
            array_push($pheno, $plumcolor, $plumpattern, $hacklecol, $hacklepat, $bodycarriage, $combtype, $combcolor, $earlobecolor, $iriscolor, $beakcolor, $shankcolor, $skincolor);
            array_push($morpho, $height, $weight, $bodylen, $chestcirc, $wingspan, $shanklen);

            if(!empty($hatcheryrec)){
                foreach ($hatcheryrec as $rec){
                    array_push($percentfertility, (($rec->fertile_eggs/$rec->number_eggs_set)*100));
                    array_push($percenthatchability, (($rec->hatched_eggs/$rec->fertile_eggs)*100));
                }
            }



            return view('/poultry/chicken/breeder/breeder_summary', compact('family','pheno', 'morpho', 'percentfertility', 'percenthatchability'));
        }

        return Redirect::back()->with('message','No animal in the family');
    }

    public function recordsFamilyView()
    {
        $gens = Generation::orderBy('id', 'desc')->get();
//        $families = Family::get();
        $families = $gens->first()->getFamilies();
        $family = [];
        $male = [];
        $female = [];
        $pheno = [];
        $morpho = [];
        $plumcolor = array("White" => 0, "Black" => 0, "Red" => 0, "Orange" => 0, "Brown" => 0, "Yellow" => 0);
        $plumpattern = array("Plain" => 0, "Barred" => 0, "Wild Type" => 0, "Laced" => 0, "Mottled" => 0);
        $hacklecol = array("Yellow" => 0, "Orange" => 0, "Brown" => 0, "Red" => 0, "Black" => 0);
        $hacklepat = array("Plain" => 0, "Laced" => 0, "Barred" => 0);
        $bodycarriage = array("Upright" => 0, "Slight Upright" => 0);
        $combtype = array("Single" => 0, "Pea" => 0, "Rose" => 0);
        $combcolor = array("Red" => 0, "Pink" => 0, "Black" => 0);
        $earlobecolor = array("White" => 0, "Red" => 0, "Red-White" => 0);
        $iriscolor = array("Red" => 0, "Orange" => 0, "Brown" => 0, "Yellow" => 0);
        $beakcolor = array("White" => 0, "Black" => 0, "Brown" => 0, "Yellow" => 0);
        $shankcolor = array("White" => 0, "Black" => 0, "Yellow" => 0, "Green " => 0, "Grey" => 0);
        $skincolor = array("White" => 0, "Yellow" => 0  );
        $height = [];
        $weight = [];
        $bodylen = [];
        $chestcirc = [];
        $wingspan = [];
        $shanklen = [];
        array_push($pheno, $plumcolor, $plumpattern, $hacklecol, $hacklepat, $bodycarriage, $combtype, $combcolor, $earlobecolor, $iriscolor, $beakcolor, $shankcolor, $skincolor);
        array_push($morpho, $height, $weight, $bodylen, $chestcirc, $wingspan, $shanklen);
        array_push($male, $pheno, $morpho);
        array_push($female, $pheno, $morpho);
        foreach ($families as $fam){
            $members = $fam->getMembers();
            if(!empty($members)){
                foreach ($members as $member){
                    if($member->getMemberGender() == 'M'){
                        $props = AnimalProperty::where('animal_id', $member->animal_id)->get();
                        foreach ($props as $prop)
                        {
                            if($prop->property_id == 9){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][0])){
                                        $male[0][0][$val]++;
                                    }else{
                                        $male[0][0][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 10){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][1])){
                                        $male[0][1][$val]++;
                                    }else{
                                        $male[0][1][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 11){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][2])){
                                        $male[0][2][$val]++;
                                    }else{
                                        $male[0][2][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 12){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][3])){
                                        $male[0][3][$val]++;
                                    }else{
                                        $male[0][3][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 13){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][4])){
                                        $male[0][4][$val]++;
                                    }else{
                                        $male[0][4][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 14){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][5])){
                                        $male[0][5][$val]++;
                                    }else{
                                        $male[0][5][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 15){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][6])){
                                        $male[0][6][$val]++;
                                    }else{
                                        $male[0][6][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 16){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][7])){
                                        $male[0][7][$val]++;
                                    }else{
                                        $male[0][7][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 17){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][8])){
                                        $male[0][8][$val]++;
                                    }else{
                                        $male[0][8][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 18){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][9])){
                                        $male[0][9][$val]++;
                                    }else{
                                        $male[0][9][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 19){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][10])){
                                        $male[0][10][$val]++;
                                    }else{
                                        $male[0][10][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 20){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $male[0][11])){
                                        $male[0][11][$val]++;
                                    }else{
                                        $male[0][11][$val] = 1;
                                    }
                                }
                            }

                            if($prop->property_id == 22){
                                array_push($male[1][0], $prop->value);
                            }

                            if($prop->property_id == 23){
                                array_push($male[1][1], $prop->value);
                            }

                            if($prop->property_id == 24){
                                array_push($male[1][2], $prop->value);
                            }

                            if($prop->property_id == 25){
                                array_push($male[1][3], $prop->value);
                            }

                            if($prop->property_id == 26){
                                array_push($male[1][4], $prop->value);
                            }

                            if($prop->property_id    == 27){
                                array_push($male[1][5], $prop->value);
                            }
                        }
                    }else{
                        $props = AnimalProperty::where('animal_id', $member->animal_id)->get();
                        foreach ($props as $prop)
                        {
                            if($prop->property_id == 9){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][0])){
                                        $female[0][0][$val]++;
                                    }else{
                                        $female[0][0][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 10){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][1])){
                                        $female[0][1][$val]++;
                                    }else{
                                        $female[0][1][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 11){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][2])){
                                        $female[0][2][$val]++;
                                    }else{
                                        $female[0][2][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 12){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][3])){
                                        $female[0][3][$val]++;
                                    }else{
                                        $female[0][3][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 13){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][4])){
                                        $female[0][4][$val]++;
                                    }else{
                                        $female[0][4][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 14){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][5])){
                                        $female[0][5][$val]++;
                                    }else{
                                        $female[0][5][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 15){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][6])){
                                        $female[0][6][$val]++;
                                    }else{
                                        $female[0][6][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 16){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][7])){
                                        $female[0][7][$val]++;
                                    }else{
                                        $female[0][7][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 17){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][8])){
                                        $female[0][8][$val]++;
                                    }else{
                                        $female[0][8][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 18){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][9])){
                                        $female[0][9][$val]++;
                                    }else{
                                        $female[0][9][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 19){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][10])){
                                        $female[0][10][$val]++;
                                    }else{
                                        $female[0][10][$val] = 1;
                                    }
                                }
                            }
                            if($prop->property_id == 20){
                                $propval = explode(',', $prop->value);
                                foreach($propval as $val){
                                    if(array_key_exists($val, $female[0][11])){
                                        $female[0][11][$val]++;
                                    }else{
                                        $female[0][11][$val] = 1;
                                    }
                                }
                            }

                            if($prop->property_id == 22){
                                array_push($female[1][0], $prop->value);
                            }

                            if($prop->property_id == 23){
                                array_push($female[1][1], $prop->value);
                            }

                            if($prop->property_id == 24){
                                array_push($female[1][2], $prop->value);
                            }

                            if($prop->property_id == 25){
                                array_push($female[1][3], $prop->value);
                            }

                            if($prop->property_id == 26){
                                array_push($female[1][4], $prop->value);
                            }

                            if($prop->property_id    == 27){
                                array_push($female[1][5], $prop->value);
                            }
                        }
                    }
                }
            }
        }

        array_push($family, $male, $female);
        return view('poultry.chicken.records.family_view', compact('gens', 'family'));
    }

    public function recordsGenerationView()
    {

    }

}
