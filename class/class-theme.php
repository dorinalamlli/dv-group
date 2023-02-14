<?php 

namespace DVGROUP;

class Theme
{

	public  $version     	= '1.0.0';
	public  $text_domain 	= 'dvg';
	private $gmap_api_key 	= 'AIzaSyD3LflChSNa9UM_LOt6-nkYNDH6yJZADPY';

	const BASE_CPTX = '/cptx/';

	/**
	*  __construct
	*/
	function __construct()
	{

		$this->tpath = get_template_directory_uri() . '/';
		$this->assets =  $this->tpath . 'assets/';
		
		add_action( 'after_setup_theme'  , [ $this, 'setup' ] );
	}

	/**
	*  setup
	*/
	public function setup()
	{
		
		load_theme_textdomain( $this->text_domain, $this->tpath . 'languages' );

		add_action( 'init'				 		, [ $this , 'support'				] );
		add_action( 'init'				 		, [ $this , 'nav_menus'			    ] );
		add_action( 'init'						, [ $this , 'register_post_types'	] );
		add_action( 'init'			     		, [ $this , 'register_option_pages'	] );
		
		add_action( 'wp_enqueue_scripts' 		, [ $this , 'assets' 				] );
		add_action( 'widgets_init'				, [ $this , 'sidebar'     			] );
		add_action( 'wp_head'					, [ $this , 'js_vars' 				] );
	}

	/**
	*  support
	*
	* @see https://developer.wordpress.org/reference/functions/add_theme_support/
	*/
	public function support()
	{

		//title tag
		add_theme_support( 'title-tag' );

		//post thumbnails
		add_theme_support( 'post-thumbnails' );

		//post formats
		add_theme_support( 'post-formats', [ 'gallery', 'video' ] );
		//header
		add_theme_support( 'custom-header' );

		//html5
		add_theme_support( 'html5' , [ 
				'search-form'  , 
				'comment-form' , 
				'comment-list' , 
				'gallery'      , 
				'caption' 
			] );
		}

	/**
	*  nav_menus
	*
	* @see https://codex.wordpress.org/Function_Reference/register_nav_menu
	*/
	public function nav_menus()
	{
		register_nav_menus([
			'primary' => esc_html__( 'Primary' , 'textdomain' ),
		]);
	}

	/**
	*  register_post_types
	*  this method scans all files from cptx directory and includes them
	* @see https://codex.wordpress.org/Function_Reference/register_post_type
	* @see https://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	public function register_post_types()
	{

		if( !is_dir( TEMPLATEPATH . self::BASE_CPTX ) )
			return;
		
		$files = array_diff( scandir( TEMPLATEPATH . self::BASE_CPTX ), array( '..', '.' ) );
		if( $files )
			foreach( $files as $file )
				if( false !== strpos( $file, '.php' ) && ( false !== strpos( $file, 'create_post_type_' ) || false !== strpos( $file, 'create_taxonomy_' ) ) )
					include TEMPLATEPATH . self::BASE_CPTX . $file;
	}

	/**
	*  register_option_pages
	*
	* @see https://www.advancedcustomfields.com/resources/options-page/
	*/
	public function register_option_pages(){
		
		if( !function_exists( 'acf_add_options_page' ) )
			return;
	
		// options
		acf_add_options_page( [
				'page_title' => 'Options',
				'menu_title' => 'Options',
				'menu_slug'  => 'options',
				'capability' => 'edit_posts',
				'redirect'	 => false,
				'icon_url'   => 'dashicons-admin-generic',
		] );
	}

	/**
	* assets
	*
	* @see https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
	*/
	public function assets()
	{
		// css
		wp_enqueue_style( $this->text_domain . '_vendors' , $this->assets . 'css/vendors.min.css' , [] , $this->version );
		wp_enqueue_style( $this->text_domain . '_site'    , $this->assets . 'css/site.css' 	   	  , [] , $this->version );

		// js
		if( !is_admin() ) wp_enqueue_script( 'jquery' );
		wp_enqueue_script( $this->text_domain . '_vendors' , $this->assets . 'js/vendors.min.js' , [] , $this->version , 1 );
		wp_enqueue_script( $this->text_domain . '_gmap'    , 'https://maps.googleapis.com/maps/api/js?v=3.exp&key='.  $this->gmap_api_key, [], $this->version, 1 );
		wp_enqueue_script( $this->text_domain . '_site'    , $this->assets . 'js/site.js' , [] , $this->version , 1 );
	}
	
	/**
	* sidebar
	*
	* @see https://codex.wordpress.org/Function_Reference/register_sidebar
	*/
	public function sidebar()
	{
		$sidebars = [
			[ 'id' => 'sidebar', 'name' => 'Sidebar', 'description' => 'Default sidebar'],
		];

		foreach( $sidebars as $sidebar ){
			register_sidebar([
				'name'          => esc_html__( $sidebar['name'], 'textdomain' ),
				'id'            => $sidebar['id'],
				'description'   => esc_html__( $sidebar['description'], 'textdomain' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
			]);
		}		
	}

	/**
	* register some js variables
	*
	* @see https://codex.wordpress.org/Function_Reference/wp_localize_script
	*/
	public function js_vars()
	{
		wp_register_script( 'js-vars', false );

		$vars = [
			'ajax_url' 	=> admin_url( 'admin-ajax.php' ),
			'tpath' 	=> \DVGROUP\Utils::tpath(),
			'assets' 	=> \DVGROUP\Utils::assets(),
			'images'    => \DVGROUP\Utils::images(),
		];
		wp_localize_script( 'js-vars', '_OBJ', $vars );
		wp_enqueue_script( 'js-vars' );	
	}


}// class

return new \DVGROUP\Theme();