<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministratorEditResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\AdministratorShowResource;

class AdministratorController extends Controller
{
    public function show(string $id): JsonResponse
    {
        $user = new AdministratorShowResource(User::findOrFail($id));

        return response()->success($user, Response::HTTP_OK);
    }

    public function edit(string $id): JsonResponse
    {
        $user = new AdministratorEditResource(User::findOrFail($id));

        return response()->success($user, Response::HTTP_OK);
    }
}
