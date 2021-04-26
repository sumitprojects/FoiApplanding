<?php

class Elementor_Widget_Carreer extends \Elementor\Widget_Base {

	public function get_name() {
		return 'carreer';
	}

	public function get_title() {
		return __( 'Carreer', 'plugin-name' );
	}
    public function get_icon() {
		return 'fa fa-bar-chart';
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
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Title Here' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
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
		$repeater->add_control(
			'button_label', [
				'label' => __( 'Button Label', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Apply Now' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
	
		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
	$settings = $this->get_settings_for_display();
		echo '<section class="career-section"><div class="card career-card"><div class="card-body"><ul class="list-group list-group-flush careers-list-group">';
		if ( $settings['list'] ) {
			foreach (  $settings['list'] as $item ) {
				echo '<li class="list-group-item "media landing-feature elementor-repeater-item-' . $item['_id'] . '"><div><h5 class="position-title">'.$item['list_title'].'</h5><p class="position-location">'.$item['list_content'].'</p> </div><a href="'.$item['website_link']['url'].'" class="btn btn-primary apply-btn">'.$item['button_label'].'</a></li>';
			}
		}
		echo '</ul></div></div></section>';	
	}

	protected function _content_template() {
		?>
<# if ( settings.list.length ) { #>
    <dl>
        <# _.each( settings.list, function( item ) { #>
            <dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</dt>
            <dd>{{{ item.list_content }}}</dd>
            <# }); #>
    </dl>
    <# } #>
        <?php
	}
}

                                    
                                   
                                