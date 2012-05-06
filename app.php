<?php
// app.php
class Vote { 
	
	
	function __construct() { 
		 
	} 
	
	/* 
	 * Returns number of posts in array 
	 * 
	*/ 
	public function return_votes( $options ) { 
		// show how many votes post x got 
		global $wpdb; 
		extract ( $options ); 
		$post_id = (int) $options["post_id"]; 
		$s = "	select post_id, count(*) 
						from votes 
						inner join wp_posts
						on votes.post_id = wp_posts.ID 
						and votes.post_id = $post_id
						LIMIT 1
		;";
		$set = $wpdb->get_results($s, "ARRAY_N"); 
		return (int) $set[0][1];  
	} 
} 