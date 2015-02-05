<?php
/**
 * Custome Function for theme template
 * 
 * 
 */
    function accesspress_web_layout($classes){
	    if(of_get_option('webpage_layout') == 'boxed'){
	        $classes[]= 'boxed-layout';
	    }
        elseif(of_get_option('webpage_layout') == 'fullwidth'){
            $classes[]='fullwidth';
        }
        
	    return $classes;
   }
   add_filter( 'body_class', 'accesspress_web_layout' );
   
   function accesspress_sidebar_layout($classes){
    global $post;
        if( is_404()){
		$classes[] = ' ';
		}elseif(is_singular()){
	    $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
	    if(empty($post_class)){
        $post_class = 'right-sidebar';
        $classes[] = $post_class;}
        else{
        $post_class = get_post_meta( $post -> ID, 'accesspress_staple_sidebar_layout', true );
        $classes[] = $post_class;}
		}else{
		$classes[] = 'right-sidebar';	
		}
        return $classes;
   }
   add_filter('body_class', 'accesspress_sidebar_layout');

   
    function accesspress_bxslidercb(){
        $accesspress_slider_category = of_get_option('cagegory_as_slider');
		$accesspress_show_pager = (!of_get_option('show_pager') || of_get_option('show_pager') == "yes") ? "true" : "false";
		$accesspress_show_controls = (!of_get_option('show_controls') || of_get_option('show_controls') == "yes") ? "true" : "false";
		$accesspress_auto_transition = (!of_get_option('slider_auto_transition') || of_get_option('slider_auto_transition') == "yes") ? "true" : "false";
		$accesspress_slider_transition = (!of_get_option('slider_transition')) ? "fade" : of_get_option('slider_transition');
		$accesspress_slider_speed = (!of_get_option('slider_speed')) ? "5000" : of_get_option('slider_speed');
		$accesspress_slider_pause = (!of_get_option('slider_pause')) ? "5000" : of_get_option('slider_pause');
		$accesspress_show_caption = of_get_option('show_slider_caption');       
        ?>
        <section id="main-slider" class="slider">
       <script type="text/javascript">
            jQuery(function($){
				$('#main-slider .bx-slider').bxSlider({
					//adaptiveHeight: true,
					pager: <?php echo $accesspress_show_pager; ?>,
					controls: <?php echo $accesspress_show_controls; ?>,
					mode: '<?php echo $accesspress_slider_transition; ?>',
					auto : '<?php echo $accesspress_auto_transition; ?>',
					pause: '<?php echo $accesspress_slider_pause; ?>',
					speed: '<?php echo $accesspress_slider_speed; ?>'
				});
			});
        </script>
        <?php
		if( !empty($accesspress_slider_category)) :

				$loop = new WP_Query(array(
						'cat' => $accesspress_slider_category,
						'posts_per_page' => -1    
					));
                    ?>
                    <div class="bx-slider">
                    <?php
					if($loop->have_posts()) : 
					while($loop->have_posts()) : $loop-> the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false );
                    
                     ?>
                    <div class="slides">
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                    <?php if($accesspress_show_caption == 'show'): ?>
				<div class="caption-wrapper">  
				<div class="ak-container">
					<div class="slider-caption">
						<div class="mid-content">
							<div class="small-caption"> <?php the_title(); ?> </div>
                            <?php the_content(); 
                            ?>
							<a href="<?php the_permalink(); ?>" class="slider-btn"> <?php echo of_get_option('slider_button_text'); ?> </a>
						</div>
					</div>
				</div>
				</div>
                    <?php  endif; ?>
				</div>
				<?php endwhile; ?>
                 </div>
				
                    <?php endif; ?>		
            
        <?php else: ?>

            <div class="bx-slider">
	        <div class="slides">
					<img src="<?php echo get_template_directory_uri(); ?>/images/access-agencybg.png" alt="slider1"/>
                    <?php if($accesspress_show_caption == 'show'): ?>
                <div class="caption-wrapper">    
				<div class="ak-container">	
					<div class="slider-caption">
						<div class="mid-content">
							<div class="small-caption"> CREATIVE AGENCY/WEBSITE DEVELOPMENT/COPYWRITER </div>
							<h1 class="caption-title">AccessPress <span> Staple </span> </h1>
							<div class="caption-description">consectetuer adipiscing elit.  Aenean commodo ligula eget dolor.</div>
							<a href="#" class="slider-btn"> Details </a>
						</div>
					</div>
				</div>
				</div>
                    <?php  endif; ?>
				</div>
				
			</div>
			<?php  endif; ?>
		</section>
<?php
}
add_action('accesspress_bxslider','accesspress_bxslidercb', 10);

function accesspress_social_cb(){
	$facebooklink = of_get_option('facebook');
	$twitterlink = of_get_option('twitter');
	$google_pluslink = of_get_option('google_plus');
	$youtubelink = of_get_option('youtube');
	$pinterestlink = of_get_option('pinterest');
	$linkedinlink = of_get_option('linkedin');
	$flickrlink = of_get_option('flicker');
	$vimeolink = of_get_option('vimeo');
	$instagramlink = of_get_option('instagram');
	$tumblrlink = of_get_option('tumbler');
	$rsslink = of_get_option('rss');
	$deliciouslink = of_get_option('delicious');
	$githublink = of_get_option('github');
	$stumbleuponlink = of_get_option('stumbleupon');
	$skypelink = of_get_option('skype');
    ?>
	<div class="social-icons ">
		<?php if(!empty($facebooklink)){ ?>
		<a href="<?php echo of_get_option('facebook'); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($twitterlink)){ ?>
		<a href="<?php echo of_get_option('twitter'); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($google_pluslink)){ ?>
		<a href="<?php echo of_get_option('google_plus'); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($youtubelink)){ ?>
		<a href="<?php echo of_get_option('youtube'); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($pinterestlink)){ ?>
		<a href="<?php echo of_get_option('pinterest'); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($linkedinlink)){ ?>
		<a href="<?php echo of_get_option('linkedin'); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($flickrlink)){ ?>
		<a href="<?php echo of_get_option('flicker'); ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($vimeolink)){ ?>
		<a href="<?php echo of_get_option('vimeo'); ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($instagramlink)){ ?>
		<a href="<?php echo of_get_option('instagram'); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($tumblrlink)){ ?>
		<a href="<?php echo of_get_option('tumblr'); ?>" class="tumblr" data-title="tumblr" target="_blank"><i class="fa fa-tumblr"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($deliciouslink)){ ?>
		<a href="<?php echo of_get_option('delicious'); ?>" class="delicious" data-title="delicious" target="_blank"><i class="fa fa-delicious"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($rsslink)){ ?>
		<a href="<?php echo of_get_option('rss'); ?>" class="rss" data-title="rss" target="_blank"><i class="fa fa-rss"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($githublink)){ ?>
		<a href="<?php echo of_get_option('github'); ?>" class="github" data-title="github" target="_blank"><i class="fa fa-github"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($stumbleuponlink)){ ?>
		<a href="<?php echo of_get_option('stumbleupon'); ?>" class="stumbleupon" data-title="stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($skypelink)){ ?>
		<a href="<?php echo "skype:".of_get_option('skype') ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
    </div>
<?php
}
add_action('accesspress_social','accesspress_social_cb', 10);

function accesspress_footer_count(){
	$count = 0;
	if(is_active_sidebar('footer-1'))
	$count++;

	if(is_active_sidebar('footer-2'))
	$count++;

	if(is_active_sidebar('footer-3'))
	$count++;

	if(is_active_sidebar('footer-4'))
	$count++;

	return $count;
}

function accesspress_excerpt( $accesspress_content , $accesspress_letter_count){
		$accesspress_letter_count = !empty($accesspress_letter_count) ? $accesspress_letter_count : 100 ;
		$accesspress_striped_content = strip_tags($accesspress_content);
		$accesspress_excerpt = mb_substr($accesspress_striped_content, 0 , $accesspress_letter_count);
		if(strlen($accesspress_striped_content) > strlen($accesspress_excerpt)){
			$accesspress_excerpt.= "...";
		}
		return $accesspress_excerpt;
	}

//Dynamic styles on header
function accesspress_header_styles_scripts(){
	$favicon = of_get_option('favicon');
	$custom_css = of_get_option('custom_code_css');
    $cta_bg_v = of_get_option('call_to_action_bg');
    if(!empty($cta_bg_v)){
    $cta_bg =   '.call-to-action {background: url("'.of_get_option('call_to_action_bg').'") no-repeat scroll center top rgba(0, 0, 0, 0);';
    }
	$custom_js = of_get_option('custom_code_analytics');
	$image_url = get_template_directory_uri()."/images/";
	echo "<link type='image/png' rel='icon' href='".$favicon."'/>\n";
	echo "<style type='text/css' media='all'>"; 
	echo $custom_css;
    echo $cta_bg;

	echo "</style>\n"; 

	echo "<script>\n";
	echo $custom_js;
	echo "</script>\n";
}

add_action('wp_head','accesspress_header_styles_scripts');

// if (isset($_POST['download'])) {
// 
//        $blogname = str_replace(" ", "", get_option('blogname'));
//        $date = date("m-d-Y");
//        $json_name = $blogname."-".$date;  //Namming the filename will be generated.
// 
//        $options = get_option('accesspress_staple'); // Get all options data, return array
//        foreach ($options as $key => $value) {
//            $value = maybe_unserialize($value);
//            $need_options[$key] = $value;
//        }
// 
//        $json_file = json_encode($need_options);  //Encode data into json data
// 
//       
//        	header("Cache-Control: public, must-revalidate");
//			header("Pragma: hack");
//			header("Content-Type: text/plain");
//			header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
//			echo $json_file;
//			die();
//    }  
//
//            if (isset($_GET['restore'])) {
//                if ($_FILES['import']['error'] > 0) {
//                    wp_die("Error happens");
//                }
//                else {
//                    $file_name = $_FILES['import']['name'];  //Get the name of file
//                    $file_ext = strtolower(end(explode(".", $file_name)));  //Get extension of file
//                    $file_size = $_FILES['import']['size'];  //Get size of file
//                    /* Ensure uploaded file is JSON file type and the size not over 500000 bytes
//                     * You can modify the size you want
//                     */
//                    if (($file_ext == "json") && ($file_size < 500000)) {
//                        $encode_options = file_get_contents($_FILES['import']['tmp_name']);
//                        $options = json_decode($encode_options, true);
//                        foreach ($options as $key => $value) {
//                            update_option($key, $value);
//                        }
//                        echo "<div class='updated'><p>All options are restored successfully.</p></div>";
//                    }
//                    else {
//                        echo "<div class='error'><p>Invalid file or file size too big.</p></div>";
//                    }
//                }
//            }