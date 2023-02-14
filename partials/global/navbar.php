<nav class="navbar navbar-expand-md navbar-light bg-faded">
   <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <img 
            src="<?php echo \DVGROUP\Utils::image('logo.png') ?>"
            alt="<?php echo bloginfo( 'name' ); ?>"
            class="img-fluid">
   </a>
   <button class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#primary-menu"
        aria-controls="primary-menu"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
   </button>

   <?php wp_nav_menu([
     'theme_location'  => 'primary',
     'container'       => 'div',
     'container_id'    => 'primary-menu',
     'container_class' => 'collapse navbar-collapse justify-content-start',
     'menu_class'      => 'navbar-nav',
     'depth'           => 2,
     'fallback_cb'     => 'bs4navwalker::fallback',
     'walker'          => new Navwalker()
   ]); ?>
  <?php //echo get_search_form(); ?>
</nav>
