jQuery(document).ready(function() {

	jQuery('#responsive-menu-icon').click(function(event) {
		event.preventDefault();
		console.log("working");
		jQuery('.responsive-navigation ul li').slideToggle();
	});


});
