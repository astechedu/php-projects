<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'admin';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
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
    
 */



} //Controller ends
