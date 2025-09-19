@extends('layout.default')
@if(isset($innerPage->id))
@section('title','Welcome in Navkar City')
@section('description','Welcome in Navkar City')
@section('keywords','Welcome in Navkar City')
@section('robots','index, follow')
@endif
@section('content') 

<!--@if(isset($innerPage->id))
<div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
</div>
@endif-->

<div id="plans" style="margin-top:60px" class="overview-section pt-20">
  <div class="container">
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h1 class="text-uppercase">Navkar City Virtual Tour</h1>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <!--Plans section start here-->
    <div class="plans-tabs d-flex align-items-center justify-content-center flex-column">
      <div class="tabs-plan mb-3" id="pills-tab" role="tablist">

        <a style="cursor:pointer" href="#2bhk"><span class="nav-link pointer" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#2bhk" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><h3>2 BHK</h3></span></a>
        <a style="cursor:pointer" href="#villa"><span class="nav-link pointer" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#villa" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><h3>Villa</h3></span></a>
        <a style="cursor:pointer" href="#3bhk"><span class="nav-link pointer" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#3bhk" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><h3>3 BHK</h3></span></a>
      </div>

      
    </div>
    <!--Plans section end here-->
  </div>
</div>


<!--Overview section start here-->
<div id="2bhk" class="overview-section pt-20 pb-24">
    <div class="container">
      <h1></h1>
      <iframe id="tour-embeded" name="NAVKAR CITY 2BHK" src="https://tour.panoee.net/iframe/66aa6edc79c209aacd9a4eae" frameBorder="0" width="100%" height="400px" scrolling="no" allowvr="yes" allow="vr; xr; accelerometer; gyroscope; autoplay;" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" loading="lazy"></iframe>
      <script>
        var pano_iframe_name = "tour-embeded";
        window.addEventListener("devicemotion", function(e){ var iframe = document.getElementById(pano_iframe_name); if (iframe) iframe.contentWindow.postMessage({ type:"devicemotion", deviceMotionEvent:{ acceleration:{ x:e.acceleration.x, y:e.acceleration.y, z:e.acceleration.z }, accelerationIncludingGravity:{ x:e.accelerationIncludingGravity.x, y:e.accelerationIncludingGravity.y, z:e.accelerationIncludingGravity.z }, rotationRate:{ alpha:e.rotationRate.alpha, beta:e.rotationRate.beta, gamma:e.rotationRate.gamma }, interval:e.interval, timeStamp:e.timeStamp } }, "*"); });
      </script>
    </div>
</div>
<!--Overview section end here-->

<!--Overview section start here-->
<div id="villa" class="overview-section pb-24">
    <div class="container" style="padding-top:50px">
      <iframe id="tour-embeded" name="NAVKAR CITY VILLA" src="https://tour.panoee.net/iframe/66b7621a79c209e0739adc9f" frameBorder="0" width="100%" height="400px" scrolling="no" allowvr="yes" allow="vr; xr; accelerometer; gyroscope; autoplay;" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" loading="lazy"></iframe>
      <script>
        var pano_iframe_name = "tour-embeded";
        window.addEventListener("devicemotion", function(e){ var iframe = document.getElementById(pano_iframe_name); if (iframe) iframe.contentWindow.postMessage({ type:"devicemotion", deviceMotionEvent:{ acceleration:{ x:e.acceleration.x, y:e.acceleration.y, z:e.acceleration.z }, accelerationIncludingGravity:{ x:e.accelerationIncludingGravity.x, y:e.accelerationIncludingGravity.y, z:e.accelerationIncludingGravity.z }, rotationRate:{ alpha:e.rotationRate.alpha, beta:e.rotationRate.beta, gamma:e.rotationRate.gamma }, interval:e.interval, timeStamp:e.timeStamp } }, "*"); });
      </script>
    </div>
</div>
<!--Overview section end here-->

<!--Overview section start here-->
<div id="3bhk" class="overview-section pb-24">
    <div class="container" style="padding-top:50px">
      <iframe id="tour-embeded" name="NAVKAR CITY 3BHK" src="https://tour.panoee.net/iframe/66b6f48b9ff918853819738e" frameBorder="0" width="100%" height="400px" scrolling="no" allowvr="yes" allow="vr; xr; accelerometer; gyroscope; autoplay;" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" loading="lazy"></iframe>
      <script>
        var pano_iframe_name = "tour-embeded";
        window.addEventListener("devicemotion", function(e){ var iframe = document.getElementById(pano_iframe_name); if (iframe) iframe.contentWindow.postMessage({ type:"devicemotion", deviceMotionEvent:{ acceleration:{ x:e.acceleration.x, y:e.acceleration.y, z:e.acceleration.z }, accelerationIncludingGravity:{ x:e.accelerationIncludingGravity.x, y:e.accelerationIncludingGravity.y, z:e.accelerationIncludingGravity.z }, rotationRate:{ alpha:e.rotationRate.alpha, beta:e.rotationRate.beta, gamma:e.rotationRate.gamma }, interval:e.interval, timeStamp:e.timeStamp } }, "*"); });
      </script>
    </div>
</div>
<!--Overview section end here-->




<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection