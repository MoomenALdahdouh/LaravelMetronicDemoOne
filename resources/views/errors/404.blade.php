@php
    $url = \Illuminate\Support\Facades\URL::current();
    $previous_url = \Illuminate\Support\Facades\URL::previous();
@endphp
@if(str_contains($url , 'admin') && auth()->guard("admin")->user())
    @include("admin.auth.general.error-404")
@else
    @include("admin.auth.general.error-404")
@endif
