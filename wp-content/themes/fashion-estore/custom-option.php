<?php

    $fashion_estore_theme_css= "";

    $fashion_estore_scroll_position = get_theme_mod( 'fashion_estore_scroll_top_position','Right');
    if($fashion_estore_scroll_position == 'Right'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='right: 20px;';
        $fashion_estore_theme_css .='}';
    }else if($fashion_estore_scroll_position == 'Left'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='left: 20px;';
        $fashion_estore_theme_css .='}';
    }else if($fashion_estore_scroll_position == 'Center'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='right: 50%;left: 50%;';
        $fashion_estore_theme_css .='}';
    }