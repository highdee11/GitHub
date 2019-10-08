jQuery(document).ready(function(){


 var $chatbox = $('.chatbox'),
    $chatboxTitle = $('.chatbox__title'),
    $chatboxTitleClose = $('.chatbox__title__close'),
    $chatboxCredentials = $('.chatbox__credentials');
    $chatboxTitle.on('click', function() {
        $chatbox.toggleClass('chatbox--tray');
    });
    $chatboxTitleClose.on('click', function(e) {
        e.stopPropagation();
        $chatbox.addClass('chatbox--closed');
    });
    $chatbox.on('transitionend', function() {
        if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
    });
    $chatboxCredentials.on('submit', function(e) {
        e.preventDefault();
    $chatbox.removeClass('chatbox--empty');
});


$(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});

  // loader
  setTimeout(function(){ 

  $('.loader').fadeOut(); }, 500);


  // owl-carousel
  $('.profile-slider .owl-carousel').owlCarousel({
    'items': 3,
    'autoplay': true,
    'loop': true,
    'dots': true,
    'nav': true,
    'margin': 15,
    'pagination': true,
    'navText': ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],

    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        800:{
            items:2
        },
        1000:{
            items:3
        }
    }
  }); 



    // owl-carousel
  $('.cover-modal .owl-carousel').owlCarousel({
    'items': 4,
    'autoplay': true,
    'loop': true,
    'dots': true,
    'nav': true,
    'margin': 15,
    'pagination': true,
    'navText': ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
  }); 
  

  wow.init();


// scroll-Top

$(window).scroll(function(){
   if($(this).scrollTop() > 500){
    $('.scrolltotop').fadeIn();
   }else{
    $('.scrolltotop').fadeOut();
   }
   
   
  });
   
  $('.scrolltotop').click(function(){
    $('html,body').animate({scrollTop:0}, 1000);
});


$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
  $("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
  $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
  $("#profile-img").removeClass();
  $("#status-online").removeClass("active");
  $("#status-away").removeClass("active");
  $("#status-busy").removeClass("active");
  $("#status-offline").removeClass("active");
  $(this).addClass("active");
  
  if($("#status-online").hasClass("active")) {
    $("#profile-img").addClass("online");
  } else if ($("#status-away").hasClass("active")) {
    $("#profile-img").addClass("away");
  } else if ($("#status-busy").hasClass("active")) {
    $("#profile-img").addClass("busy");
  } else if ($("#status-offline").hasClass("active")) {
    $("#profile-img").addClass("offline");
  } else {
    $("#profile-img").removeClass();
  };
  
  $("#status-options").removeClass("active");
});

function newMessage() {
  message = $(".message-input input").val();
  if($.trim(message) == '') {
    return false;
  }
  $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
  $('.message-input input').val(null);
  $('.contact.active .preview').html('<span>You: </span>' + message);
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});


document.querySelectorAll('input[type=color]').forEach(function(picker) {

  var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
    codeArea = document.createElement('span');

  codeArea.innerHTML = picker.value;
  targetLabel.appendChild(codeArea);

  picker.addEventListener('change', function() {
    codeArea.innerHTML = picker.value;
    targetLabel.appendChild(codeArea);
  });
});





});

