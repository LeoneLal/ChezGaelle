<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::all();
        if( \Auth::user()->role == 'Administrateur')
            return view('pictures.index')->with('pictures', $pictures);
        else
            return redirect()->route('index');
    }

    public function create()
    {
        if( \Auth::user()->role == 'Administrateur')
            return view('pictures.create');
        else
            return redirect()->route('index');
    }

    public function store(Request $request)
    {
        $name = $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images/pictures'), $name);

        $picture = new Picture;
        $picture->picture_path = $name;
        $picture->description = $request->description;
        $picture->save();

        return back();
    }

    public function destroy($id)
    {
        $picture = Picture::where('id', $id)->first();
        $picture->delete();
        return redirect('/admin/picture');
    }

    public function pictures()
    {
        $pictures = Picture::all();
        return view('pictures.pictures')->with('pictures', $pictures);
    }

}
