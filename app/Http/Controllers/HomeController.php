<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Picture;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $last_pictures = Picture::orderBy('id', 'DESC')->limit(3)->get();
        $last_articles = Article::orderBy('id', 'DESC')->limit(3)->get();
        $description = Home::where( 'key', 'description')->first();
        return view('index',compact('last_articles', 'last_pictures', 'description'));
    }

    public function dashboard()
    {
        $description = Home::where('id', '1')->first();
        $horaires = Home::where('key', 'like', 'horaires_%')->get();
        foreach( $horaires as $horaire) {
            $horaire->value = explode(" - ", $horaire->value);
        }

        return view('dashboard',compact('horaires', 'description'));
    }

    public function edit()
    {
        $description = Home::where('id', '1')->first();
        $horaires = Home::where('key', 'like', 'horaires_%')->get();
        foreach( $horaires as $horaire) {
            $horaire->value = explode(" - ", $horaire->value);
        }

        return view('dashboard',compact('horaires', 'description'));
    }

    public function update(Request $request, $id) {
        $description = Home::where('id', $id)->first();
        $description->value = $request->get('description');
        $description->save();
        return redirect('dashboard');
    }
}
