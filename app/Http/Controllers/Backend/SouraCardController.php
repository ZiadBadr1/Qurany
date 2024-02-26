<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SouraCard;
use Illuminate\Http\Request;

class SouraCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = SouraCard::Paginate(10);
        return view('backend.cards.index',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cards.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $card = SouraCard::where('title',$request->title)->first();
        $request->validate([
            'title' => 'required'
        ]);

        if($card)
        {
            return redirect('card')->with('error','هذا الكارت موجوده بالفعل ');

        }
        SouraCard::create([
            'title' => $request->title
        ]);
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
    public function edit(SouraCard $card)
    {
        return view('backend.cards.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,SouraCard $card)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $card->update([
            'title' => $request->title
        ]);
        return redirect()->back()->with('success','تم التعديل بنجاح ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SouraCard $card)
    {
        if ($card) {
        $card->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
        // Handle the case where the card with the given title is not found
        return redirect()->back()->with('error', 'لم يتم العثور على البطاقة');

    }
}
