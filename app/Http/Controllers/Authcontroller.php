<?php

namespace App\Http\Controllers;


use App\Http\Requests\ApiRegisterRequest;  
use App\Http\Requests\ApiLoginRequest;   
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Authcontroller extends Controller 
{
    use ApiResponses;
    public function register(ApiRegisterRequest $request)
{
    $data = $request->validated();

    // Vérifier si l'email existe déjà
    if (User::where('email', $data['email'])->exists()) {
        return $this->badRequest('Email déjà utilisé', 422); // 409 = Conflict
    }

    // Hacher le mot de passe
    $data['password'] = Hash::make($data['password']);

    // Créer l'utilisateur
    $user = User::create($data);

    if (!$user) {
        return $this->errorResponse('Erreur lors de la création du compte.', 500);
    }

    // Générer un token
    $device = $request->input('device_name', 'mobile');
    $token = $user->createToken($device)->plainTextToken;

    // return $this->success([
    //     'user'  => new UserResource($user),
    //     'token' => $token,
    // ], 'Utilisateur créé avec succès', 201);
    return response()->json([
        'user'  => new UserResource($user),
        'token' => $token,
    ], 201); // 201 = Created
}


    public function login(ApiLoginRequest $request)
    {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['email'])->first();
        

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            // return response()->json(['message' => 'Identifiants invalides'], 404);
            return $this->badRequest('Identifiants invalides', 400);
        }
        if (!$user || !Hash::check($credentials['email'], $user->email)) {
            // return response()->json(['message' => 'Identifiants invalides'], 404);
            return $this->badRequest('Identifiants invalides', 400);
        }

        // Optionnel : supprimer anciens tokens (police)
        $user->tokens()->delete();

        $device = $request->input('device_name', 'mobile');
        $token = $user->createToken($device)->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
    public function me(Request $request)
    {
        return new UserResource($request->user());
    }
}
