<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Soura;
use App\Models\SouraCard;

class SouraCardController extends Controller
{
    public function index()
    {
        $soura = SouraCard::paginate(8);
        return view('frontend.index',compact('soura'));
    }
    public function show($title)
    {
        $souras = Soura::where('title',$title)->paginate(8);
        return view('frontend.souras',compact('souras'));
    }

}
