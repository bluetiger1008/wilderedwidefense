<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  
  $wp_customize->add_setting('upload_logo');
  
  $wp_customize->add_control(
    new \WP_Customize_Image_Control(
      $wp_customize,
      'upload_logo',
      array(
        'label' => 'Logo',
        'section' => 'title_tagline',
        'settings' => 'upload_logo',
        'transport' => 'postMessage'
      )
    )
  );

  $wp_customize->add_setting(
    'phone_number',
    array(
      'default' => '(214) 741-4000',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'phone_number',
    array(
      'label' => 'Phone Number',
      'section' => 'title_tagline',
      'settings' => 'phone_number',
      'transport' => 'postMessage'
    )
  );
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
