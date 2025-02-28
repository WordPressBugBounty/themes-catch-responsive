<?php
/**
 * The template for displaying Social Icons
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0
 */


if ( ! function_exists( 'catchresponsive_get_social_icons' ) ) :
/**
 * Generate social icons.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_get_social_icons(){
	if ( ( !$output = get_transient( 'catchresponsive_social_icons' ) ) ) {
		$output	= '';

		$options 	= catchresponsive_get_theme_options(); // Get options

		//Pre defined Social Icons Link Start
		$pre_def_social_icons 	=	catchresponsive_get_social_icons_list();

		foreach ( $pre_def_social_icons as $key => $item ) {
			if ( isset( $options[ $key ] ) && '' != $options[ $key ] ) {
				$value = $options[ $key ];

					if (
						'email_link' == $key
						|| 'website_link' == $key
						|| 'phone_link' == $key
						|| 'handset_link' == $key
						|| 'feed_link' == $key
						|| 'mobile_link' == $key
						|| 'cart_link' == $key
						|| 'cart_link' == $key
						|| 'cloud_link' == $key
						|| 'link_link' == $key
					) {
						$output .= '<a class="font-awesome fa-solid fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_attr($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					} else {
						$output .= '<a class="font-awesome fa-brands fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_url($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					}
			}
		}
		//Pre defined Social Icons Link End

		//Custom Social Icons Link End
		set_transient( 'catchresponsive_social_icons', $output, 86940 );
	}

	return $output;
} // catchresponsive_get_social_icons
endif;
