<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;   

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers{
        logout as performLogout;
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
       
        $email = $user->getEmail();
        
        $admins = User::where('userable_type', 'App\Models\Administrator')->get();
        $farms = User::where('userable_type', 'App\Models\Farm')->get();
        foreach ($admins as $admin) {
            if($admin->email === $email){
                Auth::login($admin);
            }
        }
        foreach ($farms as $farm) {
            if($farm->email === $email){
                Auth::login($farm);
            }
        }
        return redirect('/');
        
    }
}