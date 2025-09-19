@extends('layout.default')
@if(isset($project->id))
@section('title',isset($project->seo_title)?$project->seo_title:'')
@section('description',isset($project->seo_description)?$project->seo_description:'')
@section('keywords',isset($project->seo_keyword)?$project->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

<style>
.slidecontainer {
  width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
  -webkit-appearance: none;  /* Override default CSS styles */
  appearance: none;
  width: 100%; /* Full-width */
  height:4px; /* Specified height */
  background: #d3d3d3; /* Grey background */
  outline: none; /* Remove outline */
  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
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
</style>
@if(isset($images) && $images->count() > 0)
<div class="header-slider owl-carousel">
	@foreach($images as $key => $image)
    <div class="">
      <img src="{{ asset('public/img/products/'.$image->image) }}">
    </div>
    @endforeach
</div>
@else
<div class="header-slider owl-carousel">
	<div class="">
      <img src="{{ asset('public/img/home/no-img-7.png') }}">
    </div>
</div>
@endif

<!--Overview section start here-->
<div id="overview" class="overview-section pb-24">
  <div class="container">
    <!--breadcrumbs start here-->
    <ul class="breadcrumbs mb-4">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="/">Home</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="#">{{Helper::getCategoryNameById($project->category_id)}} Projects</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="#">{{Helper::getCityNameById($project->city_id)}}</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--active" href="#">{{$project->title}}</a>
      </li>
    </ul>
    <!--breadcrumbs end here-->
    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Overview</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <p>{!! $project->description !!}</p>

    <div class="overview-banner position-relative mt-3 mt-md-5">
      <img src="{{ asset('public/img/products/'.$project->banner) }}">
      <div class="walkthrough-btn">
        <a class="btn-white" href="#">Walkthrough</a>
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
    <div class="overview-banner position-relative mt-3 mt-md-5">
    	<iframe width="100%" height="650" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q={{ $project->address }}&output=embed"></iframe>
      <div class="walkthrough-btn">
        <a class="btn-white" href="#">Location AV</a>
      </div>
      <div class="map-address">
        <div class="map-address-top">
            <h3 class="text-uppercase">Address</h3>
            <address class="mt-1 d-flex justify-content-between">{{ $project->address }}
              
            </address>
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
          	@if(isset($masterPlan->id))
            <div class="plan-tab-content-inner2">
              <img src="{{ asset('public/img/products/'.$masterPlan->image) }}">
            </div>
            @endif
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
          <div class="plan-tab-content-inner">
             @if(isset($unitPlan) && $unitPlan->count() > 0)	
             <div class="row">             	
                @foreach($unitPlan as $key => $plan)
                <div class="col-lg-4 col-md-6">
                  <div class="floor-map-img-box">
                    <small class="small-title">{{$plan->title}}</small>
                    <div class="floor-thumb">
                      <img src="{{ asset('public/img/products/'.$plan->image) }}">
                    </div>
                  </div>
                </div>
                @endforeach
             </div>
             @endif
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
                <span class="text-white text-uppercase">Images</span>
               </div>
               <div class="price-total">
               <div class="col-md-6 py-4">
           			<a href="javascript:void(0)" class="lead mx-auto mt-2" title onclick="getCategoryImages('Villa One','{{ $project->id }}')">Villa One</a><br />
                   	<a href="javascript:void(0)" class="lead mx-auto mt-2" onclick="getCategoryImages('Villa Two','{{ $project->id }}')">Villa Two</a>
                 </div>
                 <hr />
                 <div class="col-md-6 py-4">
                   <a href="javascript:void(0)" class="lead mx-auto mt-2" onclick="getCategoryImages('G+2','{{ $project->id }}')">G+2</a><br />
                   <a href="javascript:void(0)" class="lead mx-auto mt-2" onclick="getCategoryImages('G+3','{{ $project->id }}')">G+3</a>
                 </div>
               </div>
             </div>
          </div>
          <div class="col-md-1"></div>
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
<!--price section end here-->

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
	.bs-example {
		margin: 20px;
	}

	.modal-dialog {
      max-width: 800px;
      margin: 30px auto;
	  }

	.modal-body {
	  position:relative;
	  padding:0px;
	}
</style>

<div class="bs-example">
    <div id="category_images" class="modal user-review-video-modal hide fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="replace_category_images">
                    
                </div>
            </div>
        </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(e){
	$("#category_images").on('hide.bs.modal', function(){
		$(".youtube_video_src").attr('src', '');	
	});
	$('.owl-prev').css('font-size','25px');
	$('.owl-next').css('font-size','25px');
	$('.owl-nav').addClass('text-center');
});
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

    $('#final_result').html('EMI: ' + emi.toFixed(2));

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
        <h2 class="text-uppercase">Amenities That Bring Happiness and Joy Everyday</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>

      <p class="lead mx-auto mt-12 text-center">{{ $project->title }} opens the door to a life built for luxury and comfort. It's designed to ensure that you're always well taken care of - Homes with amenities that makes each day an experience.</p>

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


@if(isset($gallery) && $gallery->count() > 0)
<!--Gallery section start here-->
<div id="gallery" class="gallery-section pt-20 pb-24 wow fadeInUp">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Amenities That Bring Happiness and Joy Everyday</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>

      <h3 class="mx-auto mt-12 text-center">Make your everyday feel like a retreat and a relaxing escapade with {{ $project->title }}.</h3>
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

@if(isset($more_products) && $more_products->count()>0)
<!--You may also like section start here-->
<div id="blog" class="blog-section pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">You may also like</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>

      <div class="blog-contnet wow fadeInUp">
        <div class="row">
        	@foreach($more_products as $key => $record)
          	<div class="col-lg-4 col-md-6">
                <a href="{{url('/product/'.$record->slug)}}" class="article-box">
                  <span class="blog-thumb">
                    @if($record->banner != '')
                        <img src="{{ asset('public/img/products/'.$record->banner) }}">
                    @else
                        <img src="{{ asset('public/img/home/no-img-2.jpg') }}">
                    @endif
                  </span>
                  <span class="blog-content">
                    <span class="address-small">{{$record->title}}</span>
                    <span class="title-box">{{$record->address}}</span>                    
                  </span>
                </a>
            </div>
          	@endforeach
        </div>
      </div>
  </div>
</div>
<!--You may also like section end here-->
@endif

<!--Get in touch section start here-->
@include('element.newsletter');
<!--Get in touch section end here-->

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection