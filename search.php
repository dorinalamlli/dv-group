<?php get_header(); ?>

<div class="search-page">
	<div class="container-fluid ">
		<div class="search-section col-xs-12">
			<div class="search-headline">
				<h1>
					<span><?php _e('Search Result'); ?></span>
				</h1>
			</div>
			<div class="search-content">
				<?php if ( have_posts() ): ?>
					<h4 class="search-term"><?php _e('Search results for ') . '"<strong>' . get_search_query() . '</strong>"' ;?>:</h4>
					<?php while(have_posts()) : the_post(); ?>
						<div class="col-xs-12 rmp">
							<a class="transition" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<p><?php echo wp_trim_words(get_the_content(), 10, '...');?></p>
							<a href="<?php the_permalink();?>" class="read-more"><?php _e('Read more');?></a>
						</div>
					<?php endwhile;
						if(function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
					<?php 
				else: ?>
					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>