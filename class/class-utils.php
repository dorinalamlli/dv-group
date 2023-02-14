<?php

namespace DVGROUP;

class Utils
{

	/**
	*  get_thumbnail_url
	*
	*  This function gets image url(featured image)
	*
	*  @param	$size    (string)
	*  @param   $post_id (int)
	*  @return	$image   (string)
	*/
	public static function get_thumbnail_url(  $size = 'full', $post_id = false  )
	{
		if ( $post_id == false ){
			global $post;
			$post_id = $post->ID;
		}
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ) , $size , true );
		if (is_array($image))
			return $image[0];
	}

	public static function tpath(){ return get_template_directory_uri() . '/'; }
	public static function assets(){ return self::tpath() . 'assets/'; }
	public static function images(){ return self::assets() . 'images/'; }
	public static function image( $file ){ return get_template_directory_uri() . '/assets/images/' . $file; }



	public static function getVideoThumbnail( $url ){
	
		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		$thumbnail = 'https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/maxresdefault.jpg' ;
		return $thumbnail;
	}

}