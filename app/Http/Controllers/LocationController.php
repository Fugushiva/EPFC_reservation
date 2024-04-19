<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();

        return view('location.index', [
            'locations' => $locations,
            'ressources' => 'locations'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $location = Location::create($validated);

        $location->save();

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);


        return view('location.show', [
            'location' => $location
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::find($id);

        return view('location.edit',[
            'location' => $location
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLocationRequest $request, string $id)
    {
        $validated = $request->validated();

        $location = Location::find($id);

        $location->update($validated);

        return view('location.show', [
            'location' => $location
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::destroy($id);

        return redirect()->route('location.index');
    }

    public function search(Request $request)
    {
       $designation = $request->input('designation');
       $address = $request->input('address');
       $postcode = $request->input('postcode');

       $locations = Location::withDesignation($designation)
           ->withAddress($address)
           ->withPostcode($postcode)
           ->get();
        return view('location.index', [
            'locations' => $locations
        ]);
    }
}
