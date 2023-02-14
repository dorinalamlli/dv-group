<?php $query = \DVGROUP\Query::news();
if( $query->have_posts() ) :
$section_link = get_field('news', 'options');  ?>
	<section class="home-news">
		<div class="container">
			<div class="home-news-title py-5">
				<h1 class="home-title">latest news</h1>
			</div>
			<div class="row">
				<?php while( $query->have_posts() ) : $query->the_post();
				$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
				<div class="col-md-6 col-12 px-5">
					<div class="bg-img" style="background-image: url(<?php echo $img_src;?>)"></div>
					<a href="<?php echo the_permalink($query->ID); ?>">
						<div class="home-single-news mb-5">
							<span class="entry-date"><?php echo get_the_date(); ?></span>
							<h4><?php the_title(); ?></h4>
							<p><?php echo wp_trim_words( get_the_content(), 10, '...' ) ?></p>
							<div class="home-news-link">
								<a href="<?php echo the_permalink($query->ID); ?>">Learn more <i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>	