@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')


<div id="" class="contact-info-section pt-30 pb-24">
  <div class="container">    
    <!--breadcrumbs end here-->
    <div class="section-title">
      <div class="line before"><img src="https://navkar.city/public/img/home/line_before.svg"></div>
      <h2 class="text-uppercase">Sitemap</h2>
      <div class="line after"><img src="https://navkar.city/public/img/home/line_after.svg"></div>
    </div>
    <div class="row">
        <div class="contat-details">
          <div class="col-4">
            <div class="address-list">
                  <ul class="footer-links wow fadeInUp">
                    <li><a href="{{url('/')}}">Home</a></li>
                      <li><a href="{{url('/contact-us')}}">Contact US</a></li>
                      <li><a href="{{url('/blogs')}}">Blogs</a></li>
                      <li><a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a></li>
                      <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                      <li><a href="{{url('/about-us')}}">About Us</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(20))}}">Our Story</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(22))}}">ESG</a></li> 
                  </ul>
              </div>
          </div>
          <div class="col-4">
              <div class="address-list">
                  <ul class="footer-links wow fadeInUp">
                    <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(14))}}">Design</a></li>
                      <li><a href="{{url('/our-team')}}">Our Team</a></li>
                      <li><a href="{{url('/projects')}}">Residential</a></li>
                      <li><a href="{{url('/news')}}">In The News</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(24))}}">Press Release</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(15))}}">NRI Corner</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(27))}}">Work With Us</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(23))}}">Disclosures under Regulation 46 & 62 of the SEBI</a></li>
                  </ul>
              </div>
            </div>
              <div class="col-4">
                <div class="address-list">
                  <ul class="footer-links wow fadeInUp">
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(16))}}">Investor Information</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(17))}}">Governance & Leadership</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(18))}}">Compliances</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(26))}}">NRI Faq's</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(25))}}">Loan for NRI's</a></li>
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(19))}}">Legal Information</a></li>  
                      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(21))}}">Financial</a></li>                        
                  </ul>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection