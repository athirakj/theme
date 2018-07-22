<?php 
/*template name:fullwidth */
?>
<?php get_header(); ?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php if(have_posts()): ?> <!--post indenkil if-->
<?php while (have_posts()): the_post();  ?> <!-- post indenkil while -->
<article id="article-<?php the_id(); ?>" <?php post_class(); ?>><!-- the_id articlesnu id varunathayirikum, post_class aricles nu class varum, and can be used for styling post using different post types -->
<h2><?php the_title(); ?></h2><!--  title uses to get title of the page --> 
<div><?php the_content(); ?></div><!-- content shows  content of the page -->
</article>
<?php endwhile; ?>
<?php endif; ?>
</div>
</div>
</div>
<?php get_footer(); ?>