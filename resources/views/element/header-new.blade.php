<!--header section start here-->
<header class="header-section">  
  <div class="top-header contact-header"> 
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

  </div>
</header>
<!--header section end here-->

<!--Menu-right sidebar-->
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
<!--Menu-right sidebar-->