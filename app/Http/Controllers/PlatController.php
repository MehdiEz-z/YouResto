<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\StorePlatRequest;
use App\Http\Requests\UpdatePlatRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plats = Plat::paginate(5);
        return view('plats.dashboard')->with('plats', $plats);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plats.addplat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlatRequest $request)
    {
        $data = [
            'title' => $request->input('title'),
            'image' => $request->file('image')->store('image', 'public'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ];

        Plat::create($data);
        return redirect()->route('dashboard')->with('success', 'Plat created seccessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plats = Plat::find($id);
        return view('plats.showplat')->with('plats', $plats);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plats = Plat::find($id);
        return view('plats.editplat')->with('plats', $plats); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlatRequest $request, $id)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ];

        if($request->hasfile('image')){
            $data['image'] = $request->file('image')->store('image', 'public');
        }

        Plat::where('id', $id)->update($data);
        return redirect()->route('dashboard')->with('success', 'Plat updated seccessfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plat = Plat::find($id);
        $plat->delete();

        return redirect()->route('dashboard')->with('success', 'Plat deleted seccessfuly');
    }

    public function landing()
    {
        $plats = Plat::paginate(8);
        return view('landing')->with('plats', $plats);
    }
}
