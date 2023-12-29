<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AssignCustomerRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:customer-role';
    protected $description = 'Assign the customer role to all users';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all users from the 'users' table
        $users = User::all();

        // Get the 'customer' role
        $customerRole = Role::where('name', 'customer')->first();

        // Assign the 'customer' role to each user
        foreach ($users as $user) {
            $user->assignRole($customerRole);
        }

        $this->info('Customer role assigned to all users successfully.');
    }
}
