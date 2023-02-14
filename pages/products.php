<?php 
/**
* Template Name: Products
*/
get_header(); 
while(have_posts()): the_post(); 
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));?>
<div class="page-products">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>		
	<div class="container py-5 my-5">
		<div class="page-products-container">
			<div class="row">
				<div class="col-md-3 col-12">
					<div class="product-filter">
						<?php echo do_shortcode('[searchandfilter id="127"]'); ?>
					</div>
				</div>
				<div class="col-md-9 col-12">
					<div class="product-loop">
						<?php echo do_shortcode('[searchandfilter id="127" show="results"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; 
get_footer(); ?>