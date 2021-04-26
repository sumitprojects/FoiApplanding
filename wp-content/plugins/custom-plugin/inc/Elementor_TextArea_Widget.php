<?php
class Elementor_TextArea_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'description';
    }

    public function get_title() {
        return __( 'TextArea', 'plugin-name' );
    }
    public function get_icon() {
        return 'fa fa-paragraph';
    }
    public function get_categories() {
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
			'item_description',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Default description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo '<p>' . $settings['item_description'] . '</p>';
	}

	protected function _content_template() {
		?>
		<p>{{{ settings.item_description }}}</p>
		<?php
	}


}