<?php

add_shortcode('button', 'button');



function button($atts, $content = null) {
	extract(shortcode_atts(
		array(
			'color' => 'green',
			'link' => '#'
		), $atts));

	return '<a href="'.$link.'" class="button '.$color.'">'.do_shortcode($content).'<span></span></a>';
}



?>