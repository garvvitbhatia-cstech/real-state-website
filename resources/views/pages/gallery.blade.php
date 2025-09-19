@extends('layout.default')
@if(isset($project->id))
@section('title',isset($project->seo_title)?$project->seo_title:'')
@section('description',isset($project->seo_description)?$project->seo_description:'')
@section('keywords',isset($project->seo_keyword)?$project->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')
<div id="gallery" class="gallery-section pb-24 wow fadeInUp mt-12" style="visibility: visible; animation-name: fadeInUp;">
  <div class="container">
    <div class="section-title tex-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"></div>
  </div>
</div>
@if($slug != '' && empty($gallery))
<div class="container">
  <h1 class="text-uppercase text-center mb-5">Gallery Category</h1>
  <div class="row">
  	<div class="col-md-2"></div>
    <div class="col-md-8 ">
      <div class="article-box mb-4">
        <div class="price-total-section">
          <div class="price-title d-flex align-items-center justify-content-center"> <span class="text-white text-uppercase"></span> </div>
          <div class="price-total">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
              <a href="{{url('/gallery/'.$project->slug.'/highlights')}}"><img src="{{ asset('public/img/categories/other_folder.png') }}"></a>
                <div class="support-content py-3 text-center">
                   <a href="{{url('/gallery/'.$project->slug.'/highlights')}}"><h3 class="text-center">Highlights</h3></a>
                 </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
              <a href="{{url('/gallery/'.$project->slug.'/landscape')}}"><img src="{{ asset('public/img/categories/landscape_folder.png') }}"></a>
                <div class="support-content py-3 text-center">
                   <a href="{{url('/gallery/'.$project->slug.'/landscape')}}"><h3 class="text-center">Landscape</h3></a>
                 </div>
              </div>
              <hr style="color:#c3aa62" />
              <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
              <a href="{{url('/gallery/'.$project->slug.'/houses')}}"><img src="{{ asset('public/img/categories/houses_folder.png') }}"><a>
                <div class="support-content py-3 text-center">
                   <a href="{{url('/gallery/'.$project->slug.'/houses')}}"><h3 class="text-center">Houses</h3></a>
                 </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12 py-3 text-center">
              <a href="{{url('/gallery/'.$project->slug.'/amenities')}}"><img src="{{ asset('public/img/categories/amenities_folder.png') }}"></a>
                <div class="support-content py-3 text-center">
                   <a href="{{url('/gallery/'.$project->slug.'/amenities')}}"><h3 class="text-center">Amenities</h3></a>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-md-2"></div>
  </div>
</div>
@endif

@if(isset($gallery) && !empty($gallery))
<div class="container">
<h2 class="text-uppercase text-center mb-5">{{ucwords($folder)}} Images</h2>
  <div class="">
    <div class="row"> 
        @foreach($gallery as $key => $image)
          <div class="col-md-4 col-sm-12 col-lg-4">
            <div class="article-box mb-4"> <img data-toggle="tooltip" data-placement="top" title="{{$image->title}}" style="max-width:600px;cursor:pointer" src="{{ asset('public/img/products/'.$image->image) }}"> </div>
          </div>
      	@endforeach 
      </div>
  </div>
</div>
@endif

<style>
.tooltip-main {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  font-weight: 700;
  background: #f3f3f3;
  border: 1px solid #737373;
  color: #737373;
  margin: 4px 121px 0 5px;
  float: right;
  text-align: left !important;
}

.tooltip-qm {
  float: left;
  margin: -2px 0px 3px 4px;
  font-size: 12px;
}

.tooltip-inner {
  max-width: 236px !important;

  font-size: 17px;
  padding: 10px 15px 10px 20px;
  background: #000;
  color: #fff;
  border: 1px solid #737373;
  text-align: left;
}

.tooltip.show {
  opacity: 1;
}

.bs-tooltip-auto[x-placement^=bottom] .arrow::before,
.bs-tooltip-bottom .arrow::before {
  border-bottom-color: #f00;
  /* Red */
}
</style>
<script>
$(function () {
 // $('[data-toggle="tooltip"]').tooltip()
})
</script> 
@endsection 