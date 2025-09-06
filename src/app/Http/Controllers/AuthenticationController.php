<?php

namespace Taskio\Authentication\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Taskio\Authentication\Http\Resources\MeResource;
use Taskio\Authentication\Services\AuthenticationService;
use Taskio\Authentication\Http\Requests\LoginRequest;

class AuthenticationController extends Controller
{
    public function __construct(public readonly AuthenticationService $authenticationService) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $data =  $this->authenticationService->login($request->validated());

        return response()->json([
            'message' => __('authentication::messages.operation.success'),
            'data' => $data
        ]);
    }

    public function verify(string $to)
    {
        $this->authenticationService->verify($to);
    }

    public function logout(Request $request)
    {
        return $this->authenticationService->logout($request);
    }

    public function me(Request $request)
    {
        $me = $this->authenticationService->me($request->user());

        return new MeResource($me);
    }
}
