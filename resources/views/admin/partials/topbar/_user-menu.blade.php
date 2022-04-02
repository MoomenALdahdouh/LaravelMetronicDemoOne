<!--begin::Menu-->
@php
    $language = config('app.locale');
    $url = \Illuminate\Support\Facades\URL::current();
    $previous_url = \Illuminate\Support\Facades\URL::previous();
@endphp
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
     data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            @if(auth()->guard("admin")->user())
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{asset("uploads/users/". auth()->guard("admin")->user()->image)}}"/>
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">{{auth()->guard("admin")->user()->name}}
                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"><!--Pro--></span></div>
                    <a href="#"
                       class="fw-bold text-muted text-hover-primary fs-7">{{auth()->guard("admin")->user()->email}}</a>
                </div>
        @endif
        <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <div class="separator my-2"></div>
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{url("admin/account")}}" class="menu-link px-5 {{str_contains($url,"account")? "active":""}}">{{__("str.My Profile")}}</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <!--    <div class="menu-item px-5">
            <a href="../../demo1/dist/pages/projects/list.html" class="menu-link px-5">
                <span class="menu-text">My Projects</span>
                <span class="menu-badge">
                                                                <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                                                            </span>
            </a>
        </div>
        &lt;!&ndash;end::Menu item&ndash;&gt;
        &lt;!&ndash;begin::Menu item&ndash;&gt;
        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start"
             data-kt-menu-flip="bottom, top">
            <a href="#" class="menu-link px-5">
                <span class="menu-title">My Subscription</span>
                <span class="menu-arrow"></span>
            </a>
            &lt;!&ndash;begin::Menu sub&ndash;&gt;
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                &lt;!&ndash;begin::Menu item&ndash;&gt;
                <div class="menu-item px-3">
                    <a href="../../demo1/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                </div>
                &lt;!&ndash;end::Menu item&ndash;&gt;
                &lt;!&ndash;begin::Menu item&ndash;&gt;
                <div class="menu-item px-3">
                    <a href="../../demo1/dist/account/billing.html" class="menu-link px-5">Billing</a>
                </div>
                &lt;!&ndash;end::Menu item&ndash;&gt;
                &lt;!&ndash;begin::Menu item&ndash;&gt;
                <div class="menu-item px-3">
                    <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">Payments</a>
                </div>
                &lt;!&ndash;end::Menu item&ndash;&gt;
                &lt;!&ndash;begin::Menu item&ndash;&gt;
                <div class="menu-item px-3">
                    <a href="../../demo1/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                           title="View your statements"></i></a>
                </div>
                &lt;!&ndash;end::Menu item&ndash;&gt;
                &lt;!&ndash;begin::Menu separator&ndash;&gt;
                <div class="separator my-2"></div>
                &lt;!&ndash;end::Menu separator&ndash;&gt;
                &lt;!&ndash;begin::Menu item&ndash;&gt;
                <div class="menu-item px-3">
                    <div class="menu-content px-3">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked"
                                   name="notifications"/>
                            <span class="form-check-label text-muted fs-7">Notifications</span>
                        </label>
                    </div>
                </div>
                &lt;!&ndash;end::Menu item&ndash;&gt;
            </div>
            &lt;!&ndash;end::Menu sub&ndash;&gt;
        </div>
        &lt;!&ndash;end::Menu item&ndash;&gt;
        &lt;!&ndash;begin::Menu item&ndash;&gt;
        <div class="menu-item px-5">
            <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">My Statements</a>
        </div>-->
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <!--    <div class="separator my-2"></div>-->
    <!--end::Menu separator-->
    <!--begin::Menu item-->
    <!--begin::language-->
    {{--<div class="d-flex align-items-stretch ms-1 ms-lg-3">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle btn-active-light-primary mt-3" type="button"
                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                <i class="fas fa-globe"></i>&nbsp; {{ Config::get('language')[App::getLocale()] }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach (Config::get('language') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>--}}
    <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start"
         data-kt-menu-flip="bottom, top">
        <a href="#" class="menu-link px-5">
														<span class="menu-title position-relative">{{__("str.Language")}}
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ Config::get('language')[App::getLocale()] }}
                                                            @if(App::getLocale() == "ar")
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/palestine.svg")}}"
                                                                     alt="metronic"/>
                                                            @else
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/united-states.svg")}}"
                                                                     alt="metronic"/>
                                                            @endif
                                                        </span>
                                                        </span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            @foreach (Config::get('language') as $lang => $language)
                @if ($lang == App::getLocale())
                    <div class="menu-item px-3">
                        <a href="{{ route('lang.switch', $lang) }}" class="menu-link d-flex px-5 active">
                                                        <span class="symbol symbol-20px me-4">
                                                            @if($lang == "ar")
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/palestine.svg")}}"
                                                                     alt="metronic"/>
                                                            @else
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/united-states.svg")}}"
                                                                     alt="metronic"/>
                                                            @endif
                                                        </span>{{$language}}</a>
                    </div>
                @else
                    <div class="menu-item px-3">
                        <a href="{{ route('lang.switch', $lang) }}" class="menu-link d-flex px-5">
                                                        <span class="symbol symbol-20px me-4">
                                                            @if($lang == "ar")
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/palestine.svg")}}"
                                                                     alt="metronic"/>
                                                            @else
                                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                                     src="{{asset("assets/images/united-states.svg")}}"
                                                                     alt="metronic"/>
                                                            @endif
                                                        </span>{{$language}}</a>
                    </div>
            @endif
        @endforeach
        <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <!--    <div class="menu-item px-5 my-1">
            <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
        </div>-->
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="{{ route('admin.logout') }}" class="menu-link px-5">{{__("str.Sign Out")}}</a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu separator-->
    <!--    <div class="separator my-2"></div>-->
    <!--end::Menu separator-->
    <!--begin::Menu item-->
<!--    <div class="menu-item px-5">
        <div class="menu-content px-5">
            <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                   for="kt_user_menu_dark_mode_toggle">
                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode"
                       id="kt_user_menu_dark_mode_toggle" data-kt-url="{{url("admin")}}"/>
                <span class="pulse-ring ms-n1"></span>
                <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
            </label>
        </div>
    </div>-->
    <!--end::Menu item-->
</div>
<!--end::Menu-->
