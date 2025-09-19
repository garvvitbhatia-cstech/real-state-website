@php
$siteUrl = env('SITE_URL');
$page_url = request()->route()->getActionMethod();
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::asset('public/favicon.jpg') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="robots" content="@yield('robots')" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sweet-alert.css') }}" rel="stylesheet" />
    <link rel="canonical" href="https://navkar.city/" />
    <script src="{{ asset('public/admin/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HBCZLLV9VD"></script>
    
    <script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "Product",
	  "name": "House Sale Jodhpur | Property In Jodhpur | Navkar City",
	  "image": "https://navkar.city/logo.png",
	  "description": "Find your dream home in Jodhpur! Explore houses for sale in Navkar City with top amenities. Invest in prime property in Jodhpur today. Enquire now!",
	  "brand": {
		"@type": "Brand",
		"name": "Navkar City"
	  },
	  "aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "5",
		"reviewCount": "120"
	  },
	  "review": {
		"@type": "Review",
		"author": {
		  "@type": "Person",
		  "name": "Rahul Sharma"
		},
		"reviewRating": {
		  "@type": "Rating",
		  "ratingValue": "5",
		  "bestRating": "5"
		},
		"reviewBody": "Navkar City offers excellent amenities and a great living experience. Highly recommended for home buyers in Jodhpur!"
	  }
	}
	</script>

    
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'G-HBCZLLV9VD');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PW793MHN');</script>
    <!-- End Google Tag Manager -->
    </head>
    <body data-base-url="{{ url('/') }}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PW793MHN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

	@if($page_url == 'contactUs' || $page_url == 'projects' || $page_url == 'privacyPolicy' || $page_url == 'amenities' || $page_url == 'innerPages' || $page_url == 'gallery' || $page_url == 'eventDetails' || $page_url == 'siteMap' || $page_url == 'unitPlan' || $page_url == 'virtualTour')
    	
        @include('element.header-new')
        
    @else
    	
        @include('element.header')
        
    @endif    
        
    @yield('content')
    
    @if($page_url != 'unitPlan')
    @include('element.footer')
    @endif

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('public/js/sweet-alert.min.js') }}" ></script>
    <script src="{{ asset('public/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script>
</body>

</html>