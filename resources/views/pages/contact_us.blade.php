@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')


<!--Contact Top banner start here-->
<div class="contact-info-section pt-30 pb-24">
  <div class="container">
  	@if(isset($innerPage->id))
    <div class="contact-banner">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
      <div class="banner-thumb-content">
        <h1>{{ $innerPage->heading }}</h1>
        <p class="lead mt-4 mt-md-5 text-white">{!! $innerPage->description !!}</p>
      </div>
    </div>
	@endif
    @if(isset($toll_free) && $toll_free->count() > 0)
    <div class="contat-details">
    	@foreach($toll_free as $key => $contact)
      	<div class="contact-info-box">
          <div class="contact-map-flag">
             <span class="flag-icon"><img src="{{ asset('public/img/blogs/'.$contact->flag) }}"></span>
             @if($key == 0)
             <h3>Site Office</h3>
             @endif
             @if($key == 1)
             <h3>Head Office</h3>
             @endif
          </div>
          <div class="address-list">
            <span class="map-pin me-3">
                <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#D8D8D8" d="M.5.5h27v27H.5z"></path><g clip-path="url(#pin_svg__a)"><path d="M19.918 7.425c-1.213-2.095-3.37-3.375-5.767-3.423a7.48 7.48 0 0 0-.307 0C11.446 4.05 9.29 5.33 8.076 7.425a6.963 6.963 0 0 0-.09 6.88l4.959 9.077.007.012c.218.38.609.606 1.045.606.437 0 .828-.226 1.046-.606l.007-.012 4.96-9.077a6.963 6.963 0 0 0-.092-6.88Zm-5.92 5.638a2.816 2.816 0 0 1-2.813-2.813 2.816 2.816 0 0 1 2.812-2.812 2.816 2.816 0 0 1 2.813 2.812 2.816 2.816 0 0 1-2.813 2.813Z" fill="#D8D8D8"></path></g><defs><clipPath id="pin_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
            </span>
            <span class="addres-content">{{$contact->address}}</span>
          </div>
          <div class="address-list">
            <span class="map-pin me-3">
                <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#D8D8D8" d="M.5.5h27v27H.5z"></path><g clip-path="url(#call_svg__a)"><path d="m23.458 18.678-2.791-2.791c-.997-.997-2.691-.598-3.09.698-.3.897-1.296 1.395-2.193 1.196-1.994-.498-4.685-3.09-5.183-5.183-.3-.898.299-1.895 1.196-2.194 1.296-.398 1.694-2.093.697-3.09l-2.79-2.79c-.798-.698-1.994-.698-2.692 0L4.718 6.416c-1.894 1.994.2 7.277 4.884 11.962 4.685 4.685 9.968 6.878 11.962 4.884l1.894-1.894c.698-.797.698-1.993 0-2.691Z" fill="#D8D8D8"></path></g><defs><clipPath id="call_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
            </span>
            <span class="addres-content fw-bold">+{{$contact->contact}}</span>
          </div>
      </div>
      	@endforeach
    </div>
	@endif

    <div class="contact-support mt-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="support-box">
             <img src="{{ asset('public/img/home/24x7.jpg') }}">
             <div class="support-content text-center mt-5">
               <h3 class="text-center">Contact us 24x7</h3>
               <a href="#">{{$setting->marketing_email}}</a>
             </div>
          </div>
        </div>

        <?php /*?><div class="col-lg-4">
          <div class="support-box">
             <img src="{{ asset('public/img/home/internation-number.jpg') }}">
             <div class="support-content text-center mt-5">
               <h3 class="text-center">International Numbers</h3>
               <a href="#">USA Toll Free Number: 1844 746 3126</a>
               <a href="#">For Other Countries: +91 11 6657 5604</a>
               <a href="#">Email: nri@godrejproperties.com</a>
             </div>
          </div>
        </div><?php */?>


        <?php /*?><div class="col-lg-4">
          <div class="support-box">
             <img src="{{ asset('public/img/home/suppliers-manufacturers.jpg') }}">
             <div class="support-content text-center mt-5">
               <h3 class="text-center">Suppliers & Manufacturers</h3>
               <a href="#">{{$setting->suplier_email}}</a>
             </div>
          </div>
        </div><?php */?>

      </div>
    </div>
  </div>
</div>
<!--Contact Top banner end here-->


<?php /*?><div id="amenities" class="amenities pt-20 pb-24 wow fadeInUp">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Customer care helpline</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>

      <div class="helpline-section pt-md-5 pt-3">
        <div class="row">
        	@if(isset($toll_free) && $toll_free->count() > 0)
			<div class="col-md-6">
                <div class="helpine-left">
                  <h4>India Toll Free Number</h4>
                  <select name="city" id="city" onchange="getTollFreeById(this.value)" class="mt-4 leading-normal">
                  	@foreach($toll_free as $key => $toll)
                    	<option value="{{$toll->id}}">{!! Helper::getCityNameById($toll->city) !!}</option>
                    @endforeach
                  </select>
                  <div id="replaceHtml">

                </div>
                </div>
            </div>
			@endif
          <div class="col-md-6">
            <div class="helpine-right">
              <h4 class="mb-3">International Numbers</h4>
              <p>Have a question? Call us between 09:30 am to 06:30 pm IST on our toll free numbers. </p>
              <p>Or request a call from your dedicated Relationship Manager by using the "Reach Us-Write to Us" option available on your GPL Mobile App.</p>

              <ul class="market-links-list d-flex align-items-center justify-content-start gap-4 mt-4">
                <li><a href="#"><img src="{{ asset('public/img/home/app-store.webp') }}"></a></li>
                <li><a href="#"><img src="{{ asset('public/img/home/google-pay.webp') }}"></a></li>
              </ul>


              <div class="row mt-5">
              	@foreach($toll_free as $key => $toll)
                <div class="col-lg-6">
                  <h4>{!! Helper::getCityNameById($toll->city) !!} Toll Free Number</h4>

                  <div class="toll-free">
                    <div class="map-pin me-3">
                      <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#E4D8B6" d="M.5.5h27v27H.5z"></path><g clip-path="url(#phone_svg__a)"><path d="m23.458 18.678-2.791-2.791c-.997-.997-2.691-.598-3.09.698-.3.897-1.296 1.395-2.193 1.196-1.994-.498-4.685-3.09-5.183-5.183-.3-.898.299-1.895 1.196-2.194 1.296-.398 1.694-2.093.697-3.09l-2.79-2.79c-.798-.698-1.994-.698-2.692 0L4.718 6.416c-1.894 1.994.2 7.277 4.884 11.962 4.685 4.685 9.968 6.878 11.962 4.884l1.894-1.894c.698-.797.698-1.993 0-2.691Z" fill="#E4D8B6"></path></g><defs><clipPath id="phone_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
                    </div>
                    <h5>{{$toll->contact}}</h5>
                  </div>

                    @if($toll->time != '')
                  <div class="toll-free">
                    <div class="map-pin me-3">
                      <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#E4D8B6" d="M.5.5h27v27H.5z"></path><g clip-path="url(#time_svg__a)"><path d="M14 4C8.5 4 4 8.5 4 14s4.5 10 10 10 10-4.5 10-10S19.5 4 14 4Zm4.2 14.2L13 15V9h1.5v5.2l4.5 2.7-.8 1.3Z" fill="#E4D8B6"></path></g><defs><clipPath id="time_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
                    </div>
                    <h5>
                    	@php
                        	$explode = explode('-',$toll->time);
                            echo $explode[0];
                            if($explode[0] > 11){
                            	echo ' pm ';
                           	}else{
                            	echo ' am ';
                           	}
                            echo ' to '.$explode[1];
                            if($explode[1] > 11){
                            	echo ' pm ';
                           	}else{
                            	echo ' am ';
                           	}
                        @endphp
                    </h5>
                  </div>
                  @endif
                </div>
				@endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div><?php */?>


<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

<script type="text/javascript">
	$(document).ready(function(e) {
        getTollFreeById({{$tid}});
    });
	function getTollFreeById(id){
		if(id != ''){
			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/get-toll-free')}}",
				data: {id:id},
				success: function(response){
					$('#replaceHtml').html(response);
				},error: function(ts) {
					swal("Error!", "Something went wrong", "error");
				}
			});
			return false;
		}
	}
</script>


@endsection
