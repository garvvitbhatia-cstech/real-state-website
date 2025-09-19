@extends('layout.default')
@if(isset($blog->id))
@section('title',isset($blog->seo_title)?$blog->seo_title:'')
@section('description',isset($blog->seo_description)?$blog->seo_description:'')
@section('keywords',isset($blog->seo_keyword)?$blog->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

@if(isset($blog->id))
<div class="header-slider owl-carousel">
    <div class="">
    	@if($blog->image != '')
      		<img src="{{ asset('public/img/blogs/'.$blog->image) }}">
      	@else
        	<img src="{{ asset('public/img/home/no-img-7.png') }}">
        @endif
    </div>
</div>
@endif
<style>
@media (max-width: 767px){
.share-mobile{ display:none}	
}
</style>
<!--Overview section start here-->
<div id="overview" class="overview-section pt-20 pb-24">
  <div class="container">   
   <div class="row">
     <div class="col-md-8">
       <div class="row">
         <div class="col-lg-1 share-mobile">
           <div class="share-post">
              <h4>Share via:</h4>
              <ul class="share-icon">
                <li>
                  <a href="https://www.facebook.com/" target="_blank">
                    <svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#facebook_svg__a)"><path d="M25.251 4.747c5.663 5.663 5.663 14.843 0 20.506-5.662 5.663-14.843 5.663-20.506 0-5.662-5.663-5.662-14.843 0-20.506 5.663-5.662 14.844-5.662 20.506 0Z" fill="#fff" stroke="#677184"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.648 19.527c0-1.405-.005-2.808.005-4.211.002-.236-.065-.311-.301-.302-.438.018-.876-.001-1.314.009-.178.004-.243-.045-.241-.233.009-.876.008-1.752 0-2.628 0-.168.05-.224.22-.22.448.01.897-.013 1.344.009.26.013.313-.08.308-.32a43.344 43.344 0 0 1-.001-2c.018-.815.236-1.575.722-2.237.613-.838 1.486-1.222 2.492-1.267 1.034-.046 2.07-.02 3.106-.031.144-.002.187.05.187.19-.005.886-.006 1.772 0 2.658.002.157-.05.206-.204.203-.498-.008-.996-.004-1.493-.003-.663.003-1.059.344-1.1 1-.034.525-.009 1.054-.022 1.582-.004.188.107.175.232.175.756 0 1.514.007 2.27-.005.222-.005.295.047.27.28-.096.88-.177 1.762-.253 2.644-.017.2-.108.237-.287.234a79.278 79.278 0 0 0-1.792-.002c-.428.002-.386-.063-.386.375-.003 2.747-.006 5.495.006 8.242.001.29-.073.363-.36.357a79.668 79.668 0 0 0-3.076 0c-.289.006-.337-.091-.334-.349.008-1.383.002-2.766.002-4.15Z" fill="#677184"></path></g><defs><clipPath id="facebook_svg__a"><path fill="#fff" d="M0 0h30v29.999H0z"></path></clipPath></defs></svg>
                  </a>
                </li>

                <li>
                  <a href="mailto:sales@navkar.city">
                    <svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#email_svg__a)"><path d="M25.252 4.747c5.663 5.662 5.663 14.843 0 20.506s-14.844 5.663-20.507 0c-5.662-5.663-5.662-14.844 0-20.506 5.663-5.663 14.844-5.663 20.507 0Z" fill="#fff" stroke="#677184"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15 20.975H7.147c-.7 0-1.171-.474-1.171-1.178v-7.105c0-.604.042-.63.566-.35 2.454 1.311 4.911 2.617 7.36 3.938.738.397 1.447.399 2.184.002 2.44-1.315 4.89-2.617 7.334-3.923.08-.042.157-.088.238-.124.259-.115.357-.061.357.214.002 2.508.005 5.016-.001 7.524-.002.52-.548 1.002-1.104 1.003l-7.912-.001Z" fill="#677184"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.997 9.087h8.36c.224 0 .494-.047.598.22.103.266-.075.472-.241.662-.114.13-.258.217-.407.298-2.422 1.33-4.844 2.661-7.267 3.99-.69.378-1.387.38-2.077.002L6.695 10.27c-.269-.147-.499-.331-.627-.615-.141-.313-.012-.529.33-.564.098-.01.199-.006.298-.006 2.767.002 5.534.002 8.3.002Z" fill="#677184"></path></g><defs><clipPath id="email_svg__a"><path fill="#fff" d="M0 0h30v30H0z"></path></clipPath></defs></svg>
                  </a>
                </li>

                <li>
                  <a href="https://www.twitter.com/" target="_blank">
                    <svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#twitter_svg__a)"><path d="M29.5 15c0 8.008-6.492 14.5-14.5 14.5S.5 23.008.5 15 6.992.5 15 .5 29.5 6.992 29.5 15Z" fill="#fff" stroke="#677184"></path><path d="M12.266 22.938c6.652 0 10.29-5.512 10.29-10.29 0-.157 0-.315-.008-.465a7.41 7.41 0 0 0 1.808-1.875 7.34 7.34 0 0 1-2.078.57 3.615 3.615 0 0 0 1.59-2.002 7.324 7.324 0 0 1-2.295.877 3.6 3.6 0 0 0-2.64-1.14 3.617 3.617 0 0 0-3.615 3.615c0 .285.03.563.098.825a10.26 10.26 0 0 1-7.455-3.78 3.628 3.628 0 0 0-.488 1.815 3.6 3.6 0 0 0 1.613 3.008 3.553 3.553 0 0 1-1.635-.45v.045a3.62 3.62 0 0 0 2.902 3.547 3.605 3.605 0 0 1-1.635.06 3.611 3.611 0 0 0 3.375 2.513 7.27 7.27 0 0 1-5.355 1.492 10.076 10.076 0 0 0 5.528 1.635Z" fill="#677184"></path></g><defs><clipPath id="twitter_svg__a"><path fill="#fff" d="M0 0h30v30H0z"></path></clipPath></defs></svg>
                  </a>
                </li>

                <li>
                  <a href="https://wa.link/h1zf3n" target="_blank">
                    <svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#whatsapp_svg__a)"><path d="M29.5 14.998C29.5 23.004 23.007 29.5 15 29.5 6.99 29.5.5 23.004.5 14.998.5 6.993 6.99.5 15 .5c8.008 0 14.5 6.493 14.5 14.498Z" fill="#fff" stroke="#677184"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M23.68 12.908c-.978-4.056-4.468-6.823-8.688-6.87a9.072 9.072 0 0 0-1.712.175c-5.885 1.191-8.935 7.715-6.066 12.983.074.141.08.255.038.4-.381 1.39-.759 2.778-1.139 4.162-.062.228-.062.228.166.169 1.44-.378 2.878-.752 4.317-1.134a.417.417 0 0 1 .322.036c1.854.947 3.806 1.225 5.85.829 4.886-.947 8.078-5.915 6.912-10.75Zm-7.442 9.325a6.392 6.392 0 0 1-1.019.1c-1.565-.004-2.841-.355-4.015-1.065a.536.536 0 0 0-.457-.068c-.789.218-1.584.414-2.374.623-.166.05-.181.014-.14-.137.21-.75.407-1.497.623-2.24a.614.614 0 0 0-.08-.555c-1.624-2.609-1.556-5.86.261-8.272 1.888-2.514 4.454-3.542 7.524-2.887 3.026.638 4.955 2.59 5.664 5.6.969 4.116-1.825 8.209-5.987 8.901Z" fill="#677184"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17.323 19.205c-.317.013-.62-.06-.924-.141-2.043-.588-3.577-1.867-4.809-3.551-.465-.633-.896-1.289-1.04-2.077-.172-.947.1-1.748.805-2.404.224-.205.907-.296 1.18-.164.102.05.166.142.209.237.258.615.513 1.22.766 1.835.048.119.027.232-.026.35-.13.283-.338.51-.55.734-.16.164-.168.314-.05.51.723 1.202 1.721 2.076 3.027 2.6.195.077.342.05.471-.114.218-.269.447-.537.654-.815.14-.196.302-.223.502-.132.431.195.862.4 1.294.605.097.041.193.092.288.137.437.218.433.223.395.706-.073.942-.78 1.407-1.617 1.639-.185.049-.38.054-.575.045Z" fill="#677184"></path></g><defs><clipPath id="whatsapp_svg__a"><path fill="#fff" d="M0 0h30v30H0z"></path></clipPath></defs></svg>
                  </a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/" target="_blank">
                    <svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29.5 15c0 8.008-6.492 14.5-14.5 14.5S.5 23.008.5 15 6.992.5 15 .5 29.5 6.992 29.5 15Z" fill="#fff" stroke="#677184"></path><path d="M11.317 12.854H8.754v8.12h2.563v-8.12ZM18.32 12.777c-1.468 0-2.388.796-2.559 1.353v-1.274h-2.878c.036.676 0 8.12 0 8.12h2.879v-4.394c0-.244-.012-.488.063-.664.198-.488.623-.995 1.387-.995 1 0 1.454.751 1.454 1.851v4.202h2.907v-4.515c0-2.515-1.431-3.684-3.253-3.684ZM9.991 9.023c-.946 0-1.565.608-1.565 1.41 0 .787.601 1.408 1.53 1.408h.017c.964 0 1.564-.623 1.564-1.41-.019-.801-.6-1.408-1.546-1.408Z" fill="#677184"></path></svg>
                  </a>
                </li>


              </ul>
           </div>
         </div>
         <div class="col-lg-1"></div>
         <div class="col-lg-10">
           <div class="blog_detail_description mb-4">
              <div class="time-details mb-4">
                <span class="fs-4 me-3">{{date('M d,Y',strtotime($blog->created_at)) }}</span>
                <span class="category-name uppercase fs-4">NCR Real Estate</span>
              </div>

              <h1 class="fs-1">{{$blog->title}}</h1>
              <p class="author-name mt-4 text-start">by:Navkar City</p>

              <!--<div class="view-count w-100">
                <span class="eye-icon">
                  <svg width="1em" height="1em" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 .5C6 .5 1.73 3.61 0 8c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5C20.27 3.61 16 .5 11 .5ZM11 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5Zm0-8C9.34 5 8 6.34 8 8s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3Z" fill="#E4D8B6"></path></svg>
                </span> {{$blog->views}}
              </div>-->
              <div class="blog-data">
              	{!! ($blog->description) !!}
              </div>
                
           </div>
         </div>
       </div>
     </div>
     @if(isset($blog->tags) && !empty($blog->tags))
     <div class="col-md-4">
       <div class="tags-section">
         <h2 class="text-start mb-3">Tags</h2>
         <ul class="tags">
         	@php
            	$btags = explode(',',$blog->tags);                
            @endphp
           	@foreach($btags as $tag)            	
                <li><a href="#">{{$tag}}</a></li>                
            @endforeach
         </ul>
       </div>
     </div>
     @endif
   </div>

  </div>
</div>
<!--Overview section end here-->

@if(isset($latest_blogs) && $latest_blogs->count() > 0)
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
          @foreach($latest_blogs as $key => $blog)
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
                  <span class="post-date address-small me-3">{{ date('M d,Y',strtotime($blog->created_at)) }}</span>
                  <span class="address-small">{{$blog->title}}</span>
                </span>
                <span class="title-box">{{$blog->title}}</span>
                <span class="view-count">
                  <span class="eye-icon">
                    <svg width="1em" height="1em" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11 .5C6 .5 1.73 3.61 0 8c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5C20.27 3.61 16 .5 11 .5ZM11 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5Zm0-8C9.34 5 8 6.34 8 8s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3Z" fill="#E4D8B6"></path></svg>
                  </span> {{ $blog->views }}
                </span>
              </span>
            </a>
          </div>
          @endforeach
        </div>
        
      </div>
  </div>
</div>
<!--You may also like section end here-->

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

@endif

@endsection