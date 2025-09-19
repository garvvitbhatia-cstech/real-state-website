@extends('layout.default')
@if(isset($event->id))
@section('title',isset($event->seo_title)?$event->seo_title:'')
@section('description',isset($event->seo_description)?$event->seo_description:'')
@section('keywords',isset($event->seo_keyword)?$event->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

<style>
	/*p {
    font-size: 1.5rem;
}*/
</style>

@if(isset($event->id))
<div id="gallery" class="mt-4 gallery-section pb-24 wow fadeInUp">
  <div class="container">
  		<p style="padding-top: 60px;"></p>
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">Events</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>
      
      <div class="gallery-slider mt-lg-5 mt-4 owl-carousel">
        @foreach($event_images as $key => $record)
        <div>
          <a href="#"><div class="gallery-block">
            <div class="thumb-gallery">
            	@if($record->banner != '')
                    <img src="{{ asset('public/admin/images/images/'.$record->banner) }}">
                @else
                    <img src="{{ asset('public/img/home/no-img-2.jpg') }}">
                @endif
            </div>
          </div></a>
        </div>
        @endforeach
      </div>
  </div>
</div>
@endif

<!--Overview section start here-->
<div id="overview" class="pt-20 pb-24">
  <div class="container">   
   <div class="row">
     <div class="col-md-10">
       <div class="row">
         <div class="col-lg-12">
           <div class="blog_detail_description mb-4">
              <!--<div class="time-details mb-4">
                <span class="fs-4 me-3">{{date('M d,Y',strtotime($event->created_at)) }}</span>
              </div>-->
              <h1 class="fs-1">{{$event->title}}</h1>              
              	{!! ($event->description) !!}
           </div>
         </div>
       </div>
     </div>
   </div>

  </div>
</div>
<!--Overview section end here-->

<script>
	$(document).ready(function(e){
        $('.owl-prev').css('font-size','25px');
		$('.owl-next').css('font-size','25px');
		$('.owl-nav').addClass('text-center');
    });
</script>

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->


@endsection