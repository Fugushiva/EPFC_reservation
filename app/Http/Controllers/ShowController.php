<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShowRequest;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shows = Show::with('representations', 'location')->get();
        $user = $request->user() ? User::find($request->user()->id) : null;


        return view('show.index', [
            'shows' => $shows,
            'user' => $user,
            'ressources' => 'spectacles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Show::class);

        return view('show.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        $validated = $request->validated();

        $show = Show::create($validated);

        $show->save();


        return redirect()->route('show.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)

    {
        $show = Show::with(['representations.location'])->findOrFail($id);


        return view('show.show', [
            'show' => $show,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('create', Show::class);
        $show = Show::find($id);

        return view('show.edit', [
            'show' => $show
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShowRequest $request, $id)
    {
        $validated = $request->validated();

        $show = Show::find($id);

        $show->update($validated);

        return view('show.show', [
            'show' => $show
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('create', Show::class);
        Show::destroy($id);

        return redirect()->route('show.index');
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $duration = $request->input('duration');
        $bookable = $request->input('bookable');


        $shows = Show::withTitle($title)->withDuration($duration)->isBookable($bookable)->get();

        return view('show.index', [
            'shows' => $shows,
            'ressources' => 'spectacles'
        ]);

    }
}
