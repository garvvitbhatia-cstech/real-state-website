@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content') 

<style>
	p {
		font-size: 1.5rem;
	}
	table{ font-size:30px;}
	h4 a{font-size: 20px;}
</style>

<!--Overview section start here-->
<div id="gallery" class="gallery-section pt-20 pb-24 wow fadeInUp">
    <div class="container mb-4">    	
    	@if($innerPage->banner != '' && $innerPage->banner_status == 1)
        	<p style="padding-top:30px;"></p>
      		<img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
            <p style="padding-bottom:20px;"></p>
        @else   
         	<p style="padding-top: 60px;"></p>
        @endif
	  <h1 class="fs-1">{!! $innerPage->heading !!}</h1>
      <p class="author-name mt-4 text-start">
      {!! ($innerPage->description) !!}
      </p>
    </div>
</div>


<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection