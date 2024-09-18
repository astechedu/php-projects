<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Cache;

use Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {        
        return view('auth.popup-login');
    }

    public function login(UserLoginRequest $request)
    {  
        $credentials = $request->only('email','password');
       
        if (Auth::attempt($credentials)) {
          
           // return redirect()->intended('/');
           return redirect()->route('cart.index');
        }
       //echo "Not logged in";
        //return redirect('login')->with('error', 'Invalid credentials. Please try again.');
        //return back()->withErrors([
            //'email' => 'The provided credentials do not match our records.',
        //])->onlyInput('email');
        return redirect()->route('/');

    }   

    public function showRegistrationForm()
    {
        return view('auth.popup-register');
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
            'password' => $request->password,
        ]);
 
        return redirect('/')->with('success', 'Registration successful! Please log in.');
    }

    public function logout(UserLoginRequest $request){  
           
          //$value = Cache::get('key', 'default');
            //Cache::flush();
            Session::flush(); //clears out all the exisiting sessions
            Auth::logout();
            $request->session()->invalidate();     
            $request->session()->regenerateToken();  

 //header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
 //header("Pragma: no-cache"); // HTTP 1.0.
 //header("Expires: 0"); // Proxies.
          
            //Auth::logout();
            //Session::flushId($sessionId);
           // Session::remove(auth()->user()->id);
            //$request->session()->flush();
    //Artisan::call('cache:clear');       

             
        //return redirect()->rotue('products.index');
            return redirect()->route('login');
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

