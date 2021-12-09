(function($) {

/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

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


//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
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
}




if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}



/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    new WOW().init();



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
          breakpoint:768,
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
 // if (windowWidth > 767) {

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
// }


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