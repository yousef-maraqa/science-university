

window.addEventListener('scroll',function(){
  var header =document.querySelector('header');
  header.classList.toggle('sticky-full',window.scrollY>0);
})
 

// odometer
$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();
  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();
  return elementBottom > viewportTop && elementTop < viewportBottom;
};
$(window).on('resize scroll', function() {
    if ($('#degree').isInViewport()) {
        setTimeout(function(){
          $("#degree").html(90);
        }, 0)
    }
    if ($('#MBA').isInViewport()) {
        setTimeout(function(){
          $("#MBA").html(1);
        }, 0)
    }
    if ($('#university').isInViewport()) {
        setTimeout(function(){
          $("#university").html(100000);
        }, 0)
    }
});
//for swipping carousel on phones
$(".carousel").on("touchstart", function (event) {
  const xClick = event.originalEvent.touches[0].pageX;
  $(this).one("touchmove", function (event) {
    const xMove = event.originalEvent.touches[0].pageX;
    const sensitivityInPx = 5;

    if (Math.floor(xClick - xMove) > sensitivityInPx) {
      $(this).carousel("next");
    } else if (Math.floor(xClick - xMove) < -sensitivityInPx) {
      $(this).carousel("prev");
    }
  });
  $(this).on("touchend", function () {
    $(this).off("touchmove");
  });
});
 
//search icon animation
$(document).ready(function () {
  $(".search").each(function () {
    var self = $(this);
    var div = self.children("div");
    var placeholder = div.children("input").attr("placeholder");
    var placeholderArr = placeholder.split(/ +/);
    if (placeholderArr.length) {
      var spans = $("<div />");
      $.each(placeholderArr, function (index, value) {
        spans.append($("<span />").html(value + "&nbsp;"));
      });
      div.append(spans);
    }
    self.click(function () {
      self.addClass("open");
      setTimeout(function () {
        self.find("input").focus();
      }, 750);
    });
    $(document).click(function (e) {
      if (!$(e.target).is(self) && !jQuery.contains(self[0], e.target)) {
        self.removeClass("open");
      }
    });
  });
});

 
 //load more
 $( document ).ready(function () {
  $(".moreBox").slice(0, 3).show();
    if ($(".blogBox:hidden").length != 0) {
      $("#loadMore").show();
    }   
    $("#loadMore").on('click', function (e) {
      e.preventDefault();
      $(".moreBox:hidden").slice(0, 6).slideDown();
      if ($(".moreBox:hidden").length == 0) {
        $("#loadMore").fadeOut('slow');
      }
    });
  });
  var maxLength = 500;
$('textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars').text(length);
});

