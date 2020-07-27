<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //$r->session()->put(['yeral' => 'Learnig laravel']);
      // return $r->session()->get('yeral');
      //session(['user' => Auth::user()->name]);
      //return session('user');
      //forget
      //session()->forget(['yeral', 'yeral2']);
      //
      //session()->flush();

     // return session()->all();

     //session()->flash('message', 'Cool it´s working!');
    // return session()->get('message');
    //session()->reflash();
    //session()->keep('message');

        //return view('home');

    }
}
