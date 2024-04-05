<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class AssignAdminRole extends Command
{
    protected $signature = 'assign:admin-role';
    protected $description = 'Assign the admin role to all existing admin users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'admin')->first();

        if (!$adminRole) {
            $this->error('Admin role not found.');
            return;
        }

        $adminUsers = Admin::all();

        foreach ($adminUsers as $adminUser) {
            if ($adminUser) {
                $adminUser->assignRole($adminRole);
            }
        }

        $this->info('Admin role assigned to all admin users successfully.');
    }
}
