<?php

namespace App\Http\Controllers;

use App\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $instruments = Instrument::all();
	   return view('instrument.show', ['instruments' => $instruments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('instrument.create_inst');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instrument = new Instrument;
        $instrument->title = $request->title;
		$instrument->user_id = $request->user_id;
        $instrument->save();
		
		return redirect()->route('instrument.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Instrument $instrument)
    {
		$instrument = $instrument->find($request->instrument->id);
		//$instrument = $instrument->find($instrument->id);
		return view('instrument.edit_inst', ['instrument' => $instrument]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrument $instrument)
    {
		$instrument = $instrument->find($instrument->id);
        //$instrument = $instrument->find($request->instrument->id);
        $instrument->title = $request->title;
		$instrument->user_id = $request->user_id;
		
        $instrument->save();
		return redirect()->route('instrument.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Instrument $instrument)
    {
        //$instrument = $instrument->find($request->instrument->id);//
        $instrument->delete();
		return redirect()->route('instrument.index');
    }
}
