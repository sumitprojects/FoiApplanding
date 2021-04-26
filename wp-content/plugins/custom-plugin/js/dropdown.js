jQuery(document).ready(function() {
jQuery('[data-setting="image_icon"]').change(function() {
	jQuery('div.elementor-control-content > div.elementor-control-media').hide();
	jQuery('div.elementor-control-image_size').hide();

	if (jQuery(this).val() == 'image') {
		jQuery('div.elementor-control-icon').hide();
		jQuery('div.elementor-control-content > div.elementor-control-media').show();
		jQuery('div.elementor-control-image_size').show();
	} else {
		jQuery('div.elementor-control-icon').show();
		jQuery('div.elementor-control-content > div.elementor-control-media').hide();
		jQuery('div.elementor-control-image_size').hide();

	}
	//Image Option Hide
});


});
