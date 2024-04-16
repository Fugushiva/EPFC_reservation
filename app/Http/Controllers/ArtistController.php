<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreArtistRequest;




class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();

        return view("artist.index", [
            'artists' => $artists,
            'ressource' => 'artistes'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Gate::allows('create-artist')){
            abort(403)
;        }

        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistRequest $request)
    {
        $validated = $request->validated();

        $artist = Artist::create($validated);

        $artist->save();

        return redirect()->route('artist.index');
    }

    /**
    * Display the specified resource.
     */

    public function show(string $id)
    {
        $artist = Artist::find($id);

        return view('artist.show', [
            'artist' => $artist
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */


    public function edit($id)
    {
        if(!Gate::allows('create-artist')){
            abort(403);
        }

        $artist = Artist::find($id);

        return view('artist.edit', [
            'artist' => $artist,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArtistRequest $request, $id)
    {
        $validated = $request->validated();
        $artist = Artist::find($id);
        $artist->update($validated);

        return view('artist.show', [
            'artist' => $artist
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!Gate::allows('update-artist')){
            abort(403);
        }

        $artist = Artist::find($id);

        if($artist){
            $artist->delete();
        }

        return redirect()->route('artist.index');
    }

    public function search(Request $request)
    {
        $artists = null;
        if($request) {
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $artists = Artist::withFirstname($firstname)->withLastname($lastname)->get();



        }

        return view('artist.index', [
            'ressource' => 'artists',
            'artists' => $artists,
        ]);

    }
}
