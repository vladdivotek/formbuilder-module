<?php

namespace Modules\FormBuilder\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'FormBuilder';

    public function boot(): void
    {
        $this->loadMigrations();
    }

    public function register(): void
    {
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Migrations'));
    }
}
