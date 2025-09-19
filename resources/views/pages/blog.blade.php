@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

@if(isset($innerPage->id) && $innerPage->banner_status == 1)
<div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
</div>
@endif

<?php /*?>@if(isset($latest_blog->id))
<!--Overview section start here-->
<div id="overview" class="overview-section pt-20 pb-24">
  <div class="container">
  
  <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h1 class="text-uppercase">Navkar City Blogs</h1>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>
    
    <a href="{{ url('blogs/'.$latest_blog->slug) }}">
      <div class="overview-banner position-relative">
      	@if($latest_blog->image != '')
        	<img src="{{ asset('public/img/blogs/'.$latest_blog->image) }}">
        @else
        	<img src="{{ asset('public/img/home/no-img-3.jpg') }}">
        @endif
        <div class="walkthrough-btn">
          <span class="btn-white" href="{{ url('blogs/'.$latest_blog->slug) }}">Read More</span>
        </div>
      </div>

      <div class="blog-content mt-3">
        <span class="blog-date-block mb-3">
          <span class="post-date address-small me-3">{{ date('M d, Y',strtotime($latest_blog->created_at)) }}</span>
          <span class="address-small me-3">{{$latest_blog->title}}</span>
          <span class="address-small">By: Navkar City</span>
        </span>
        <h2 class="mb-3 fs-2">{{$latest_blog->title}}</h2>
        <p class="text-start mb-3">{!! substr($latest_blog->description,0,500) !!}...</p>

        
      </div>
    </a>


  </div>
</div>
<!--Overview section end here-->
@endif<?php */?>

@if(isset($blogs) && $blogs->count() > 0)
<!--You may also like section start here-->
<div id="blog" class="blog-section pb-24 wow fadeInUp mt-5">
  <div class="container">
      <div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">You may also like</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>

      <div class="blog-contnet wow fadeInUp">
        <div class="row">
        	
            @foreach($blogs as $key => $blog)
         	<div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ url('blogs/'.$blog->slug) }}" class="article-box">
                  <span class="blog-thumb">
                  	@if($blog->image != '')
                         <img src="{{ asset('public/img/blogs/'.$blog->image) }}">
                    @else
                        <img src="{{ asset('public/img/home/no-img-3.jpg') }}">
                    @endif                   
                  </span>
                  <span class="blog-content">
                    <span class="blog-date-block">
                      <span class="post-date address-small me-3">{{ date('M d, Y',strtotime($blog->created_at)) }}</span>
                      <span class="address-small">{{$blog->title}}</span>
                    </span>
                    <span class="title-box">{{$blog->title}}</span>
                    <p></p>
                    <!--<span class="view-count">
                      <span class="eye-icon">
                        <svg width="1em" height="1em" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 .5C6 .5 1.73 3.61 0 8c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5C20.27 3.61 16 .5 11 .5ZM11 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5Zm0-8C9.34 5 8 6.34 8 8s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3Z" fill="#E4D8B6"></path></svg>
                      </span> {{ $blog->views }}
                    </span>-->
                  </span>
                </a>
              </div>
          	@endforeach

          <div class="col-lg-12 mb-4 mb-md-5 mt-2">
            <div class="success-cont-box">
              <div class="d-flex align-items-center justify-content-center mb-3">
                <svg width="30px" height="30px" viewBox="0 0 35 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m3.096 29.59-2.53-4.18c2.786-1.833 4.84-3.777 6.16-5.83 1.393-2.127 2.09-4.767 2.09-7.92-.22.073-.514.11-.88.11-1.54 0-2.897-.477-4.07-1.43-1.174-.953-1.76-2.31-1.76-4.07 0-1.907.55-3.41 1.65-4.51C4.856.66 6.249.11 7.936.11c2.126 0 3.813.88 5.06 2.64 1.246 1.687 1.87 4.143 1.87 7.37 0 4.4-1.027 8.213-3.08 11.44-1.98 3.153-4.877 5.83-8.69 8.03Zm19.36 0-2.53-4.18c2.786-1.833 4.84-3.777 6.16-5.83 1.393-2.127 2.09-4.767 2.09-7.92-.22.073-.514.11-.88.11-1.54 0-2.897-.477-4.07-1.43-1.174-.953-1.76-2.31-1.76-4.07 0-1.907.55-3.41 1.65-4.51 1.1-1.1 2.493-1.65 4.18-1.65 2.126 0 3.813.88 5.06 2.64 1.246 1.687 1.87 4.143 1.87 7.37 0 4.4-1.027 8.213-3.08 11.44-1.98 3.153-4.877 5.83-8.69 8.03Z" fill="#E4D8B6"></path></svg>
              </div>
              <div class="d-flex align-items-center justify-content-center">
                <p class="d-flex align-items-center text-center fs-5 mb-0"><span class="fs-2 me-3">“Success in real estate starts when you believe you are worthy of it”</span> - - Michael Ferrara</p>
              </div>
            </div>
          </div>
        </div>

        {!! $blogs->links('pagination.front') !!}
        
      </div>
  </div>
</div>
<!--You may also like section end here-->
@endif

@if(isset($blogs) && $blogs->count() == 0)
<div class="blog-section pb-24">
	<div class="container">
		<div class="row text-center mt-3">        	
            <div class="alert alert-danger">	
            	<h5 class="">There are no records</h5>
            </div>
        </div>
    </div>
</div>
@endif

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endsection