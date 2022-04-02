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

class AdminPermissions extends Model
{
    protected $table = "model_has_permissions";
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(Admin::class, 'id', 'model_id');
    }

    public function permission()
    {
        return $this->hasOne(Role::class, 'id', 'permission_id');
    }

}
