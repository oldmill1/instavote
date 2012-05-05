<?php 
/*
 * Plugin Name: Instavote
 * Description: Enable users to submit posts and start discussions. 
 * Tags: community, voting, blogging
 * Plugin Author: Ankur Taxali
*/ 

include 'app.php'; 

$app = new Vote(); 

/** 
 * Default template tag is something like: 
 * "n Points"; it is up to the theme designer to supply the HTML 
*/ 
function get_votes( $options ) {
	global $app; 
	$defaults = array( 
		"post_id" => 1
	);  
	wp_parse_args( $options, $defaults ); 
	$count = $app->return_votes($options); 
	echo $count; 
} 
