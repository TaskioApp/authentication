<?php

namespace Taskio\Authentication\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Taskio\Authentication\Authenticator\AppAuthenticator;
use Taskio\Authentication\Authenticator\AuthenticationByPassword;
use Taskio\Authentication\Authenticator\WebAuthenticator;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Facades\AuthenticationTypeFacade;
use Taskio\Authentication\Facades\OtpGeneratorFacade;
use Taskio\Authentication\Http\Controllers\AuthenticationController;
use Taskio\Authentication\Interfaces\LoginByPasswordValidator;
use Taskio\Authentication\Interfaces\LoginValidatorInterface;
use Taskio\Authentication\OtpGenerator\SimpleOtpGenerator;

class AuthenticationServiceProvider extends ServiceProvider
{
    private string $namespace = 'Taskio\Authentication\Http\Controllers';

    public function register()
    {
        $authenticator = request()->has('application') ? AppAuthenticator::class : WebAuthenticator::class;
        AuthenticationFacade::shouldProxyTo($authenticator);

        $otpGenerator = SimpleOtpGenerator::class;
        OtpGeneratorFacade::shouldProxyTo($otpGenerator);

        $authenticationType = AuthenticationByPassword::class;
        AuthenticationTypeFacade::shouldProxyTo($authenticationType);

        $loginValidator = LoginByPasswordValidator::class;
        $this->app->bind(LoginValidatorInterface::class, $loginValidator);
    }

    public function boot()
    {
        $this->defineRoutes();
    }


    private function defineRoutes(): void
    {
        Route::prefix('api/auth')
            ->middleware('api')
            ->namespace($this->namespace)
            ->controller(AuthenticationController::class)
            ->group(__DIR__ . '../../../routes/api.php');
    }
}
