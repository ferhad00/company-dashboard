<?php
namespace companyManagment\Providers;

use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(DIR.'/../../routes/web.php');
        $this->loadViewsFrom(DIR.'/../../resources/views', 'yourpackage');
        $this->loadMigrationsFrom(DIR.'/../../database/migrations');
        $this->mergeConfigFrom(DIR.'/../../config/yourpackage.php', 'yourpackage');
    }

    public function register()
    {

    }
}
