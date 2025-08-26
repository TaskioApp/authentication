<?php

namespace Taskio\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Http\Resources\MeResource;
use Taskio\Authentication\Services\AuthenticationService as ServicesAuthenticationService;

class AuthenticationController extends Controller
{
    public function __construct(public readonly ServicesAuthenticationService $authenticationService) {}

    public function login(Request $request)
    {
        return $this->authenticationService->login($request->validated());
    }

    public function logout(Request $request)
    {
        return $this->authenticationService->logout($request->validated());

        AuthenticationFacade::logout($request);
    }

    public function me(Request $request)
    {
        $me = $this->authenticationService->me($request->user());

        return new MeResource($me);
    }
}
