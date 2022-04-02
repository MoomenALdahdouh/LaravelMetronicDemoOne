<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissionsActions extends Model
{
    protected $table = "role_permissions_has_actions";
    protected $guarded = [];
    public $timestamps = false;

    public function action()
    {
        return $this->hasOne(Actions::class, 'id', 'action_id');
    }

}
