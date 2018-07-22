<?php 
/*template name:left sidebar */
?>
<?php get_header(); ?>
<div class="container">
<div class="row">
<div class="col-md-3">
	<?php get_sidebar(); ?>
</div>
<div class="col-md-9">
<div class="row">
<?php if(have_posts()): ?> <!--post indenkil if-->
<?php while (have_posts()): the_post();  ?> <!-- post indenkil while -->
<div class="col-md-12">
<article id="article-<?php the_id(); ?>" <?php post_class(); ?>><!-- the_id articlesnu id varunathayirikum, post_class aricles nu class varum, and can be used for styling post using different post types -->
<h2><?php the_title(); ?></h2><!--  title uses to get title of the page --> 
<div><?php the_content(); ?></div><!-- content shows  content of the page -->
</article>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>