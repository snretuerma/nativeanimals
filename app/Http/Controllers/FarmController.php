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

  // public function authenticateUser(Request $request)
  // {	
  // 	$auth_code = Farm::find($this->user->userable_id)->auth_code;
  	
  // 	if($auth_code == $request->auth_code){
  // 		return view('user.farm.dashboard');
  // 	}else{
  // 		return back();
  // 	}
  // }

  public function getFarmDetailsPage()
  {
    return view('user.farm.farmDetails');
  }

  public function getPigRecords()
  {
    return view('user.farm.pigRecord');
  }

  public function authenticatedIndex()
  {

  }
}
