<?php

namespace App\Providers;

use App\Services\Interfaces\IAuthService;
use App\Services\Interfaces\IQrCodeService;
use App\Services\Interfaces\IUrlService;
use App\Services\Interfaces\IUserService;
use App\Services\QrCodeService;
use App\Services\AuthService;
use App\Services\Base\ServiceBase;
use App\Services\UrlService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IQrCodeService::class, QrCodeService::class);
        $this->app->bind(IUrlService::class, UrlService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IQrCodeService::class, QrCodeService::class);
        $this->app->bind(IUrlService::class, UrlService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }
}
