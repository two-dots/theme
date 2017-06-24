
 $(function() {
     $("img.lazy").lazyload({
         effect : "fadeIn"
     });

  });


$(".search-button").click(function(){
  
  $(".nav-item").addClass("hidden");
  $(".search-box").addClass("search-box-active");
  $(".search-box").focus();
  $(this).addClass("search-button-active");
});

$(".search-button-disabled").click(function(){
  $(".search-box").focus();
});

$(".search-box").blur(function(){
  
  $(".nav-item").removeClass("hidden");
  $(".search-button").removeClass("search-button-active");
  $(this).removeClass("search-box-active");
});



$(".control-search-button").click(function(){
  
  $(".control-shuffle").addClass("hidden");
  $(".control-archive").addClass("hidden");
  $(".control-close").removeClass("hidden");
  $(".control-search-box").addClass("control-search-box-active");
  $(".control-search-box").focus();
  $(this).addClass("search-button-active");
});


$(".control-search-box").blur(function(){
  
  $(".control-shuffle").removeClass("hidden");
  $(".control-archive").removeClass("hidden");
  $(".control-close").addClass("hidden");
  $(".control-search-button").removeClass("search-button-active");
  $(this).removeClass("control-search-box-active");
});