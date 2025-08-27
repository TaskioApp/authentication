<?php

namespace Taskio\Authentication\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Taskio\Authentication\Http\Resources\MeResource;
use Taskio\Authentication\Services\AuthenticationService;
use Taskio\Authentication\Http\Requests\LoginRequest;
use Taskio\Authentication\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{
    public function __construct(public readonly AuthenticationService $authenticationService) {}

    public function register(RegisterRequest $request)
    {
        $this->authenticationService->register($request->validated());
    }

    public function sendOtp(string $to)
    {
        $this->authenticationService->sendOtp($to);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data =  $this->authenticationService->login($request->validated());

        return response()->json([
            'message' => __('authentication::messages.operation.success'),
            'data' => $data
        ]);
    }

    public function logout(Request $request)
    {
        return $this->authenticationService->logout($request->user());
    }

    public function me(Request $request)
    {
        $me = $this->authenticationService->me($request->user());

        return new MeResource($me);
    }
}
