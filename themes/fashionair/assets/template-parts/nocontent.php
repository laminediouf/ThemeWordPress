<?php 
/**
 * The No - Content
 *
 * 
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<div class="col-md-12 blog-desc-border"> 
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php /* translators: %1$s: new post */ printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fashionair' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_attr( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
			<?php
				get_search_form();
		else : ?>
			<p><?php esc_attr( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.'); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</div>