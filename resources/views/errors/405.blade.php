@extends('layout.main')
@section('site_title','not found')
@section('site_description','not found')
@section('site_author','not found')
@section('site_keywords','not found')
@section('site_copyright','not found')
@section('site_css')
@endsection
@section('site_content')
    <main class="main-content inner-content">
        <section class="page page-404 mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="{{asset("assets/site/images/error.png")}}" alt="" title="" class="img-fluid"/>
                        <h1>405</h1>
                        <h5 class="text-uppercase">Method Not Allowed</h5>
                        <p>
                            The page you are looking for was moved, removed, renamed or might never existed.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@section('site_js')
@endsection
