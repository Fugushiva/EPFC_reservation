<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::all();

        return view('show.index', [
            'shows' => $shows,
            'ressources' => 'spectacles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        'price' => ['required', 'numeric', 'between:1, 500'],
        ]);

      //génération auto du slug APD title
      $slug = str_replace(' ', '_', $validated['title']);

      $show = new Show();

      //validation des données
        $show->title = $validated['title'];
        $show->slug = $slug;
        $show->description = $validated['description'];
        $show->poster_url = $validated['poster_url'];
        $show->price = $validated['price'];
        $show->created_at = now();
        $show->bookable = true;

        $show->save();

        return redirect()->route('show.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $show = Show::find($id);

        return view('show.show', [
           'show' => $show
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
            'price' => ['required', 'numeric', 'between:1, 500'],
        ]);

        //génération auto du slug APD title


       $show = Show::find($id);

       $show->slug = str_replace(' ', '_', $validated['title']);

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
        Show::destroy($id);

        return redirect()->route('show.index');
    }
}
