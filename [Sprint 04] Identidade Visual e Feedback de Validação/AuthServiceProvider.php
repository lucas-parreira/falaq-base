<?php
// Apenas se seu projeto for Laravel 10 ou anterior.
// Em Laravel 11+ a policy é descoberta automaticamente, não precisa disso.

namespace App\Providers;

use App\Models\Pergunta;
use App\Policies\PerguntaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Pergunta::class => PerguntaPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
