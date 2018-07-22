<?php 
global $wp_query;
?>
<?php get_header(); ?>
<div class="container">
<div class="row">
<div class="col-md-9">

<?php if(have_posts()): ?> <!--post indenkil if-->
<?php while (have_posts()): the_post();  ?> <!-- post indenkil while -->

<article id="article-<?php the_id(); ?>" <?php post_class(); ?>><!-- the_id articlesnu id varunathayirikum, post_class aricles nu class varum, and can be used for styling post using different post types -->
<h2><?php the_title(); ?></h2><!-- permalink uses to get link of the post, title uses to get title of the post --> 
<span></span>
<?php 
$archive_year  = get_the_time('Y'); 
$archive_month = get_the_time('m'); 
$archive_day   = get_the_time('d'); 
?>
<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_date(); ?></a>
<span><?php the_author(); ?></span>
<span><?php the_taxonomies(); ?></span>
<div><?php the_content(); ?></div><!-- excerpt shows little content of the post -->
</article>

<?php endwhile; ?>
<?php

// next_posts_link() usage with max_num_pages
next_posts_link( 'Older Entries', $the_query->max_num_pages );
previous_posts_link( 'Newer Entries' );
?>
<?php endif; ?>
</div>
<div class="col-md-3">
	<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>