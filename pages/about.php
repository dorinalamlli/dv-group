<?php 
/**
* Template Name: About
*/
get_header();
while(have_posts()): the_post();
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
<div class="page-about">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>
	<div class="container py-5">
		<div class="about-description py-5">
			<?php echo do_shortcode("[timeline-express single-column='1']"); ?>
		</div>		
	</div>
</div>
<?php endwhile; get_footer(); ?>