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
    public function index()
    {
        return view('home');
    }
    
     public function add()
    {
        return view('home.create');
    }
    
    public function create()
    {
        return redirect('home/create');
    }
    
    public function edit()
    {
        return view('home.edit');
    }
    
    public function update()
    {
        return redirect('home/edit');
    }
    
}
