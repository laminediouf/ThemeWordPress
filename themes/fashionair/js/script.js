/**
 * Custom Script -  released Under GPL / MIT
 * 
 * Released on: March 10, 2017
 */
/* for scroll arrow */
jQuery(document).ready(function() {
   	 var amountScrolled = 300;

	jQuery(window).scroll(function() {
		if ( jQuery(window).scrollTop() > amountScrolled )
		{ jQuery('a.back-to-top').fadeIn('slow');
		} else { jQuery('a.back-to-top').fadeOut('slow');}
	});

	jQuery('a.back-to-top').click(function() {
		jQuery('html, body').animate({
			scrollTop: 0
		}, 700);
		return false;
	});
});

/* Slider 1 */
jQuery(document).ready(function() {
	var swiper = new Swiper('.home-slider', {
        pagination: '.swiper-pagination1',
		nextButton: '.swiper-button-next1',
        prevButton: '.swiper-button-prev1',
        slidesPerView: '1',
        paginationClickable: true,
        spaceBetween: 10,
		autoplay:2500,
		loop:true		
    });
});
 
/* home-blog*/
jQuery(document).ready(function() {
    var swiper = new Swiper('.home-blog',{
		 autoHeight: true, //enable auto height
		nextButton: '.swiper-button-next5',
        prevButton: '.swiper-button-prev5',
		slidesPerView: '1',
        paginationClickable: true,
		autoplay: false,
		loop:true,
		breakpoints: {
            1040: {
                slidesPerView: 1,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }		
    });
 });
	
	