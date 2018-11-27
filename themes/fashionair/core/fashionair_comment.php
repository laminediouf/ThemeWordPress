<?php 
function fashionair_comment( $comment, $args, $depth ) 	{	
	//get theme data
	global $fashionair_comment_data;
	//translations
	$leave_reply = $fashionair_comment_data['translation_reply_to_coment'] ? $fashionair_comment_data['translation_reply_to_coment'] : __('Reply', 'fashionair'); ?>
	<div class="col-xs-12 comment-detail">
		<div class="col-xs-2 comments-pics"><?php echo get_avatar(get_the_author_meta( 'ID' ),$size = '60'); ?></div>
		<div class="col-xs-10 comments-text">
			<h3><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo get_the_author(); ?></a></h3>
			<span class="time"><?php comment_time('g:i a'); ?></span>
			<?php echo "<pre>";	comment_text();		echo "</pre>"; ?>				
			<span id="#commentarea"> <?php comment_date(); ?> </span> <br>
			<a href="#" class="btn">
				<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
				<i class="fa fa-commenting icon"></i>
			</a>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_attr( 'Your comment is awaiting moderation.'); ?></em><br/>
			<?php endif; ?> 
		</div>
	</div>
<?php } ?>