<?php 
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fashionair
 * @since 2.0
 * @version 2.0
 */

if ( post_password_required() ) : ?>
	<p><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.','fashionair'); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
	<div class="col-md-12 col-sm-12 col-xs-12 comments">		
	<h1><?php echo comments_number(__('No Comments','fashionair'), __('1 Comment','fashionair'), '% Comments'); ?></h1>	
	<?php wp_list_comments( array( 'callback' => 'fashionair_comment' ) ); ?>		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_attr_e( 'Comment navigation','fashionair'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'fashionair') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'fashionair') ); ?></div>
		</nav>
		<?php endif;  ?>
	</div>		
	<?php endif; ?>
<?php if ( comments_open() ) : ?>	
<div class="col-md-12 col-sm-12 col-xs-12 w_comment_form">
		<?php $fields=array(
		'author' => '<div class="form-group col-md-12"><label for="name">'. esc_html__( 'Name','fashionair').'<small>*</small></label><input name="author" id="name" type="text" id="exampleInputEmail1" class="form-control"></div>',
		'email' => '<div class="form-group col-md-12"><label for="email">'. esc_html__( 'Email','fashionair').'<small>*</small></label><input  name="email" id="email" type="text" class="form-control"></div>',
	);
	function fashionair_comment_fields($fields) { 
		return $fields;
	}
	add_filter('wl_comment_form_default_fields','fashionair_comment_fields');
		$fashionair_defaults = array(
		'fields'=> apply_filters( 'wl_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group col-md-12"><label for="message"> Message *</label>
		<textarea id="comment" name="comment" class="form-control" rows="5"></textarea></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . esc_html__( "Logged in as ",'fashionair' ).'<a href="'. esc_url (admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( esc_url(get_permalink() )).'" title="Log out of this account">'.esc_html__(" Log out?",'fashionair').'</a>' . '</p>', /* translators: %s: reply to name */ 
		'title_reply_to' => esc_html__( 'Leave Your comments Here to %s','fashionair'),
		'class_submit' => 'btn',
		'label_submit'=>esc_html__( 'Post Comment','fashionair'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h3>'.esc_html__('Leave Your Comment Here','fashionair').'</h3>',		
		'role_form'=> 'form',		
		);
		comment_form($fashionair_defaults); ?>		
		
</div>
<?php endif; // If registration required and not logged in ?>