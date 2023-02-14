<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12">
            <div class="text-left">
                <img  src="<?php echo \DVGROUP\Utils::image('logo.png') ?>" alt="<?php echo bloginfo( 'name' ); ?>" class="img-responsive">
                <div class="footer-address">
                    <p><?php $address = get_field('address', 'options'); echo 'Address: <a href="https://www.google.com/maps/place/DV+GROUP+Ltd/@41.3108446,19.8067583,17z/data=!3m1!4b1!4m5!3m4!1s0x1350310c3fef9029:0x415eec54ec809c3!8m2!3d41.3108406!4d19.808947"  target="_blank">'.$address; ?></p>
                </div>
                <div class="footer-contact">
                <?php $phone = get_field('phone', 'options'); $email = get_field('email', 'options'); $mobile = get_field('mobile', 'options');?>
                    <p><?php echo 'Email: <a href="mailto:'.$email.'" target="_blank">'.$email. '</a> Phone: <a href="tel:'.$phone.'" target="_blank">' . $phone. ' Mobile: <a href="tel:'.$mobile.'" target="_blank">' . $mobile; ?></p>    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-12">
            <div class="footer-right">
                <div class="footer-top-menu">
                       <?php wp_nav_menu([
                         'theme_location'  => 'primary',
                         'container'       => 'div',
                         'container_id'    => 'footer-menu',
                         'menu_class'      => 'footer-nav',
                         'fallback_cb'     => 'bs4navwalker::fallback',
                         'walker'          => new Navwalker()
                       ]); ?>
                </div>
                <h3><?php echo 'Social Links'; ?></h3>
                <div class="social-medias">
                    <?php $fb = get_field('facebook', 'options'); if($fb):?>
                    <div class="social-item">
                        <a href="<?php echo $fb;  ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    <?php endif; $linkedin = get_field('linkedin', 'options'); if($linkedin): ?>
                    <div class="social-item">
                        <a href="<?php echo $linkedin; ?>" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <?php endif; $instagram = get_field('instagram', 'options'); if($instagram): ?>
                    <div class="social-item">
                        <a href="<?php echo $instagram; ?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div> 
                    <?php endif; ?>                                       
                </div>
            </div>
        </div>    
    </div>
</div>