@php
	$setting = Helper::settings();    
@endphp
<!--Footer Section start here-->
<footer class="footer-section pt-20 wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-6 wow fadeInUp">
        <div class="row"> 
          <div class="col-lg-6 about-us-section wow fadeInUp">
            <h5>About Us</h5>
            <div style="font-size:1rem" class="mt-4">{!! $setting->footer_info !!}</div	>
          </div>
          <div class="col-lg-6 wow fadeInUp">
          	<a style="color:#000" href="{{url('/pages/'.Helper::getInnerPageSlug(27))}}"><h5>Work With Us</h5></a>
            <ul class="footer-links about-us-section wow fadeInUp">
              <li><a style="font-size:17px;font-weight:500;color:#000;" href="{{url('/contact-us')}}">ENQUIRE</a></li>
              <li><a style="font-size:17px;font-weight:500;color:#000;" onclick="siteVisit()" href="javascript:void(0)">SCHEDULE A SITE VISIT</a></li>        
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-6 wow fadeInUp">
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <h5>Our Story</h5>
            <ul class="footer-links wow fadeInUp">
              <li><a href="{{url('/about-us')}}">About Us</a></li>
              <!--<li><a href="{{url('/pages/'.Helper::getInnerPageSlug(12))}}">Management</a></li>
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(13))}}">Sustainability</a></li>
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(14))}}">Design</a></li>-->
              <li><a href="{{url('/our-team')}}">Our Team</a></li>
              <li><a href="{{url('/blogs')}}">Blogs</a></li>
            </ul>
          </div>

          <!--<div class="col-lg-3 col-md-6 wow fadeInUp">
            <h5>Projects</h5>
            <ul class="footer-links wow fadeInUp">
              <li><a href="{{url('/projects')}}">Residential</a></li>            
            </ul>
          </div>-->

          <!--<div class="col-lg-3 col-md-6 wow fadeInUp">
            <h5>Media Center</h5>
            <ul class="footer-links wow fadeInUp">
              <li><a href="{{url('/news')}}">In The News</a></li>
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(24))}}">Press Release</a></li> 
              <li><a href="#">Media Gallery</a></li>              
            </ul>
          </div>-->
          
          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <h5>Policies</h5>
            <ul class="footer-links wow fadeInUp">
              <li><a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a></li>
              <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp">
            <h5>Investor Section</h5>
            <ul class="footer-links wow fadeInUp">
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(15))}}">NRI Corner</a></li>
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(16))}}">Investor Information</a></li> 
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(17))}}">Governance & Leadership</a></li> 
              <li><a href="{{url('/pages/'.Helper::getInnerPageSlug(18))}}">Compliances</a></li> 
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row wow fadeInUp pb-4">
      <div class="col-lg-6">
        <div class="follow-us d-flex align-items-center">
          <span class="mt-5 me-5 text-uppercase">Follow us on</span>
          <ul class="social-links-list d-flex align-items-center">
            <li class="mt-5">
              <a class="socail-icon" rel="noreferrer" href="https://www.facebook.com/NavkarCityatJodhpur" target="_blank">
                <svg width="35px" height="35px" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="facebook"><path d="M16.833 17.375h3.334l2.833-5h-6.167v-2.5c0-1.288 0-2.5 2.667-2.5H22V3c-.435-.054-2.576 0-4.31 0-3.62 0-6.19 2.071-6.19 5.875v3.5H7v5h4.5V28h5.333V17.375Z" fill="#303030"></path>
                </svg>
              </a>
            </li>
            <!--<li class="mt-5 ms-4">
              <a target="_blank" class="socail-icon" href="#">
                <svg width="18px" height="18px" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="twitter"><path d="M29.554 6.171a11.66 11.66 0 0 1-3.344.917 5.837 5.837 0 0 0 2.56-3.223 11.625 11.625 0 0 1-3.697 1.413 5.825 5.825 0 0 0-9.923 5.312A16.535 16.535 0 0 1 3.148 4.505a5.82 5.82 0 0 0-.788 2.928 5.825 5.825 0 0 0 2.59 4.847 5.81 5.81 0 0 1-2.637-.728v.075a5.825 5.825 0 0 0 4.67 5.71 5.866 5.866 0 0 1-2.63.1 5.826 5.826 0 0 0 5.44 4.042 11.685 11.685 0 0 1-7.232 2.494c-.464 0-.928-.027-1.39-.081a16.47 16.47 0 0 0 8.925 2.616c10.713 0 16.569-8.873 16.569-16.568 0-.25-.006-.502-.017-.752a11.839 11.839 0 0 0 2.903-3.013l.003-.004Z" fill="#303030"></path>
                </svg>
              </a>
            </li>-->

            <li class="mt-5 ms-4">
              <a target="_blank" class="socail-icon" href="https://www.instagram.com/navkarcity/">
                <svg width="35px" height="35px" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="instagram"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.331 1.333c1.466-.068 1.934-.083 5.669-.083 3.735 0 4.203.016 5.668.083 1.465.066 2.465.3 3.34.638a6.764 6.764 0 0 1 2.434 1.588c.7.686 1.24 1.516 1.585 2.433.34.875.573 1.875.64 3.338.068 1.469.083 1.936.083 5.67 0 3.735-.016 4.203-.082 5.669-.067 1.462-.3 2.462-.64 3.337a6.744 6.744 0 0 1-1.585 2.436 6.742 6.742 0 0 1-2.436 1.585c-.875.34-1.875.573-3.337.64-1.468.068-1.935.083-5.67.083s-4.203-.016-5.669-.082c-1.462-.067-2.462-.3-3.337-.64a6.745 6.745 0 0 1-2.436-1.585 6.74 6.74 0 0 1-1.587-2.436c-.339-.875-.571-1.875-.639-3.337-.067-1.469-.082-1.936-.082-5.67 0-3.735.016-4.203.083-5.668.066-1.465.3-2.465.638-3.34A6.745 6.745 0 0 1 3.56 3.558 6.74 6.74 0 0 1 5.992 1.97c.875-.339 1.875-.571 3.338-.639h.001Zm11.225 2.474c-1.45-.066-1.885-.08-5.556-.08-3.671 0-4.106.014-5.556.08-1.342.062-2.069.286-2.554.474A4.27 4.27 0 0 0 5.309 5.31 4.265 4.265 0 0 0 4.28 6.89c-.188.485-.412 1.212-.473 2.554-.067 1.45-.08 1.885-.08 5.556 0 3.671.013 4.106.08 5.556.06 1.341.285 2.069.473 2.554.22.596.572 1.137 1.028 1.581.444.457.985.808 1.581 1.028.485.188 1.212.412 2.554.473 1.45.067 1.883.08 5.556.08 3.672 0 4.106-.013 5.556-.08 1.341-.06 2.069-.285 2.554-.473a4.27 4.27 0 0 0 1.581-1.028 4.269 4.269 0 0 0 1.028-1.581c.188-.485.412-1.212.473-2.554.067-1.45.08-1.885.08-5.556 0-3.671-.013-4.106-.08-5.556-.06-1.342-.285-2.069-.473-2.554a4.27 4.27 0 0 0-1.028-1.581A4.267 4.267 0 0 0 23.11 4.28c-.485-.188-1.212-.412-2.554-.473ZM13.244 19.24a4.587 4.587 0 1 0 3.301-8.558 4.588 4.588 0 0 0-3.301 8.558Zm-3.242-9.237a7.068 7.068 0 1 1 9.996 9.996 7.068 7.068 0 0 1-9.996-9.996Zm13.633-1.017a1.672 1.672 0 1 0-2.296-2.433 1.672 1.672 0 0 0 2.296 2.433Z" fill="#303030"></path>
                </svg>
              </a>
            </li>

            <li class="mt-5 ms-4">
              <a target="_blank" class="socail-icon relative" href="https://www.youtube.com/@navkarcity4784">
                <img src="{{ asset('public/img/home/youtube.webp') }}" class="youtube-box" style="width:35px;">
              </a>
            </li>
            
            <!--<li class="mt-5 ms-4">
              <a target="_blank" class="socail-icon relative" href="#">
                <img src="{{ asset('public/img/home/linkedin.png') }}" class="youtube-box" style="width:18px;">
              </a>
            </li>-->
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <?php /*?><ul class="market-links-list d-flex align-items-center justify-content-end gap-4 mt-4">
          <li><a href="#"><img src="{{ asset('public/img/home/app-store.webp') }}"></a></li>
          <li><a href="#"><img src="{{ asset('public/img/home/google-pay.webp') }}"></a></li>
        </ul><?php */?>
      </div>
    </div>
  </div>

  <div class="secondary-footer py-4 wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <a href="{{url('/')}}"><img style="max-width: 60px;" src="{{ asset('public/img/home/navkar_brown_logo.png') }}" class="w-40"></a>
        </div>
        <div class="col-lg-8 foot-bottom-links">
          <p class="copyright-section ml-auto">{!! $setting->footer_content !!}</p>
          <a href="{{url('/pages/'.Helper::getInnerPageSlug(28))}}" class="ms-4 me-4">Disclaimer</a>
          <a href="{{url('/site-map')}}" class="">Sitemap</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!---Mobile view only--->

<section class="sticky-footer">
  <div class="container mx-auto d-flex px-4">
    <div class="d-flex w-full flex-column align-items-center justify-content-center">
      <ul class="list d-flex w-full justify-content-between">

        <li id="footer-whatsapp">
          <a target="_blank" class="d-flex cursor-pointer flex-column align-items-center p-4" href="https://wa.link/h1zf3n">
            <div class="icon">
              <svg width="1em" height="1em" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 0a9.935 9.935 0 0 1 7.07 2.93A9.935 9.935 0 0 1 20 10a9.935 9.935 0 0 1-2.93 7.072A10.026 10.026 0 0 1 10.01 20c-1.773 0-3.529-.47-5.056-1.363l-3.89 1.042a.607.607 0 0 1-.743-.744l1.042-3.889A10.05 10.05 0 0 1 .058 8.912a10.026 10.026 0 0 1 2.87-5.983A9.935 9.935 0 0 1 10 0ZM5.367 17.468a8.745 8.745 0 0 0 10.845-1.255c3.426-3.426 3.426-9 0-12.425-3.425-3.426-9-3.426-12.425 0a8.745 8.745 0 0 0-1.255 10.845.608.608 0 0 1 .071.478l-.837 3.122 3.123-.836a.61.61 0 0 1 .478.07Zm8.576-6.488 1.06 1.06c.426.426.528 1.068.253 1.597-.48.93-1.383 1.54-2.54 1.718-.24.038-.487.056-.737.056-1.707 0-3.586-.851-5.064-2.329C5.221 11.388 4.35 9.165 4.642 7.28c.179-1.156.789-2.058 1.718-2.54a1.365 1.365 0 0 1 1.597.254l1.06 1.06a1.372 1.372 0 0 1-.189 2.103l-.532.37c.09.5.343 1.473 1.022 2.152.68.679 1.65.932 2.153 1.021l.369-.532a1.372 1.372 0 0 1 2.103-.188Zm-1.412 3.175c.54-.084 1.264-.338 1.647-1.076a.157.157 0 0 0-.034-.18l-1.06-1.06a.157.157 0 0 0-.128-.047.157.157 0 0 0-.118.069l-.581.837a.608.608 0 0 1-.539.26c-.08-.005-1.982-.144-3.259-1.42-1.276-1.277-1.415-3.179-1.42-3.26a.607.607 0 0 1 .26-.538l.837-.58a.157.157 0 0 0 .069-.119.157.157 0 0 0-.047-.128l-1.06-1.06a.165.165 0 0 0-.115-.05.14.14 0 0 0-.065.016c-.738.383-.993 1.107-1.076 1.647-.23 1.486.528 3.353 1.932 4.757 1.404 1.404 3.27 2.162 4.757 1.932Z" fill="#6A7085"></path></svg>
            </div>
            <span class="text-right uppercase">WhatsApp</span>
          </a>
        </li>

        <li id="footer-contactus">
          <div onclick="window.location.href='{{url('/contact-us')}}'" class="d-flex cursor-pointer flex-column align-items-center p-4">
            <div class="icon">
              <svg width="1em" height="1em" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 4V3a2 2 0 0 0-2-2H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-.188" stroke="#6A7085" stroke-width="1.2"></path><path d="m9.597 12.886-1.602.333a.344.344 0 0 1-.338-.35l.3-1.68a.34.34 0 0 1 .103-.239l5.246-5.065a.344.344 0 0 1 .379-.07c.042.019.183.153.11.078l1.298 1.343a.344.344 0 0 1-.008.49L9.838 12.79a.338.338 0 0 1-.242.095ZM12.604 7.045l1.389 1.438" stroke="#6A7085" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path stroke="#6A7085" stroke-width="1.2" stroke-linecap="round" d="M3.6 4.4h4.8M3.6 7.4h3.8M3.6 10.4h1.8"></path></svg>
            </div>
            <span class="text-right uppercase">Contact Us</span>
          </div>
        </li>

        <li id="footer-callus">
          <a href="tel:8504000222" class="d-flex cursor-pointer flex-column align-items-center p-4">
            <div class="icon">
              <svg width="1em" height="1em" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.337 7.76a6.27 6.27 0 0 0 2.925 2.917.6.6 0 0 0 .593-.045L10.73 9.38a.592.592 0 0 1 .57-.053l3.51 1.508a.592.592 0 0 1 .36.622A3.6 3.6 0 0 1 11.6 14.6 10.2 10.2 0 0 1 1.4 4.4 3.6 3.6 0 0 1 4.542.83a.593.593 0 0 1 .623.36l1.507 3.517a.6.6 0 0 1-.045.563L5.375 7.175a.6.6 0 0 0-.038.585v0Z" stroke="#6A7085" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <span class="text-right uppercase">Call Us</span>
          </a>
        </li>

      </ul>

    </div>
  </div>

  <div class="schedule-visit "></div>
</section>

<script type="text/javascript">
	function siteVisit(){
		$('.schedule-section-box').toggle();
		//$('#offcanvasRight').removeClass('show');
	}
</script>
<!--Footer section end here-->