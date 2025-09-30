<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiEleveRequest;
use App\Http\Resources\EleveResource;
use App\Models\Eleve;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = Eleve::with(['note', 'classe'])->get();
        return response()->json($schools);
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
    public function store(ApiEleveRequest $request)
    {

        $data = $request->validated();

        if (Eleve::where('email', $data['email'])->exists()) {
            return $this->badRequest('Email déjà utilisé', 422); // 409 = Conflict
        }
        $eleve = Eleve::create($data);
        return response()->json([
            'user'  => new EleveResource($eleve),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
