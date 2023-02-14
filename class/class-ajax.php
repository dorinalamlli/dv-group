<?php 

namespace DVGROUP;

use WP_Query;

class AjaxCall
{

	function __construct()
	{ 

		global $wpdb;
		$this->wpdb = $wpdb;

		$actions = [
			//'action',
		];

		foreach( $actions as $action ){
			add_action( 'wp_ajax_'         .$action   , [ $this, $action ] );
			add_action( 'wp_ajax_nopriv_'  .$action   , [ $this, $action ] );
		}
	}


} // class

return new \DVGROUP\AjaxCall();