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
        $souras = Soura::simplePaginate(10);
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
        $file  = $request->file('file')->store('audios','public');
        $size = $request->file('file')->getSize();
        $format = $request->file('file')->getClientOriginalExtension();
        Soura::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'file' => $file,
                'size' => $size,
                'format' => $format ,
                'category_id' => $request->category,
                'soura_title'=>$request->title
            ]
        );

        return redirect('backend/soura')->with('success','تمت الاضافة بنجاح ');
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
    public function edit(string $id)
    {

        $soura = Soura::where('id',$id)->with('category')->first();
        return view('backend.soura.edit',compact('soura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SouraUpdateRequest $request, string $id)
    {
        $soura = Soura::where('id',$id)->first();
        $file  = $soura->file;
        $size = $soura->size;
        $format = $soura->format;
        $downloads = $soura->download;

        if($request->hasFile('file'))
        {
            $file  = $request->file('file')->store('audios','public');
            $size = $request->file('file')->getSize();
            $format = $request->file('file')->getClientOriginalExtension();
            unlink(public_path('/storage/'.$soura->file));
            $downloads = 0;
        }
        $soura->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->title),'file' => $file,
                'size' => $size,
                'format' => $format ,
                'category_id' => $request->category,
                'download' => $downloads
            ]
        );
        return redirect('backend/soura')->with('success','تم التعديل بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soura = Soura::where('id',$id)->first();
        $file = $soura->file;
        $soura->delete();
        unlink(public_path('/storage/'.$file));
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }
}
