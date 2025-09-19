@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

<!--Overview section start here-->
<div id="overview" class="overview-section pb-24">
  <div class="container">
    <!--breadcrumbs start here-->
    <!-- <ul class="breadcrumbs mb-4">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="#">Home</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="#">Our Story</a>
      </li>
      
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--active" href="#">Our Team</a>
      </li>
    </ul> -->
    @if(isset($innerPage->id))
    <!--breadcrumbs end here-->
    <!-- <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">{{$innerPage->heading}}</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <p> {!! $innerPage->description !!} </p> -->
    @endif
  </div>

</div>
<!--Overview section end here-->

<?php /*?>@if(isset($openings) && $openings->count()>0)
<!--Our Opening section start here-->
<div class="our-opening-section pb-24">
  <div class="container">
    <h2 class="mb-4 mb-md-5">Explore Openings Under :</h2>
    <div class="d-flex align-items-start opening-tabs-block">
      <ul class="nav flex-column me-3 opening-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      	@foreach($openings as $key => $value)
        <li>
          <a class="nav-link @if($key == 0) active @endif" id="v-pills-home-tab{{$key}}" data-bs-toggle="pill" data-bs-target="#v-pills-home{{$key}}" type="button" role="tab" aria-controls="v-pills-home{{$key}}" aria-selected="true">{{$value->category}}</a>
        </li>
        @endforeach
      </ul>
      <div class="tab-content" id="v-pills-tabContent">
      	@foreach($openings as $key => $value)
        <div class="tab-pane fade @if($key == 0) show active @endif" id="v-pills-home{{$key}}" role="tabpanel" aria-labelledby="v-pills-home-tab{{$key}}" tabindex="0">
          <div class="application-content">
             <div class="banner-application">
                <img src="{{ asset('public/img/categories/'.$value->banner) }}">
                <div class="banner-content-application">
                    <h1>{{$value->category}}</h1>
                    <p>{{$value->description}}</p>
                </div>
             </div>
             <div class="vertical-text">
                <div class="server-text"> This vertical is served by </div>
                <a href="#" class="godraj-btn">Godrej & Boyce</a>
             </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>
<!--Our Opening section end here-->
@endif<?php */?>


@if(isset($team) && $team->count()>0)
<!--Meet Our Team start here-->
<div class="meet-our-team">
  <div class="container">
    <div class="section-title <?php /*?>meet-our-team-heading<?php */?> tex-center">
      <!-- <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div> -->
      <h2 class="text-uppercase" style="font-size: 43px;color: #713c0e;padding: 10px 100px;border-radius: 60px;">Meet Our Team</h2>
      <!-- <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div> -->
    </div>

    <div class="team-member-section team-member-newsection">
      <div class="row">
      	@foreach($team as $key => $member)
        <div class="col-lg-4 col-md-4">
          <div class="team-member-boxouter">
            <div class="team-member-box">
              <div class="thumbnail-box">
                <div class="linelogo-top"><img src="{{ asset('public/img/categories/navkar-logo-icon.jpg') }}"></div>
                <figure>
                 <img src="{{ asset('public/img/categories/'.$member->profile) }}">
                </figure>
              </div>
              <div class="thumbnail-content">
                <h4>{{$member->name}}</h4>
                <p>{!! $member->designation !!}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!--Meet Our Team section end-->
@endif

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection