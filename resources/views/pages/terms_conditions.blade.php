@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content') 

@if(isset($innerPage->id))
<div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
</div>
@endif

@if(isset($faqs) && $faqs->count() > 0)
<!--Overview section start here-->
<div id="overview" class="overview-section pt-20 pb-24">
    <div class="container">
      <div class="accordion" id="accordionExample">
        @foreach($faqs as $key => $faq)
        <div class="accordion-item">
        <h2 class="accordion-header {{($key > 0?'collapsed':'')}}" data-bs-toggle="collapse" data-bs-target="#collapseThree{{$key}}" aria-expanded="false" aria-controls="collapseThree">
          {{$faq->question}}
        </h2>
        <div id="collapseThree{{$key}}" class="accordion-collapse {{($key > 0?'collapse':'')}}" data-bs-parent="#accordionExample">
            <div class="">
                <p class="pt-4 text-start">{!! nl2br($faq->answer) !!}</p>
            </div>
        </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
<!--Overview section end here-->
@endif

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection