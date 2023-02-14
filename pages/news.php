<?php 
/**
* Template Name: News
*/
get_header(); 
while(have_posts()): the_post();
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));?>
<div class="page-news">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>	
	<div class="container py-5 my-5">
		<?php $query = \DVGROUP\Query::news_page(); if( $query->have_posts() ) : ?>
		<div class="page-news-posts">
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
								<a href="<?php the_permalink($query->ID); ?>">Learn more <i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php endwhile;
get_footer(); ?>