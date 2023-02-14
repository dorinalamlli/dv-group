<?php get_header();
while(have_posts()): the_post();
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
<div class="single-news-page">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>	
	<div class="container py-5">
		<div class="single-news-container">
			<div class="single-news-content"><?php the_content(); ?></div>
			<div class="news-slideshow-content">
				<?php $images = get_field('gallery'); if ( $images ): ?>
		        <div class="news-slideshow">
		            <?php foreach ($images as $item): ?>
			        	<div class="item bg-img" style="background-image: url(<?php echo $item['url'];?>)"></div> 
		        	<?php  endforeach; endif; ?>
		        </div>					
			</div>
		</div>
	</div>
</div>
<?php endwhile; 
get_footer(); ?>