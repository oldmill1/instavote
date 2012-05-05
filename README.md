instavote
=========

Start a relationship between posts and voting. 

Just create a table called votes and that's it. 

To find out how many votes a post has, the plugin provides use of this template_tag: 

```php 
<?php get_votes( array("post_id" => $post->ID) ); ?>
```

