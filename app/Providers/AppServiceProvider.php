<?php

namespace App\Providers;

// use \Log;
use App\Services\FirebaseNotificationService;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Messaging;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, Client::class);
        $this->app->singleton(FirebaseNotificationService::class, function ($app) {
            $projectId = config('firebase.project_id'); // الحصول على projectId من ملف الإعدادات
            return new FirebaseNotificationService($projectId);
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
        // Log::info('تم ربط GuzzleHttp\ClientInterface بـ GuzzleHttp\Client');
        // $this->app->bind(ClientInterface::class, Client::class);

        // تسجيل FirebaseNotificationService كخدمة Singleton
        // $this->app->singleton(FirebaseNotificationService::class, function ($app) {
        //     return new FirebaseNotificationService($app->make(Messaging::class));
        // });
    }



    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
