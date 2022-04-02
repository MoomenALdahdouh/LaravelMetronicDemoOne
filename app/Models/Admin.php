<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    protected $table = "admins";
    protected $guarded = [];
    public $timestamps = false;

    public function role()
    {
        return $this->hasMany(AdminRoles::class, 'model_id', 'id');
    }
    public function admin_permission()
    {
        return $this->hasMany(AdminPermissions::class, 'model_id', 'id');
    }
}
