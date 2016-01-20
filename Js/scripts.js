jQuery(document).ready(function() {
	jQuery('.main-navigation ul:first-child').clone().appendTo('.rwd-main-nav');

	jQuery('#rwd-main-nav-btn').click(function(event) {
		event.preventDefault();
		jQuery('.rwd-main-nav').slideToggle();
	});


});