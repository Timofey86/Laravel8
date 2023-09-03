<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [ 'name', 'email', 'password' ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')
            ->using(AdminUserRole::class);
    }

//    public function hasRoles($name)
//    {
//        $rslt = AdminUser::query()->leftJoin('admin_user_role as aur','aur.admin_user_id','admin_users.id')
//            ->leftJoin('roles','roles.id','aur.role_id')->where(['admin_user_role.admin_user_id' => $name]);
//    }
}
