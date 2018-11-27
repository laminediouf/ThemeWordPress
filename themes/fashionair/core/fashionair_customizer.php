<?php
add_action('customize_register', 'fashionair_customizer' );
function fashionair_customizer( $wp_customize ) {	
	wp_enqueue_style('fashionair-customizr-css', get_template_directory_uri() .'/assets/css/customizr.css');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() .'/assets/css/font-awesome.css');
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.navbar-brand h1',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.navbar-header p',
	) );
	
	/*** fashionair customizer Panel */
	/* Upgrade to Premium*/
	/*$wp_customize->add_section( 'fashionair_upgrade' , array(
		'title'      	=> __( 'SALE ! Upgrade to Fashionair Premium', 'fashionair' ),
		'priority'   	=> 1,
		'panel'=>'',
	));

	$wp_customize->add_setting( 'fashionair_upgrade', array(
		'default'    		=> null,
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( new fashionair_More_Control( $wp_customize, 'fashionair_upgrade', array(
		'label'    => __( 'Fashionair Premium', 'fashionair' ),
		'section'  => 'fashionair_upgrade',
		'settings' => 'fashionair_upgrade',
		'priority' => 1,
	)));*/


	$wp_customize->add_panel( 'fashionair_theme_option', array('title' =>  __( 'Theme Options', 'fashionair' ), 'priority' => 2));
	
	// logo settings
	$wp_customize->add_section('logo_option',  array(	'title' => 'General Options',
			'description' => __( 'Here you can customize Your Logo','fashionair'),
			'panel'=>'fashionair_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 25,
	));
	$wp_customize->add_setting(
		'fashionair_options_logo_height',
		array(
			'type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'        => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new fashionair_Range_Value_Control( $wp_customize, 'fashionair_logo_height', array(
	'type'     => 'range-value',
	'section'  => 'logo_option',
	'settings' => 'fashionair_options_logo_height',
	'label'    => __( 'Logo Height','fashionair' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 500,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
	)));
	
	$wp_customize->add_setting(
		'fashionair_options_logo_width',
		array(
			'type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control( new fashionair_Range_Value_Control( $wp_customize, 'fashionair_logo_width', array(
	'type'     => 'range-value',
	'section'  => 'logo_option',
	'settings' => 'fashionair_options_logo_width',
	'label'    => __('Logo Width','fashionair' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 500,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
	)));
	
	$wp_customize->add_setting(
		'fashionair_options_breadcrumb',
		array(
			'type'    => 'theme_mod',
			'sanitize_callback'=>'fashionair_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
	));
	
	$wp_customize->add_control( new fashionair_Customizer_Toggle_Control( $wp_customize, 'fashionair_options_breadcrumb', array(
		'label'	      => __( 'Show Breadcrumb ', 'fashionair' ),
		'section'     => 'logo_option',
		'settings'    => 'fashionair_options_breadcrumb',
	)));
	
	
	/*** slider Option section ***/
	$wp_customize->add_section('fashionair_slider_images',  array(	'title' => 'Slider Options',
			'description' => __( 'This is Post Slider use post thumbnails to show in with in slider','fashionair'),
			'panel'=>'fashionair_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,)
		);
	
	$wp_customize->add_setting('fashionair_options_slider_enable',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_checkbox',
			'capability' =>'edit_theme_options',)
		);
		
	$wp_customize->add_control( 'fashionair_slider_enable',
			array('label'=> __('Show Slider Section On Front-Page', 'fashionair' ),
			'type'=>'checkbox',
			'section'    => 'fashionair_slider_images',
			'settings'   => 'fashionair_options_slider_enable',
		) );
	
	// Slider type
	$wp_customize->add_setting('slider_layout', 
		array(
		'type'=>'theme_mod',
			'default'           => 'slider',        
			'sanitize_callback' => 'fashionair_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'slider_layout', 
		array(      
			'label'     => esc_html__('Select Slider Type', 'fashionair'),
			'section'   => 'fashionair_slider_images',
			'settings'  => 'slider_layout',
			'type'      => 'select',
			'choices'   => array(
				'slider'  => esc_html__('Slider Display Pages', 'fashionair'),
				'banner'  => esc_html__('Banner Image', 'fashionair'),
				'sliderpost'  => esc_html__('Slider Display Posts', 'fashionair'),
			),
		)
	);
	
	// Banner Image
	$wp_customize->add_setting('banner_image', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fashionair_sanitize_text',
		)
	);

	$wp_customize->add_control(new WP_Customize_Image_Control( 
		$wp_customize,'banner_image', 
		array(
		'label'       => esc_html__('Banner Image', 'fashionair'),
		'description' => esc_html__( 'Select Banner Image', 'fashionair' ), 
		'section'     => 'fashionair_slider_images',   
		'settings'    => 'banner_image',		
		'active_callback'   => 'fashionair_slider_layout_banner',	
		)
	));
	$wp_customize->add_setting('banner_title', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'fashionair_sanitize_text',
		)
	);

	$wp_customize->add_control('banner_title', 
		array(
		'label'       => esc_html__('Banner Title', 'fashionair'),
		'section'     => 'fashionair_slider_images',   
		'settings'    => 'banner_title',		
		'type'        => 'text',	
		'active_callback'   => 'fashionair_slider_layout_banner',	
		)
	);
	$wp_customize->add_setting('banner_desc', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'fashionair_sanitize_text',
		)
	);

	$wp_customize->add_control('banner_desc', 
		array(
		'label'       => esc_html__('Banner Description', 'fashionair'),
		'section'     => 'fashionair_slider_images',   
		'settings'    => 'banner_desc',		
		'type'        => 'text',	
		'active_callback'   => 'fashionair_slider_layout_banner',	
		)
	);
	
	// page for slider//
	for($i=1; $i<=3; $i++){
	$wp_customize->add_setting(
		'slider_page_'.$i,
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability' => 'edit_theme_options'
		));
	$wp_customize->add_control( new fashionair_Page_Control( $wp_customize,  'slider_page_'.$i, array(
			'label'        => 'Select page for slider '.$i,
			'section'    => 'fashionair_slider_images',
			'settings'   => 'slider_page_'.$i,
			'active_callback'   => 'fashionair_slider_layout',	
	)));
	}
	
	//post for slider//
	for($i=1; $i<=3; $i++) {
		$wp_customize->add_setting('fashionair_options_slider_image'.$i,
			array('type' => 'theme_mod',
				'default'=>'',
				'sanitize_callback'=>'fashionair_sanitize_integer',
				'capability'=> 'edit_theme_options',
			) );
		
		$wp_customize->add_control(	new fashionair_Slider_Image_Control( $wp_customize, 'slider_image'.$i,
			array('label' => __( 'Slider Image','fashionair').$i, 
			'section'  => 'fashionair_slider_images',
			'settings' => 'fashionair_options_slider_image'.$i,		
			'active_callback'   => 'fashionair_slider_layout_post',
		) ) );
	}
	
	
/*** Product Template Title options ***/
	$wp_customize->add_section('fashionair_product_section',
		array('title'=>__("Product Options",'fashionair'),
			'panel'=>'fashionair_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 45
		));

	
	$wp_customize->add_setting('fashionair_options_prodcut',
		array('default'=>'',
			'type'=>'theme_mod',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);
	$wp_customize->add_control('fashionair_product',
		array('label'  => __( 'Footer Product Text', 'fashionair' ),
			'type'=>'text',
			'section'    => 'fashionair_product_section',
			'settings'   => 'fashionair_options_prodcut'
		) );
		
		
	/*** Blog Settings section ***/
	
	$wp_customize->add_section('fashionair_blog_option',
		array( 'title' => __('Blog Options','fashionair'),
			'description' => 'Customize Home Blog Section',
			'panel'=>'fashionair_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35,)
		);
	
	$wp_customize->add_setting('fashionair_options_show_blog',
		array('type' => 'theme_mod',
			'default'=> '',
			'sanitize_callback'=>'fashionair_sanitize_checkbox',
			'capability' => 'edit_theme_options',)
		);
	$wp_customize->add_control( 'fashionair_enable_blog', 
		array('label'=> __( 'Show Blog Section On Front-Page', 'fashionair' ),
			'type'=>'checkbox',
			'section' => 'fashionair_blog_option',
			'settings'=> 'fashionair_options_show_blog',
		) );
	
	$wp_customize->add_setting('fashionair_options_blog_title',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability' => 'edit_theme_options',)
		);
		
	$wp_customize->add_control( 'fashionair_blog_title', 
		array('label'=> __( 'Blog Title','fashionair' ),
			'section'=> 'fashionair_blog_option',
			'settings'=> 'fashionair_options_blog_title',
		));
		
	$wp_customize->selective_refresh->add_partial( 'fashionair_options_blog_title', array(
		'selector' => '.fashion-blog .cor_section_heading',
	) );
	
	$wp_customize->add_setting('fashionair_options_blog_desc',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability' => 'edit_theme_options',
		));
		
	$wp_customize->add_control(new fashionair_One_Page_Editor($wp_customize,'fashionair_options_blog_desc', array(
			'label'        => esc_html__( 'blog Description','fashionair' ),
			'section'    => 'fashionair_blog_option',
			'active_callback' => 'fashionair_show_on_front',
			'include_admin_print_footer' => true,
			'settings'   => 'fashionair_options_blog_desc',
	)));
		
	$wp_customize->add_setting('fashionair_options_blog_cat',
		array('type' => 'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=> 'edit_theme_options',
		) );
	
	
	
	$wp_customize->add_control(	new fashionair_category_Control( $wp_customize, 'fashionair_blog_cat',
		array('label' => __( 'Select Blog category','fashionair'), 
			'section'  => 'fashionair_blog_option',
			'settings' => 'fashionair_options_blog_cat',			
		) ) );
	
	/*** Footer Options secton ***/
	$wp_customize->add_section('fashionair_footer_section',
		array('title'=>__("Footer Options",'fashionair'),
			'panel'=>'fashionair_theme_option',
			'capability'=>'edit_theme_options',
			'priority' => 35
		));

	
	$wp_customize->add_setting('fashionair_options_footer_copyright',
		array('default'=>'',
			'type'=>'theme_mod',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);
	$wp_customize->add_control('fashionair_footer_copyright',
		array('label'  => __( 'Footer Copyright Text', 'fashionair' ),
			'type'=>'text',
			'section'    => 'fashionair_footer_section',
			'settings'   => 'fashionair_options_footer_copyright'
		) );
	
	$wp_customize->selective_refresh->add_partial( 'fashionair_options_footer_copyright', array(
		'selector' => '.fashion-social p',
	) );
	
	$wp_customize->add_setting('fashionair_options_developed_by_text',
		array('type'=>'theme_mod',
			'default'=>'',		
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);
	$wp_customize->add_control( 'fashionair_developed_by_text', 
		array('label'	=> __( 'Developed By Text', 'fashionair' ),
			'type'=>'text',
			'section'    => 'fashionair_footer_section',
			'settings'   => 'fashionair_options_developed_by_text')
		);
	
	$wp_customize->add_setting('fashionair_options_developed_by_link',
		array( 'type'=>'theme_mod',
			'default'=>'',		
			'capability'=>'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw')
		);
	$wp_customize->add_control( 'fashionair_developed_by_link', 
		array('label' => __( 'Developed By Link', 'fashionair' ),
			'type'=>'url',
			'section'  => 'fashionair_footer_section',
			'settings'=> 'fashionair_options_developed_by_link'
		) );
	
	$wp_customize->add_setting('fashionair_options_powered_by_text',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);	
	$wp_customize->add_control( 'fashionair_powered_by_text',
		array('label' => __( 'Powered By Text', 'fashionair' ),
			'type'=>'text',
			'section'    => 'fashionair_footer_section',
			'settings'   => 'fashionair_options_powered_by_text')
		);
	
	$wp_customize->add_setting('fashionair_options_powered_by_link',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);
	
	$wp_customize->add_control( 'fashionair_powered_by_link',
		array('label' => __( 'Powered By Link', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_footer_section',
			'settings'   => 'fashionair_options_powered_by_link')
		);
		
	$wp_customize->add_setting('fashionair_options_powered_by_text_wp',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'fashionair_sanitize_text',
			'capability'=>'edit_theme_options')
		);	
	$wp_customize->add_control( 'fashionair_powered_by_text_wp',
		array('label' => __( 'WordPress Text', 'fashionair' ),
			'type'=>'text',
			'section'    => 'fashionair_footer_section',
			'settings'   => 'fashionair_options_powered_by_text_wp')
		);
	
	/**** Social options section ****/
	$wp_customize->add_section('fashionair_social_section',
		array('title'=>__('Social Options','fashionair'),
		'panel'=>'fashionair_theme_option',
		'capability'=>'edit_theme_options',
		'priority' => 35,
		));
		
	// footer
	$wp_customize->add_setting('fashionair_options_footer_sme',
		array('default'=>'',
			'type'=>'theme_mod',
			'sanitize_callback'=>'fashionair_sanitize_checkbox',
			'capability'=>'edit_theme_options')
		);
	$wp_customize->add_control( 'fashionair_footer_social_media_enbled',
		array('label' => __( 'Enable the footer social media', 'fashionair' ),
			'type'=>'checkbox',
			'section' => 'fashionair_social_section',
			'settings' => 'fashionair_options_footer_sme'
	) );
	
	$wp_customize->selective_refresh->add_partial( 'fashionair_options_footer_sme', array(
		'selector' => '.fashion-social .social-icons',
	) );
	
	//Facebook
	$wp_customize->add_setting('fashionair_options_facebook_link',
		array('default'=>'',
			'type'=>'theme_mod',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'fashionair_facebook_link',
		array('label'=> __( 'Facebook Link', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_social_section',
			'settings'   => 'fashionair_options_facebook_link'
	) );
	// linked in
	$wp_customize->add_setting('fashionair_options_linkedin_link',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'fashionair_linkedin_link',
		array('label'=> __( 'Linkedin', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_social_section',
			'settings'   => 'fashionair_options_linkedin_link'
	) );
	
	// Google Plus
	$wp_customize->add_setting('fashionair_options_googleplus_link',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'fashionair_googleplus_link',
		array('label'=> __( 'Google Plus', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_social_section',
			'settings'   => 'fashionair_options_googleplus_link'
	) );
	
	// twitter
	$wp_customize->add_setting('fashionair_options_twitter_link',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'fashionair_twitter_link',
		array('label'=> __( 'Twitter Plus', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_social_section',
			'settings'   => 'fashionair_options_twitter_link'
		) );
	
	// You tube
	$wp_customize->add_setting('fashionair_options_youtube_link',
		array('type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback'=>'esc_url_raw',
			'capability'=>'edit_theme_options'
		));
	$wp_customize->add_control( 'fashionair_youtube_link',
		array('label'=> __( 'Youtube Link', 'fashionair' ),
			'type'=>'url',
			'section'    => 'fashionair_social_section',
			'settings'   => 'fashionair_options_youtube_link'
		) );

}
	//sanitize callbacks
	function fashionair_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
	
	function fashionair_sanitize_checkbox( $input ) {
		if ( $input == 1 ) { return 1;  } else {    return 0;    }
	}
	
	function fashionair_sanitize_integer( $input ) {
		return (int)($input);
	}

	/* class for thumbnail images */
	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_Slider_Image_Control' ) ) :
	class fashionair_Slider_Image_Control extends WP_Customize_Control {  
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish'); 
				$slide_id = new WP_Query( $args ); ?>
				<select <?php $this->link(); ?> >
				<?php if($slide_id->have_posts()):
					while($slide_id->have_posts()):
						$slide_id->the_post();
						if(has_post_thumbnail()){ ?>
						 <option value= "<?php echo esc_attr(get_the_id()); ?>"<?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
						<?php }
					endwhile; 
				 endif; ?>
				 </select>
				<?php
		}  /* public function ends */
	}/*   class ends */
	endif;

//* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_category_Control' ) ) :
class fashionair_category_Control extends WP_Customize_Control 
{   public function render_content(){ ?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php  $fashionair_category = get_categories(); 		?>
		<select <?php $this->link(); ?> >
			<?php foreach($fashionair_category as $category){ ?>
				<option value= "<?php echo esc_attr($category->name); ?>" <?php if($this->value()=='') echo 'selected="selected"';?> ><?php echo esc_attr($category->name); ?></option>
			<?php } ?>
		</select> <?php
	}  /* public function ends */
}/*   class ends */
endif; 

/* class for pages */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_Page_Control' ) ) :
class fashionair_Page_Control extends WP_Customize_Control 
{  
 public function render_content(){ ?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php  
		$list_pages = get_pages(); ?>
		<select <?php $this->link(); ?> >
		<?php foreach($list_pages as $list){ ?>
		<option value= "<?php echo esc_attr($list->ID); ?>" <?php if($this->value()== $list->ID ) echo 'selected="selected"';?>><?php echo esc_attr($list->post_title); ?></option>
		<?php } ?>
		 </select>
		 <?php
}  /* public function ends */
}/*   class ends */
endif; 

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_Range_Value_Control' ) ) :
class fashionair_Range_Value_Control extends WP_Customize_Control {
	public $type = 'range-value';
	
	 // Enqueue scripts/styles.

	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'customizer-range-value-control', get_stylesheet_directory_uri() . '/assets/css/customizer-range-value-control.css', array(), rand() );
	}
	 
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_attr($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_Customizer_Toggle_Control' ) ) :
class fashionair_Customizer_Toggle_Control extends WP_Customize_Control {
	public $type = 'ios';
	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 3.4.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-toggle-control', get_stylesheet_directory_uri() . '/js/customizer-toggle-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'pure-css-toggle-buttons', get_stylesheet_directory_uri() . '/assets/css/pure-css-togle-buttons.css', array(), rand() );
	}
	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 */
	public function render_content() {
		?>
		<label>
			<div style="display:flex;flex-direction: row;justify-content: flex-start;">
				<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
				<input id="cb<?php echo esc_attr($this->instance_number) ?>" type="checkbox" class="tgl tgl-<?php echo esc_attr($this->type)?>" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
				<label for="cb<?php echo esc_attr($this->instance_number) ?>" class="tgl-btn"></label>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_attr($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
endif;

/* Page editor control */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/* Class to create a custom tags control */
class fashionair_One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/assets/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}

function fashionair_show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'fashionair_show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}

if ( ! function_exists( 'fashionair_slider_layout' ) ) :

    function fashionair_slider_layout( $control ) { 
        
        if( 'slider' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

//=============================================================
		// Active callback for Banner
//=============================================================
if ( ! function_exists( 'fashionair_slider_layout_banner' ) ) :

    function fashionair_slider_layout_banner( $control ) { 
        
        if( 'banner' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

if ( ! function_exists( 'fashionair_slider_layout_post' ) ) :

    function fashionair_slider_layout_post( $control ) { 
        
        if( 'sliderpost' == $control->manager->get_setting('slider_layout')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'fashionair_More_Control' ) ) :
class fashionair_More_Control extends WP_Customize_Control {
	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() { ?>
	
		<div class="row">
		 <div class="col-md-4">
			<div class="stitched"><?php _e("Coupon Code : REPUBLICDAY","fashionair") ;?>	</div>	
		</div> 
		</div>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
				<a style="margin-bottom:20px;margin-left:20px;" href="http://infigosoftware.in/fashionair-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Fashionair Premium','fashionair'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri().'/assets/images/fashionair.png';?>">
			</div>			
					<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Fashionair Premium-Features','fashionair'); ?></h3>
				<ul style="padding-top:20px">
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo Commerce Ready For E-commerce Site','fashionair'); ?></li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Multiple Home Template','fashionair'); ?></li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Multiple Contact Us Template','fashionair'); ?></li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Multiple About Us Template','fashionair'); ?></li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Multiple Template','fashionair'); ?></li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('10 Plus Shortcode','fashionair'); ?> </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Fully Responsive Designs','fashionair'); ?> </li>						
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Unlimited Color Scheme','fashionair'); ?> </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Easy Customizartzed Option Panel','fashionair'); ?> </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','fashionair'); ?>   </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('HTML 5 & Css3','fashionair'); ?>   </li>	
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','fashionair'); ?>	
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Theme Option Panel','fashionair'); ?> </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Customs Widgets','fashionair'); ?> </li>
					<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Box Layout','fashionair'); ?>  </li>				
				</ul>
			</div>	
			<div class="col-md-2 col-sm-6 upsell-btn">					
				<a style="margin-bottom:20px;margin-left:20px;" href="http://infigosoftware.in/fashionair-premium/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Explora Premium','fashionair'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Fashionair?', 'fashionair' ); ?></span>
			<p>
				<?php printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'fashionair' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/fashionair?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;
?>