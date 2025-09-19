@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content') 

@if(isset($innerPage->id))
<div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
</div>
@endif

<!--Overview section start here-->
<div id="overview" class="overview-section pt-20 pb-24">
    <div class="container">
      {!! $innerPage->description !!}
    </div>
</div>
<!--Overview section end here-->


<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection