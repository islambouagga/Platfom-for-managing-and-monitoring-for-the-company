<?php

namespace App\Providers;

use App\Models\Intervenant;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        Gate::define('isAgentTC',function ($user){
            return $user->usertable_type ==='AgentTC';
        });
        Gate::define('isIntervenant',function ($user){
            return $user->usertable_type ==='Intervenant';
        });
        Gate::define('isChargePrj',function ($user){
            return $user->usertable_type ==='ChargePrj';
        });
        Gate::define('isAdmin',function ($user){
            return $user->usertable_type ==='Admin';
        });

        Gate::define('isAgentTCOrDirecteur',function ($user){
           if ($user->usertable_type ==='AgentTC' or $user->usertable_type ==='Directeur'){
               return true;
           };
        });

        Gate::define('isChargePrjOrDirecteur',function ($user){
            if ($user->usertable_type ==='ChargePrj' or $user->usertable_type ==='Directeur'){
                return true;
            };
        });

        Gate::define('isAgentTCOrChargePrjOrDirecteur',function ($user){
            if ($user->usertable_type ==='AgentTC' or $user->usertable_type ==='ChargePrj' or $user->usertable_type ==='Directeur'){
                return true;
            };
        });
        Gate::define('isAgentTCOrChargePrjOrDirecteurOrAdmin',function ($user){
            if ($user->usertable_type ==='AgentTC' or $user->usertable_type ==='ChargePrj' or $user->usertable_type ==='Directeur' or $user->usertable_type ==='Admin'){
                return true;
            };
        });

            Gate::define('isAgentTCOrChargePrjOrDirecteurOrIntervenantOrAdmin',function ($user){
               if ($user->usertable_type ==='AgentTC' or $user->usertable_type ==='ChargePrj' or $user->usertable_type ==='Directeur' or $user->usertable_type ==='Intervenant' or $user->usertable_type ==='Admin'){
                   return true;
               };
            });
            Gate::define('isAgentTCOrChargePrjOrDirecteurOrIntervenant',function ($user){
               if ($user->usertable_type ==='AgentTC' or $user->usertable_type ==='ChargePrj' or $user->usertable_type ==='Directeur' or $user->usertable_type ==='Intervenant' or $user->usertable_type ==='Admin'){
                   return true;
               };
            });

    }
}
