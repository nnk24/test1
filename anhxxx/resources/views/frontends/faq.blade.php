@extends('layouts.frontend')
@section('title') Góp ý | Ảnh sex @endsection
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('common/header.css')}}">
    <link rel="stylesheet" href="{{asset('iziToast/iziToast.min.css')}}">
@endsection
@section('contents')
    @include('frontends.includes.header')
    @include('frontends.contents.content_faq')
    @include('frontends.includes.footer_faq')
@endsection
@section('js')
    <script src="{{asset('iziToast/iziToast.min.js')}}"></script>
    <script src="{{asset('iziToast/message.min.js')}}" type="text/javascript"></script>
@endsection