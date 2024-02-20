<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Abilita;
use App\Models\Contatti;
use App\Models\Ruoli;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        if (Schema::hasTable("ruoli") && Schema::hasTable("abilita")) {
            if(app()->environment() !== 'testing'){
                Ruoli::all()->each(
                    function(Ruoli $ruoli){
                        Gate::define($ruoli->ruolo, function(Contatti $contatti)use($ruoli){
                            return $contatti->ruoli->contains('ruolo', $ruoli->ruolo);
                        });
                    }
                );

                Abilita::all()->each(
                    function(Abilita $abilita){
                        Gate::define($abilita->sku, function(Contatti $contatti)use($abilita){
                            $check = false;
                            foreach($contatti->ruoli as $item){
                                if($item->abilita->contains('sku',$abilita->sku)){
                                    $check = true;

                                }
                            }
                            return $check;
                        });
                    }
                );
            }
        }
    }
}
