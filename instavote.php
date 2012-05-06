<?php 
/*
 * Plugin Name: Instavote
 * Description: Enable users to submit posts and start discussions. 
 * Tags: community, voting, blogging
 * Plugin Author: Ankur Taxali
*/ 

function load_scripts_func() { 
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'votes', plugins_url('/js/votes.js', __FILE__), null, null, true );
} 

add_action('wp_enqueue_scripts', 'load_scripts_func');

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
	global $post; 
	
	$defaults = array( 
		"post_id" => $post->ID, 
	);
			
	$options = wp_parse_args( $options, $defaults );
	
	$count = $app->return_votes($options); 
	
	if ( is_null($count) ) { 
		return new WP_Error('invalid vote count', __("NULL returned instead of vote count when calling get_votes.")); 
	} else { 
		echo $count; 
		return false; 
	} 
} 	

/** 
 * Displays a set of up/down buttons. 
 * 
*/ 
function instavote_buttons( $options = null ) { 
	global $app; 
	global $post; 
	
	$defaults = array( 
		"post_id" => $post->ID, 
		"theme" 	=> "default" 
	); 
	
	$options = wp_parse_args( $options, $defaults ); 	
	$dom = "<a href='#+'>+</a>&nbsp;<a href='#-'>-</a>"; 	
	echo $dom;
} 


























