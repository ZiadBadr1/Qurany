<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Soura;

class SouraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ringtones = Soura::paginate(8);
        return view('index',compact('ringtones'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ringtone = Soura::where('id',$id)->first();
//        dd($ringtone);
        return view('frontend.show',compact('ringtone'));
    }

    public function download($id)
    {
        $ringtone = Soura::findOrFail($id);
        $filePath = public_path('/storage/'.$ringtone->file);
        $ringtone->download += 1;
        $ringtone->save();
        return \Response::download($filePath);
    }
    public function category($id)
    {
        $ringtones = Soura::where('category_id',$id)->paginate(8);
        return view('frontend.ringtone-category',compact('ringtones'));
    }

}
