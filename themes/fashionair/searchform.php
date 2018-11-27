<?php 
/**
 * Template for displaying search forms in Theme
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<div class="form-group fashion-search">	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" /> 
		<input value="<?php the_search_query(); ?>" name="s" id="search" class="form-control" placeholder="<?php esc_attr_e( "Search Your New Query ?", 'fashionair' ); ?>" required="" type="text">
		<span class="input-group-btn"><button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button></span>
	</form> 
</div>