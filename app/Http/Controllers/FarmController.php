<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Farm;
use App\Models\Animal;
use App\Models\Property;
use App\Models\AnimalType;
use App\Models\AnimalProperty;
use App\Models\Breed;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class FarmController extends Controller
{
    protected $user;

    public function __construct()
    {

      $this->middleware(function($request, $next){
          $this->user = Auth::user();
          return $next($request);
      });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = $this->user;
      $farm = Farm::find($user->farmable_id);
      return view('pigs.dashboard', compact('user', 'farm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }

    public function getAddSowRecordPage(){
      return view('pigs.addsow');
    }

    public function getAddBoarRecordPage(){
      return view('pigs.addboar');
    }

    public function getAddSowLitterRecordPage(){
      return view('pigs.addsowlitter');
    }

    public function getAnimalRecordPage(){

      return view('pigs.animalrecords');
    }

    public function getRecords($request, $animal)
    {
      $hairtype = $request->hairtype1.",".$request->hairtype2.",".$request->hairtype3;
      $tusks = $request->tusks;
      $snout = $request->snout;
      $coat = $request->coat;
      $pattern = $request->pattern;
      $headshape = $request->headshape;
      $skintype = $request->skin;
      $eartype = $request->eartype;
      $earorientation = $request->earorientation;
      $tailtype = $request->tailtype;
      $backline = $request->backline;
      $othermarks = $request->othermarks;

      $agefirstmating = $request->agefirstmating;
      $weightprior = $request->weightprior;
      $weighteight = $request->weighteight;
      $headlength = $request->headlength;
      $bodylength = $request->bodylength;
      $pelvic = $request->pelvic;
      $heartgirth = $request->hearthgirth;
      $ponderalindex = $request->ponderalindex;
      $normalteats = $request->normalteats;

      if(!is_null($hairtype)){
        $hairtypeprop = new AnimalProperty;
        $hairtypeprop->animal_id = $animal->id;
        $hairtypeprop->property_id = Property::where('name', $request->hairtypelabel)->first()->id;
        $hairtypeprop->value = $hairtype;
        $hairtypeprop->save();
      }

      if(!is_null($tusks)){
        $tuskprop = new AnimalProperty;
        $tuskprop->animal_id = $animal->id;
        $tuskprop->property_id = Property::where('name', $request->tusklabel)->first()->id;
        $tuskprop->value = $tusks;
        $tuskprop->save();
      }

      if(!is_null($snout)){
        $snoutprop = new AnimalProperty;
        $snoutprop->animal_id = $animal->id;
        $snoutprop->property_id = Property::where('name', $request->snoutshapelabel)->first()->id;
        $snoutprop->value = $snout;
        $snoutprop->save();
      }

      if(!is_null($coat)){
        $coatprop = new AnimalProperty;
        $coatprop->animal_id = $animal->id;
        $coatprop->property_id = Property::where('name', $request->coatcolorlabel)->first()->id;
        $coatprop->value = $coat;
        $coatprop->save();
      }

      if(!is_null($pattern)){
        $patternprop = new AnimalProperty;
        $patternprop->animal_id = $animal->id;
        $patternprop->property_id = Property::where('name', $request->colorpatternlabel)->first()->id;
        $patternprop->value = $pattern;
        $patternprop->save();
      }

      if(!is_null($headshape)){
        $headshapeprop = new AnimalProperty;
        $headshapeprop->animal_id = $animal->id;
        $headshapeprop->property_id = Property::where('name', $request->headshapelabel)->first()->id;
        $headshapeprop->value = $headshape;
        $headshapeprop->save();
      }

      if(!is_null($skintype)){
        $skintypeprop = new AnimalProperty;
        $skintypeprop->animal_id = $animal->id;
        $skintypeprop->property_id = Property::where('name', $request->skintypelabel)->first()->id;
        $skintypeprop->value = $skintype;
        $skintypeprop->save();
      }

      if(!is_null($eartype)){
        $eartypeprop = new AnimalProperty;
        $eartypeprop->animal_id = $animal->id;
        $eartypeprop->property_id = Property::where('name', $request->eartypelabel)->first()->id;
        $eartypeprop->value = $eartype;
        $eartypeprop->save();
      }

      if(!is_null($earorientation)){
        $earorientationprop = new AnimalProperty;
        $earorientationprop->animal_id = $animal->id;
        $earorientationprop->property_id = Property::where('name', $request->earorientationlabel)->first()->id;
        $earorientationprop->value = $earorientation;
        $earorientationprop->save();
      }

      if(!is_null($tailtype)){
        $tailtypeprop = new AnimalProperty;
        $tailtypeprop->animal_id = $animal->id;
        $tailtypeprop->property_id = Property::where('name', $request->tailtypelabel)->first()->id;
        $tailtypeprop->value = $tailtype;
        $tailtypeprop->save();
      }

      if(!is_null($backline)){
        $backlineprop = new AnimalProperty;
        $backlineprop->animal_id = $animal->id;
        $backlineprop->property_id = Property::where('name', $request->backlinelabel)->first()->id;
        $backlineprop->value = $backline;
        $backlineprop->save();
      }

      if(!is_null($othermarks)){
        $othermarksprop = new AnimalProperty;
        $othermarksprop->animal_id = $animal->id;
        $othermarksprop->property_id = Property::where('name', $request->othermarkslabel)->first()->id;
        $othermarksprop->value = $othermarks;
        $othermarksprop->save();
      }

      if(!is_null($agefirstmating)){
        $agefirstmatingprop = new AnimalProperty;
        $agefirstmatingprop->animal_id = $animal->id;
        $agefirstmatingprop->property_id = Property::where('name', $request->ageatmatelabel)->first()->id;
        $agefirstmatingprop->value = $agefirstmating;
        $agefirstmatingprop->save();
      }

      if(!is_null($weightprior)){
        $weightpriorprop = new AnimalProperty;
        $weightpriorprop->animal_id = $animal->id;
        $weightpriorprop->property_id = Property::where('name', $request->bweighttofirstlabel)->first()->id;
        $weightpriorprop->value = $weightprior;
        $weightpriorprop->save();
      }

      if(!is_null($weighteight)){
        $weighteightprop = new AnimalProperty;
        $weighteightprop->animal_id = $animal->id;
        $weighteightprop->property_id = Property::where('name', $request->bweightfinallabel)->first()->id;
        $weighteightprop->value = $weighteight;
        $weighteightprop->save();
      }

      if(!is_null($headlength)){
        $headlengthprop = new AnimalProperty;
        $headlengthprop->animal_id = $animal->id;
        $headlengthprop->property_id = Property::where('name', $request->hlengthlabel)->first()->id;
        $headlengthprop->value = $headlength;
        $headlengthprop->save();
      }

      if(!is_null($bodylength)){
        $bodylengthprop = new AnimalProperty;
        $bodylengthprop->animal_id = $animal->id;
        $bodylengthprop->property_id = Property::where('name', $request->blengthlabel)->first()->id;
        $bodylengthprop->value = $bodylength;
        $bodylengthprop->save();
      }

      if(!is_null($pelvic)){
        $pelvicprop = new AnimalProperty;
        $pelvicprop->animal_id = $animal->id;
        $pelvicprop->property_id = Property::where('name', $request->pwidthlabel)->first()->id;
        $pelvicprop->value = $pelvic;
        $pelvicprop->save();
      }

      if(!is_null($heartgirth)){
        $heartgirthprop = new AnimalProperty;
        $heartgirthprop->animal_id = $animal->id;
        $heartgirthprop->property_id = Property::where('name', $request->hgirthlabel)->first()->id;
        $heartgirthprop->value = $heartgirth;
        $heartgirthprop->save();
      }

      if(!is_null($ponderalindex)){
        $ponderalindexprop = new AnimalProperty;
        $ponderalindexprop->animal_id = $animal->id;
        $ponderalindexprop->property_id = Property::where('name', $request->pindexlabel)->first()->id;
        $ponderalindexprop->value = $ponderalindex;
        $ponderalindexprop->save();
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function addSowRecord(Request $request){
      $normalteats = $request->normalteats;
      // dd($hairtype.$tusks.$snout.$coat.$pattern.$headshape.$skintype.$eartype.$earorientation.$tailtype.$backline.$othermarks);
      // dd(!is_null($hairtype) , !is_null($tusks), !is_null($snout), !is_null($normalteats));

      $animal = new Animal;
      $farm = $this->user->getFarm();
      $animaltype = $farm->getFarmType();
      $breed = $farm->getBreed();
      $animal->animaltype_id = $animaltype->id;
      $animal->farm_id = $farm->id;
      $animal->breed_id = $breed->id;
      $animal->registryid = $farm->code."-".$request->yearofbirth."F".$request->earnotchnumber;
      $animal->save();

      $this->getRecords($request, $animal);

      if(!is_null($normalteats)){
        $normalteatsprop = new AnimalProperty;
        $normalteatsprop->animal_id = $animal->id;
        $normalteatsprop->property_id = Property::where('name', $request->normalteatslabel)->first()->id;
        $normalteatsprop->value = $normalteats;
        $normalteatsprop->save();
      }

      return Redirect::back()->with('message','Sow record successfully saved');

    }

    public function addBoarRecord(Request $request){
      $animal = new Animal;
      $farm = $this->user->getFarm();
      $animaltype = $farm->getFarmType();
      $breed = $farm->getBreed();
      $animal->animaltype_id = $animaltype->id;
      $animal->farm_id = $farm->id;
      $animal->breed_id = $breed->id;
      $animal->registryid = $farm->code."-".$request->yearofbirth."M".$request->earnotchnumber;
      $animal->save();

      $this->getRecords($request, $animal);
      return Redirect::back()->with('message','Boar record successfully saved');
    }

    public function getTestPage()
    {
      return view('poultry.chicken.feeding');
    }


}
