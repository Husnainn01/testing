<?php
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class AddRoutesToPermissions extends Command
{
    protected $signature = 'custom:add-routes-to-permissions';

    protected $description = 'Add routes to the permissions table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all registered routes
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            // Create a permission for each route
            Permission::firstOrCreate(['name' => $route->getName()]);
        }

        $this->info('Routes added to the permissions table.');
    }
}