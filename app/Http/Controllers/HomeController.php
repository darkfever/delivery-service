<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user_id = auth()->user()->id;
        $role =  User::find($user_id)->role->name;
        if($role === 'user'){
            return view('user.home.index');
        }
        else if($role === 'admin'){
            return redirect('/admin');
        }
        else if($role === 'operator'){
            return redirect('/operator');
        }
    }
}
