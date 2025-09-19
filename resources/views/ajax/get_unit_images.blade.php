@if(isset($images) && $images->count() > 0)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	@foreach($images as $key => $image)
    <div class="carousel-item {{($key == 0?'active':'')}}">
        <img src="{{ URL::asset('public/img/products/'.$image->image) }}" style="width:100%;" class="rounded img-fluid example-image img-responsive" alt="">
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