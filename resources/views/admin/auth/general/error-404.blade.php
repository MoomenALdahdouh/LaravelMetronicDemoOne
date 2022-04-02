@extends('admin.layout.main')
@section('title','Welcome Page')
@section('description','main')
@section('author','main')
@section('keywords','main')
@section('copyright','main')
@section('css')
@endsection
@section('content')
	<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
		<!--begin::Logo-->
		<a href="#" class="mb-10 pt-lg-20">
			<img src="{{asset("assets/site/images/error.png")}}" alt="" title="" class="img-fluid"/>
		</a>
		<!--end::Logo-->
		<!--begin::Wrapper-->
		<div class="pt-lg-10">
			<!--begin::Logo-->
			<h1 class="fw-bolder fs-4x text-gray-800 mb-10">Page Not Found</h1>
			<!--end::Logo-->
			<!--begin::Message-->
			<div class="fw-bold fs-3 text-muted mb-15">The page you looked not found!
				<br/>Plan your blog post by choosing a topic
			</div>
			<!--end::Message-->
			<!--begin::Action-->
			<div class="text-center">
				<a href="{{url("/admin")}}" class="btn btn-lg btn-primary fw-bolder">Go to homepage</a>
			</div>
			<!--end::Action-->
		</div>
		<!--end::Wrapper-->
	</div>
@endsection
@section('js')
@endsection
