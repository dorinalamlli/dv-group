<?php
namespace DVGROUP;

class WP_Debrand{
	
	public function __construct(){

		add_action( 'admin_menu'				, [ $this, 'adjust_the_wp_menu' 				], 999  );
		add_action( 'wp_dashboard_setup'		, [ $this, 'remove_all_dashboard_meta_boxes' 	], 9999 );
		
		add_action( 'admin_bar_menu'			, [ $this, 'remove_wp_logo' 					], 999 	);
		add_action( 'wp'						, [ $this, 'rsd_link' 							], 11 	);
		add_action( 'init'						, [ $this,'disable_embeds_init' 				], 9999 );
		// add_action('wp_before_admin_bar_render'	, [ $this, 'no_wp_logo_admin_bar_remove' 		], 0 	);
		add_filter( 'wp_headers'				, [ $this, 'wp_headers' 						] );

		add_filter( 'login_headerurl'			, [ $this,'wp_change_login_page_url'			] );
		add_filter( 'login_headertitle'			, [ $this,'wp_change_login_page_title'			] );
		add_action( 'login_enqueue_scripts'		, [ $this,'login_page'							] );
		add_action( 'admin_head-index.php'		, [ $this, 'dashboard_scripts' 					] );
		//add_action( 'admin_footer_text' 		, [ $this, 'credits' 							] );

		remove_action( 'wp_head'			, 'rest_output_link_wp_head'	 	, 10 );
		remove_action( 'wp_head'			, 'wp_oembed_add_discovery_links'	, 10 );
		remove_action( 'template_redirect'	, 'rest_output_link_header'			, 11, 0 );
		add_filter( 'show_admin_bar'		, '__return_false' );

		$this->header_cleanup();
	}

	public function disable_embeds_init()
	{
	    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	}

	public function rsd_link()
	{
		remove_action( 'wp_head', 'rsd_link' );
	}

	public function wp_headers( $headers )
	{
		unset( $headers['X-Pingback'] );
		return $headers;
	}

	public function header_cleanup()
	{
		remove_action( 'wp_head', 'rsd_link' );
	    remove_action( 'wp_head', 'wp_generator' );
	    remove_action( 'wp_head', 'feed_links', 2 );
	    remove_action( 'wp_head', 'feed_links_extra', 3 );
	    remove_action( 'wp_head', 'index_rel_link' );
	    remove_action( 'wp_head', 'wlwmanifest_link' );
	    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	    remove_action( 'admin_print_styles', 'print_emoji_styles' );
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
	
	public function adjust_the_wp_menu()
	{
		$page = remove_submenu_page( 'index.php','update-core.php');
	}

	public function remove_all_dashboard_meta_boxes()
	{
	    global $wp_meta_boxes;
	    $wp_meta_boxes['dashboard']['normal']['core'] = array();
	    $wp_meta_boxes['dashboard']['side']['core'] = array();
	}


	public function dashboard_scripts()
	{
	    ?>
        <style>#icon-index, .wrap h2 {display:none}</style>
        <script language="javascript" type="text/javascript">
            jQuery(document).ready(function($) {
               $('#dashboard-widgets-wrap').remove();
               $('#vfb-sidebar').remove();
            });
        </script>
	    <?php
	}

	public function remove_wp_logo( $wp_admin_bar )
	{
		//$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'updates' );
		$wp_admin_bar->remove_node( 'comments' );
		$wp_admin_bar->remove_node( 'new-content' );
	}

	public function wp_change_login_page_url($login_header_url)
	{
	    return get_bloginfo( 'url' );
	}

	public function wp_change_login_page_title($login_header_title)
	{
	    return get_bloginfo('description');
	}

	public function login_page()
	{ ?>
		<style type="text/css">
			body.login{ background-color: #f9f9f9; overflow: hidden; background-color: white);
    			overflow: hidden; background-size: cover; background-position: 50% 50%; }
			body.login #login h1 a{
				background-image: url(<?php echo \DVGROUP\Utils::image('logo.png'); ?>);
				background-size: 100%;
				width: 70%;
    			outline: 0!important;
			}
			a:focus{-webkit-box-shadow: none!important; box-shadow: none!important;}

			#login a:hover, #login a:focus, #login a:active{outline: 0!important}
			#login{ height: 100%; background-color: rgba(255, 255, 255, 0.85); font-size: 15px; font-weight: 700; overflow: auto; }
			.login form .input, .login form input[type=checkbox], .login input[type=text]{ font-weight: normal; }
			.login form{ background-color: transparent!important;}
			#login a:hover,#login a:focus,#login a:active{ text-decoration: none; outline: none; }
			.login #login_error,.login .message{ background-color: #fff!important; color:#666!important; }
			.login label,.login #backtoblog a, .login #nav a{ color:#666!important; font-weight: 700; }
			.login #login_error, .login .message{ border-color: #eb3177!important; }
			#wp-submit{ background-color: #CD0100; border: none; box-shadow: none; text-shadow: none; padding: 5px 25px; border-radius: 0;}
			.login form{ box-shadow: none; }
			.wp-core-ui .button-group.button-large .button, 
			.wp-core-ui .button.button-large { height: 40px!important;}
			body.login #login h1 a {
    background-size: auto;
    background-repeat: no-repeat;
    background-position: center;
}
		</style>
	<?php
	}

	public function no_wp_logo_admin_bar_remove()
	{ ?>
        <style type="text/css">
            .index-php .wrap,
            #wp-admin-bar-archive{ 
            	display: none; 
            }
            .index-php #screen-meta-links{
            	display: none;
            }
            #footer-upgrade{
            	display: none;
            }         
            #vfb-sidebar{
            	display: none !important;
            }
            #vfb-form-list{
            	margin-left: 0;
            }
            #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap{
            	width: 220px;
            }
            #adminmenu .wp-submenu{
            	left: 220px;
            }
            #wpcontent, #wpfooter{
            	margin-left: 220px;
            }
            #wp-admin-bar-archive,
            #wp-admin-bar-view,
            #wp-admin-bar-autoptimize{
            	margin-left: 184px !important;
            }
            #wpadminbar .quicklinks>ul>li>a{
            	background-color: transparent !important;
            }
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
            	float: left;
				/* background-image: url(<?php echo \DVGROUP\Utils::image('logo.png'); ?>) !important; */
				background-repeat: no-repeat;
				background-position: top 0 left;
				background-size: 170px;
				width: 220px;
				height: 17px;
				color:rgba(0, 0, 0, 0);
				margin-left: -200px;
			}
			#wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon{
				width: 0;
				height: 0;
			}
			#wp-admin-bar-wp-logo .ab-sub-wrapper,
			#wp-admin-bar-wp-logo .ab-sub-wrapper:hover,
			#wp-admin-bar-site-name{
				display: none !important;
				opacity: 1 !important;
				background-color: transparent !important;
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
				background-position: 0 0;
			}
			#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, 
			#adminmenu .wp-menu-arrow, 
			#adminmenu .wp-menu-arrow div, 
			#adminmenu li.current a.menu-top, 
			#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, 
			.folded #adminmenu li.current.menu-top, 
			.folded #adminmenu li.wp-has-current-submenu{
				background-color: #BE1E52;
			}
			#adminmenu .wp-not-current-submenu .wp-submenu, .folded #adminmenu .wp-has-current-submenu .wp-submenu{
				min-width: 200px;
			}
			.quicklinks{
				margin-left: 200px !important;
			}
        </style>
        <script language="javascript">
        	jQuery(document).ready(function($){
        		$('#wp-admin-bar-wp-logo .ab-item').attr('href', '<?php echo home_url(); ?>');
        		$('#wp-admin-bar-wp-logo .ab-item').attr('target', '_blank');
        	});
        </script><?php
	}

}

return new \DVGROUP\WP_Debrand();