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

class RolesPermission extends Model
{
    protected $table = "role_has_permissions";
    protected $guarded = [];
    public $timestamps = false;

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function permission()
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }
}
