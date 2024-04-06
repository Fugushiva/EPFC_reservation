<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $phoneRegex = '^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0([0-9]{9}$|[0-9\-\s]{10}$)';

        $validated = $request->validate(
            [
                'designation' => ['required', 'string', 'max:60'],
                'address' => ['required', 'string', 'max:255'],
                'website' => ['nullable','url:http,https', 'max:255'],
                'phone' => ['required', "regex:/$phoneRegex/", 'max:30']
            ]
        );

        $location = new Location();

        $location->slug = toSlug($validated['designation']);
        $location->designation = $validated['designation'];
        $location->address = $validated['address'];
        $location->website = $validated['website'];
        $location->phone = $validated['phone'];

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
    public function update(Request $request, string $id)
    {
        $phoneRegex = '^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0([0-9]{9}$|[0-9\-\s]{10}$)';

        $validated = $request->validate(
            [
                'designation' => ['required', 'string', 'max:60'],
                'address' => ['required', 'string', 'max:255'],
                'website' => ['nullable','url:http,https', 'max:255'],
                'phone' => ['required', "regex:/$phoneRegex/", 'max:30']
            ]
        );

        $location = Location::find($id);

        $location->slug = toSlug($validated['designation']);

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
}