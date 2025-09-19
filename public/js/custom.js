new WOW().init();

$('.header-slider').owlCarousel({
    margin:0,
    nav:true,
    autoplay:true,
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
           
        },
        600:{
            items:1,
        },
        1000:{
            items:1,
        }
    }
})

$('.gallery-slider').owlCarousel({
    margin:20,
    nav:false,
    autoplay:false,
    dots:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
           
        },
        600:{
            items:3,
        },
        1000:{
            items:3.8,
        }
    }
})

$('.recognized-slider').owlCarousel({
    margin:20,
    nav:true,
    loop:true,
    autoplay:true,
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            margin:0,
           
        },
        600:{
            items:3,
            margin:15,
        },
        1000:{
            items:4,
            margin:20,
        },
        1450:{
            items:6,
            margin:20,
        }
    }
})

$(document).ready(function(){
  $("#hide").click(function(){
    $(".schedule-section-box").hide();
  });
  $("#show").click(function(){
    $(".schedule-section-box").show();
  });
});


$(window).scroll(function(){
     if ($(this).scrollTop() > 80)
     {
      $('.header-nav').addClass("sticky");
     }
     else
     {
      $('.header-nav').removeClass("sticky");
     }

});



