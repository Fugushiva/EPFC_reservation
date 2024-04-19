<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepresentationRequest;
use App\Models\Representation;
use App\Models\Show;
use App\Models\Location;
use Illuminate\Http\Request;

class RepresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $representations = Representation::with('show', 'location')->get();

        return view('representation.index', [
            'representations' => $representations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $representations = Representation::with('show', 'location')->get();

        $shows = Show::withDistinctShows()->get();

        $locations = location::withDistinctLocations()->get();

        return view('representation.create', [
            'representations' => $representations,
            'shows' => $shows,
            'locations' => $locations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRepresentationRequest $request)
    {
        $validate = $request->validated();
        $validate['schedule'] = $request->schedule_date . ' ' . $request->schedule_time;
        unset($validate['schedule_time']);
        unset($validate['schedule_date']);
        $representation = Representation::create($validate);


        $representation->save();

        return redirect(route('representation.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $representation = Representation::with('show', 'location')->findOrFail($id);


        return view('representation.show', [
            'representation' => $representation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $representations = Representation::with('show', 'location')->get();
        $shows = Show::withDistinctShows()->get();
        $locations = Location::withDistinctLocations()->get();
        $representation = Representation::with('show', 'location')->findOrFail($id);

        return view('representation.edit', [
            'representations' => $representations,
            'representation' => $representation,
            'shows' => $shows,
            'locations' => $locations
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRepresentationRequest $request, string $id)
    {
        $validate = $request->validated();
        $representation = Representation::with('show', 'location')->findOrFail($id);
        $representation->schedule = $request->schedule_date . ' ' . $request->schedule_time;
        $representation->update($validate);



        return redirect(route('representation.show', $representation->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $representation = Representation::findOrFail($id)->destroy($id);

        return redirect(route('representation.index'));
    }
}
