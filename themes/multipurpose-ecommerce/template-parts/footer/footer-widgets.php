<?php
/**
 * Displays footer widgets if assigned
 */

?>

<?php
if ( is_active_sidebar( 'footer-1' ) ||
	 is_active_sidebar( 'footer-2' ) ||
	 is_active_sidebar( 'footer-3' ) ||
	 is_active_sidebar( 'footer-4' ) ) :
?>

	<div class="widget-area">
		<div class="row">
			<?php
			if ( is_active_sidebar( 'footer-1' ) ) { ?>
				<div class="widget-column footer-widget-1 col-md-3">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php }
			if ( is_active_sidebar( 'footer-2' ) ) { ?>
				<div class="widget-column footer-widget-2 col-md-3">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php }
			if ( is_active_sidebar( 'footer-3' ) ) { ?>
				<div class="widget-column footer-widget-3 col-md-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php }
			if ( is_active_sidebar( 'footer-4' ) ) { ?>
				<div class="widget-column footer-widget-4 col-md-3">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php } ?>
		</div>
	</aside>

<?php endif; ?>