<?php

namespace App\Providers;
use Carbon\Carbon;
use App\Models\Paste;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use App\Views\Composers\PublicPastesComposer;

class PublicPastesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', PublicPastesComposer::class);
    }
}
