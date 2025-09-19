@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

<style>
	.recognized-slider .owl-nav .owl-next span {
		background: url({{ asset('public/img/home/slider-next.svg') }}) no-repeat center center;
		width: 100%;
		height: 100%;
		display: block;
	}
	.recognized-slider .owl-nav .owl-prev span {
		background: url({{ asset('public/img/home/slider-prev.svg') }}) no-repeat center center;
		width: 100%;
		height: 100%;
		display: block;
	}
</style>

<!--Overview section start here-->
<div id="overview" class="overview-section pb-24">
  <div class="container">
    <!--breadcrumbs start here-->
    <ul class="breadcrumbs mb-4">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{url('/')}}">Home</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="#">Our Story</a>
      </li>
      
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--active" href="#">About Us</a>
      </li>
    </ul>
    <!--breadcrumbs end here-->
    @if(isset($innerPage->id))
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">{{ $innerPage->heading }}</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>
    @endif

    {!! $innerPage->description !!}...
    <!--<div class="read-more">
      <a href="#">Read More</a>
    </div>-->
    
  </div>
	
  <div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
  </div>
  
</div>
<!--Overview section end here-->


@if(isset($innerPage2->id) && !empty(strip_tags($innerPage2->description)))
<!--Location section start here-->
<div id="location" class="location-section pb-24">
    <div class="container">
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">{{$innerPage2->heading}}</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>
    <div class="our-journey-section">
      <h1 class="text-dark text-center w-100 fw-lighter">{{$innerPage2->sub_heading}}</h1>
      <div class="overview-section pt-3 pt-md-5">
      {!! $innerPage2->description !!}
        <!--<div class="read-more">
          <a href="#">Read More</a>
        </div>-->
      </div>
    </div>
  </div>
</div>
<!--Location section end here-->
@endif


@if(isset($innerPage3->id))
<!--price section start here-->
<div id="price" class="overview-section pt-20 pb-24 wow fadeInUp">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">{{$innerPage3->heading}}</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>


    <!--Price section start here-->
      <div class="price-content mt-5 wow fadeInUp">
        <div class="row">
          <div class="col-md-6 wow fadeInUp">
             <div class="purpose-banner">
               <img src="{{ asset('public/img/banners/'.$innerPage3->banner) }}">
             </div>
          </div>
          
          <div class="col-md-6">
            <div class="text-start mt-4 mt-md-5">
               {!! $innerPage3->description !!}
            </div>
          </div>
          
        </div>
      </div>
    <!--Price section end here-->



  </div>
</div>
<!--price section end here-->
@endif

@if(isset($awards) && $awards->count()>0)
<!--Amenities section start here-->
<div id="amenities" class="pt-20 pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Recognized By The Best</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <p class="lead mx-auto mt-12 text-center fs-2 fw-lighter"></p>
  </div>
	
  <div class="recognized-slider owl-carousel">
  
  @foreach($awards as $key => $award)
      <div class="sliderlogoicon">
        <div class="rec-icon">
        	<img src="{{ asset('public/img/categories/'.$award->icon) }}">
        </div>
        <div class="sliderlogo-info">
        	<h3>{{$award->heading}}</h3>
            <p>{{$award->sub_heading}}</p>
        </div>
      </div>
    @endforeach
  	
    <?php /*?>@foreach($awards as $key => $award)
    <div>
      <div class="recognized-box">
        <div class="rec-icon">
          <svg width="1em" height="1em" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <mask id="award_svg__b" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="60" height="61"><path fill="url(#award_svg__a)" d="M0 .492h60v60.071H0z"></path></mask>
            <g mask="url(#award_svg__b)"><path fill="#DAA845" d="M-1.66-.234h63.083v60.593H-1.66z"></path></g><defs><pattern id="award_svg__a" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#award_svg__c" transform="scale(.005)"></use>
            </pattern>
            <image id="award_svg__c" width="200" height="200" xlink:href="data:image/png;base64,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"></image>
          </defs></svg>
        </div>

        <div class="rec-content">
          <h4>{{$award->heading}}</h4>
          <h4>{{$award->sub_heading}}</h4>
        </div>
      </div>
    </div>
    @endforeach<?php */?>
  </div>
  
</div>
<!--Amenities section end here-->


<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endif

@endsection