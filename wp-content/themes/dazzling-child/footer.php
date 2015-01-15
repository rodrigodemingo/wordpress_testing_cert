<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dazzling
 */
?>
	</div><!-- #content -->

<!-- ==========================================================================
CALL TO ACTION 
========================================================================== -->

<div class="col-md-12 jumbotron">
    <h1>Ready to talk about your next project?</h1>
    <p><a href="/certtelematics/contact-us/" title="Contact Us" class="btn btn-primary btn-lg" role="button">Contact us</a>
    </p>
</div>
<!-- ==========================================================================
FOOTER
========================================================================== -->

	<div id="footer-area">
		<div class="container footer-inner">
			<?php get_sidebar( 'footer' ); ?>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<?php dazzling_social(); ?>
				<nav role="navigation" class="col-md-9">
					<?php dazzling_footer_links(); ?>
				</nav>
				<div class="copyright col-md-3">
					<?php echo of_get_option( 'custom_footer_text', 'dazzling' ); ?>
					<!-- <?php dazzling_footer_info(); ?> -->
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>