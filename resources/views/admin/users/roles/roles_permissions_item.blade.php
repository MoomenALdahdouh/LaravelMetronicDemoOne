@foreach($role->role_permissions as $role_permission)
    @if(!str_contains($role_permission->permission->name,"_"))
        <div class="d-flex align-items-center py-2">
            <span class="bullet bg-primary me-3"></span>{{$role_permission->permission->name}}
        </div>
    @endif
@endforeach
