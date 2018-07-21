<?php

namespace App\Providers;

use App\Currency;
use App\Policies\CurrencyPolicy;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Currency::class => CurrencyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('edit-currency', 'App\Policies\CurrencyPolicy@edit');
        Gate::define('delete-currency', 'App\Policies\CurrencyPolicy@delete');
        Gate::define('add-currency', 'App\Policies\CurrencyPolicy@create');
        Gate::define('show-edit-delete-buttons', 'App\Policies\CurrencyPolicy@showEditDeleteButtons');
        Gate::define('show-add-button', 'App\Policies\CurrencyPolicy@showAddButton');
        Gate::define('save-currency', 'App\Policies\CurrencyPolicy@save');
        Gate::define('update-currency', 'App\Policies\CurrencyPolicy@update');
    }
}
