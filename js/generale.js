/***************************/
/*   Jquery constructeur   */
/***************************/
// Extend de animateCss
$.fn.extend({
  animateCss: function(animationName, callback) {
    var animationEnd = (function(el) {
      var animations = {
        animation: 'animationend',
        OAnimation: 'oAnimationEnd',
        MozAnimation: 'mozAnimationEnd',
        WebkitAnimation: 'webkitAnimationEnd',
      };

      for (var t in animations) {
        if (el.style[t] !== undefined) {
          return animations[t];
        }
      }
    })(document.createElement('div'));

    this.addClass('animated ' + animationName).one(animationEnd, function() {
      $(this).removeClass('animated ' + animationName);
      if (typeof callback === 'function') callback();
    });

    return this;
  },
});


/***************************/
/*     Document ready      */
/***************************/
$(document).ready(function(){

	// TweenLite.to("#header-side", 2, {backgroundColor:"red"});

  // Loader
  $("#loader-container").animateCss('fadeOut',function(){
    $("#loader-container").hide();
    $( ".intro-animated" ).css("display","inline-block");
    $( ".intro-animated" ).animateCss('fadeInUp');
  });

  $( document ).ajaxStart(function() {
    $("#loader-container").animateCss('fadeIn');
  });

  $( document ).ajaxStop(function() {
    $("#loader-container").animateCss('fadeOut',function(){
      $("#loader-container").hide();
    });
  });
  // Fin loader

  $(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 400) {
      $("#menu").css("background-color","#1db1c8");
      $("#menu").css("padding","15px");
      $('#menu li a .after').toggleClass('changed');
    } else {
      $("#menu").css("background-color","transparent");
      $("#menu").css("padding","40px");
      $('#menu li a .after').toggleClass('changed');
    }
  });  

	$(".metro").hover(function() {
	  	$("article",this).animateCss('bounceIn');
	});

});



/***************************/
/*       Fonctions         */
/***************************/
$(".btn-retour").on("click",function(){
	history.back();
});

function validate(evt) { // Pour forcer l'utilisateur a taper que des chiffres 
console.log('cc');
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}