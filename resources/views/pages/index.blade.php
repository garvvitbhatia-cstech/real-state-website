@extends('layout.default')
@if(isset($project->id))
@section('title',isset($project->seo_title)?$project->seo_title:'')
@section('description',isset($project->seo_description)?$project->seo_description:'')
@section('keywords',isset($project->seo_keyword)?$project->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
<style>
.slidecontainer {
  width: 100%; /* Width of the outside container */
  position: relative;
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height:3px; /* Specified height */
  background: #d9d9d9; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 1; /* Set transparency (for mouse-over effects on hover) */
  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
  transition: opacity .2s;
}

/* Mouse-over effects */
.slider:hover {
  opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
  -webkit-appearance: none; /* Override default look */
  appearance: none;
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #c3aa62; /* Green background */
  cursor: pointer; /* Cursor on hover */
}

.slider::-moz-range-thumb {
  width: 25px; /* Set a specific slider handle width */
  height: 25px; /* Slider handle height */
  background: #c3aa62; /* Green background */
  cursor: pointer; /* Cursor on hover */
}
.master_plan{color: transparent;position: absolute;top: 100px;left: 100px;cursor: pointer;}
.modal-body p{ font-size:15px;}

@media (max-width: 767px){
	.master_plan{color: transparent;
        position: absolute;
        top: 38px;
        left: 43px;
        cursor: pointer;}
	#disclaimerModal .modal-body p{ font-size:13px}
}
</style>
@if(isset($images) && $images->count() > 0)
<div class="header-slider owl-carousel">
	@foreach($images as $key => $image)
    <div class="">
      <img src="{{ asset('public/img/products/'.$image->image) }}">
    </div>
    @endforeach
</div>
  <!--banner content start here-->

  <div class="property-details-info">
    <h1>{{ $project->title }}</h1>
    <h4>{{ $project->address }}</h4>
    <address class="d-flex flex-wrap align-items-center">
      <div class="address-single mt-4">
        <!--<b>Price</b>-->
        <p class="ms-2 inline">Apartment & Villas</p>
      </div>
      <div class="separator mt-2">
        <span>|</span>
      </div>
      <div class="address-single mt-4">
        <!--<p class="ms-2 inline"><b>Possession</b>{{ date('F Y',strtotime($project->possession_date)) }}</p>-->
         <p class="ms-2 inline"><b>Possession: Soon</b></p>
      </div>
      <div class="separator mt-2">
        <!--<span>|</span>-->
      </div>
      <div class="address-single mt-4">
        <!--<span>{{ $project->type }}</span>-->
      </div>
    </address>
  </div>
  <!--banner content end here-->

  <!--add and share button section start here-->
  <div class="fab-container ">
    <div class="shadow">
    </div>
    <div class="fab">
      <svg width="1em" height="1em" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path d="M77.169 39c0 21.126-17.108 38.25-38.21 38.25C17.858 77.25.75 60.126.75 39S17.858.75 38.96.75C60.06.75 77.168 17.874 77.168 39Z" stroke="url(#fab_svg__a)" stroke-width="1.5"></path>
        <ellipse cx="38.959" cy="39" rx="27.971" ry="28" fill="url(#fab_svg__b)"></ellipse>
        <path transform="rotate(90 49.95 28)" fill="url(#fab_svg__c)" d="M49.949 28h21.977v22H49.949z"></path>
        <mask id="fab_svg__e" style="mask-type: alpha;" maskUnits="userSpaceOnUse" x="27" y="28" width="23" height="22">
          <path transform="rotate(90 49.95 28)" fill="url(#fab_svg__d)" d="M49.949 28h21.977v22H49.949z"></path>
        </mask>
        <g mask="url(#fab_svg__e)"><path fill="#464D72" d="m38.96 23.445 15.541 15.557-15.54 15.557-15.54-15.557z"></path></g>
          <defs>
            <linearGradient id="fab_svg__a" x1="2.03" y1="51.686" x2="54.468" y2="92.847" gradientUnits="userSpaceOnUse"><stop stop-color="#008FFF"></stop><stop offset="0.507" stop-color="#fff" stop-opacity="0.06"></stop>
            <stop offset="0.686" stop-color="#F9BDD8" stop-opacity="0.391"></stop>
            <stop offset="1" stop-color="#ED4391"></stop></linearGradient>
            <linearGradient id="fab_svg__b" x1="0.456" y1="38.015" x2="38.386" y2="77.242" gradientUnits="userSpaceOnUse">
              <stop stop-color="#fff"></stop><stop offset="1" stop-color="#E3F0F8"></stop>
            </linearGradient>
            <pattern id="fab_svg__c" patternContentUnits="objectBoundingBox" width="1" height="1">
              <use xlink:href="#fab_svg__f" transform="scale(.005)"></use>
            </pattern>
            <pattern id="fab_svg__d" patternContentUnits="objectBoundingBox" width="1" height="1">
              <use xlink:href="#fab_svg__f" transform="scale(.005)"></use></pattern>
              <image id="fab_svg__f" width="200" height="200" xlink:href="data:image/png;base64,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"></image>
            </defs>
      </svg>
    </div>

    <ul class="list icon-list flex-column">

      <li class="mobile-hide">
        <a class="pointer d-flex align-items-center justify-content-end">
          <span class="text-right uppercase">Share</span>
          <div class="share-icon ms-2">
            <img src="{{ asset('public/img/home/share.svg') }}">
          </div>
        </a>
      </li>

      <li class="mobile-hide">
        <a class="pointer d-flex align-items-center justify-content-end">
          <span class="cursor-pointer text-right uppercase">Schedule a Visit</span>
          <div class="icon ms-2">
            <img src="{{ asset('public/img/home/add-calendar.svg') }}">
          </div>
        </a>
      </li>

      <li>
          <a class="pointer d-flex align-items-center justify-content-end" target="_blank" href="https://wa.link/h1zf3n">
            <span class="text-right uppercase">WhatsApp</span>
            <div class="icon ms-2">
              <img src="{{ asset('public/img/home/whats-app.svg') }}">
            </div>
          </a>
      </li>

      <li class="divider mobile-hide">
        <a class="pointer d-flex align-items-center justify-content-end" id="emi_calc_popup">
          <span class="text-right uppercase">EMI Calculator</span>
          <div class="icon ms-2">
            <img src="{{ asset('public/img/home/calculator.svg') }}">
          </div>
        </a>
      </li>
    </ul>

  </div>
  <!--add and share button section end here-->
@endif

<!--Overview section start here-->
<div id="overview" class="overview-section pb-24">
  <div class="container">
    <!--breadcrumbs start here-->
    <ul class="breadcrumbs mb-4">

    </ul>
    <!--breadcrumbs end here-->
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Overview</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <p>{!! $project->description !!}</p>
    
    <div class="section-title tex-center pt-4">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h1 class="text-uppercase">Welcome to Navkar City, where luxury meets lifestyle.</h1>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>    

    <div class="overview-banner position-relative mt-3 mt-md-5">
      <img src="{{ asset('public/img/products/'.$project->banner) }}">
      <div class="walkthrough-btn">
		<a class="btn-white" href="https://www.youtube.com/watch?v=stPopfORtSI" target="_blank">Walkthrough AV</a>
      </div>
    </div>
  </div>
</div>
<!--Overview section end here-->

<!--Location section start here-->
<div id="location" class="location-section pb-24">
    <div class="container">
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Neighbourhood</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>
    <p class="lead mx-auto mt-12 text-center">Navkar City, located on Pal-Gangana Road in Jodhpur, Rajasthan 342008, offers a blend of urban connectivity and natural tranquility. Our residences provide refined living spaces and top-tier facilities, ideal for those seeking a lifestyle at the intersection of modernity and nature.</p>
    <div class="overview-banner position-relative mt-3 mt-md-5">
    	<iframe width="100%" height="650" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.2408077902846!2d72.947648!3d26.221364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39418946de716bdb%3A0x70177840a455c0e5!2sNavkar%20City!5e0!3m2!1sen!2sin!4v1715060678283!5m2!1sen!2sin"></iframe>
        
      <div class="walkthrough-btn">
        <a class="btn-white" target="_blank" href="https://maps.app.goo.gl/ZnHswqmskYdmBKmZ8">Location AV</a>
      </div>
      <div class="map-address">
        <div class="map-address-top">
            <h3 class="text-uppercase">Address</h3>
            <address class="mt-1 d-flex justify-content-between">{{ $project->address }}</address>
            <div class="address-list">
              <ul>
                <li>
                  <span class="icon-location"><img src="{{ asset('public/img/home/train.png') }}"></span>
                  <span style="font-size:12px;">Railway Station  11km</span>
                </li>
                <li>
                  <span class="icon-location"><img src="{{ asset('public/img/home/2713644_aviation_aeroplane_airline_airport_jet_icon.png') }}"></span>
                  <span style="font-size:12px;">Airport 14km</span>
                </li>

                <li>
                  <span class="icon-location"><img src="{{ asset('public/img/home/3465588_gate_japan_landmark_shrine_temple_icon.png') }}"></span>
                  <span style="font-size:12px;">Jalori Gate 11km</span>
                </li>

                <li>
                  <span class="icon-location"><img src="{{ asset('public/img/home/5898757_city_coronavirus_distancing_maintain_social_icon.png') }}"></span>
                  <span style="font-size:12px;">Shastri Nagar 8km</span>
                </li>

                <li>
                  <span class="icon-location"><img src="{{ asset('public/img/home/5925603_direction_path_road_icon.png') }}"></span>
                  <span style="font-size:12px;">DPS Circle  1.5km</span>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Location section end here-->

<!--Plans section start here-->
<div id="plans" class="overview-section pt-20 pb-24">
  <div class="container">
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Plans</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <!--Plans section start here-->
    <div class="plans-tabs d-flex align-items-center justify-content-center flex-column">
      <div class="tabs-plan mb-3" id="pills-tab" role="tablist">

        <span class="nav-link pointer active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Master Plan</span>
        <span class="nav-link pointer" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Unit Plans</span>
      </div>

      <div class="tab-content floot-plan-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          <div class="plan-tab-content-inner">
          	<!--@if(isset($masterPlan->id))-->
            <div class="plan-tab-content-inner2" style="position:relative">
            <a href="{{ asset('public/img/map/master-plan.jpeg')}}" target="_blank"><img alt="enlarge" loading="lazy" class="master_plan" width="40" height="40" src="{{ asset('public/img/map/zoom.gif')}}" title="Click to interact"></a>
				<img title="click to interact" src="{{ asset('public/img/map/master-plan.jpeg')}}" width="900" usemap="#workmap">
              	<!--<map name="workmap">
                  <area shape="rect" coords="265,767,319,809" title="Hospital" onclick="getMapImage('Hospital','hospital.jpg')" href="javascript:void(0)">
                  <area shape="rect" coords="245,731,287,749" title="Community Hall" href="javascript:void(0)" onclick="getMapImage('Community Hall','community_hall.jpg')">
                  <area shape="rect" coords="231,704,267,716" title="Green Space" href="javascript:void(0)" onclick="getMapImage('Green Space','green_space.jpg')">
                  <area shape="rect" coords="200,650,250,680" title="Hotel" href="javascript:void(0)" onclick="getMapImage('Hotel','hotel.jpeg')">
                  <area shape="poly" coords="182,496,227,497,182,580" title="School" href="javascript:void(0)" onclick="getMapImage('School','school.jpg')">
                  <area shape="poly" coords="178,401,199,400,240,471" title="Commercial Area" href="javascript:void(0)" onclick="getMapImage('Commercial Area','group_housing.jpg')">
                  <area shape="poly" coords="122,408,156,389,157,454" title="Sub Station" href="javascript:void(0)" onclick="getMapImage('Sub Station','group_housing.jpg')">
                  <area shape="rect" coords="147,478,156,500" title="Meditation Area" href="javascript:void(0)" onclick="getMapImage('Meditation Area','group_housing.jpg')">
                  <area shape="rect" coords="128,499,156,552" title="Group Housing 3" href="javascript:void(0)" onclick="getMapImage('Group Housing 3','group_housing.jpg')">
                  <area shape="rect" coords="128,559,157,607" title="Water Plant" href="javascript:void(0)" onclick="getMapImage('Water Plant','group_housing.jpg')">
                  <area shape="rect" coords="454,14,606,177,385,126," title="Future Devlopment" href="javascript:void(0)" onclick="getMapImage('Future Devlopment','group_housing.jpg')">
                  <area shape="rect" coords="379,134,334,180" title="S.T.P." href="javascript:void(0)" onclick="getMapImage('S.T.P.','group_housing.jpg')">

                </map>-->
              <!--<img src="{{ asset('public/img/products/'.$masterPlan->image) }}" usemap="#workmap">
              
              	<map name="workmap">
                  <area shape="rect" coords="287,1051,370,1117" title="Hospital" onclick="getMapImage('Hospital','hospital.jpg')" href="javascript:void(0)">
                  <area shape="rect" coords="261,1005,322,1031" title="Community Hall" href="javascript:void(0)" onclick="getMapImage('Community Hall','community_hall.jpg')">
                  <area shape="rect" coords="240,970,297,984" title="Green Space" href="javascript:void(0)" onclick="getMapImage('Green Space','green_space.jpg')">
                  <area shape="rect" coords="200,898,275,951" title="Hotel" href="javascript:void(0)" onclick="getMapImage('Hotel','hotel.jpeg')">
                  <area shape="poly" coords="151,652,70,728,151,812" title="group-housing" href="javascript:void(0)" onclick="getMapImage('Group Housing','group_housing.jpg')">
                  <area shape="poly" coords="179,695,245,707,185,795" title="school" href="javascript:void(0)" onclick="getMapImage('School','school.jpg')">
                  <area shape="rect" coords="97,579,70,725" title="Jain Sansthan" href="javascript:void(0)" onclick="getMapImage('Jain Sansthan','jain_sansthan.jpg')">
                  <area shape="rect" coords="182,570,258,672" title="shopping-mall" href="javascript:void(0)" onclick="getMapImage('Shopping Mall','shopping_mall.jpeg')">
                  <area shape="rect" coords="332,344,212,484" title="villa" href="javascript:void(0)" onclick="getMapImage('Villa','villa.jpeg')">
                  <area shape="rect" coords="367,315,459,460" title="apartment" href="javascript:void(0)" onclick="getMapImage('Apartment','apartment.jpeg')">
                  <area shape="rect" coords="350,470,550,500" title="garden" href="javascript:void(0)" onclick="getMapImage('Garden','garden.jpg')">
                  <area shape="rect" coords="433,597,430,581" title="temple1" href="javascript:void(0)" onclick="getMapImage('Temple One','temple1.jpg')">
                  <area shape="rect" coords="289,650,304,664" title="temple2" href="javascript:void(0)" onclick="getMapImage('Temple Two','temple2.jpg')">
                  <area shape="rect" coords="525,526,604,554" title="clug" href="javascript:void(0)" onclick="getMapImage('Club','club.jpg')">
                </map>-->

            </div>
            <!--@endif-->
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          <div class="plan-tab-content-inner">
          		
                <div class="row">
                 <div class="col-lg-12 col-12 py-4" style="text-align:center">
                 	<img src="{{ asset('public/img/map/villa-1.jpg') }}" width="400" height="200" />
                 </div>
                 <div class="col-lg-12 col-12 py-4" style="text-align:center"><a href="{{url('/unit-plan/Villa')}}" style="padding:8px 26px" class="btn-black">Villa</a>&nbsp;&nbsp;<a style="padding:8px" href="{{url('/unit-plan/Apartment')}}" class="btn-black">Apartment</a></div>
                    <!--<div class="col-lg-6 col-12 py-4">
                        <div class="floor-map-img-box">
                            <p class="small-title">Apartment</p>
                            <div class="floor-thumb">
                                <a href="{{url('/unit-plan/Apartment')}}"><img src="{{ asset('public/img/home/apartment-banner.jpg') }}" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 py-4">
                        <div class="floor-map-img-box">
                            <p class="small-title">Villa</p>
                            <div class="floor-thumb">
                                <a href="{{url('/unit-plan/Villa')}}"><img src="{{ asset('public/img/home/villa-banner.jpg') }}" /></a>
                            </div>
                        </div>
                    </div>-->
                </div>
                
             <?php /*?>@if(isset($unitPlan) && $unitPlan->count() > 0)
             <div class="row">
             	<div class="price-total-section">
                	<div class="price-title d-flex align-items-center justify-content-center">
                    	<span class="text-white text-uppercase">Apartment</span>
                    </div>
                </div>
                @foreach($unitPlan as $key => $plan)
                <div class="col-lg-4 col-6 py-4" style="padding-bottom:10px">
                  <div class="floor-map-img-box">
                    <small class="small-title">{{$plan->title}}</small>
                    <div class="floor-thumb">
                      <a href="{{ asset('public/img/products/'.$plan->image) }}" target="_blank"><img src="{{ asset('public/img/products/'.$plan->image) }}"></a>
                    </div>
                  </div>
                </div>
                <!-- @if(($key+1)%3 == 0)
        		</div>
             <div class="row" style="padding-bottom:10px">
                @endif -->
                @endforeach
             </div>
             @endif
             
              @if(isset($unitPlan2) && $unitPlan2->count() > 0)
             <div class="row">
             	<div class="price-total-section">
                	<div class="price-title d-flex align-items-center justify-content-center">
                    	<span class="text-white text-uppercase">Villa</span>
                    </div>
                </div>
                @foreach($unitPlan2 as $key => $plan)
                <div class="col-lg-4 col-6 py-4" style="padding-bottom:10px">
                  <div class="floor-map-img-box">
                    <small class="small-title">{{$plan->title}}</small>
                    <div class="floor-thumb">
                      <a href="{{ asset('public/img/products/'.$plan->image) }}" target="_blank"><img src="{{ asset('public/img/products/'.$plan->image) }}"> </a>
                    </div>
                  </div>
                </div>
                <!-- @if(($key+1)%3 == 0)
                	</div>
             <div class="row" style="padding-bottom:10px">
                @endif -->
                @endforeach
             </div>
             @endif<?php */?>
          </div>
        </div>
      </div>
    </div>
    <!--Plans section end here-->
  </div>
</div>
<!--Plans section end here-->

<!--price section start here-->
<div id="price" class="overview-section pb-24 wow fadeInUp">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Price</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>
    <!--Price section start here-->
      <div class="price-content mt-5 wow fadeInUp">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-5 wow fadeInUp">
             <div class="price-total-section">
               <div class="price-title d-flex align-items-center justify-content-center">
                <span class="text-white text-uppercase">Price</span>
               </div>
               <div class="price-total">
                 <!--<div class="col-md-5 py-4">
                   <p class="mb-0">{{ $project->type }}</p>
                 </div>-->
                 <div class="col-md-12 py-4 text-center">
                   <a style="font-size:18px;color:#000;" target="_blank" href="https://wa.link/mxiqi8">Available On Request</a>
                 </div>
               </div>
               <em class="notes">GST, AMC, IFMS & other charges additional*</em>
             </div>
             
             <div class="price-total-section">
               <div class="price-title d-flex align-items-center justify-content-center">
                <span class="text-white text-uppercase">Property Images</span>
               </div>
               <div class="price-total">
               <div class="row">
               	<div class="col-md-6 col-sm-6 col-12 py-3 text-center">
                    <button class="btn-black" type="button" title="Villa One" onclick="getCategoryImages('Villa One','{{ $project->id }}')">Villa One</button>
                 </div>
                 <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
                 	<button class="btn-black" type="button" title="G+2 Apartment" onclick="getCategoryImages('G+2','{{ $project->id }}')">G+2 Apartment</button>
                 </div>
                 <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
                 	<button class="btn-black" type="button" title="Villa Two" onclick="getCategoryImages('Villa Two','{{ $project->id }}')">Villa Two</button>
                 </div>
                 <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
	                 <button class="btn-black" type="button" title="G+3 Apartment" onclick="getCategoryImages('G+3','{{ $project->id }}')">G+3 Apartment</button>
                 </div>
               </div>
               </div>
             </div>
          </div>
          
          <div class="col-md-5">
            <div class="emi-calulator">
               <h4>EMI CALCULATOR</h4>
               <ul class="mt-3 mt-lg-4">
                  <li>
                     <span class="text-uppercase">LOAN AMOUNT</span>
                     <input type="text" class="price-enter" id="loan_amount" value="30000" placeholder="0.00">
                  </li>
                  <li>
                      <span class="text-uppercase advance-pay">Advance Payment (<span id="advance_payment_value_1">0</span>)</span>
                      <span class="price-bold" id="advance_payment_value">0</span>
                      <div class="custom-slider">
                          <div class="slidecontainer">
                             
                              <input type="range" min="10" max="50" value="20" class="slider" id="advance_payment">
                            </div>
                            <input type="hidden" id="advance_payment_hidden" />
                      </div>
                  </li>
                  <li>
                      <span class="text-uppercase advance-pay">Duration</span>
                      <span class="price-bold" id="duration_value">0</span>
                      <div class="custom-slider">
                        <div class="slidecontainer">
                        	<input type="range" min="5" max="30" value="10" class="slider" id="duration">
                        </div>
                      </div>
                  </li>
                  <li>
                      <span class="text-uppercase advance-pay">Interest Rate</span>
                      <span class="price-bold" id="roi_value">0</span>
                      <div class="custom-slider">
                        <div class="slidecontainer">
                        	<input type="range" min="10" max="30" value="20" class="slider" id="roi">
                        </div>
                      </div>
                  </li>
                  <li>
                     <span class="text-uppercase advance-pay">Estimated monthtly EMI</span>
                     <div class="price-per-month">
                        <div class="per-month-value mt-2 d-flex align-items-end">
                          <b id="final_result" style="font-size:17px;">0</b>                          
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    <!--Price section end here-->
  </div>
</div>
<script type="text/javascript">
var roi = document.getElementById("roi");
var roi_value = document.getElementById("roi_value");
roi_value.innerHTML = roi.value+'%';


var duration = document.getElementById("duration");
var duration_value = document.getElementById("duration_value");
duration_value.innerHTML = duration.value+' Years';

var advance_payment = document.getElementById("advance_payment");
var advance_payment_hidden = document.getElementById("advance_payment_hidden");
var advance_payment_value = document.getElementById("advance_payment_value");
var advance_payment_value_1 = document.getElementById("advance_payment_value_1");
advance_payment_value_1.innerHTML = advance_payment.value+'%';

var loan_amount = $('#loan_amount').val();
if(loan_amount > 0){
	var advanceAmt = parseInt(loan_amount)*parseInt(advance_payment.value)/100;
	advance_payment_value.innerHTML = advanceAmt;
	advance_payment_hidden.value = advanceAmt;
}

// Update the current slider value (each time you drag the slider handle)
roi.oninput = function() {
  roi_value.innerHTML = this.value+'%';
  finalCalculate();
}

duration.oninput = function() {
  duration_value.innerHTML = this.value+' Years';
  finalCalculate();
}

advance_payment.oninput = function() {
  advance_payment_value_1.innerHTML = this.value+'%';

	var loan_amount = $('#loan_amount').val();
	if(loan_amount > 0){
		var advanceAmt = parseInt(loan_amount)*parseInt(this.value)/100;
		advance_payment_value.innerHTML = advanceAmt;
		advance_payment_hidden.value = advanceAmt;
	}
	finalCalculate();

}
function finalCalculate(){
	var loan_amount = $('#loan_amount').val();
	var advance_payment_hidden = $('#advance_payment_hidden').val();
	if(loan_amount > 0){
		
		var loanAmt = parseInt(loan_amount)-parseInt(advance_payment_hidden);
		var duration = parseInt($('#duration').val())*12;
	
		var loanAmount = parseFloat(loanAmt);
		var interestRate = parseFloat($('#roi').val());
		var tenure = parseInt(duration);
	
		var monthlyInterestRate = (interestRate / 100) / 12;
		var emi = (loanAmount*monthlyInterestRate*Math.pow(1 + monthlyInterestRate, tenure)) / (Math.pow(1 + monthlyInterestRate, tenure) - 1);
	
		$('#final_result').html('EMI: ' + emi.toFixed(2) + '/Month');
	}
}
finalCalculate();
</script>
<!--price section end here-->

@if(isset($mainAmenities) && $mainAmenities->count()>0)
<!--Amenities section start here-->
<div id="amenities" class="amenities pt-20 pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Navkar City: Modern Amenities, Holistic Living</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <p class="lead mx-auto mt-12 text-center">Navkar City promotes holistic well-being through modern amenities: fitness center, meditation zones <br />and vibrant community spaces.</p>
		@if(isset($mainAmenities) && $mainAmenities->count()>0)
     	<ul class="amenities-list mx-auto mt-12 d-flex flex-wrap aligin-items-start  justify-content-evenly">
        @foreach($mainAmenities as $key => $main)
        <li class="amenities-list-item false mt-6 d-flex flex-column align-items-center">
          <div class="icon">
            <img src="{{ asset('public/img/products/'.$main->image) }}" alt=""></div>
            <span class="mt-4">{{ $main->title }}</span>
          </li>
          @endforeach
        </ul>
        @endif
    <div class="text-banner-section position-relative mt-5">
      <img src="{{ asset('public/img/home/test-banner.webp') }}">
      <div class="walkthrough-btn">
        <a class="btn-white" href="{{url('/amenities/'.$project->slug)}}">Experience all lifestyle amenities</a>
      </div>
    </div>
  </div>
</div>
<!--Amenities section end here-->
@endif

<?php /* ?>
@if(isset($gallery) && $gallery->count() > 0)
<!--Gallery section start here-->
<div id="gallery" class="gallery-section pt-20 pb-24 wow fadeInUp">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Gallery </h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <p class="lead mx-auto mt-12 text-center">Explore Navkar City's vibrant world with modern amenities nurturing body, mind, and soul. From fitness centers to serene meditation zones, elevate your lifestyle with us.</p>
  </div>

  <div class="gallery-slider mt-lg-5 mt-4 owl-carousel">
    @foreach($gallery as $key => $image)
    <div>
      <div class="gallery-block">
        <div class="thumb-gallery"><img src="{{ asset('public/img/products/'.$image->image) }}"></div>
        <div class="title-gallery mt-4">{{$image->title}}</div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="d-flex align-items-center justify-content-center mt-5">
     <a class="btn-white view-gallery-btn" href="{{url('/gallery/'.$project->slug)}}">View Gallery</a>
  </div>

</div>
<!--Gallery section end here-->
@endif
<?php */ ?>

<div id="gallery" class="gallery-section pt-20 pb-24 wow fadeInUp">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Gallery </h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <p class="lead mx-auto mt-12 text-center">Explore Navkar City's vibrant world with modern amenities nurturing body, mind, and soul. From fitness centers to serene meditation zones, elevate your lifestyle with us.</p>
  </div>

  <div class="gallery-slider mt-lg-5 mt-4 owl-carousel">
    
  <div>
      <div class="gallery-block">
        <div class="thumb-gallery"><a href="{{url('/gallery/'.$project->slug.'/highlights')}}"><img src="{{ asset('public/img/categories/other_folder.png') }}"></a></div>
        <div style="font-size: 2.0rem;" class="text-center title-gallery mt-4">Highlights</div>
      </div>
    </div>

    <div>
      <div class="gallery-block">
        <div class="thumb-gallery"><a href="{{url('/gallery/'.$project->slug.'/landscape')}}"><img src="{{ asset('public/img/categories/landscape_folder.png') }}"></a></div>
        <div style="font-size: 2.0rem;" class="text-center title-gallery mt-4">Landscape</div>
      </div>
    </div>

    <div>
      <div class="gallery-block">
        <div class="thumb-gallery"><a href="{{url('/gallery/'.$project->slug.'/houses')}}"><img src="{{ asset('public/img/categories/houses_folder.png') }}"></a></div>
        <div style="font-size: 2.0rem;" class="text-center title-gallery mt-4">Houses</div>
      </div>
    </div>

    <div>
      <div class="gallery-block">
        <div class="thumb-gallery"><a href="{{url('/gallery/'.$project->slug.'/amenities')}}"><img src="{{ asset('public/img/categories/amenities_folder.png') }}"></a></div>
        <div style="font-size: 2.0rem;" class="text-center title-gallery mt-4">Amenities</div>
      </div>
    </div>
    
  </div>

  <div class="d-flex align-items-center justify-content-center mt-5">
     <a class="btn-white view-gallery-btn" href="{{url('/gallery/'.$project->slug)}}">View Gallery</a>
  </div>

</div>

<style>
	.bs-example {
		margin: 20px;
	}
	.modal-dialog {
      margin: 30px auto;
	}
	.modal-body {
	  position:relative;
	  padding:0px;
	}
</style>
<div class="bs-example">
    <div id="user_review_video" class="modal user-review-video-modal hide fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <iframe id="user_current_video" width="800" height="500" src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
  	</div>
</div>

<div class="bs-example">
    <div id="category_images" class="modal user-review-video-modal hide fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="replace_category_images"></div>
            </div>
        </div>
  	</div>
</div>

<div class="bs-example">
    <div id="map_images" class="modal hide fade">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            	<div class="popup-title" style="padding-left:10px;">
                    <h3 id="img_map_title">Schedule Your Tour</h3>
                    <span class="pointer close-icon" id="closeMap"><img src="https://navkar.city/public/img/home/modal-close.png"></span>
                  </div>
                <div class="modal-body" id="">
                	<img src="" id="map_image_src" style="width:100%"/>
                </div>
            </div>
        </div>
  	</div>
</div>

<div id="replaceLightbox"></div>
<script type="text/javascript">
	$(document).on('click','#closeMap',function(){
		$('#map_images').modal('hide');
	});
	function getMapImage(title,path){
		if(path != '' && title != ''){
			$('#img_map_title').html(title);
			$('#map_image_src').attr('src',"https://navkar.city/public/img/map/"+path);	
			$('#map_images').modal('show');
		}
	}
	function getCategoryImages(type,id){
		if(type != '' && id != ''){
			$.ajax({
				type:'POST',
				url:"{{url('/get-category-images')}}", 
				async:false,
				headers:{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data:{type:type,id:id},
				success: function(response){
					if(response != ''){
						$('#replace_category_images').html(response);
						$('#category_images').modal('show');
					}
					return false;
				},error: function(ts){
					console.log(ts);
					return false;
				}							
			});
			return false;
		}else{
			alert("Something went wrong");
		}
		return false;
	}
	$(document).ready(function(e) {
        $("#user_review_video").on('hide.bs.modal', function(){
			$("#user_current_video").attr('src', '');			
		});
		$("#category_images").on('hide.bs.modal', function(){
			$(".youtube_video_src").attr('src', '');			
		});
    });
	function playYoutube(url){
		if(url != ''){
            $("#user_current_video").attr('src', url);
         	$('#user_review_video').modal('show');
		}
	}
</script>

@if(isset($user_review) && $user_review->count()>0)
<style>
	.containers {
	  position: relative;
	  width: 100%;
	  max-width: 400px;
	}

	.containers .btn {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  -ms-transform: translate(-50%, -50%);
	  background-color: #555;
	  color: white;
	  font-size: 16px;
	  padding: 12px 24px;
	  border: none;
	  cursor: pointer;
	  border-radius: 5px;
	  text-align: center;
	}

	.containers .btn:hover {
	  background-color: black; 
	}
</style>
<!--You may also like section start here-->
<div id="gallery" class="gallery-section pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">User Review</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <div class="gallery-slider mt-4 owl-carousel">
        @foreach($user_review as $key => $record)
        <div>
          <div class="gallery-block">
            <div class="thumb-gallery containers">
            	@if($record->image != '')
                    <img src="{{ asset('public/img/testimonials/'.$record->image) }}">
                @else
                    <img src="{{ asset('public/img/home/no-img-2.jpg') }}">
                @endif
                <button onclick="playYoutube('{{$record->url}}')" class="btn">Play</button>
            </div>
            <div class="title-gallery mt-4">{{$record->name}}</div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>
<!--You may also like section end here-->
@endif


@if(isset($events) && $events->count()>0)
<!--You may also like section start here-->
<div id="gallery" class="gallery-section pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Announcements</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <div class="gallery-slider mt-4 owl-carousel">
        @foreach($events as $key => $record)
        <div>
          <a href="{{url('/event-details/'.$record->slug)}}"><div class="gallery-block">
            <div class="thumb-gallery">
            	@if($record->image != '')
                    <img src="{{ asset('public/img/blogs/'.$record->image) }}">
                @else
                    <img src="{{ asset('public/img/home/no-img-2.jpg') }}">
                @endif
            </div>
            <div class="title-gallery mt-4">{{$record->title}}</div>
          </div></a>
        </div>
        @endforeach
      </div>
  </div>
</div>
<!--You may also like section end here-->
@endif

@if(count($resultArray) > 0)
<style>
.thumb-gallery.social_feed {
    height: 328px;
}
</style>
<!--You may also like section start here-->
<div id="gallery" class="gallery-section pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Social Feeds</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      <div class="gallery-slider mt-4 owl-carousel">
        @foreach($resultArray as $key => $singlePost)
        <div>
          <a target="_blank" href="{{$singlePost['permalink']}}"><div class="gallery-block">
            <div class="thumb-gallery social_feed">            	
                    <img src="{{$singlePost['thumbnail_url']}}">              
            </div>
          </div></a>
        </div>
        @endforeach
      </div>
  </div>
</div>
<!--You may also like section end here-->
@endif

<script>
	$(document).ready(function(e) {
		$('.owl-prev').css('font-size','25px');
		$('.owl-next').css('font-size','25px');
		$('.owl-nav').addClass('text-center');
    });
</script>
<!--Get in touch section start here-->
@include('element.newsletter');
<!--Get in touch section end here-->

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

<div id="emiCalcModal" class="modal hide fade" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EMI CALCULATOR</h4>
      </div>
      <div class="modal-body">

        	<div class="emi-calulator">

               <ul class="mt-3 mt-lg-4">
                  <li>
                     <span class="text-uppercase">LOAN AMOUNT</span>
                     <input type="text" class="price-enter" id="loan_amount2" value="30000" placeholder="0.00">
                  </li>
                  <li>
                      <span class="text-uppercase advance-pay2">Advance Payment (<span id="advance_payment_value_12">0</span>)</span>
                      <span class="price-bold" id="advance_payment_value2">0</span>
                      <div class="custom-slider">
                          <div class="slidecontainer">
                              <input type="range" min="10" max="50" value="20" class="slider" id="advance_payment2">
                            </div>
                            <input type="hidden" id="advance_payment_hidden2" />
                      </div>
                  </li>

                  <li>
                      <span class="text-uppercase advance-pay2">Duration</span>
                      <span class="price-bold" id="duration_value2">0</span>
                      <div class="custom-slider">

                          <div class="slidecontainer">
                              <input type="range" min="5" max="30" value="10" class="slider" id="duration2">
                            </div>

                      </div>
                  </li>

                  <li>
                      <span class="text-uppercase advance-pay2">Interest Rate</span>
                      <span class="price-bold" id="roi_value2">0</span>
                      <div class="custom-slider">
                          <div class="slidecontainer">
                              <input type="range" min="10" max="30" value="20" class="slider" id="roi2">
                            </div>
                      </div>
                  </li>

                  <li>
                     <span class="text-uppercase advance-pay">Estimated monthtly EMI</span>
                     <div class="price-per-month">
                        <div class="per-month-value2 mt-2 d-flex align-items-end">
                          <b id="final_result2">0</b>
                          <div class="per-month-wrapper d-flex align-items-center">
                            <div class="icon icon-rupees">
                              <svg width="1em" height="1em" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.343 5.254v1.354c0 .124-.04.226-.12.306a.412.412 0 0 1-.304.12H9.692c-.203 1.275-.773 2.31-1.71 3.108-.936.797-2.155 1.284-3.657 1.46 1.475 1.577 3.503 3.95 6.083 7.12.123.142.141.293.053.452-.07.16-.199.239-.385.239H7.492a.39.39 0 0 1-.331-.16c-2.704-3.25-4.904-5.777-6.6-7.584a.398.398 0 0 1-.12-.292V9.69c0-.115.042-.215.126-.299a.407.407 0 0 1 .299-.126H2.35c1.166 0 2.105-.19 2.816-.571.711-.38 1.164-.934 1.359-1.66H.865a.412.412 0 0 1-.304-.12.414.414 0 0 1-.12-.306V5.254c0-.124.04-.226.12-.306.08-.08.18-.12.305-.12h5.473c-.504-1-1.688-1.5-3.552-1.5H.866A.407.407 0 0 1 .567 3.2a.409.409 0 0 1-.126-.298V1.136c0-.124.04-.226.12-.306C.64.75.74.71.866.71h11.026c.124 0 .225.04.305.12.08.08.12.182.12.306v1.355a.412.412 0 0 1-.424.425H8.803c.415.54.698 1.178.848 1.913h2.267c.123 0 .225.04.304.12.08.079.12.18.12.305Z" fill="#AEAEAE"></path></svg>
                            </div>
                            <span class="per-month2">/ month</span>
                          </div>
                        </div>
                     </div>
                  </li>

               </ul>
            </div>

      </div>
      <div class="modal-footer" style="justify-content:center">
      	<span class="text-center">
        	<button type="button" id="closePopupEmi" class="btn-white view-gallery-btn">Close</button>
        </span>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------------>

<script type="text/javascript">
	var roi2 = document.getElementById("roi2");
	var roi_value2 = document.getElementById("roi_value2");
	roi_value2.innerHTML = roi2.value+'%';


	var duration2 = document.getElementById("duration2");
	var duration_value2 = document.getElementById("duration_value2");
	duration_value2.innerHTML = duration.value+' Years';

	var advance_payment2 = document.getElementById("advance_payment2");
	var advance_payment_hidden2 = document.getElementById("advance_payment_hidden2");
	var advance_payment_value2 = document.getElementById("advance_payment_value2");
	var advance_payment_value_12 = document.getElementById("advance_payment_value_12");
	advance_payment_value_12.innerHTML = advance_payment2.value+'%';

	var loan_amount2 = $('#loan_amount2').val();
	if(loan_amount2 > 0){
		var advanceAmt2 = parseInt(loan_amount2)*parseInt(advance_payment2.value)/100;
		advance_payment_value2.innerHTML = advanceAmt2;
		advance_payment_hidden2.value = advanceAmt2;
	}

	// Update the current slider value (each time you drag the slider handle)
	roi2.oninput = function() {
	  roi_value2.innerHTML = this.value+'%';
	  finalCalculate2();
	}

	duration2.oninput = function() {
	  duration_value2.innerHTML = this.value+' Years';
	  finalCalculate2();
	}

	advance_payment2.oninput = function() {
	  advance_payment_value_12.innerHTML = this.value+'%';

		var loan_amount2 = $('#loan_amount2').val();
		if(loan_amount2 > 0){
			var advanceAmt2 = parseInt(loan_amount2)*parseInt(this.value)/100;
			advance_payment_value2.innerHTML = advanceAmt2;
			advance_payment_hidden2.value = advanceAmt2;
		}
		finalCalculate2();

	}
	function finalCalculate2(){
		var loan_amount2 = $('#loan_amount2').val();
		var advance_payment_hidden2 = $('#advance_payment_hidden2').val();
		if(loan_amount2 > 0){
		var loanAmt2 = parseInt(loan_amount2)-parseInt(advance_payment_hidden2);
		var duration2 = parseInt($('#duration2').val())*12;

		var loanAmount2 = parseFloat(loanAmt2);
		var interestRate2 = parseFloat($('#roi2').val());
		var tenure2 = parseInt(duration2);

		var monthlyInterestRate2 = (interestRate2 / 100) / 12;
		var emi2 = (loanAmount2*monthlyInterestRate2*Math.pow(1 + monthlyInterestRate2, tenure2)) / (Math.pow(1 + monthlyInterestRate2, tenure2) - 1);

		$('#final_result2').html('EMI: ' + emi2.toFixed(2));

		}
	}
</script>

<!------------------------------------------------------>

<div id="disclaimerModal" class="modal hide fade" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">DISCLAIMER</h4>
      </div>
      <div class="modal-body" style="padding-left: 20px;padding-right: 20px;">
        @php
        $disclaimer = Helper::getInnerPage(28);
        @endphp
        {!! ($disclaimer->description) !!}
      </div>
      <div class="modal-footer" style="justify-content:center">
      	<span class="text-center">
        	<button type="button" id="closePopup" class="btn-white view-gallery-btn">Agree</button>
        </span>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).on('click','#emi_calc_popup',function(){
		$('#emiCalcModal').modal('show');
	});
	$(document).on('click','#closePopupEmi',function(){
		$('#emiCalcModal').modal('hide');
	});
	$(document).on('click','#closePopup',function(){
		setCookie('displayedPopupNewsletter', 'yes',1);
		$('#disclaimerModal').modal('hide');
	});
	$(document).ready(function(e){
		if(getCookie('displayedPopupNewsletter')){
			return;
		}
		$('#disclaimerModal').modal('show');
    });
	function setCookie(c_name, value, exdays){
	 	var c_value = escape(value);
	 	if(exdays){
	  		var exdate = new Date();
	  		exdate.setDate( exdate.getDate() + exdays );
	  		c_value += '; expires=' + exdate.toUTCString();
	 	}
	 	document.cookie = c_name + '=' + c_value;
	}
	function getCookie( c_name ) {
	 	var i, x, y, cookies = document.cookie.split(';');
	 	for( i = 0; i < cookies.length; i++ ){
			x = cookies[i].substr( 0, cookies[i].indexOf( '='));
			y = cookies[i].substr( cookies[i].indexOf( '=')+1);
			x = x.replace( /^\s+|\s+$/g, '' );
			if(x === c_name){
				return unescape(y);
			}
		 }
	}
</script>
@endsection
