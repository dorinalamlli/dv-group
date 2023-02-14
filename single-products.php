<?php get_header();
while(have_posts()): the_post();
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
<div class="product-container">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>
	<div class="container py-5 my-5">
		<div class="p-container">			
			<div class="product-description pb-5">
				<?php the_content(); ?>
			</div>
			<?php $images = get_field('gallery'); if ( $images ): ?>
			<div class="gallery-popup-product pb-5">
				<?php foreach ($images as $item): ?>
					<div class="item">
						<a href="<?php echo $item['url'];?>"><div class="bg-img popup-gallery" style="background-image: url(<?php echo $item['url'];?>)"></div></a> 
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php $desctwo = get_field('description'); if($desctwo): ?>
				<div class="product-description product-description-two pb-5">
					<?php echo $desctwo; ?>
				</div>
			<?php endif; ?>	
			<?php $link = get_field('web_product_link'); if($link): ?>
			<div class="product-link pb-5 text-md-right">
				<a href="<?php echo $link; ?>" target="_blank" class="styled-button">Click here for more information <i class="fas fa-arrow-right"></i></a>
			</div>
			<?php endif; ?>			
			<?php $video = get_field('youtube_product_link', false, false); if($video): ?>
 			<div class="product-video mb-5">
				<a href="<?php echo $video; ?>" target="_blank" class="openVideo" >
					<div class="image-video-product bg-img" style="background-image: url(<?php echo \DVGROUP\Utils::getVideoThumbnail($video); ?>);">
						<img src="<?php echo \DVGROUP\Utils::image('play-icon.png'); ?>" alt="play" class="img-fluid">
					</div>
				</a>	
				<div class="gradient"></div>			
			</div>					
			<?php endif; ?>						
		</div>
	</div>
	<?php $videomp4 = get_field('video'); if($videomp4): ?>
	<div class="product-video py-5">
		<video autoplay muted loop id="myVideo">
			  <source src="<?php echo $videomp4; ?>" type="video/mp4">					  	
		</video>
	</div>	
	<?php endif; ?>	
</div>
<?php endwhile; 
get_footer(); ?>