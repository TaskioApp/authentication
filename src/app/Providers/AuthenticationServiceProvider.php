<?php

namespace Taskio\Authentication\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Taskio\Authentication\Authenticator\AppAuthenticator;
use Taskio\Authentication\Authenticator\WebAuthenticator;
use Taskio\Authentication\Facades\AuthenticationFacade;
use Taskio\Authentication\Facades\AuthenticationTypeFacade;
use Taskio\Authentication\Facades\OtpGeneratorFacade;
use Taskio\Authentication\Facades\OtpSenderFacade;
use Taskio\Authentication\Http\Controllers\AuthenticationController;
use Taskio\Authentication\Interfaces\OtpSenderInterface;
use Taskio\Authentication\OtpGenerator\SimpleOtpGenerator;
use Taskio\Authentication\OtpSender\Kavenegar;
use Taskio\Authentication\OtpSender\Sms;

class AuthenticationServiceProvider extends ServiceProvider
{
    private string $namespace = 'Taskio\Authentication\Http\Controllers';

    public function register()
    {
        $this->defineBindings();
        $this->defineConfigs();

        $this->app->register(AuthenticationEventServiceProvider::class);
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

    private function defineConfigs(): void
    {
        $this->loadTranslationsFrom(
            __DIR__ . '/../../lang',
            'authentication'
        );
    }

    private function defineBindings(): void
    {
        $authenticator = request()->has('application') ? AppAuthenticator::class : WebAuthenticator::class;
        AuthenticationFacade::shouldProxyTo($authenticator);

        $otpGenerator = SimpleOtpGenerator::class;
        OtpGeneratorFacade::shouldProxyTo($otpGenerator);

        $otpSender = Sms::class;
        OtpSenderFacade::shouldProxyTo($otpSender);
    }
}
