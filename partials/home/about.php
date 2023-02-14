<?php $section_link = get_field('about', 'options'); 
if( $section_link ) : ?>
<section class="home-about py-5">
	<div class="container">
		<div class="about-description">
			<h2 class="home-title">Partners</h2>
		</div>	
		<div class="slide-partners pt-3">				
			<?php $partners = get_field('partners',$section_link); if($partners):
				foreach($partners as $partner): ?>
					<div class="homepage-partner-logo">
						<a href="<?php echo $partner['alt']; ?>" target="_blank"><div style="background-image: url(<?php echo $partner['url'];?>)" class="bg-partner bg-contain"></div></a>
					</div>
			<?php endforeach; endif; ?>
		</div>
		<div class="about-link pt-5">
			<a href="<?php echo the_permalink($section_link); ?>" class="styled-button">Our History <i class="fas fa-arrow-right"></i></a>
		</div>
	</div>
</section>
<?php endif; ?>