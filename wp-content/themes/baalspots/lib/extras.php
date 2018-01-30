<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use Roots\Sage\Assets;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  if (is_page_template('template-internal.php') || is_page_template('templates/criminalPage.php')) {
    $classes[] = 'internal';
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

function get_post_image($post) {
  $post_thumbnail_id = get_post_thumbnail_id($post->ID);
  if ( $post_thumbnail_id ) {
    $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'fb-preview');
    return $post_thumbnail_img[0];
  }
}

function get_post_excerpt($post) {
  if ( $post->post_excerpt ) return $post->post_excerpt;
  $text = str_replace("\r\n"," ", strip_tags(strip_shortcodes($post->post_content)));
  $words = explode(' ', $text, 56);
  if (count($words) > 55) {
    array_pop($words);
    return implode(' ', $words);
  }
}

function social_buttons() {
  global $post;
  if (is_singular() || is_home()) {
    $post_url = urlencode(get_permalink());
    $post_title = str_replace( ' ', '%20', get_the_title() );
    $post_description = urlencode(get_post_excerpt($post));
    $post_featured_image = get_post_image($post);

    $twitterURL = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$post_url;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url;
    $redditURL = 'http://www.reddit.com/submit?url='.$post_url.'&title='.$post_title;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$post_url.'&amp;media='.$post_featured_image[0].'&amp;description='.$post_title;
    $gplusURL ='https://plus.google.com/share?url='.$post_title.'';
    $linkedinURL = 'https://www.linkedin.com/shareArticle?url='.$post_url.'&amp;title='.$post_title.'&amp;summary='.$post_description;

    $content = '<a href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook-square"></i></a>';
    $content .= '<a href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a>';
    $content .= '<a href="'.$linkedinURL.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    $content .= '<a href="#wpdevar_comment_1" target="_self"><img src="'. Assets\asset_path('images/comment.svg').'" /></a>';
    return $content;
  }
  return '';
}
/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
