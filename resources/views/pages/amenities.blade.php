@extends('layout.default')
@if(isset($project->id))
@section('title',isset($project->seo_title)?$project->seo_title:'')
@section('description',isset($project->seo_description)?$project->seo_description:'')
@section('keywords',isset($project->seo_keyword)?$project->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')
 
<div id="gallery" class="gallery-section pt-20 wow fadeInUp mt-12" style="visibility: visible; animation-name: fadeInUp;">
<div class="container">
    <div class="section-title tex-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="line before"><img src="https://navkar.city/public/img/home/line_before.svg"></div>
        <h1 class="text-uppercase">Navkar City Amenities</h1>
        <div class="line after"><img src="https://navkar.city/public/img/home/line_after.svg"></div>
      </div>
  </div>
</div>

<div class="header-slider owl-carousel">
	@foreach($mainAmenities as $key => $image)
    <div class="gallery-block">
      <img src="{{ asset('public/img/products/'.$image->image) }}">
      <div class="property-details-infos"><h1>{{$image->title}}</h1></div>
    </div>
    @endforeach    
</div>

@if(isset($project->id) && $project->id == 3)

	<div class="container">
    	<div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h5>Recreational Amenities:</h5>
            <ul class="footer-links wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <li><a href="javascript:void(0)">Indoor Badminton Court</a></li>
              <li><a href="javascript:void(0)">Indoor Squash Court</a></li>
              <li><a href="javascript:void(0)">Billiards Room</a></li>
              <li><a href="javascript:void(0)">Indoor Games Room</a></li>
              <li><a href="javascript:void(0)">Indoor Theatre</a></li>
              <li><a href="javascript:void(0)">Outdoor Banquet Lawn</a></li>
              <li><a href="javascript:void(0)">Swimming Pool</a></li>
              <li><a href="javascript:void(0)">Child Pool</a></li>
              <li><a href="javascript:void(0)">Jacuzzi</a></li>
              <li><a href="javascript:void(0)">Rain Dance 20 pax</a></li>
              <li><a href="javascript:void(0)">Steam Room</a></li>
              <li><a href="javascript:void(0)">Locker Facilities</a></li>
              <li><a href="javascript:void(0)">Gymnasium</a></li>
              <li><a href="javascript:void(0)">Aerobics Area</a></li>
              <li><a href="javascript:void(0)">Bowling Alleys</a></li>
              <li><a href="javascript:void(0)">Elderly Sitting Area</a></li>
              <li><a href="javascript:void(0)">Jogging Track</a></li>
              <li><a href="javascript:void(0)">Outdoor Yoga Area</a></li>
              <li><a href="javascript:void(0)">Outdoor Kid’s Garden</a></li>
              <li><a href="javascript:void(0)">Walking Track</a></li>
            </ul>
          </div>
          
           <div class="col-lg-4 col-md-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h5>Hospitality and Leisure Amenities:</h5>
            <ul class="footer-links wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <li><a href="javascript:void(0)">Ample Parking</a></li>
              <li><a href="javascript:void(0)">Sitting Lounge</a></li>
              <li><a href="javascript:void(0)">Indoor Banquet Hall can be combined with Outdoor Lawn</a></li>
              <li><a href="javascript:void(0)">Pool Café</a></li>
              <li><a href="javascript:void(0)">2 Ensuite for Banquet Guests</a></li>
              <li><a href="javascript:void(0)">Conference Room</a></li>
              <li><a href="javascript:void(0)">Meeting Facilities equipped with Online Video Conferencing Facilities</a></li>
              <li><a href="javascript:void(0)">Air-Conditioned Function Room</a></li>
              <li><a href="javascript:void(0)">Wellness Centre</a></li>
              <li><a href="javascript:void(0)">Salon</a></li>
              <li><a href="javascript:void(0)">Spa Facilities</a></li>
              <li><a href="javascript:void(0)">All day Dining Restaurant</a></li>
            </ul>
          </div>
          
          <div class="col-lg-4 col-md-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h5>Entertainment and Learning Amenities:</h5>
            <ul class="footer-links wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
              <li><a href="javascript:void(0)">Indoor Theatre</a></li>
              <li><a href="javascript:void(0)">Library</a></li>
              <li><a href="javascript:void(0)">Dance Room</a></li>
              <li><a href="javascript:void(0)">Music Room</a></li>
              <li><a href="javascript:void(0)">Toddler Care Room</a></li>
              <li><a href="javascript:void(0)">Kid’s Room</a></li>
              <li><a href="javascript:void(0)">Rain Dance</a></li>
              <li><a href="javascript:void(0)">Steam Room</a></li>
            </ul>
          </div>
          
       </div>
    </div>

@endif


@endsection