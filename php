<?php
/*
Plugin Name: query categories
Description: a WordPress plugin that allows publishers to designate a primary category for posts.
Author: hagar ibrahim
Version: 1
*/
$all_categories=get_categories();//get all the categories
foreach($all_categories as $categories_item)//retrieve each category
{
	echo 'Category name:'.$categories_item->name; //display the name of each category
global $post;
$args = array(
	'category_name'    => $categories_item->name,
	'orderby'          => 'parent',
	'order'            => 'DESC');

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

<li> <a href="<?php the_permalink(); ?>">
  <?php the_title(); ?>
  </a> </li>
<?php endforeach; 
wp_reset_postdata();
}

?>
