<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShowRequest;
use App\Http\Resources\ShowResource;
use App\Models\Show;
use Illuminate\Http\Response;

class ShowRessourcesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShowResource::collection(Show::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        $show = Show::create($request->all());

        return new ShowResource($show);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Show::find($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShowRequest $request, string $id)
    {
        $show = Show::find($id);

        if(!$show){
            return Response::json([
                'message' => 'Ressource non trouvée'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $show = Show::find($id);

        if(!$show){
            return Response::json([
                'message' => 'Ressource non trouvée'
            ], 404);
        }

        $show->delete();

        return Response::json([
            'message' => 'Ressource supprimée avec succès'
        ], 200);
    }
}
