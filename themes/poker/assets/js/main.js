(function($) {
var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
	$('#mobile-nav').slideToggle(300);
});
	
$('.navbar-toggle').on('click', function(){
  $('#mobile-nav').slideToggle(300);
});

if( $('.hamburger-icon').length ){
  $('.hamburger-icon').click(function(){
    $('body').toggleClass('allWork');
  });
}
if(windowWidth <=991){
    if( $('ul > li.menu-item-has-children').length ){
      $('ul > li.menu-item-has-children').click(function(){
       $(this).find('.sub-menu').slideToggle(300);
       // $(this).parent().siblings().find('.sub-menu').slideUp(300);
       // $(this).siblings().find('.sub-menu-arrow').removeClass('sub-menu-arrow');
       $(this).toggleClass('sub-menu-arrow');
       $(this).siblings().find('.sub-menu-arrow').removeClass('sub-menu-arrow');
     });
    }
}


//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};

$('.toggle-btn').on('click', function(){
  $(this).toggleClass('menu-expend');
  $('.toggle-bar ul').slideToggle(500);
});

if( $('.newsSlider').length ){
  $('.newsSlider').slick({
    dots:false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 2000,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('.fl-prev-next .fl-prev'),
    nextArrow: $('.fl-prev-next .fl-next'),
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false
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
}

function attrvaluupdate(){
  var windowsize =  $(window).width();
  
  var containerwidth = $(".container").width();

  var marginleft = ((windowsize-containerwidth)/2);
  $('.news-sec-cntlr').css({
    "padding-left":marginleft,
  });
  $('.fl-prev-next').css({
    "right":marginleft,
  })
}
attrvaluupdate();
$(window).resize(function(){
    attrvaluupdate();
});

function bannerheight(){
  var windowWidth = $(window).width();
  var windowHeight = $(window).height();
  var windowHeight2 = 0;
  if( windowHeight > 625 ){
    windowHeight2 = 625;
  }else{
    windowHeight2 = windowHeight;
  }
  if (windowWidth > 767){
    $('.hm-bnr-cntlr').css('height', windowHeight2);
  }
}
bannerheight();

})(jQuery);