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
        $horaires = Home::where('key', 'like', 'horaires_%')->get();
        foreach( $horaires as $horaire) {
            $explode = explode(" - ", $horaire->value);
            $formated = [];
            foreach($explode as $hour){      
                $hour = date('H i', strtotime($hour));
                $hour = str_replace(' ', 'h', $hour);
                $formated[] = $hour;
            }
            $horaire->value = $formated[0].' - ' .$formated[1];
        }

        return view('index',compact('last_articles', 'last_pictures', 'description', 'horaires'));
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

    public function updateHours(Request $request) {
        $newHoraires[2] = $request->open2.' - '.$request->close2;
        $newHoraires[3] = $request->open3.' - '.$request->close3;
        $newHoraires[4] = $request->open4.' - '.$request->close4;
        $newHoraires[5] = $request->open5.' - '.$request->close5;
        foreach($newHoraires as $key=>$value) {
            $horaires = Home::where('id', $key)->first(); 
            $horaires->value = $value;
            $horaires->save();
        }
       
        return redirect('dashboard');
    }
}
