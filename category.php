<?php get_header(); ?>
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="row">
<?php single_term_title(); ?>
<?php if(have_posts()): ?> <!--post indenkil if-->
<?php while (have_posts()): the_post();  ?> <!-- post indenkil while -->
<div class="col-md-3">
<article id="article-<?php the_id(); ?>" <?php post_class(); ?>><!-- the_id articlesnu id varunathayirikum, post_class aricles nu class varum, and can be used for styling post using different post types -->
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- permalink uses to get link of the post, title uses to get title of the post --> 
<div><?php the_excerpt(); ?></div><!-- excerpt shows little content of the post -->
<a href="<?php the_permalink(); ?>">Read More...</a>
</article>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
</div>
<div class="col-md-3">
	<?php get_sidebar(); ?>
</div>
</div>
</div>
<?php get_footer(); ?>