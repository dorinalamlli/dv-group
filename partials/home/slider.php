<?php $query = \DVGROUP\Query::slider();
if( $query->have_posts() ) :  ?>
<section class="home-slideshow slideshow">
	<?php while( $query->have_posts() ) : $query->the_post(); 
		$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
		 $link = get_field('link');
		 $video = get_field('video'); if($video): ?>
		 	<div class="item bg-img">
		 		<video autoplay muted loop id="myVideo">
					  <source src="<?php echo $video ?>" type="video/mp4">					  	
				</video>
				<a href="<?php echo $link['url']; ?>" class="btn-slideshow">
					<div class="slideshow-content">
						<div class="center-v s-content">
							<div class="container">
					            <h4><?php the_title(); ?></h4>
				            </div>
			            </div>
			        </div>    
	            </a>
	            <div class="gradient"></div>
			</div>
		<?php else: ?> 
		<div class="item bg-img" style="background-image: url(<?php echo $img_src;?>)">
			<a href="<?php echo $link['url']; ?>" class="btn-slideshow">
				<div class="slideshow-content">
					<div class="center-v s-content">
						<div class="container">
				            <h4><?php the_title(); ?></h4>
			            </div>
		            </div>
		        </div>    
            </a>
            <div class="gradient"></div>
		</div>
	<?php endif; endwhile; ?>
</section>
<?php wp_reset_query(); endif; ?>