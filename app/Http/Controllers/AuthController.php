<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Cache;
use App\Events\LoginUserEvent;

use App\Mail\UserRegisteredEmail;
use Illuminate\Support\Facades\Mail;

use App\Mail\LoggedInUserEmail;

use Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showLoginForm(Request $request)
    {       
        if($request->ajax()){
            return view('auth.popup-login');
        }        
        return redirect()->route('products.index');
    }
//User Login
    public function login(UserLoginRequest $request)
    {  
        $credentials = $request->only('email','password');
       
        if (Auth::attempt($credentials)) {
          
           //Mail::to(auth()->user()->email)->send( new LoggedInUserEmail(auth()->user()));
           
           event(new LoginUserEvent(auth()->user()));
           //return redirect()->intended('/');
           //return redirect()->route('products.index');
        }
 
        return redirect()->route('product.index');
        //event(new LoginUserEvent($user));

    }   

    public function showRegistrationForm()
    {
        return view('auth.popup-register');
    }
 //User Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($user->id){
           //event(new UserRegisteredEvent($user));
           Mail::to($user->email)->send(new UserRegisteredEmail($user));
        } 

        return redirect('/')->with('success', 'Registration successful! Please log in.');
    }

    public function logout(Request $request){  
            Session::flush(); //clears out all the exisiting sessions
            Auth::logout();
            $request->session()->invalidate();     
            $request->session()->regenerateToken();   
            //Session::flushId($sessionId);
           // Session::remove(auth()->user()->id);
           //$request->session()->flush();
             
        //return redirect()->rotue('products.index');
        return redirect('/');
    }

    public function home()
    {
        return view('user.user_dashboard');
    }
    public function testLogin()
    {        
        return view('auth.test-login');
    }
}


//https://magecomp.com/blog/laravel-10-custom-user-registration-login/?srsltid=AfmBOoq7-E1nIlvdFfJ88lNzJ2yTuikZD-r98iBXH9F4D4Z5pI39sI7m
 /*
    public function showLoginForm()
    {
        return view('auth.login');
    }
     
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
     
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
     
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

*/

 /*
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
 
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
 
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});


composer create-project --prefer-dist laravel/laravel ProjectName "10.*"
    

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

 */

