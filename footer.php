<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sfp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<div class="row">
					<div class="site-info col-xs-6">
						<p>Copyright 2017 &copy; <a href="<?php echo esc_url( __( 'http://www.sfp.com/', 'sfp.com' ) ); ?>"><?php printf( esc_html__( 'sfp.com', 'sfp.com' ), 'sfp.com' ); ?></a></p>
					</div><!-- .site-info -->
					<div class="site-design col-xs-6">
						<p>Webdesign by <a target="_blank" href="<?php echo esc_url( __( 'http://dh-creative-webdesign.de/', 'dh-creative-webdesign' ) ); ?>"><?php printf( esc_html__( 'dh-creative-webdesign.de', 'dh-creative-webdesign' ), 'dh-creative-webdesign' ); ?></a></p>
					</div><!-- .site-design -->
				</div><!-- .row-->
			</div> <!-- .col-xs-12 col-md-offset-3-->
		</div><!-- .row-->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
