<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function calendrier()
    {
        $locations = Location::all();

        $events = [];
        foreach ($locations as $location) {
            $event = [
                'id' => $location->id,
                'duree_location_id' =>$location->duree_location_id,
                'title' => $location->article->nom,
                'start' => $location->dateDebut,
                'end' => $location->dateFin,
                //Couleur en fonction du duree_location_id
                'backgroundColor' => ["green", "red", "blue"][$location->duree_location_id - 1]
            ];

            array_push($events, $event);
        }

        return view('pages.locations.calendrier', compact('events'));
    }

    public function vueGlobale(Request $request)
    {
        $locations = Location::all();

        return view('pages.locations.index', [
            'locations' => $locations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::findOrFail($id);

        return view('pages.locations.show', [
            'location' => $location
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
