<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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



    public function List()
    {
        return view('ListFile');
    }

    public function MusicList()
    {
        return view('MusicList');
    }

    public function new()
    {
        return view('new');
    }

    public function top()
    {
        return view('top');
    }
}
