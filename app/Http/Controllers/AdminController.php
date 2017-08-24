<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;	
use App\Models\User;
use App\Models\Farm;
use App\Models\Role;

class AdminController extends Controller
{
    protected $user;

    public function __construct()
    {
      $this->middleware('role:admin');
      $this->middleware(function($request, $next){
          $this->user = Auth::user();

          return $next($request);
      });
    }

    public function index(Request $request)
    {
    	return view('user.admin.home');
    }

    public function getAddFarmPage()
    {
    	return view('user.admin.addFarm');
    }

    public function addFarm(Request $request)
    {	
    	// dd(json_encode($request->farmtype));
		
  		$authcode = substr(md5(uniqid(rand(),1)), 0, 6);
  		$user = new User;
  		$user->name = $request->name;
  		$user->email = $request->email;
  		$user->password = bcrypt($authcode);
  		
  		$farm = Farm::create([
  			'auth_code' => $authcode,
  			'farm_type' => json_encode($request->farmtype),
  			'mobile_no' => $request->mobile,
  			'farm_id' => $request->farm_id,
  		]);
  		$farm->save();	
  		$farm->users()->save($user);

		  $user->assignRole(Role::find(2));
      $request->session()->flash('alert-added', 'User Accepted');
    	return back();
    }

    public function viewFarmList()
    {

      $farms = Farm::all();
      return view('user.admin.viewFarms', compact('farms'));
    }

    
}
