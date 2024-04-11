<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shows = Show::all();
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
    public function store(Request $request, Show $show)
    {
      $validated = $request->validate([
        'title' => ['required', 'string', 'max:60'],
        'description' => ['required', 'string', 'max:2000'],
        'poster_url' => ['nullable', 'url:http,https', 'max:255'],
        'duration' => ['required', 'numeric'],
        ]);

      //génération auto du slug APD title
      $slug = toSlug($validated['title']);

      $show = new Show();

      //validation des données
        $show->title = $validated['title'];
        $show->slug = $slug;
        $show->description = $validated['description'];
        $show->poster_url = $validated['poster_url'];
        $show->duration = $validated['duration'];
        $show->created_at = now();
        $show->bookable = true;

        $show->save();

        return redirect()->route('show.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)

    {
        $show = Show::find($id);




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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string', 'max:2000'],
            'poster_url' => ['nullable', 'url:http,https', 'max:255'],
            'duration' => ['required', 'numeric'],
        ]);

        //génération auto du slug APD title


       $show = Show::find($id);

       $show->slug = toSlug($validated['title']);

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
        $bookable =  $request->input('bookable');



        $shows = Show::withTitle($title)->withDuration($duration)->isBookable($bookable)->get();

        return view('show.index', [
            'shows'=> $shows,
            'ressources'=> 'spectacles'
        ]);

    }
}
