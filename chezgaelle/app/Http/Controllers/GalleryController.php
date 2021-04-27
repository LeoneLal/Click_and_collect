<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        if( \Auth::user()->role == 'Administrateur')
            return view('gallery.index')->with('gallery', $gallery);
        else
            return redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( \Auth::user()->role == 'Administrateur')
            return view('gallery.create');
        else
            return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);   

        $name = $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images/gallery'), $name);

        $picture = new Gallery;
        $picture->picture_slug = $name;
        $picture->description = $request->description;
        $picture->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Gallery::where('id', $id)->first();
        $picture->delete();
        return redirect('/admin/gallery');
    }

    public function pictures()
    {
        $pictures = Gallery::all();
        return view('gallery.pictures')->with('pictures', $pictures);
    }
}
