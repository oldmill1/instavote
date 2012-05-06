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
 * Get number of votes
 * 
 * @param  array	The options to give to the api 
 * @return bool		echo's the vote count on success; returns instance of WP_Error on fail 
*/ 

function get_votes( $options ) {
	global $app; 
	$defaults = array( 
		"post_id" => 1
	);  
	wp_parse_args( $options, $defaults ); 
	$count = $app->return_votes($options); 
	if ( is_null($count) ) { 
		return new WP_Error('invalid vote count', __("NULL returned instead of vote count when calling get_votes.")); 
	} else { 
		echo $count; 
		return false; 
	} 
} 	