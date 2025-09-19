<?php /*?><script src="{{ URL::asset('public/js/lightbox-plus-jquery.min.js') }}"></script>
<link href="{{ URL::asset('public/css/lightbox.min.css') }}" rel="stylesheet" />
@if(isset($products) && $products->count() > 0)

	@foreach($products as $key => $product)
    	
        @if($product->youtube_url != '')
            <a data-lightbox="example-set" data-title="" href="{{ $product->youtube_url }}" class="col-md-4 mb-2 example-image-link"> 
                <img src="{{ $product->youtube_url }}" class="rounded img-fluid example-image" alt="">
            </a>
        @else
        	<a data-lightbox="example-set" data-title="" href="{{ URL::asset('public/img/products/'.$product->image) }}" class="col-md-4 mb-2 example-image-link"> 
                <img src="{{ URL::asset('public/img/products/'.$product->image) }}" class="rounded img-fluid example-image" alt="">
            </a>
        @endif
        
    @endforeach
	
@endif<?php */?>


@if(isset($images) && $images->count() > 0)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	@foreach($images as $key => $image)
    <div class="carousel-item {{($key == 0?'active':'')}}">
       @if($image->url != '')
            <iframe width="800" height="500" src="{{ $image->url }}" class="youtube_video_src" frameborder="0" allowfullscreen></iframe>
        @else
        	<img src="{{ URL::asset('public/img/products/'.$image->image) }}" class="rounded img-fluid example-image img-responsive" alt="">
        @endif
    </div>
    @endforeach
  </div>  
    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
@endif