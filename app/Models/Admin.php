<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


class Admin extends Authenticatable
{
    use HasRoles;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'address',
        'state',
        'city',
        'zip',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'pinterest',
        'youtube',
        'photo',
        'banner',
        'password',
        'token',
        'status'
    ];
    public function assignAdminRole()
    {
        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole) {
            $this->assignRole($adminRole);
        }
    }
}
