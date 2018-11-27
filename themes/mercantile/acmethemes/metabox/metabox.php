<?php
/**
 * Custom Metabox
 * Only added icon not special data
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'mercantile_meta_add_featured_icon' )):
    function mercantile_meta_add_featured_icon() {
        add_meta_box(
            'mercantile_meta_fields', // $id
            __( 'Featured Icon', 'mercantile' ), // $title
            'mercantile_meta_featured_icon_callback', // $callback
            'page', // $page
            'side', // $context
            'core'// $priority
        );
    }
endif;
add_action('add_meta_boxes', 'mercantile_meta_add_featured_icon');

/**
 * Callback function for metabox
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('mercantile_meta_featured_icon_callback') ) :
    function mercantile_meta_featured_icon_callback(){
        global $post;
        $mercantile_featured_icon = get_post_meta( $post->ID, 'mercantile-featured-icon', true );
        wp_nonce_field( basename( __FILE__ ), 'mercantile_meta_fields_nonce' );
       ?>
        <table class="form-table page-meta-box">
            <tr>
                <td>
                    <label class="description" for="mercantile-featured-icon"><?php _e( 'Enter Featured Icon', 'mercantile' ); ?></label>
                    <input class="widefat" id="mercantile-featured-icon" type="text" name="mercantile-featured-icon" value="<?php echo esc_attr( $mercantile_featured_icon ); ?>" placeholder="fa-desktop"/>
                    <br />
                    <small>
                        <?php 
                        _e( 'Featured Icon Used in Widgets', 'mercantile' );
                        printf( __( '%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'mercantile' ), '<br /><a href="'.esc_url( 'http://fontawesome.io/cheatsheet/' ).'" target="_blank">','</a>',"<code>","</code>" );
                        ?>
                    </small>

                </td>
            </tr>
        </table>
    <?php
}
endif;

/**
 * Save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('mercantile_meta_save_featured_icon') ) :
    function mercantile_meta_save_featured_icon( $post_id ) {
        /*
         * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
         *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
         * */
        if (
            !isset( $_POST[ 'mercantile_meta_fields_nonce' ] ) ||
            !wp_verify_nonce( $_POST[ 'mercantile_meta_fields_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
        ){
            return;
        }
        //Execute this saving function
        if(isset($_POST['mercantile-featured-icon'])){
            $new = sanitize_text_field( $_POST['mercantile-featured-icon'] );
            update_post_meta( $post_id, 'mercantile-featured-icon', $new );
        }
    }
endif;
add_action('save_post', 'mercantile_meta_save_featured_icon');