<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    protected $table = "roles";
    protected $guarded = [];
    public $timestamps = false;


    public function admin_roles()
    {
        return $this->hasMany(AdminRoles::class, 'role_id', 'id');
    }

    public function role_permissions()
    {
        return $this->hasMany(RolesPermission::class, 'role_id', 'id');
    }
    public function role_actions()
    {
        return $this->hasMany(RolePermissionsActions::class, 'role_id', 'id');
    }
}
