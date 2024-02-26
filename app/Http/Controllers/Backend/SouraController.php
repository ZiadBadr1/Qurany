<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSouraRequest;
use App\Http\Requests\SouraUpdateRequest;
use App\Models\Soura;
use Illuminate\Support\Str;

class SouraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souras = Soura::paginate(10);
        return view('backend.soura.index',compact('souras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.soura.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSouraRequest $request)
    {
        $attributes = $request->validated();
        $attributes['slug'] = Str::slug($request->title);
        $attributes['file']  = $request->file('file')->store('audios','public');
        $attributes['size'] = $request->file('file')->getSize();
        $attributes['format'] = $request->file('file')->getClientOriginalExtension();
        $attributes['soura_title'] = $request->title;
        Soura::create($attributes);
        return redirect()->back()->with('success','تمت الاضافة بنجاح ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soura $soura)
    {
        return view('backend.soura.edit',compact('soura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SouraUpdateRequest $request, Soura $soura)
    {
        $attributes = $request->validated();
        $attributes['slug'] = Str::slug($request->title);
        $attributes['soura_title'] = $request->title;
        if($request->hasFile('file'))
        {
            $attributes['file']= $request->file('file')->store('audios','public');
            $attributes['size'] = $request->file('file')->getSize();
            $attributes['format'] = $request->file('file')->getClientOriginalExtension();
            unlink(public_path('/storage/'.$soura->file));
            $attributes['downloads'] = 0;
        }
        $soura->update($attributes);
        return redirect()->back()->with('success','تم التعديل بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soura$soura)
    {
        $file = $soura->file;
        $soura->delete();
        unlink(public_path('/storage/'.$file));
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }
}
