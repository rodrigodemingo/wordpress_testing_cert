<?php
/**
 * @package AccessPress Staple
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if(of_get_option('single_feature_image') !=0){ ?>
        <?php the_post_thumbnail(); ?>
        <?php } ?>
        <?php if(of_get_option('single_date') !=0){ ?>
		<div class="entry-meta">
			<?php accesspress_staple_posted_on(); ?>
		</div><!-- .entry-meta -->
         <?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-staple' ),
				'after'  => '</div>',
			) );
		?>
         
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php accesspress_staple_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
