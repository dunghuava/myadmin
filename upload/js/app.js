$('.slick-khuvuc').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow:"<span class='btn_arrow btn_prev fa fa-angle-left' aria-hidden='true'></span>",
    nextArrow:"<span class='btn_arrow btn_next fa fa-angle-right' aria-hidden='true'></span>",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


$('.project-slider').slick({
      infinite: true,
      loop:true,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      asNavFor:'.project-small-slider',
      prevArrow:"<span class='btn_arrow btn_prev fa fa-angle-left' aria-hidden='true'></span>",
      nextArrow:"<span class='btn_arrow btn_next fa fa-angle-right' aria-hidden='true'></span>",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
});
$('.project-small-slider').slick({
      slidesToShow: 8,
      asNavFor:'.project-slider',
      slidesToScroll: 1,
      autoPlay:true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows:false

          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
});

$('#mycollapse .item-collapse .head-collapse').click(function (e) { 
    $(this).toggleClass('opened');
    $(this).parent('.item-collapse').find('.content-collapse').slideToggle();
});

$('#backtotop').click(function (e) { 
   $('html,body').animate({ scrollTop: 0 }, 500);
});
window.onscroll = function() {
  if (window.pageYOffset >200){
    $('#backtotop').show();
  }else{
    $('#backtotop').hide();
  }
}
