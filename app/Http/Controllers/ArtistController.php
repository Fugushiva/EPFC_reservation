<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        $artist = Artist::find($id);

        return view('artist.edit',[
            'artist' => $artist,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validation des données du formulaire

        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60'
        ]);

        //Le formulaire a été validé, on récupère l'artiste à modifier
        $artist = Artist::find($id);

        //Mise à jour des données modifiées et sauvegarder dans la base de données
        $artist->update($validated);

        return view('artist.show', [
           'artist' => $artist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
