<?php 

namespace DVGROUP;

use \WP_Query;

class Query
{

	function __construct()
	{
		# code...
	}

	static public function slider(){
		$args = [
			'post_type' => 'slider',
			'posts_per_page' => -1
		];

		return new \WP_Query( $args );
	}

	static public function news(){
		$args = [
			'post_type' => 'news',
			'posts_per_page' => 4
		];

		return new \WP_Query( $args );
	}

	static public function news_page(){
		$args = [
			'post_type' => 'news',
			'posts_per_page' => -1
		];

		return new \WP_Query( $args );
	}	

	static public function products(){
		$args = [
			'post_type' => 'products',
			'posts_per_page' => -1
		];

		return new \WP_Query( $args );
	}

}