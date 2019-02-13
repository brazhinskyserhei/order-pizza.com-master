$(document).ready(function() {


  $(".carousel").carousel({
    interval: 5000
  });
  $('#myCarousel').on('slide.bs.carousel', function() {


    $(".myCarousel-target.active").removeClass("active");

    $('#myCarousel').on('slid.bs.carousel', function() {

      var to_slide = $(".carousel-item.active").attr("data-slide-no");

      $(".nav-indicators li[data-slide-to=" + to_slide + "]").addClass("active");

    });
  });


 $(".carousel1").carousel({
    interval: 500
  });
  $('#myCarousel-goods').on('slide.bs.carousel', function() {


    $(".myCarousel-target.active").removeClass("active");

    $('#myCarousel-goods').on('slid.bs.carousel', function() {

      var to_slide = $(".carousel-item.active").attr("data-slide-no");

      $(".nav-indicators li[data-slide-to=" + to_slide + "]").addClass("active");

    });
  });


});