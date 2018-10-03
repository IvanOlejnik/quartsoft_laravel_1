<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	   return view('cabinet.master');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    /**public function show(Instrument $instrument)
    {
		// $instruments = Instrument::all();
      // $instruments = Instrument::where('user_id', '!=',Auth::id());
	 //  return view('instrument.show_mast', ['instruments' => $instruments]);
    }**/
	
	public function view(Instrument $instrument)
    {
		//$instruments = User::find(Auth::id())->instrument;
       //$instruments = Instrument::all()->where('user_id', '!=',Auth::id());
	   $instruments = Instrument::all()->where('user_id', null);
	   return view('instrument.show_mast', ['instruments' => $instruments]);
    }
	
	  public function order(Instrument $instrument)
    {
		$instruments = User::find(Auth::id())->instrument;
		//$instruments = Instrument::all()->where('user_id', Auth::id());
		return view('instrument.show_order', ['instruments' => $instruments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument)
    {
        //
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
        $instrument = $instrument->find($request->master);
		$instrument->user_id =  $request->user_id;
        $instrument->save();
		return redirect()->route('master.view');
    }

     public function refuse(Request $request, Instrument $instrument)
    {
        $instrument = $instrument->find($request->master);
		$instrument->user_id = null;
        $instrument->save();
		return redirect()->route('master.order');
    }
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        //
    }
}
