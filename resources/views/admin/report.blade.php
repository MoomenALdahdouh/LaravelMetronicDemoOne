<!DOCTYPE html>
<html style="width: 100%; height: 100%;">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body style="width: 100%; height: 100%; padding: 0;margin: 0;    display: inline-block; text-align: center">
<div style="width: 100%; height: 100%;position: absolute; ">
    <div style="width: 100%; height: 100%; position: fixed"><img width="100%" height="100%"
                                                                 src="{{public_path('assets/site/images/bg_red.jpg')}}"
                                                                 style="opacity: 0.04 ">
    </div>
    <div style="width: 100%; height: 100%;position: absolute; "><img width="480" style="opacity: 0.1; margin: auto; position: relative;
    top: 10%;"
                                                                     src="{{public_path("assets/site/images/logo_png.png")}}"
                                                                     alt="img"></div>
<!--  Start content  -->
    <div style="position: relative; margin: 60px 60px">
        <h1>My First Heading</h1>
        <p>My first paragraph.</p>
    </div>
</div>
{{--@dd(dd(public_path('assets/site/images/logo.svg')))--}}

</body>
</html>
