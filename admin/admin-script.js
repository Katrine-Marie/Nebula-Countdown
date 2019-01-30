jQuery(function(){

	jQuery('#createShortcode').on('submit', function(e){
		e.preventDefault();

		var $inputs = jQuery('#createShortcode :input');

    var values = {};
    $inputs.each(function() {
        values[this.name] = jQuery(this).val();
    });

		// console.log(values);

		var $shortcode = '<div class="shortcodeModal"><div class="modalContent"><span class="shortcodeClose">X</span> <p>Insert the following shortcode into the post or page where you wish to display the countdown:</p><p><code>[count_flipclock year='+ values.countdown_year +' month='+ values.countdown_month +' day='+ values.countdown_day +' hour='+ values.countdown_hour +' minute='+ values.countdown_minute +']</code> </p></div></div>';

		jQuery('.wrap').append($shortcode);

		jQuery('.shortcodeClose').on('click', function(){
			console.log('clicked');
			jQuery('.shortcodeModal').hide();
		});
	});

});
