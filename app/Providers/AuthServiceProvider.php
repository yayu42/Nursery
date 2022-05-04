<?php

namespace App\Providers;

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
        'App\odel' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //5月3日追記
        
        //開発者のみ許可
        Gate::define('system-only',function($users){
            return($users->role==1);
        });

        //管理者以上(管理者、園長から主任まで)に許可
        Gate::define('admin-higher',function($users){
            return($users->role>0&&$users->role<=5);
            
        });
        
        //クラス担任～リーダー保育士以上（全権限）に許可
        Gate::define('user-higher',function($users){
            return($users->role>0&&$users->role<=10);
            
        });
    }
}
