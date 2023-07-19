<?php

namespace App\Providers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivroController;
use App\Repositories\Implementacoes\UserRepositoryImplementacao;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\Interfaces\LivroServiceInterface;
use App\Services\LivroService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * Aqui que eu defino o contexto da aplicação, as definições de implementações de classes na inversão de dependência. Princípio SOLID
     */
    public function register(): void
    {

        $this->app->when(LivroController::class)
        ->needs(LivroServiceInterface::class)
        ->give(LivroService::class);

        $this->app->when(AuthController::class)
        ->needs(AuthServiceInterface::class)
        ->give(AuthService::class);

        $this->app->when(AuthService::class)
        ->needs(UserRepositoryInterface::class)
        ->give(UserRepositoryImplementacao::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
