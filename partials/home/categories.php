<?php $section_link = get_field('products', 'options');
$categories = get_terms( array(
        'taxonomy'   => 'product_category', // Swap in your custom taxonomy name
        'hide_empty' => true, 
        // 'parent' => 0
));
if($categories): ?>
	<section class="home-categories py-5">
		<div class="container">
			<div class="home-category-title py-5">
				<h1 class="home-title">Solutions</h1>
			</div>
			<div class="row">
				<?php foreach( $categories as $category ): 
					$category_img = get_field('image', $category); ?>
				<div class="col-md-4 col-12 pb-5">
				    <?php $link = get_field('link', $category); ?>
				    <a href="<?php echo $link['url']; ?>">
    					<div class="flip-box">
    					  <div class="flip-box-inner">
    					    <div class="flip-box-front bg-img" style="background-image: url(<?php echo $category_img; ?>)">
    					      <div class="gradient center-v"><h2><?php echo $category->name; ?></h2></div>
    					    </div>
    					    <div class="flip-box-back center-v">
    					      <h2><a href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name; ?></a></h2>
    					      <p><?php echo wp_trim_words( $category->description, 10, '...' );?></p>
    					      <div class="category-link"><a href="<?php echo $link['url']; ?>">Learn more</a></div>
    					    </div>
    					  </div>
    					</div>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="about-link">
				<a href="<?php echo the_permalink($section_link); ?>" class="styled-button">See all of our solutions <i class="fas fa-arrow-right"></i></a>
			</div>			
		</div>
	</section>
<?php endif;?>