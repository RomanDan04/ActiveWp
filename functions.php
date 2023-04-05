<?php

add_filter('show_admin_bar','__return_false');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2); //remove dns-prefetch
remove_action('wp_head', 'wp_generator');   //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link');   //remove wlwmanifest
remove_action('wp_head', 'rsd_link');   //remove editUri
remove_action('wp_head', 'rest_output_link_wp_head'); //remove 'https://api.w.org'
remove_action('wp_head', 'rel_canonical');  //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10);   //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links');  //remove alternative

add_action('wp_enqueue_scripts', 'site_scripts');
function site_scripts(){
    $version = '0.0.1';
    wp_dequeue_style('wp-block-library');
    
    //<link rel="preconnect" href="https://fonts.googleapis.com">
    //wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com', array(), $version); - apare eroare in consola
    //<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    //wp_enqueue_style('stat-fonts', 'https://fonts.gstatic.com', array(), $version);    - apare eroare in consola
    //<link href="https://fonts.googleapis.com/css2?family=Cardo:ital@1&family=Open+Sans:wght@700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    wp_enqueue_style('lea-fonts', 'https://fonts.googleapis.com/css2?family=Cardo:ital@1&family=Open+Sans:wght@700&family=Raleway:wght@400;600;700&display=swap', array(), $version);
    //link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), $version);
    //<link rel="stylesheet" href="<?php echo get_template_directory_uri(); &>/style.css">
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), $version);
    
    
    //<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    wp_enqueue_script('jquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), $version);
    //<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), $version, true);
    //<script src="<?php echo get_template_directory_uri(); $>/code.js"></script>
    wp_enqueue_script('main-js',get_template_directory_uri().'/code.js', array(), $version, true);
    
    wp_localize_script('main-js', 'WPJS', [
        'siteUrl' => get_template_directory_uri()
    ]);
}
