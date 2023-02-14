<?php 
/**
* Template Name: Contact
*/
get_header();
while(have_posts()): the_post();
$img_src = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
<div class="page-contact">
	<div class="cover bg-cover bg-img" style="background-image: url(<?php echo $img_src; ?>);">
		<div class="content-single-product">
			<h1><?php the_title(); ?></h1>
			<div class="py-5"><?php echo do_shortcode("[breadcrumb]"); ?></div>
		</div>
		<div class="gradient"></div>
	</div>	
	<div class="container py-5 my-5">
		<div class="container-contact">
		    <div class="contact-info">
		    	<div class="contact-location">
		    		<h1>Location & Contacts</h1>
		    		<p><?php $address = get_field('address', 'options'); echo '<a href="https://www.google.com/maps/place/DV+GROUP+Ltd/@41.3108446,19.8067583,17z/data=!3m1!4b1!4m5!3m4!1s0x1350310c3fef9029:0x415eec54ec809c3!8m2!3d41.3108406!4d19.808947"  target="_blank">'.$address.'</a>'; ?></p>
		    		<p><?php $email = get_field('email', 'options'); echo '<a href="mailto:'.$email.'" target="_blank">'.$email.'</a>'; ?></p>
		            <p><?php $phone = get_field('phone', 'options'); echo '<a href="tel:'.$phone.'" target="_blank">'.$phone.'</a>'; ?></p>
		            <p><?php $mobile = get_field('mobile', 'options'); echo '<a href="tel:'.$mobile.'" target="_blank">'.$mobile.'</a>'; ?></p>
		    	</div>
		        <div class="contact-form-page">
		        	<h1>Contact Form</h1>
		        	<div class="w-responsive mx-auto mb-5"><?php the_content(); ?></div>
		        	<?php echo do_shortcode("[vfb id='1']") ?>
		        </div>
		    </div>
		</div>
	</div>
</div>
<?php endwhile; 
get_footer(); ?>