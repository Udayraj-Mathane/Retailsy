<?php

  $shopfront_ecommerce_color_scheme_css = '';

  //---------------------------------Logo-Max-height--------- 
  $shopfront_ecommerce_logo_width = get_theme_mod('shopfront_ecommerce_logo_width');

  if($shopfront_ecommerce_logo_width != false){

    $shopfront_ecommerce_color_scheme_css .='.logo .custom-logo-link img{';

      $shopfront_ecommerce_color_scheme_css .='width: '.esc_html($shopfront_ecommerce_logo_width).'px;';

    $shopfront_ecommerce_color_scheme_css .='}';
  }
