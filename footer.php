		</div><!--/.site-content-->

	<!-- footer -->
	<?php $img = get_field('footer_background', 'options') ?>
	<footer class="site-footer bg-img" style="background-image: url(<?php echo $img['url']; ?>); height: auto; ">
		<div class="footer-parts">
			<?php get_template_part('partials/global/footer-top'); ?>
			<?php get_template_part('partials/global/footer-bottom'); ?>
		</div>
		<div class="gradient"></div>
	</footer>

	<?php wp_footer(); ?>
	
	</body>
</html>