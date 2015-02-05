<?php
/**
 * This is the dynamic css that saves CSS data dynamically
 * 
 * 
 */
        $root = '../../../..';
        if ( file_exists( $root.'/wp-load.php' ) ) {
            require_once( $root.'/wp-load.php' );
        } elseif ( file_exists( $root.'/wp-config.php' ) ) {
            require_once( $root.'/wp-config.php' );
        } else {
            die('/* Error */');
        }
        
        header("Content-type: text/css"); 
            
            $image_url = get_template_directory_uri() . "/images/";
            //$sections = of_get_option('parallax_section');
//            $custom_css = of_get_option('custom_css');
        
        global $accesspressray_pro_options;
        $accesspressray_pro_settings = get_option( 'accesspressray_pro_options', $accesspressray_pro_options );
        $template_color = $accesspressray_pro_settings['skins'];
        $template_color_hover= colourBrightness($template_color, '0.8');
        $template_color_footer= colourBrightness($template_color, '0.9');
        $footer_bg = $accesspressray_pro_settings['footer_bg'];
		$blog_bg =$accesspressray_pro_settings['blog_bg'];
		$dir = get_template_directory()."\css\custom.css";   
        $feature_background = $accesspressray_pro_settings['feature_background'];
        $footer_css = "#mid-section {background:".$feature_background."/n}/n"; 	
		$footer_css .= "#bottom-footer { background:".$footer_bg."  !important;\n}\n";
		$footer_css .=".events-section {background:".$blog_bg." !important;\n}\n";
		$footer_css .=".site-header a, #accesspreslite-breadcrumbs a{color: ".$template_color." !important;\n}\n";
        $footer_css .= ".site-header a:hover, #accesspreslite-breadcrumbs a:hover
        { color: ".$template_color_hover." !important;\n
         border-color: ".$template_color_hover." !important;\n }\n";
        $footer_css .= "#site-navigation .menu ul ul li > a:hover:before, #site-navigation .menu ul ul li.current_page_item > a:before{
    	background-color: ".$template_color_hover." !important;\n
         }\n";
        $footer_css .= ".events-section .event-list .event-date, .read-more-btn, .read-more-btn:hover{ 
            background-color: ".$template_color_hover." !important; \n
            }\n";
        $footer_css .= ".read-more-btn,.featured-section .featured-post, #top-footer, .faqs .faq-question, .faqs .faq-question:after,
        .vertical .ap_tab_group .tab-title.active, .vertical .ap_tab_group .tab-title.hover, .vertical .tab-title.active,.vertical .ap_tab_content,.horizontal .ap_tab_group .tab-title.active, .horizontal .ap_tab_group .tab-title.hover,
        .social-shortcode a:hover,
        .ap_toggle .ap_toggle_title,.ap_toggle .ap_toggle_title:after
        {
        background-color: ".$template_color." !important;\n
        }\n";
        $footer_css .=".faqs .faq-question, .faqs .faq-question:after, .ap_toggle .ap_toggle_title,.ap_toggle .ap_toggle_title:after{
	    border-color: ".$template_color_hover." !important;\n }\n";
        $footer_css .= "footer #middle-footer { background-color: ".$template_color_footer." !important; \n}\n";
        $footer_css .= "#site-navigation .menu ul ul,.vertical .tab-title.active,
        #top-footer .footer .widget{
        
        	border-color: ".$template_color." !important;
        }
        .navigation .nav-links a, .bttn, button, input[type='button'], input[type='reset'], input[type='submit'],
        .footer-socials a,
        .read-more-btn:hover .read-icon-wrap,
        #slider-banner .bx-wrapper .bx-pager.bx-default-pager a:after,
        .ap_call_to_action .ap_call_to_action_button{
        	background: ".$template_color." !important;
        }
        .posted-on a,.three-column-testimonail .testimonial-list .testimonial-excerpt:before,
        .sidebar ul li:hover,.sidebar ul li a:hover{
        	color: ".$template_color." !important;
        }
        .horizontal .ap_tab_group .tab-title.active, .horizontal .ap_tab_group .tab-title.hover{
        	border-color: ".$template_color_hover." !important;
        }
        .footer-socials a:hover,.read-more-btn .read-icon-wrap,
        .shortcode-slider .bx-wrapper .bx-pager.bx-default-pager a.active, .shortcode-slider .bx-wrapper .bx-pager.bx-default-pager a:hover{
        	background-color: ".$template_color_hover." !important;
        }";
      echo $footer_css;
      
