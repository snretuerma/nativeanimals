<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;	
use App\Models\User;
use App\Models\Farm;
use App\Models\Role;

class FarmController extends Controller
{

	protected $user;

  public function __construct()
  {
    $this->middleware('role:farm');
    $this->middleware(function($request, $next){
        $this->user = Auth::user();

        return $next($request);
    });
  }

  public function index(Request $request)
  {
  	return view('user.farm.home');
  }


  public function getDuckIndividualRecord(){
    return view('user.farm.duckindividualrecord');
  }

  public function getFarmDetailsPage()
  {
    return view('user.farm.farmDetails');
  }

  public function getPigRecords()
  {
    return view('user.farm.pigRecord');
  }

  public function getAddSowPage()
  {
    return view('user.farm.addSow');
  }

  public function getAddBoarPage()
  {
    return view('user.farm.addBoar');
  }

  public function getEditRecord()
  {
    return view('user.farm.editRecord');
  }

  public function authenticatedIndex()
  {
    return view('user.farm.duckindividualrecord');
  }

  public function getDuckFamilyRecord()
  {
    return view('user.farm.duckfamilyrecord');
  }
}
