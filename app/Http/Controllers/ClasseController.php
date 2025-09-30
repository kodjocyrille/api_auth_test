<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiClasseRequest;
use App\Http\Resources\ClasseResource;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function store(ApiClasseRequest $request)
    {

        $data = $request->validated();
        $classe = Classe::create($data);

        return response()->json([
            'user'  => new ClasseResource($classe),
        ], 201);
    }
}
