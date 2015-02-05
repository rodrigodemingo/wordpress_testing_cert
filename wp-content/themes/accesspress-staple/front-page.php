<?php
/**
 * This is the front page code
 * 
 * 
 */
get_header();
?>
   <?php
if (of_get_option('enable_about') == 1) {
$post_id = of_get_option('about_section');
if(!empty($post_id)):
?>
    <section class="about">
        <div class="ak-container">
        <?php 
            $about_args  = array('post_type'=>'post', 'page_id' => $post_id, 'post_status' => 'publish','posts_per_page'=>1);
            $about_query = new WP_Query($about_args);
            if ($about_query->have_posts()):
            while ($about_query->have_posts()):
            $about_query->the_post();
?>
              <h2 class="title home-title"><?php the_title(); ?></h2>
              <div class="about-excerpt home-description"><?php the_content(); ?></div>
              <figure class="about-img wow fadeInLeft" data-wow-delay="0.8s">
              <?php if (has_post_thumbnail()):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'about-image'); ?>
			  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /><?php
            endif;
?>
              </figure>
              <div class="btn-wrapper wow pulse" data-wow-delay="0.5s"><a href="<?php the_permalink(); ?>" class="btn"><?php echo of_get_option('about_view_more'); ?></a></div>
              <?php
        endwhile;
    endif;

?>
        </div>
       </section>
       <?php
       endif;
}
?>
<?php if(of_get_option('enable_feature')==1){
    $service_cat = of_get_option('feature_section');
    if(!empty($service_cat)):
?>
    <section class="our-services wow fadeInUp animated" data-wow-delay="0.8s">
    <?php 
      
      $service_title = of_get_option('feature_title');
      $service_desc = of_get_option('feature_desc'); 
    ?>
      <div class="ak-container">  
        <h2 class="title home-title"><?php echo $service_title ?></h2>
        <div class="services-desc home-description"><?php echo $service_desc ?></div>
        <div class="service-block-wrapper ">
            <?php 
            $feature_args   = array('cat'=>$service_cat, 'posts_per_page'=>4, 'post_status'=>'publish');
            $feature_query  = new WP_Query($feature_args);
            $i = 0;
            if($feature_query->have_posts()):
            while($feature_query->have_posts()):$feature_query->the_post();
            $i++
            ?>
            <div class="service-<?php echo $i; ?> service-block">
                    <figure class="service-icons">
                        <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()):
                             $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'feature-image'); ?>
            			     <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /><?php
                             else:
                             ?>
                             <i class="fa fa-desktop"> </i>
                             <?php                             
                             endif;
                        ?>
                        </a>
                    </figure>
                    <div class="service-title">
                        <?php the_title(); ?>
                    </div>
                    <div class="service-content">
                        <?php echo accesspress_excerpt(get_the_content(), 250, true); ?>
                    </div>
            </div>
            <?php
            endwhile;
            endif;
            if(of_get_option('feature_more')==1){
            $service_cat_url = get_category_link($service_cat);
            ?> 
            <div class="clearfix"> </div>
            <div class="btn-wrapper service-btn wow pulse" data-wow-delay="0.5s"><a href="<?php echo $service_cat_url ?>"><?php echo of_get_option('feature_more_text'); ?></a></div>
            <?php
            }
            endif;
             ?>  
            </div> 
        </div>
    </section>
<?php 
	}
?>
<?php if(of_get_option('enable_pricing')==1)
{
    $ak_pricing_title   =   of_get_option('pricing_table_title');
    $ak_pricing_desc    =   of_get_option('pricing_table_desc');
    
    $ak_pricing_type1    =   of_get_option('table1_title');
    $ak_pricing_unit1    =   of_get_option('table1_price_unit');
    $ak_pricing_price1   =   of_get_option('table1_price');
    $ak_pricing_content1 =   of_get_option('table1_desc');
    $ak_pricing_more_text1   = of_get_option('table1_more_text');
    $ak_pricing_more_link1   = of_get_option('table1_more_link');
    
    $ak_pricing_type2    =   of_get_option('table2_title');
    $ak_pricing_unit2    =   of_get_option('table2_price_unit');
    $ak_pricing_price2   =   of_get_option('table2_price');
    $ak_pricing_content2 =   of_get_option('table2_desc');
    $ak_pricing_more_text2   = of_get_option('table2_more_text');
    $ak_pricing_more_link2   = of_get_option('table2_more_link');
    
    $ak_pricing_type3    =   of_get_option('table3_title');
    $ak_pricing_unit3    =   of_get_option('table3_price_unit');
    $ak_pricing_price3   =   of_get_option('table3_price');
    $ak_pricing_content3 =   of_get_option('table3_desc');
    $ak_pricing_more_text3   = of_get_option('table3_more_text');
    $ak_pricing_more_link3   = of_get_option('table3_more_link');
    
    $table1    = of_get_option('enable_table1');
    $table2    = of_get_option('enable_table2');
    $table3    = of_get_option('enable_table3');
    
    
?>  <section class="pricing-table">
        <div class="ak-container">
            <div class="topic home-title"><?php echo $ak_pricing_title; ?></div>
            <div class="pricing-table-desc home-description"><?php echo $ak_pricing_desc; ?></div>
            <div class="price-table-wrapper"> 
                <div class="table1 price-table wow fadeInLeft"  data-wow-delay="1s">
                    <div class="title-price">
                        <span class="pricing-type"><?php echo $ak_pricing_type1; ?></span>
                        <span class="price"><span class="dollar"><?php echo $ak_pricing_unit1; ?></span><?php echo $ak_pricing_price1; ?></span>
                    </div>
                    <div class="table-content">
                        <?php echo $ak_pricing_content1; ?>                        
                    </div>
                    <div class="product-link">
                        <a href="<?php echo $ak_pricing_more_link1; ?>"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php echo $ak_pricing_more_text1 ?></a>
                    </div>
                </div>
            
                <div class="table2 price-table wow fadeInUp" data-wow-delay="1s">
                    <div class="title-price">
                        <span class="pricing-type"><?php echo $ak_pricing_type2; ?></span>
                        <span class="price"><span class="dollar"><?php echo $ak_pricing_unit2; ?></span><?php echo $ak_pricing_price2; ?></span>
                    </div>
                    <div class="table-content">
                        <?php echo $ak_pricing_content2; ?>                        
                    </div>
                    <div class="product-link">
                        <a href="<?php echo $ak_pricing_more_link2; ?>"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php echo $ak_pricing_more_text2 ?></a>
                    </div>
                </div>
                
                <div class="table3 price-table wow fadeInRight"  data-wow-delay="1s">
                    <div class="title-price">
                        <span class="pricing-type"><?php echo $ak_pricing_type3; ?></span>
                        <span class="price"><span class="dollar"><?php echo $ak_pricing_unit3; ?></span><?php echo $ak_pricing_price3; ?></span>
                    </div>
                    <div class="table-content">
                        <?php echo $ak_pricing_content3; ?>                        
                    </div>
                    <div class="product-link">
                        <a href="<?php echo $ak_pricing_more_link3; ?>"> <span> <i class="fa fa-thumbs-o-up"></i> </span><?php echo $ak_pricing_more_text3 ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

} 
?>
<?php
if(of_get_option('enable_awesome_feature')){
    $ak_af_title    =   of_get_option('feature_awesome_title');
    $ak_af_desc     =   of_get_option('feature_awesome_desc');
    $ak_af_cat      =   of_get_option('feature_awesome_section');
    if(!empty($ak_af_cat)){
?>
    <section class="awesome-feature">
        <div class="ak-container">    
            <h2 class="title home-title"><?php echo $ak_af_title;?></h2>
           <div class="awesome-feature-desc home-description"><?php echo $ak_af_desc;?></div>
           <?php $a=0;?>
           <div class="clearfix"> </div>
           <div class="aw-block-wrapper wow fadeInUp" data-wow-delay="0.5s">
           <?php 
            $af_args    =   array('cat'=>$ak_af_cat, 'post_status'=>'publish', 'posts_per_page'=>8);
            $af_query   =   new WP_Query($af_args);
            if($af_query->have_posts()):
            while($af_query->have_posts()):$af_query->the_post();    
            $a++;
           ?><div class="<?php if ($a%2==0){echo 'aw-right';} else{ echo 'aw-left';}?>">
                <div class="aw-wrapper clearfix">
                    <div class="aw-content">
                        <div class="aw-title"><?php the_title() ?></div>
                        <div class="aw-excerpt"><?php echo accesspress_excerpt(get_the_content(), 120);?></div>
                    </div>
                <figure class="awesome-icons">
                    <span> 
                     <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()):
                             $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'feature-image'); ?>
            			     <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /><?php
                             else:
                             ?>
                              <i class="fa fa-font"></i>
                             <?php                             
                             endif;
                        ?>
                        </a>
                   </span>
                </figure>
                </div>
           </div>
                <?php 
                endwhile;
                endif;
                 ?>
           </div>
           <div class="clearfix"></div>
           <?php
           if(of_get_option('awesome_feature_more')==1){
            $ak_af_cat_url = get_category_link($ak_af_cat);
            ?> 
            <div class="btn-wrapper wow pulse" data-wow-delay="0.5s"><a href="<?php echo $ak_af_cat_url ?>" class="btn"><?php echo of_get_option('awesome_feature_more_text'); ?></a></div> 
            <?php } ?>  
       </div>
    </section>
<?php }
} ?>
<?php
	if(of_get_option( 'enable_portfolio')==1){
	   $ak_port_cat    =   of_get_option('portfolio_section');
       if(!empty($ak_port_cat)):
?>
    <section class="portfolio">
      <div class="ak-container">
        <h2 class="title home-title"><?php echo of_get_option('portfolio_title'); ?></h2>
        <div class="port-desc home-description"><?php echo of_get_option('portfolio_desc'); ?></div>
      </div>
        <div id="portfolio-grid" class="masinory">
        <?php
            
            $ak_port_cat    =   of_get_option('portfolio_section');
            $port_args      =   array('cat'=>$ak_port_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
            $port_query     =   new WP_Query($port_args);
            if($port_query->have_posts()):
            while($port_query->have_posts()):$port_query->the_post();
            ?>
            <div class="port-wrap wow fadeInUp animated" data-wow-delay="0.8s">
                <figure class="portfolio-image">
                 <?php if (has_post_thumbnail()):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'port-image'); ?>
			  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /><?php
            endif;
?>
              </figure>
              <figcaption class="portfolio-content">
                <div class="portfolio-content-wrapper">
                <a href="<?php the_permalink() ?> " class="read-more"> <i class="fa fa-link"> </i> </a>
                <div class="port-title"><?php the_title(); ?></div>
                <div class="port-content"><?php echo accesspress_excerpt(get_the_content(), 50, true) ?></div>
            </div>
              </figcaption>
            </div>
            <?php
            endwhile;
            endif;
            
        ?>
            
        </div>
    </section>
    
<?php
endif;
	}
?>    
<?php
	if(of_get_option('enable_client')==1){
	   $ak_cl_img  =   of_get_option('partner_logo');
      if(!empty($ak_cl_img)){
?>
    <section class="clients-logo">
        <div class="ak-container">
            <h2 class="clients-logo-title"><?php echo of_get_option('client_title'); ?></h2>
            <div class="clients-logo-wrapper <?php if(of_get_option('view_type_clients')=='scroll'){ echo of_get_option('view_type_clients');} else{ echo of_get_option('view_type_clients'); } ?>">
            <?php 
            foreach($ak_cl_img as $ak_img){?>
            <div class="client-slider">
                <a href="<?php echo $ak_img['link'] ?>">
                    <img src="<?php echo $ak_img['image']?>" />
                </a>
            </div>
            <?php }
            ?>
            </div>
        </div>
    </section>
<?php
	}
    }
?>
<?php
	if(of_get_option('enable_call_to_action')==1){
    $call_to_action = of_get_option('call_to_action_desc');
    if(!empty($call_to_action)):
?>
    <section class="call-to-action">
        <div class="ak-container">
            <h2 class="title home-title"><?php echo of_get_option('call_to_action_title'); ?></h2>
            <div class="call-to-action-desc home-description"><?php echo of_get_option('call_to_action_desc') ?></div>
            <div class="cta-link wow shake" data-wow-delay="0.5s"><a href="<?php echo of_get_option('call_to_action_more_link') ?>"><?php echo of_get_option('call_to_action_more_text') ?></a></div>
        </div>
    </section>
<?php
endif;
	}
?>
<?php
	if(of_get_option('enable_team_member')==1){
    $ak_team_cat    =   of_get_option('team_member_category');
    if(!empty($ak_team_cat)):
?>
    <section class="our-team-member">
        <div class="ak-container">
         <h2 class="title home-title"><?php echo of_get_option('team_member_title'); ?></h2>
         <?php
            
            $team_args      =   array('cat'=>$ak_team_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
            $team_query     =   new WP_Query($team_args);
            $i=0;
            if($team_query->have_posts()):
            while($team_query->have_posts()):$team_query->the_post();
            $i++;
         ?>
            <div class="team-block <?php if($i==1 || $i==2){ echo "wow fadeInLeft animated"; }  elseif($i==3 || $i==4){echo "wow fadeInRight animated";} ?>" data-wow-delay="0.8s">
                <figure class="team-image">
                <?php if (has_post_thumbnail()):
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'team-image'); ?>
			  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /><?php
            endif;
            ?>
                <div class="team-hover">
                    <div class="team-hover-icon"><a href="<?php the_permalink(); ?>" <i class="fa fa-link">  </i></a> </div>
                    <div class="team-hover-text"><?php echo accesspress_excerpt(get_the_content(), 60);?></div>
                </div>
                </figure>
                <div class="team-name"><?php the_title(); ?></div>
                
            </div>
            <?php 
            endwhile;
            endif;
            
            ?>
        </div>
    </section>
<?php
    endif;
	}
?>
<?php
	if(of_get_option('enable_stat_counter')==1){
	   $stat_num1 = of_get_option('counter1_numeric');
       $stat_num2 = of_get_option('counter2_numeric');
       $stat_num3 = of_get_option('counter3_numeric');
       $stat_num4 = of_get_option('counter4_numeric');
       if(!empty($stat_num1) || !empty($stat_num2) || !empty($stat_num3) || !empty($stat_num4)):
?>
    <section class="stat-counter">
        <div class="ak-container">
            <div class="stat-counter-title"><?php echo of_get_option('stat_counter_title'); ?></div>
            <div class="stat-counter-desc"><?php echo of_get_option('stat_counter_desc'); ?></div>
            <?php
            	if(of_get_option('enable_stat_counter1')){
            ?>
            <div class="statcounters statcounter-1 wow fadeInLeft" data-wow-delay="0.5">
            <div class="statcounter-circle">
                <div class="inner-circle"><h2><span class="counter"><?php echo of_get_option('counter1_numeric') ?></span></h2></div>
                <div class="stat-fa"><i class="fa <?php echo of_get_option('counter1_font_awesome'); ?>"></i></div>
                <div class="coutner-title"><h2><?php echo of_get_option('counter1_text') ?></h2></div>
            </div>
            </div>
            <?php
            	}
            ?>
             <?php
            	if(of_get_option('enable_stat_counter2')){
            ?>
             <div class="statcounters statcounter-2 wow fadeInLeft" data-wow-delay="1s">
            <div class="statcounter-circle">
                <div class="inner-circle"><h2><span class="counter"><?php echo of_get_option('counter2_numeric') ?></span></h2></div>
                <div class="stat-fa"><i class="fa <?php echo of_get_option('counter2_font_awesome'); ?>"></i></div>
                <div class="coutner-title"><h2><?php echo of_get_option('counter2_text') ?></h2></div>
            </div>
            </div>
            
            <?php
            	}
            ?>
             <?php
            	if(of_get_option('enable_stat_counter3')){
            ?>
             <div class="statcounters statcounter-3 wow fadeInLeft" data-wow-delay="2s">
            <div class="statcounter-circle">
                <div class="inner-circle"><h2><span class="counter"><?php echo of_get_option('counter3_numeric') ?></span></h2></div>
                <div class="stat-fa"><i class="fa <?php echo of_get_option('counter3_font_awesome'); ?>"></i></div>
                <div class="coutner-title"><h2><?php echo of_get_option('counter3_text') ?></h2></div>
            </div>
            </div>
            
            <?php
            	}
            ?>
             <?php
            	if(of_get_option('enable_stat_counter4')){
            ?>
             <div class="statcounters statcounter-4 wow fadeInLeft" data-wow-delay="3s">
            <div class="statcounter-circle">
                <div class="inner-circle"><h2><span class="counter"><?php echo of_get_option('counter4_numeric') ?></span></h2></div>
                <div class="stat-fa"><i class="fa <?php echo of_get_option('counter4_font_awesome'); ?>"></i></div>
                <div class="coutner-title"><h2><?php echo of_get_option('counter4_text') ?></h2></div>
            </div>
            </div>
            
            <?php
            	}
            ?>
        </div>
    </section>
<?php
endif;
	}
?>

<?php
    if(of_get_option('enable_blog')==1){
        $ak_blog_cat    =   of_get_option('blog');
?>
<?php 
                if(!empty($ak_blog_cat)):?>
            
    <section class="blogs wow fadeInUp animated" data-wow-delay="0.8s">
       <div class="ak-container">
        <div class="blog-title"><?php echo of_get_option('blog_title'); ?></div>
        <div class="blog-desc"><?php echo of_get_option('blog_desc'); ?></div>
             <div class="blog-wrap clearfix">
           <?php
                $ak_enbale_date =   of_get_option('enable_blog_date');
                $ak_enbale_auther = of_get_option('enable_blog_authur');
                $blog_args      =   array('cat'=>$ak_blog_cat, 'post_status'=>'publish', 'posts_per_page'=>3);
                $blog_query     =   new WP_Query($blog_args);
                if($blog_query->have_posts()):
                while($blog_query->have_posts()):$blog_query->the_post();
                $blog_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'blog-image', true);
                ?><div class="blog-in-wrap">
                    <div class="blog-image"><img src="<?php echo $blog_image[0] ?>" alt="<?php the_title(); ?>" /></div>
                    <div class="blog-date"><?php echo get_the_date('d M'); ?></div>
                    <div class="blog-title-comment">
                    <div class="blog-single-title"><?php the_title(); ?></div>
                    <a href="<?php echo  get_author_posts_url( get_the_author_meta( 'ID' ) );  ?>"><div class="blog-author"><i class="fa fa-user"></i><?php the_author(); ?></div></a>
                    <div class="blog-comment">
                        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                		<span class="comments-link"><?php comments_popup_link( __( 'No comment', 'accesspress-staple' ), __( '1 Comment', 'accesspress-staple' ), __( '% Comments', 'accesspress_staple' ) ); ?></span>
                		<?php endif; ?>
                    </div>
                </div>
                    <div class="blog-content"><?php echo accesspress_excerpt(get_the_content(), 120); ?>
                    <span><a href="<?php the_permalink() ?>"><?php echo of_get_option('blog_more_text_single') ?></a></span>
                    </div>
                  </div>
                <?php
                endwhile;
                endif;
                ?>
            </div>
             <?php
           if(of_get_option('enable_blog_more')==1){
            $ak_blog_cat_url = get_category_link($ak_blog_cat);
            ?> 

            <div class="btn-wrapper wow pulse animated" data-wow-delay="0.5s" ><a href="<?php echo $ak_blog_cat_url ?>" class="btn"><?php echo of_get_option('blog_more_text'); ?></a></div> 
            <?php } 
            
            ?>  
       </div> 
    </section>
<?php    
endif;    
}
?>


<?php if(of_get_option('enable_testomonial')==1){ 
      $ak_tm_cat  =   of_get_option('testomonial_category');
      if(!empty($ak_tm_cat)):
?>
    <section class="testimonial">
        <div class="ak-container">
            <div class="testimonial-title"><?php echo of_get_option('testomonial_title'); ?></div>
            <?php 
                ?>
            <div class="testimonial-slider">
                <?php
                $tm_args    =   array('cat'=>$ak_tm_cat, 'post_status'=>'publish');
                $tm_query   =   new WP_Query($tm_args);
                if($tm_query->have_posts()):
                while($tm_query->have_posts()):$tm_query->the_post();
                ?>
                <div class="tm-slider">
                    <?php echo accesspress_excerpt(get_the_content(), 220);?>
                    <div class="title-test"> <?php the_title();?> </div>
                    
                </div>
                <?php 
                endwhile;
                endif;
                
                ?>
            </div>
        </div>
    </section>
    <?php
    endif;
	}?>
    
 <?php
 get_footer();
?>