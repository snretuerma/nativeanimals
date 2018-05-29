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

class PoultryController extends Controller
{
    protected $user;

    public function __construct()
    {
      $this->middleware(function($request, $next){
          $this->user = Auth::user();
          return $next($request);
      });
    }

    public function getIndex(){
      return view('poultry.dashboard');
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

    /*************************
    *** Ajax Methods ***
    *************************/

    public function ajaxReturnLine($id)
    {
      $lines = Line::where('generation_id', $id)->where('is_active', true)->get();
      return $lines;
    }

    // public function ajaxReturnFamily($id)
    // {
    //
    // }

    /*************************
    *** Generation Methods ***
    *************************/

    public function fetchGeneration()
    {
      $generations = Generation::latest('id')->paginate(15);
      return view('poultry.chicken.generation', compact('generations'));
    }

    public function createGeneration(Request $request)
    {
      $lines = array_filter($request->line);
      $newgen = new Generation;
      $newgen->number = str_pad($request->generation, 4, "0", STR_PAD_LEFT);
      $newgen->is_active = true;
      $newgen->save();
      if(!empty($lines)){
        foreach ($lines as $line) {
          $newline = new Line;
          $newline->number = str_pad($line, 4, "0", STR_PAD_LEFT);
          $newline->generation_id = $newgen->id;
          $newline->is_active = true;
          $newline->save();
        }
      }
      $request->session()->flash('generation-create', 'Generation added');
      return Redirect::back()->with('message','Generation  added');
    }

    public function editGeneration(Request $request)
    {
      $this->validate(request(), [
        'line_edit[]' => 'required',
      ]);
      dd($request);
      $generation = Generation::where('id', $request->generation_edit)->first();
      $lines = array_filter($request->line_edit);
      $pens =  array_filter($request->pen);
      if(!empty($lines)){
        foreach ($lines as $line) {
          $newline = new Line;
          $newline->number = str_pad($line, 4, "0", STR_PAD_LEFT);
          $newline->generation_id = $generation->id;
          $newline->is_active = true;
          $newline->save();
        }
      }
      return Redirect::back()->with('message','Generation edit complete');
    }

    public function cullGeneration()
    {

    }

    public function createPensPage()
    {
      $pens = Pen::paginate(15);
      return view('poultry.pens_page', compact('pens'));
    }

    public function createPens(Request $request)
    {
      $this->validate(request(), [
        'pen_no' => 'required',
        'capacity' => 'required',
        'pen_type' => 'required'
      ]);
      $pen = new Pen;
      $pen->pen_type = $request->pen_type;
      $pen->capacity = $request->capacity;
      $pen->current_capacity = $request->capacity;
      $pen->number = ucfirst(substr($request->pen_type, 0, 1)).str_pad($request->pen_no, 2, "0", STR_PAD_LEFT);
      $pen->save();
      $request->session()->flash('pen-create', 'Pen created');
      return Redirect::back()->with('message','Pen created');
    }

    public function getAllPens()
    {
      return Pen::all()->toJson();
    }

    /*
      Form 6
    */
    public function getPageReplacementIndividualRecord()
    {
      $pens = Pen::where('pen_type', 'grower')->get();
      $generations = Generation::where('is_active', true)->get();
      return view('poultry.chicken.replacement.individualrecord', compact('pens', 'families', 'generations'));
    }

    public function addReplacementIndividualRecord(Request $request){
      $family = Family::where('id', $request->family)->first();
      $now = new Carbon;
      $animal = new Animal;
      $farm = $this->user->getFarm();
      $breed = $farm->getBreed();
      $animaltype = $farm->getFarmType();
      $request->individual_id = str_pad($request->individual_id, 4, "0", STR_PAD_LEFT);
      $request->generation = $family->getGeneration()->number;
      $request->line = $family->getLine()->number;
      $request->family = $family->number;
      $request->moved_to_pen = str_pad($request->moved_to_pen, 4, "0", STR_PAD_LEFT);
      $registryid = $farm->code.'-'.$now->year.$request->generation.$request->line.$request->family.$request->gender.$request->individual_id;

      $animal->animaltype_id = $animaltype->id;
      $animal->farm_id = $farm->id;
      $animal->breed_id = $breed->id;
      $animal->status = "replacement";
      $animal->registryid = $registryid;
      $animal->pen_id = $request->moved_to_pen;
      $animal->family_id = $family->id;
      $animal->save();

      $animalproperty1 = new AnimalProperty;
      $animalproperty1->animal_id = $animal->id;
      $animalproperty1->property_id = 1;
      $animalproperty1->value = $request->date_hatched;
      $animalproperty1->date_collected = $now;
      $animalproperty1->save();

      $animalproperty2 = new AnimalProperty;
      $animalproperty2->animal_id = $animal->id;
      $animalproperty2->property_id = 2;
      $animalproperty2->value = $request->individual_id;
      $animalproperty2->date_collected = $now;
      $animalproperty2->save();

      $animalproperty3 = new AnimalProperty;
      $animalproperty3->animal_id = $animal->id;
      $animalproperty3->property_id = 3;
      $animalproperty3->value = $request->generation;
      $animalproperty3->date_collected = $now;
      $animalproperty3->save();

      $animalproperty4 = new AnimalProperty;
      $animalproperty4->animal_id = $animal->id;
      $animalproperty4->property_id = 4;
      $animalproperty4->value = $request->line;
      $animalproperty4->date_collected = $now;
      $animalproperty4->save();

      $animalproperty5 = new AnimalProperty;
      $animalproperty5->animal_id = $animal->id;
      $animalproperty5->property_id = 5;
      $animalproperty5->value = $request->family;
      $animalproperty5->date_collected = $now;
      $animalproperty5->save();

      $animalproperty6 = new AnimalProperty;
      $animalproperty6->animal_id = $animal->id;
      $animalproperty6->property_id = 6;
      $animalproperty6->value = $request->gender;
      $animalproperty6->date_collected = $now;
      $animalproperty6->save();

      $animalproperty7 = new AnimalProperty;
      $animalproperty7->animal_id = $animal->id;
      $animalproperty7->property_id = 7;
      $animalproperty7->value = $request->date_transferred;
      $animalproperty7->date_collected = $now;
      $animalproperty7->save();

      $animalproperty8 = new AnimalProperty;
      $animalproperty8->animal_id = $animal->id;
      $animalproperty8->property_id = 8;
      $animalproperty8->value = $request->moved_to_pen;
      $animalproperty8->date_collected = $now;
      $animalproperty8->save();

      $pen = Pen::where('id', $request->moved_to_pen)->first();
      $pen->current_capacity = $pen->current_capacity-1;
      $pen->save();
      $request->session()->flash('individual-record-success', 'Individual record saved');
      return Redirect::back()->with('message','Animal record successfully saved');
    }

    // Daily Records
    public function breederDailyRecords()
    {
      $families = Family::where('is_active', true)->get();
      return view('poultry.chicken.breeder.daily_records', compact('families', 'pens'));
    }

    public function fetchBreederDailyRecords(Request $request)
    {
      $family = Family::where('id', $request->family)->first();
      $eggcollection = new EggCollection;
      $eggcollection->family_id = $request->family;
      $eggcollection->date_collected = $request->date_eggs_collected;
      $eggcollection->number_of_eggs = $request->total_eggs_collected;
      $eggcollection->weight = $request->total_egg_weight;
      $eggcollection->broken_eggs = $request->no_broken;
      $eggcollection->soft_shelled_eggs = $request->no_shell;
      $eggcollection->save();

      $penfeeding = new PenFeeding;
      $penfeeding->date_fed = $request->date_collected;
      $penfeeding->family_id = $request->family;
      $penfeeding->pen_id = $family->pen_id;
      $penfeeding->feed_offered = $request->type_offered;
      $penfeeding->feed_refused = $request->type_refused;
      $penfeeding->amount_offered = $request->amount_offered;
      $penfeeding->amount_refused = $request->amount_refused;
      $penfeeding->remarks = $request->remarks;
      $penfeeding->save();

      if(!empty($request->mortality)){
        $index = 0;
        foreach ($request->mortality as $mortality) {
          $member = Animal::where('id', $mortality)->first();
          $this->removeBreeders($member, "Dead", $request->mort_reason[$index], $request->date_collected, null, null);
          $index++;
        }
      }
      if(!empty($request->culled)){
        $index = 0;
        foreach ($request->culled as $culled) {
          $member = Animal::where('id', $culled)->first();
          $this->removeBreeders($member, "Dead", $request->cull_reason[$index], $request->date_collected, null, null);
          $index++;
        }
      }
      return Redirect::back()->with('message','Daily Records successfully recorded');
    }

    public function dailyFamilyMembers(Request $request)
    {
      $family_members = FamilyMember::where('family_id', $request->family_id)->where('date_end', null)->get();
      $family = Family::where('id', $request->family_id)->first();
      $pen = Pen::where('id', $family->pen_id)->first();
      foreach($family_members as $member){
        $member->registryid = $member->getAnimalInstance()->registryid;
        $member->pen_id = $family->pen_id;
        $member->pen_no = $pen->number;
      }
      return $family_members;
    }

    // Hatchery Parameters

    public function completeHatcheryRecordList()
    {
      $chicks = Chick::where('hatchery_record', false)->get();
      return view('poultry.chicken.broodersgrowers.hatcherylist', compact('chicks'));
    }

    public function getPageHatcheryParameter()
    {
      $generations = Generation::where('is_active', true)->get();
      $lines = Line::where('is_active', true)->get();
      $families = Family::where('is_active', true)->get();
      $pens = Pen::all();
      return view('poultry.chicken.breeder.hatcheryparameters', compact('families', 'lines', 'pens', 'generations'));
    }

    public function fetchHatcheryParameter(Request $request)
    {
      $this->validate(request(), [
        'family' => 'required',
        'date_eggs_set' => 'required',
        'generation' => 'required',
        'line' => 'required',
        'no_eggs_set' => 'required',
      ]);
      $now = new Carbon;
      $family = Family::where('id', $request->family)->first();
      $famchickdata = Chick::where('family_id', $family->id)->first();
      $week_of_lay = null;
      $chick = new Chick;
      $chick->family_id = $family->id;
      $chick->date_eggs_set = $this->carbonParseDate($request->date_eggs_set);
      $chick->number_eggs_set = $request->no_eggs_set;
      $chick->week_of_lay = null;
      // $chick->fertile_eggs = $request->no_fertile;
      // $chick->date_hatched = $this->carbonParseDate($request->date_hatched);
      // $chick->hatched_eggs = $request->no_eggs_hatched;
      // $chick->current_pen_id = $request->moved_to_pen;
      // $chick->remarks = $request->remarks;
      $chick->save();

      // $movement = new ChickMovement;
      // $movement->chick_id = $chick->id;
      // $movement->pen_id = $chick->current_pen_id;
      // $movement->date_moved = $this->carbonParseDate($request->date_hatched);
      // $movement->remarks = null;
      // $movement->save();
      return $this->completeHatcheryRecordList();
    }

    public function completeHatcheryRecordPage($id)
    {
      $pens = Pen::where('current_capacity','!=', 'capacity' )->get();
      $chick = Chick::where('id', $id)->first();
      return view('poultry.chicken.broodersgrowers.completehatcheryrecord', compact('pens', 'id', 'chick'));
    }
    public function completeHatcheryRecord(Request $request)
    {
      $this->validate(request(), [
        'no_fertile' => 'required',
        'date_hatched' => 'required',
        'no_eggs_hatched' => 'required',
        'moved_to_pen' => 'required',
      ]);
      $chick = Chick::where('id', $request->id)->first();
      $chick->fertile_eggs = $request->no_fertile;
      $chick->date_hatched = $this->carbonParseDate($request->date_hatched);
      $chick->hatched_eggs = $request->no_eggs_hatched;
      $chick->current_pen_id = $request->moved_to_pen;
      $chick->remarks = $request->remarks;
      $chick->hatchery_record = true;
      $chick->save();

      $movement = new ChickMovement;
      $movement->chick_id = $chick->id;
      $movement->pen_id = $chick->current_pen_id;
      $movement->date_moved = $this->carbonParseDate($request->date_hatched);
      $movement->remarks = null;
      $movement->save();

      $pen = Pen::where('id', $chick->current_pen_id)->first();
      $pen->current_capacity = $pen->current_capacity - $chick->hatched_eggs;
      $pen->save();
      return $this->completeHatcheryRecordList();
    }

    // Egg Quality
    public function getPageEggQuality()
    {
      $generations = Generation::where('is_active', true)->get();
      $lines = Line::where('is_active', true)->get();
      $families = Family::where('is_active', true)->get();

      return view('poultry.chicken.breeder.eggquality', compact('generations', 'lines', 'families'));
    }

    public function eggQualityReturnLine($id)
    {
      $lines = Line::where('generation_id', $id)->where('is_active', true)->get();
      return $lines;
    }

    public function eggQualityReturnFamily($id)
    {
      $families = Family::where('line_id', $id)->where('is_active', true)->get();
      return $families;
    }


    // @TODO Fix sample_no for each family
    public function fetchEggQuality(Request $request)
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
      $data->egg_quality_at = $request->egg_quality_at;
      $data->sample_no = $now->year.$now->month.$now->day.$now->hour.$now->minute.$now->second;
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


      return Redirect::back()->with('message','Egg quality successfully recorded');
    }

    // Viewing Family and Individual Data
    public function getPageBreederList(){
      $families = Family::where('is_active', true)->get();
      return view('poultry.chicken.breederlist', compact('families'));
    }

    // @TODO get average values for phenotypic and morphometric characteristics
    public function getPageBreederFamilySummary($id)
    {
      $famproperties = FamilyProperty::where('family_id', $id)->get();
      $family = Family::where('id', $id)->first();
      $familymembers = FamilyMember::join('animals', 'animals.id', '=','family_members.animal_id')->where('family_members.family_id', $id)->get();
      $animalprop = AnimalProperty::get()->groupBy('animal_id');
      $includeproperty = [];
      // dd($animalprop);
      foreach ($familymembers as $fam) {
        foreach ($animalprop as $property) {
          if($fam->animal_id == $property[0]->animal_id){
            array_push($includeproperty, $property);
          }
        }
      }
      //
      // $plummagecolor = [];
      //
      // foreach ($includeproperty as $prop) {
      //   if(in_array($prop[8]->value)){
      //
      //   }else{
      //     array_push($plummagecolor, $prop[8]->value);
      //   }
      //
      // }
      // dd($plummagecolor);
      // $members = FamilyMember::where('family_id', $id)->join('animal_properties', 'family_members.animal_id', 'animal_properties.animal_id')->groupBy('animal_properties.animal_id')->get();
      // dd($includeproperty);

      return view('poultry.chicken.breeder.family_summary', compact('famproperties', 'family'));
    }

    public function getPageBreederIndividualList($id)
    {
      $animals = FamilyMember::where('family_id', $id)->get();
      return view('poultry.chicken.breeder.individual_list', compact('animals'));
    }

    public function getPageIndividualData($id)
    {
      $animal = Animal::where('id', $id)->first();
      $properties = $animal->getAnimalProperties();

      return view('poultry.chicken.breeder.individualdata', compact('animal', 'properties'));
    }

    // Growth Performance
    // @TODO For chicks above generation 0
    public function getPageReplacementGrowthPerformance()
    {
      // $animals = Animal::where(function ($query) {
      //               $query->where('status', 'replacement')
      //                     ->orWhere('status', 'breeder');
      //                   })->paginate(10);

      $chicks = Chick::where('hatchery_record', true)->get();
      return view('poultry.chicken.replacement.growthperformancelist', compact('chicks'));
    }

    public function getPageReplacementGrowthPerformanceId($id, $record)
    {
      $chick = Chick::where('id', $id)->first();
      return view('poultry.chicken.replacement.growthperformance', compact('chick', 'record'));
    }

    //
    public function fetchReplacementGrowthPerformance(Request $request)
    {
      $this->validate(request(),[
        'animal_id' => 'required',
        'weight_at' => 'required',
        'date_collected' => 'required',
        'm_quantity' => 'required',
        'm_weight' => 'required',
        'f_quantity' => 'required',
        'f_weight' => 'required',
        't_quantity' => 'required',
        't_weight' => 'required',
      ]);
      $chickweight = new ChickWeight;
      $chickweight->chick_id = $request->animal_id;
      $chickweight->male_qty = $request->m_quantity;
      $chickweight->male_wt = $request->m_weight;
      $chickweight->female_qty = $request->f_quantity;
      $chickweight->female_wt = $request->f_weight;
      $chickweight->total = $request->t_quantity;
      $chickweight->total_wt = $request->t_weight;
      $chickweight->date_collected = $this->carbonParseDate($request->date_collected);
      $chickweight->save();
      $chick = Chick::where('id', $request->animal_id)->first();

      if($request->weight_at == 0){
        $chick->growth = substr_replace($chick->growth, 1 ,0 ,1);
      }
      elseif($request->weight_at == 21){
        $chick->growth = substr_replace($chick->growth, 1 ,1 ,1);
      }
      elseif($request->weight_at == 45){
        $chick->growth = substr_replace($chick->growth, 1 ,2 ,1);
      }
      elseif($request->weight_at == 75){
        $chick->growth = substr_replace($chick->growth, 1 ,3 ,1);
      }
      elseif($request->weight_at == 100){
        $chick->growth = substr_replace($chick->growth, 1 ,4 ,1);
      }
      elseif($request->weight_at == 120){
        $chick->growth = substr_replace($chick->growth, 1 ,5 ,1);
      }
      $chick->save();
      return $this->getPageReplacementGrowthPerformance();
    }

    // Brooders and Growers Feeding Record
    public function getPageBroodersGrowersFeedingList()
    {
      $chicks = Chick::where('hatchery_record', true)->get();
      return view('poultry.chicken.broodersgrowers.feedinglist', compact('chicks'));
    }

    public function getPageBroodersGrowersFeedingRecord($id, $record)
    {
      $chick = Chick::where('id', $id)->first();
      return view('poultry.chicken.broodersgrowers.feedingrecord', compact('chick', 'record'));
    }

    public function broodersGrowersFeedingRecord(Request $request)
    {
      $this->validate(request(),[
        'month' => 'required',
        'date_collected' => 'required',
        'type_offered' => 'required',
        'feed_offered' => 'required',
        'feed_refused' => 'required',
        'amount_offered' => 'required',
        'amount_refused' => 'required',
        'mortality' => 'required',
        'culled' => 'required',
        'remarks' => 'required'
      ]);

      $feeding = new ChickFeeding;
      $feeding->chick_id = $request->id;
      $feeding->classification = $request->weight_at;
      $feeding->feed_type = $request->type_offered;
      $feeding->month = $request->month;
      $feeding->feed_offered = $request->feed_offered;
      $feeding->feed_refused = $request->feed_refused;
      $feeding->amount_fed = $request->amount_offered;
      $feeding->amount_refused = $request->amount_refused;
      $feeding->mortality = $request->mortality;
      $feeding->culled = $request->culled;
      $feeding->remarks = $request->remarks;
      $feeding->date_fed = $request->date_collected;
      $feeding->save();

      $chick = Chick::where('id', $feeding->chick_id)->first();
      if($request->weight_at === 'brooding'){
        $chick->feeding = substr_replace($chick->feeding, 1 ,0 ,1);
      }
      if($request->weight_at === 'hardening'){
        $chick->feeding = substr_replace($chick->feeding, 1 ,1 ,1);
      }
      if($request->weight_at === 'growing'){
        $chick->feeding = substr_replace($chick->feeding, 1 ,2 ,1);
      }
      $chick->save();

      return $this->getPageBroodersGrowersFeedingList();
    }

    // Replacement Feeding Record
    public function replacementFeedingList()
    {
      $replacements = Animal::where('status', 'replacement')->get();
      return view('poultry.chicken.replacement.feeding_records_list', compact('replacements'));
    }

    public function replacementFeedingForm($id)
    {
      $animal = Animal::where('id', $id)->first();
      return view('poultry.chicken.replacement.feeding_form', compact('animal'));
    }

    public function replacementFeedingFetchData(Request $request)
    {
      $animal = Animal::where('id', $request->id)->first();
      $penfeeding = new PenFeeding;
      $penfeeding->family_id = $animal->getFamily()->id;
      $penfeeding->pen_id = $animal->getPen();
      $penfeeding->feed_offered = $request->feed_offered;
      $penfeeding->feed_refused = $request->feed_refused;
      $penfeeding->type_offered = $request->type_offered;
      $penfeeding->date_fed = $request->date_fed;
      $penfeeding->amount_offered = $request->amount_offered;
      $penfeeding->amount_refused = $request->amount_refused;
      $penfeeding->remarks = $request->remarks;
      $penfeeding->save();

      return $this->replacementFeedingList();
    }

    // Mortality, Culling and Sales
    public function removalMenuPage()
    {
      return view('poultry.chicken.others.removalmenu');
    }

    public function breederFamilyRemovalList()
    {
      $families = DB::table('family_members')->where('date_end', null)->get();
      $family_id = [];
      foreach ($families as $family) {
        if(!in_array($family->family_id, $family_id)){
          array_push($family_id, $family->family_id);
        }
      }
      return view('poultry.chicken.others.breeder_family_removal', compact('family_id'));
    }

    public function breederCullingRemovalList($id)
    {
      // $familymembers = FamilyMember::join('animals', 'family_members.animal_id', '=', 'animals.id')
      //                 ->where('date_end', null)
      //                 ->where('family_id', $id)
      //                 ->get();

      $familymembers = Animal::where('status', 'breeder')->where('family_id', $id)->get();
      return view('poultry.chicken.others.culling_breederlist', compact('familymembers'));
    }

    public function breederCullingRemovalListSubmit(Request $request)
    {
      $now = new Carbon();
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->cull_reason)){
        foreach ($request->animal_id as $animal) {
          $cull = Animal::where('id', $animal)->first();
          $cull->status = "culled";
          $cull->save();
          $pen = Pen::where('id', $cull->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          $member = FamilyMember::where('animal_id', $animal)->first();
          $member->date_end = $this->carbonParseDate($request->date[$index]);
          $member->save();
          $removal = new BreederRemoval;
          $removal->animal_id = $animal;
          $removal->status = "culled";
          $removal->reason = $request->cull_reason[$index];
          $removal->date_removed = $this->carbonParseDate($request->date[$index]);
          $removal->save();
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Culling recorded');
    }

    public function breederMortalityRemovalList($id)
    {
      $familymembers = Animal::where('status', 'breeder')->where('family_id', $id)->get();
      // $breeders = Animal::where('status', 'breeder')->get();
      return view('poultry.chicken.others.mortality_breederlist', compact('familymembers'));
    }

    public function breederMortalityRemovalListSubmit(Request $request)
    {
      $now = new Carbon();
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->mort_reason)){
        foreach ($request->animal_id as $animal) {
          $mort = Animal::where('id', $animal)->first();
          $mort->status = "died";
          $mort->save();
          $pen = Pen::where('id', $mort->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          $member = FamilyMember::where('animal_id', $animal)->first();
          $member->date_end = $this->carbonParseDate($request->date[$index]);
          $member->save();
          $removal = new BreederRemoval;
          $removal->animal_id = $animal;
          $removal->status = "died";
          $removal->reason = $request->mort_reason[$index];
          $removal->date_removed = $this->carbonParseDate($request->date[$index]);
          $removal->save();
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Mortality recorded');
    }

    public function breederSalesRemovalList($id)
    {
      $familymembers = Animal::where('status', 'breeder')->where('family_id', $id)->get();

      return view('poultry.chicken.others.sales_breederlist', compact('familymembers'));
    }

    public function breederSalesRemovalListSubmit(Request $request)
    {
      $now = new Carbon();
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->sales_reason)){
        foreach ($request->animal_id as $animal) {
          $sales = Animal::where('id', $animal)->first();
          $sales->status = "sold";
          $sales->save();
          $pen = Pen::where('id', $sales->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          $member = FamilyMember::where('animal_id', $animal)->first();
          $family_id = $member->family_id;
          $member->date_end = $this->carbonParseDate($now);
          $member->save();
          $removal = new BreederRemoval;
          $removal->animal_id = $animal;
          $removal->status = "sold";
          $removal->reason = $request->sales_reason[$index];
          $removal->date_removed = $this->carbonParseDate($request->date[$index]);


          $selling = new Sale;
          $selling->animal_id = $sales->id;
          $selling->family_id = $family_id;
          $selling->pen_id = $sales->pen_id;
          $selling->date_sold = $this->carbonParseDate($request->date[$index]);
          $selling->classification = "live";
          $selling->quantity = 1;
          $selling->price = $request->price[$index];
          $selling->remarks = $request->sales_reason[$index];
          $selling->save();
          $removal->save();
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Sales recorded');
    }


    public function replacementFamilyRemovalList()
    {
      $families = DB::table('animals')->where('status', 'replacement')->get();
      $family_id = [];
      foreach ($families as $family) {
        if(!in_array($family->family_id, $family_id)){
          array_push($family_id, $family->family_id);
        }
      }
      return view('poultry.chicken.others.replacement_family_removal', compact('family_id'));
    }

    public function replacementCullingRemovalList($id)
    {
      $animals = Animal::where('status', 'replacement')->where('family_id', $id)->get();
      return view('poultry.chicken.others.culling_replacementlist', compact('animals'));
    }

    public function replacementCullingRemovalListSubmit(Request $request)
    {
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->cull_reason)){
        foreach ($request->animal_id as $animal) {
          $cull = Animal::where('id', $animal)->first();
          $cull->status = "culled";
          $cull->save();
          $pen = Pen::where('id', $cull->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          // $removal = new BreederRemoval;
          // $removal->animal_id = $animal;
          // $removal->status = "culled";
          // $removal->reason = $request->cull_reason[$index];
          // $removal->date_removed = $this->carbonParseDate($request->date[$index]);
          // $removal->save();
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Culling recorded');
    }

    public function replacementMortalityRemovalList($id)
    {
      $animals = Animal::where('status', 'replacement')->where('family_id', $id)->get();
      return view('poultry.chicken.others.mortality_replacementlist', compact('animals'));
    }

    public function replacementMortalityRemovalListSubmit(Request $request)
    {
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->sales_reason)){
        foreach ($request->animal_id as $animal) {
          $sale = Animal::where('id', $animal)->first();
          $sale->status = "died";
          $sale->save();
          $pen = Pen::where('id', $mort->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          // $removal = new BreederRemoval;
          // $removal->animal_id = $animal;
          // $removal->status = "culled";
          // $removal->reason = $request->mort_reason[$index];
          // $removal->date_removed = $this->carbonParseDate($request->date[$index]);
          // $removal->save();
          $sales = new Sales;
          $sales->animal_id = $sale->id;
          $sales->family_id = $sale->family_id;
          $sales->pen_id = $sale->pen_id;
          $sales->date_sold = $this->carbonParseDate($request->date[$index]);
          $sales->classification = "live";
          $sales->price = $request->price[$index];
          $sales->reason = $request->sales_reason[$index];
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Mortality recorded');
    }

    public function replacementSalesRemovalList($id)
    {
      $animals = Animal::where('status', 'replacement')->where('family_id', $id)->get();
      return view('poultry.chicken.others.sales_replacementlist', compact('animals'));
    }

    public function replacementSalesRemovalListSubmit(Request $request)
    {
      $index = 0;
      if(!empty($request->animal_id) && !empty($request->mort_reason)){
        foreach ($request->animal_id as $animal) {
          $mort = Animal::where('id', $animal)->first();
          $mort->status = "died";
          $mort->save();
          $pen = Pen::where('id', $mort->pen_id)->first();
          $pen->current_capacity = $pen->current_capacity + 1;
          $pen->save();
          // $removal = new BreederRemoval;
          // $removal->animal_id = $animal;
          // $removal->status = "culled";
          // $removal->reason = $request->mort_reason[$index];
          // $removal->date_removed = $this->carbonParseDate($request->date[$index]);
          // $removal->save();
          $index++;
        }
      }else{
          return Redirect::back()->with('message','No record saved');
      }
      return Redirect::back()->with('message','Sales recorded');
    }

    public function broodersgrowersRemovalList()
    {
      // $chicks = Chick::whereHas('family_id', function ($query){
      //   $query->where('is_active', true);
      // })->get();
      $families = Family::where('is_active', true)->get();
      $chicks = Chick::join('families', 'chicks.family_id', '=', 'families.id')->where('hatchery_record', 1)->get();
      return view('poultry.chicken.others.broodersgrowerslist', compact('chicks'));
    }

    public function removalSalesForm($id, $type)
    {
      if($type == "broodersandgrowers"){
        return view('poultry.chicken.others.salesform_broodersandgrowers', compact('id', 'type'));
      }
      return view('poultry.chicken.others.salesform', compact('id', 'type'));
    }

    public function submitSalesForm(Request $request)
    {
        $sales = new Sale;
      if($request->type == "egg"){
        $sales->date_sold = $this->carbonParseDate($request->date_sold);
        $sales->classification = "egg";
        $sales->quantity = $request->quantity;
        $sales->price = $request->price;
        $sales->remarks = $request->remarks;
        $sales->save();
      }else{
        if($request->type == "broodersandgrowers"){
          $chick = Chick::where('id', $request->id)->first();
          $sales->date_sold = $this->carbonParseDate($request->date_sold);
          $sales->animal_id = $request->id;
          $pen = Pen::where('id', $chick->current_pen_id)->first();
          $family = Family::where('id', $chick->family_id)->first();
          $sales->pen_id = $pen->number;
          $sales->family_id = $family->number;
          $sales->classification = "live";
          $sales->quantity = $request->quantity;
          $sales->price = $request->price;
          $sales->remarks = $request->remarks;
          $sales->save();
          $pen->current_capacity = $pen->current_capacity+ $request->quantity;
          $pen->save();
          $inventory = new ChickInventory;
          $inventory->chick_id = $chick->id;
          $inventory->male_qty = $inventory->male_qty - $request->number_male;
          $inventory->female_qty = $inventory->female_qty - $request->number_female;
          $inventory->total = $inventory->male_qty + $inventory->female_qty;
          $inventory->activity = 'sold';
          $now = $this->carbonParseDate(Carbon::now());
          $inventory->date = $now;
          $inventory->remarks = $request->remarks;
          $inventory->family_id = $family->id;
          $inventory->date_sold = $this->carbonParseDate($request->date_sold);
          $inventory->save();

        }
      }
      return Redirect::back()->with('message','Sales successfully recorded');
    }

    public function removalCullingForm($id, $type)
    {
      if($type == "broodersandgrowers"){
        return view('poultry.chicken.others.culling_broodersandgrowers', compact('id', 'type'));
      }
      return view('poultry.chicken.others.culling', compact('id', 'type'));
    }

    public function submitCullingForm(Request $request)
    {

      if($request->type == "broodersandgrowers"){
        $chick = Chick::where('id', $request->id)->first();
        $pen = Pen::where('id', $chick->current_pen_id)->first();
        $family = Family::where('id', $chick->family_id)->first();
        $inventory = ChickInventory::where('chick_id', $request->id)->where('total', '>', 0)->latest('date')->first();
        $newInventory = new ChickInventory;
        $newInventory->chick_id = $chick->id;
        $newInventory->male_qty = $inventory->male_qty - $request->number_male;
        $newInventory->female_qty = $inventory->female_qty - $request->number_female;
        $newInventory->total = $inventory->total - $request->quantity;
        $newInventory->activity = 'culled';
        $now = Carbon::now();
        $newInventory->date = $now->toDateTimeString();
        $newInventory->remarks = $request->cull_reason;
        $newInventory->family_id = $family->id;
        $newInventory->date_died = $this->carbonParseDate($request->date_culled);
        $newInventory->save();
        return Redirect::back()->with('message','Inventory updated');
      }else{

      }
    }

    public function removalMortalityForm($id, $type)
    {
      if($type == "broodersandgrowers"){
        return view('poultry.chicken.others.mortality_broodersandgrowers', compact('id', 'type'));
      }
      return view('poultry.chicken.others.salesform', compact('id', 'type'));
    }

    public function submitMortalityForm()
    {
      if($request->type=="breedersandgrowers"){
        $chick = Chick::where('id', $request->id)->first();
        $pen = Pen::where('id', $chick->current_pen_id)->first();
        $family = Family::where('id', $chick->family_id)->first();
        $inventory = ChickInventory::where('chick_id', $request->id)->where('total', '>', 0)->latest('date')->first();
        $newInventory = new ChickInventory;
        $newInventory->chick_id = $chick->id;
        $newInventory->male_qty = $inventory->male_qty - $request->number_male;
        $newInventory->female_qty = $inventory->female_qty - $request->number_female;
        $newInventory->total = $inventory->total - $request->quantity;
        $newInventory->activity = 'dead';
        $now = Carbon::now();
        $newInventory->date = $now->toDateTimeString();
        $newInventory->remarks = $request->cull_reason;
        $newInventory->family_id = $family->id;
        $newInventory->date_died = $this->carbonParseDate($request->date_died);
        $newInventory->save();
        return Redirect::back()->with('message','Inventory updated');
      }

    }
}
