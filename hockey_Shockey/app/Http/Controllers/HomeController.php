<?php

namespace App\Http\Controllers;
use App\Models\Hockey;
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
        $title = 'Hockey Accessories';
        $hockies = Hockey::all();
        return view('admin/index', compact('hockies', 'title'));
    }
}
