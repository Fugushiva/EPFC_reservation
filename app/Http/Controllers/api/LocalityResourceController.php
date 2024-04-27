<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocalityResource;
use App\Models\Locality;
use App\Models\Location;
use Illuminate\Http\Request;

class LocalityResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LocalityResource::collection(Locality::all());
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
        return Location::find($id);
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
