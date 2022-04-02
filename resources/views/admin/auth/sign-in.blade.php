<!DOCTYPE html>
{{--<html lang="ar" dir="rtl">--}}
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='ar' ? 'rtl' : 'ltr'}}"
      style="direction:{{app()->getLocale()=='ar' ? 'rtl' : 'ltr'}};"
      direction="{{app()->getLocale()=='ar' ? 'rtl' : 'ltr'}}">
<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8"/>
    <title>{{__("str.welcome")}} {{__("str.Dashboard Sign In")}}</title>
    <meta name="description" content="{{__("str.Dashboard Sign In")}}"/>
    <meta name="author" content="{{__("str.Dashboard Sign In")}}"/>
    <meta name="keywords" content="{{__("str.Dashboard Sign In")}}"/>
    <meta name="copyright" content="{{__("str.Dashboard Sign In")}}"/>
    @include('admin.layout.links')
</head>
<body>
<div class="d-flex flex-column flex-root">
    <input id="app_url" type="hidden" value="{{env("APP_URL")}}">
    <input type="hidden" id="language" value="{{config('app.locale')}}">
    <input id="previous_url" value="{{URL::previous()}}" type="hidden">
    <!--begin::Authentication - Sign-in -->
    {{csrf_field()}}
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
         style="background-image: url({{asset("assets/images/development-hd.png")}})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{url("/")}}" class="mb-7 text-center">
                {{--<img alt="Logo" src="{{asset('/assets/media/logos/logo-1-dark.svg')}}" class="h-25px logo"/>--}}
                <img alt="Logo" width="70%" src="{{asset('assets/images/logo.png')}}" class="logo"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <div class="form w-100" id="kt_sign_in_form">
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-6">{{__("str.Sign In to Dashboard")}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">{{__("str.Email")}}</label>
                        </div>
                        <input type="email" id="email_signin" name="email_signin"
                               placeholder="{{__("str.Enter Here")}}"
                               class="form-control form-control-lg form-control-solid"
                               value="" required autocomplete
                               autofocus/>
                        <strong id="email_signin_error" class="errors text-danger"
                                role="alert">
                        </strong>

                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">{{__("str.Password")}}</label>
                        </div>
                        <input type="password" id="password_signin" name="password_signin"
                               placeholder="{{__("str.Enter Here")}}"
                               class="form-control form-control-lg form-control-solid"
                               required autocomplete="current-password"/>

                        <strong id="password_signin_error" class="errors text-danger"
                                role="alert">
                        </strong>

                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button id="sign_in" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">{{__("str.Continue")}}</span>
                            <span class="indicator-progress">{{__("str.Please wait...")}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Separator-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
@include('admin.layout.scripts')
<script src="{{asset("assets/js/auth/login.js")}}" defer></script>
</body>
<!--end::Body-->
</html>
