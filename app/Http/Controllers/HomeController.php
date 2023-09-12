<?php

namespace App\Http\Controllers;

use App\Models\Ringtone;
use App\Models\Soura;
use App\Models\SouraCard;
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
        $souras = Soura::paginate(10);
        $cards = SouraCard::paginate(10);

        return view('backend.soura.index',compact('souras'));
    }
}
