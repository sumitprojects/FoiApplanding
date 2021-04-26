<?php
class Elementor_Link_Widget extends \Elementor\Widget_Base {


public function get_name() {
    return 'website_link';
}

public function get_title() {
    return __( 'Link', 'plugin-name' );
}


public function get_icon() {
    return 'fa fa-link';
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
        'button_lebel', [
            'label' => __( 'Button Label', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Button Label' , 'plugin-domain' ),
            'label_block' => true,
        ]
    );
    $this->add_control(
        'website_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_label'    =>true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
    );

    $this->end_controls_section();

}

protected function render() {
       
    
    $settings = $this->get_settings_for_display();
    
    echo '<a href="' . $settings['website_link']['url'] .'">'.$settings['button_lebel'].' </a>';
   

}


}