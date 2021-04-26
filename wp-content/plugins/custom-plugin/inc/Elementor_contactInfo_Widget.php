	<?php

	class Elementor_contactInfo_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'contact';
		}

		public function get_title() {
			return __( 'Conatct Details', 'plugin-name' );
		}
		public function get_icon() {
			return 'fa fa-address-book';
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
				'contact_heading', [
					'label' => __( 'Heading1', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'List Heading1' , 'plugin-domain' ),
					'label_block' => true,
				]
			);
		
			$repeater->add_control(
				'contact_content', [
					'label' => __( 'Content', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'List Content' , 'plugin-domain' ),
					'show_label' => false,
				]
			);
			$repeater->add_control(
				'image',
				[
					'label' => __( 'Choose Image', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
	
			$repeater->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'image',
					'default' => 'thumbnail',
					'separator' => 'none',
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
							'contact_heading' => __( 'Title #1', 'plugin-domain' ),
							'contact_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						],
						[
							'contact_heading' => __( 'Title #1', 'plugin-domain' ),
							'contact_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						],
					],
					'title_field' => '{{{ contact_heading }}}',
				]
			);

			$this->end_controls_section();

		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			
			echo '<div class="row">';
			if ( $settings['list'] ) {
				foreach (  $settings['list'] as $item ) {
				
					echo '<div class="contact-widget media"><img src="'.$item['image']['url'].'"  alt="monitor" width="50px"><div class="media-body"><h6 class="widget-title">'.$item['contact_heading'].'</h5><p class="widget-content">'.$item['contact_content'].'</p></div></div>';
				}
			}
			echo '</div>';
		}

		protected function _content_template() {
			?>
	<# if ( settings.list.length ) { #>
	    <dl>
	        <# _.each( settings.list, function( item ) { #>
	            <dt class="elementor-repeater-item-{{ item._id }}">{{{ item.contact_heading }}}</dt>
	            <dd>{{{ item.contact_content }}}</dd>
	            <# }); #>
	    </dl>
	    <# } #>
	        <?php
		}
	}