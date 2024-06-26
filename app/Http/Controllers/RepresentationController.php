<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepresentationRequest;
use App\Models\Price;
use App\Models\Representation;
use App\Models\RepresentationReservation;
use App\Models\Show;
use App\Models\Location;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->authorize('create', Representation::class);
        $representations = Representation::with('show', 'location', 'representationReservations')->get();


        $columnDefinition = DB::select("SHOW COLUMNS FROM prices WHERE Field = 'type'")[0]->Type;

        preg_match("/^enum\((.*)\)$/", $columnDefinition, $matches);

        $typesLists = str_getcsv($matches[1], ",", "'");


        $shows = Show::withDistinctShows()->get();
        $locations = location::withDistinctLocations()->get();

        return view('representation.create', [
            'representations' => $representations,
            'shows' => $shows,
            'locations' => $locations,
            'types' => $typesLists,
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

        $priceData = [
            'price' => $request->price,
            'type' => $request->type,
            'start_date' => new DateTime('now'),
            'end_date' => $request->schedule_date
        ];

        $price = Price::create($priceData);


        $rrData = [
            'representation_id' => $representation->id,
            'price_id' => $price->id,
        ];

        RepresentationReservation::create($rrData);

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
        $representation = Representation::with('show', 'location')->findOrFail($id);


        $this->authorize('update', $representation);

        $validate = $request->validated();
        $representation->schedule = $request->schedule_date . ' ' . $request->schedule_time;
        $representation->update($validate);



        return redirect(route('representation.show', $representation->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $representation = Representation::findOrFail($id);

        $this->authorize('delete', $representation);

        $representation->delete();


        return redirect(route('representation.index'));
    }
}
