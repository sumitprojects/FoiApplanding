<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_SingleImage_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'image';
	}

	public function get_title() {
		return __( 'image', 'plugin-name' );
	}

	
	public function get_icon() {
		return 'fa fa-file-image-o';
	}


	public function get_categories() {
		// return [ 'first-category','second-category' ];
		return [ 'foipplandding'];
	}
	
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'default' => 'large',
				'separator' => 'none',
			]
		);


		$this->end_controls_section();
	
	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();
		// Get image url
		echo '<img src="' . $settings['image']['url'] . '" alt="">';
		// Get image by id
	}
	

}
