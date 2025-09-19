<!--header section start here-->
<header class="header-section">  
  <div class="top-header"> 
      <div class="container">
        <div class="header-topbar">
          <div class="header-logo">
            <a href="{{url('/')}}"><img src="{{ asset('public/img/home/navkar_white_logo.png') }}"></a>
          </div>

          <div class="top-right-icons">
            <a href="tel:8504000222" class="head-icon"><img src="{{ asset('public/img/home/phone.svg') }}"></a>
            <a class="head-icon pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img src="{{ asset('public/img/home/more-menu.svg') }}"></a>
          </div>
        </div>
      </div>

    <!--Navbar start here-->
    <div class="navbar-section header-nav">
      <nav class="navbar navbar-expand-lg">
        <div class="container">       
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('/')}}">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#location">Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#plans">Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/virtual-tour')}}">Virtual Tour</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#amenities">Amenities</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!--Navbar end here-->

  </div>
  
	@if($page_url == 'ourTeam')
    	
        @php $our_team = Helper::getBannersByPage('Our Team'); @endphp
        <!--------------our team---------------->
        @if(isset($our_team) && $our_team->count()>0)
        <div class="header-slider owl-carousel">
            @foreach($our_team as $key => $banner)
            <div class="">
              <img src="{{ asset('public/img/blogs/'.$banner->banner) }}">
            </div>
            @endforeach
          </div>
          <!--banner content start here-->
        
        @endif

    @elseif($page_url == 'aboutUs')
  		
        @php $about_us_banner = Helper::getBannersByPage('About Us'); @endphp
        
        <!--------------about us--------->
       @if(isset($about_us_banner) && $about_us_banner->count()>0)
        <div class="header-slider owl-carousel">
            @foreach($about_us_banner as $key => $banner)
            <div class="">
              <img src="{{ asset('public/img/blogs/'.$banner->banner) }}">
            </div>
            @endforeach
          </div>
          <!--banner content start here-->
        
        @endif           
          
      @elseif($page_url == 'blog')
      
      
      @elseif($page_url == 'unitPlan')
      
      
      @elseif($page_url == 'termsAndConditions')
      
      @elseif($page_url == 'virtualTour')
      
      
      @elseif($page_url == 'privacyPolicy')
      
      
      @elseif($page_url == 'news')
      
      
      @elseif($page_url == 'projects')
      
            
      @elseif($page_url == 'contactUs')
      
      
      @elseif($page_url == 'product')
      
      
      @elseif($page_url == 'index')
      
      
      @elseif($page_url == 'amenities')
      
      
      @elseif($page_url == 'gallery')
      
      
      @elseif($page_url == 'innerPages')
      
      
      @else
      	<!-----------index------------------->
        <div class="header-slider owl-carousel">
            <div class="">
              <img src="{{ asset('public/img/home/home_banner.webp') }}">
            </div>
        
            <div class="">
              <img src="{{ asset('public/img/home/home_banner.webp') }}">
            </div>
        
        
            <div class="">
              <img src="{{ asset('public/img/home/home_banner.webp') }}">
            </div>
          </div>
          <!--banner content start here-->
        
          <div class="property-details-info">
            <h1>Godrej Park Retreat</h1>
            <h4>Sarjapur Road, Bengaluru</h4>
            <address class="d-flex flex-wrap align-items-center">
              <div class="address-single mt-4">
                <b>Price</b>
                <p class="ms-2 inline">Available on Request</p>
              </div> 
              <div class="separator mt-2">
                <span>|</span>
              </div>
              <div class="address-single mt-4">
                <span><b>Possession</b>June 2028</span>
              </div>
              <div class="separator mt-2">
                <span>|</span>
              </div>
              <div class="address-single mt-4">
                <span>1 BHK</span>
              </div>
            </address>
          </div>
          <!--banner content end here-->
        
          <!--add and share button section start here-->
          <div class="fab-container ">
            <div class="shadow">
            </div>
            <div class="fab">
              <svg width="1em" height="1em" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M77.169 39c0 21.126-17.108 38.25-38.21 38.25C17.858 77.25.75 60.126.75 39S17.858.75 38.96.75C60.06.75 77.168 17.874 77.168 39Z" stroke="url(#fab_svg__a)" stroke-width="1.5"></path>
                <ellipse cx="38.959" cy="39" rx="27.971" ry="28" fill="url(#fab_svg__b)"></ellipse>
                <path transform="rotate(90 49.95 28)" fill="url(#fab_svg__c)" d="M49.949 28h21.977v22H49.949z"></path>
                <mask id="fab_svg__e" style="mask-type: alpha;" maskUnits="userSpaceOnUse" x="27" y="28" width="23" height="22">
                  <path transform="rotate(90 49.95 28)" fill="url(#fab_svg__d)" d="M49.949 28h21.977v22H49.949z"></path>
                </mask>
                <g mask="url(#fab_svg__e)"><path fill="#464D72" d="m38.96 23.445 15.541 15.557-15.54 15.557-15.54-15.557z"></path></g>
                  <defs>
                    <linearGradient id="fab_svg__a" x1="2.03" y1="51.686" x2="54.468" y2="92.847" gradientUnits="userSpaceOnUse"><stop stop-color="#008FFF"></stop><stop offset="0.507" stop-color="#fff" stop-opacity="0.06"></stop>
                    <stop offset="0.686" stop-color="#F9BDD8" stop-opacity="0.391"></stop>
                    <stop offset="1" stop-color="#ED4391"></stop></linearGradient>
                    <linearGradient id="fab_svg__b" x1="0.456" y1="38.015" x2="38.386" y2="77.242" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#fff"></stop><stop offset="1" stop-color="#E3F0F8"></stop>
                    </linearGradient>
                    <pattern id="fab_svg__c" patternContentUnits="objectBoundingBox" width="1" height="1">
                      <use xlink:href="#fab_svg__f" transform="scale(.005)"></use>
                    </pattern>
                    <pattern id="fab_svg__d" patternContentUnits="objectBoundingBox" width="1" height="1">
                      <use xlink:href="#fab_svg__f" transform="scale(.005)"></use></pattern>
                      <image id="fab_svg__f" width="200" height="200" xlink:href="data:image/png;base64,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"></image>
                    </defs>
              </svg>
            </div>
        
            <ul class="list icon-list flex-column">
        
              <li class="mobile-hide">
                <a class="pointer d-flex align-items-center justify-content-end">
                  <span class="text-right uppercase">Share</span>
                  <div class="share-icon ms-2">
                    <img src="{{ asset('public/img/home/share.svg') }}">
                  </div>
                </a>
              </li>
        
              <li class="mobile-hide">
                <a class="pointer d-flex align-items-center justify-content-end">
                  <span class="cursor-pointer text-right uppercase">Schedule a Visit</span>
                  <div class="icon ms-2">
                    <img src="{{ asset('public/img/home/add-calendar.svg') }}">
                  </div>
                </a>
              </li>
        
              <li>
                  <a target="_blank" class="pointer d-flex align-items-center justify-content-end" href="https://api.whatsapp.com/send?phone=#">
                    <span class="text-right uppercase">WhatsApp</span>
                    <div class="icon ms-2">
                      <img src="{{ asset('public/img/home/whats-app.svg') }}">
                    </div>
                  </a>
              </li>
        
              <li class="divider mobile-hide">
                <a class="pointer d-flex align-items-center justify-content-end">
                  <span class="text-right uppercase">EMI Calculator</span>
                  <div class="icon ms-2">
                    <img src="{{ asset('public/img/home/calculator.svg') }}">
                  </div>
                </a>
              </li>
            </ul>
        
          </div>
          <!--add and share button section end here-->
          
    @endif  
      

</header>
<!--header section end here--->


<!--Menu-right sidebar--->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
  </div>
    <ul class="menu-box">
      <li><a href="{{url('/')}}">Home</a></li>
      <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('/projects')}}">Residential</a></li> 
        </ul>
      </li>-->
      <!--<li><a href="#">Home Ally</a></li>-->
      <?php /*?><li class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Investors</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(21))}}">Financials</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(16))}}">Investor Information</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(17))}}">Governance & Leadership</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(18))}}">Compliances</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(22))}}">ESG</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(23))}}">Disclosures under Regulation 46 & 62 of the SEBI</a></li>
        </ul>
      </li><?php */?>
     <?php /*?><li class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Media Center</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('/news')}}">News</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(24))}}">Press Release</a></li>
          <li><a class="dropdown-item" href="#">Media Gallery</a></li>
        </ul>
      </li><?php */?>

       <?php /*?><li class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Nri Corner</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(19))}}">Legal Information</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(25))}}">LOAN FOR NRIs</a></li>
          <li><a class="dropdown-item" href="{{url('/pages/'.Helper::getInnerPageSlug(26))}}">NRI FAQs</a></li>
          <li><a class="dropdown-item" href="#">Our International offices</a></li>
        </ul><?php */?>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Investor Section</a>
        <ul class="dropdown-menu">
          <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(15))}}">NRI Corner</a></li>
          <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(16))}}">Investor Information</a></li> 
          <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(17))}}">Governance & Leadership</a></li> 
          <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(18))}}">Compliances</a></li> 
        </ul>
      </li>

      <li><a href="{{url('/virtual-tour')}}">Virtual Tour</a></li>
      <li><a href="{{url('/blogs')}}">Blogs</a></li>
      <li><a href="{{url('/gallery/navkar-city')}}">Gallery</a></li>
      <li><a href="{{url('/amenities/navkar-city')}}">Amenities</a></li>
      <?php /*?><li><a href="{{url('/pages/'.Helper::getInnerPageSlug(20))}}">OUR STORY</a></li><?php */?>
       
      <li><a href="{{url('/contact-us')}}">Enquire</a></li>
      <li><a href="javascript:void(0)">Schedule a site visit</a></li>
      <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(27))}}">Work with Us</a></li>
      <li><a href="{{url('/contact-us')}}">Reach Us</a></li>
    </ul>
</div>
<!--Menu-right sidebar--->