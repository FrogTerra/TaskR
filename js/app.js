// Custom JQuery Functions
(function($) {
  $(document).ready(function() {
	
	var url = window.location.href;
	$('a[href*="'+url+'"]').addClass('active');
	
	$('.nav').navgoco({
              caretHtml: '<i class="some-random-icon-class"></i>',
              accordion: true,
              openClass: 'open',
              save: true,
              cookie: {
                  name: 'navgoco',
                  expires: false,
                  path: '/'
              },
              slide: {
                  duration: 400,
                  easing: 'swing'
              }
    });
	
	 
});
}) (jQuery);