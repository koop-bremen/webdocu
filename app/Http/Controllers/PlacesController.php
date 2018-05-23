<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Place::orderBy('name', 'asc')->get();//view('places/index', [ 'places' => Place::all() ]);
    }

    public function store(Request $request)
    {
        //middleware
        //@TODO

        //validation
        $this->validate($request, [

            'name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required'

        ]);

        $place = Place::create( $request->only( ['name', 'longitude', 'latitude'] ) );

        return $place;

    }

    public function destroy($id)
    {

        //middleware

        Place::destroy( $id );

        return $id;

    }

    public function update( Request $request )
    {

        //middleware
        //@TODO

        //validation
        $this->validate($request, [

            'place.name' => 'required',
            'place.longitude' => 'required',
            'place.latitude' => 'required'

        ]);

        //update model and save to DB
        $place = Place::find( $request->place['id'] );

        $place->name = $request->place['name'];
        $place->longitude = $request->place['longitude'];
        $place->latitude = $request->place['latitude'];
        
        $place->save();

        return $place;
    }
}
