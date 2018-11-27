<?php function fashionair_navigation() { ?>
	<div class="fashionair_blog_pagination"> 
		<div class="fashionair_blog_pagi"><?php posts_nav_link(); ?> 	</div> 
	</div>
<?php } 

	// Page navigation
	function fashionair_page_links()
	{	$defaults = array(
			'before'           => '<p>' . __( 'Pages:', 'fashionair' ),
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => __( 'Next page', 'fashionair' ),
			'previouspagelink' => __( 'Previous page', 'fashionair' ),
			'pagelink'         => '%',
			'echo'             => 1
		);
		wp_link_pages( $defaults );
	}

?>