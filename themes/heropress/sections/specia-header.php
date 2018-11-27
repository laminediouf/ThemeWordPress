<?php 					
	$hide_show_social= get_theme_mod('hide_show_social','off'); 
	$hide_show_contact_infos= get_theme_mod('hide_show_contact_infos','off'); 
	
	if ( ($hide_show_social) && ($hide_show_contact_infos) != 'off') :
?>
<section class="header-top-info-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-5">
                <!-- Start Social Media Icons -->
				<?php 
					$hide_show_social= get_theme_mod('hide_show_social','off'); 
					$facebook_link= get_theme_mod('facebook_link',''); 
					$linkedin_link= get_theme_mod('linkedin_link',''); 
					$twitter_link= get_theme_mod('twitter_link',''); 
					$googleplus_link= get_theme_mod('googleplus_link','');
					$vk_link= get_theme_mod('vk_link','');					
				?>
				
				
					<?php if($hide_show_social == 'on') { ?>
						<ul class="social pull-left">
							<?php if($facebook_link) { ?> 
								<li><a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a></li>
							<?php } ?>
							
							<?php if($linkedin_link) { ?> 
							<li><a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a></li>
							<?php } ?>
							
							<?php if($twitter_link) { ?> 
							<li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a></li>
							<?php } ?>
							
							<?php if($googleplus_link) { ?> 
							<li><a href="<?php echo esc_url($googleplus_link); ?>"><i class="fa fa-google-plus"></i></a></li>
							<?php } ?>
							
							<?php if($vk_link) { ?> 
							<li><a href="<?php echo esc_url($vk_link); ?>"><i class="fa fa-vk"></i></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
                <!-- /End Social Media Icons-->
            </div>
			
			<?php 
				$hide_show_contact_infos= get_theme_mod('hide_show_contact_infos','off'); 
				$header_email= get_theme_mod('header_email',''); 
				$header_contact= get_theme_mod('header_contact_num',''); 
			?>

            <div class="col-md-6 col-sm-7">
				<?php if($hide_show_contact_infos == 'on') { ?>
					<!-- Start Contact Info -->
					<ul class="info pull-right">
						<?php if($header_email) { ?> 
							<li><a href="mailto:<?php echo esc_html($header_email); ?>"><i class="fa fa-envelope"></i> <?php echo esc_html($header_email); ?> </a></li>
						<?php } ?>
						
						<?php if($header_contact) { ?> 
							<li><a href="tel:<?php echo esc_html($header_contact); ?>"><i class="fa fa-phone-square"></i> <?php echo esc_html($header_contact); ?></a></li>
						<?php } ?>
					</ul>
					<!-- /End Contact Info -->
				<?php } ?>
			</div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
<?php endif; ?>