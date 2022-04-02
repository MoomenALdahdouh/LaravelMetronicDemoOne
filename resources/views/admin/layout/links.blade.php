{{--TODO:: MOOMEN S. ALDAHDOUH 1/20/2022--}}
<title>{{__("str.title")}} @yield("title")</title>
<meta name="description" content="@yield("description")"/>
<meta name="author" content="@yield("author")"/>
<meta name="keywords" content="@yield("keywords")"/>
<meta name="copyright" content="@yield("copyright")"/>
<!-- FavIcon Links for all devices -->
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<!-- FavIcon Links for all devices -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/images/icon.png")}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/images/icon.png")}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/icon.png")}}">
<link rel="manifest" href="{{asset("assets/images/icon.png")}}">
<link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{asset("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css")}}" rel="stylesheet"
      type="text/css"/>
<!--end::Page Vendor Stylesheets-->
<link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{asset("assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("assets/plugins/custom/vis-timeline/vis-timeline.bundle.css")}}" rel="stylesheet" type="text/css"/>
<!--end::Global Stylesheets Bundle-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset("assets/plugins/global/plugins.bundle.css")}}" rel="stylesheet" type="text/css"/>

@if(app()->getLocale()=='ar')
    <link href="{{asset("assets/css/style.bundle.rtl.css")}}" rel="stylesheet" type="text/css"/>
@else
    <link href="{{asset("assets/css/style.bundle.css")}}" rel="stylesheet" type="text/css"/>
@endif
<!--end::Global Stylesheets Bundle-->
@yield('css')
