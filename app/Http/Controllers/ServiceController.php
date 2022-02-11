<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        if( Auth::user()->role == 'Administrateur')
            return view('services.index')->with('services', $services);
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
        if( Auth::user()->role == 'Administrateur')
            return view('services.create');
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
        $request->validate(['file' => 'required|mimes:png,jpg,svg']);
        
        $logo = $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images/services'), $logo);

        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->picture_path = $logo;
        $service->save();

        return redirect()->route('services.index');
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
        $service = Service::find($id);
        if( Auth::user()->role == 'Administrateur')
            return view('services.edit')->with('service', $service);
        else
            return redirect()->route('index');
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
        dd($request, $id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::where('id', $id)->first();
        $service->delete();
        return redirect('/admin/services');
    }
}
