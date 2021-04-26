	<?php

	class Elementor_PriceBox_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'pricebox';
		}

		public function get_title() {
			return __( 'pricebox', 'plugin-name' );
		}
		public function get_icon() {
			return 'fa fa-inr';
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
				'list_heading1', [
					'label' => __( 'Heading1', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'List Heading1' , 'plugin-domain' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'list_heading2', [
					'label' => __( 'Heading2', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'List Heading1' , 'plugin-domain' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'payment_period', [
					'label' => __( 'Payment Period', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Payment Period' , 'plugin-domain' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'list_content', [
					'label' => __( 'Content', 'plugin-domain' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
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
					'show_external' => true,
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
					],
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

			$repeater->add_control(
				'custom_class',
				[
					'label' => __( 'Custom Css', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					
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
							'list_heading1' => __( 'Title #1', 'plugin-domain' ),
							'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						],
						[
							'list_heading1' => __( 'Title #2', 'plugin-domain' ),
							'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
						],
					],
					'title_field' => '{{{ list_heading1 }}}',
				]
			);

			$this->end_controls_section();

		}

		protected function render() {
			$settings = $this->get_settings_for_display();
			
			
		
			echo '<div class="row">';
			if ( $settings['list'] ) {
				foreach (  $settings['list'] as $item ) {
				
					echo '<div class="col"><div class="card pricing-card border-'.$item['custom_class'].'"><div class="card-body elementor-repeater-item-' . $item['_id'] . '"><h3 class="mb-1">'. $item['list_heading1'] .'</h3> <h3 class="mb-1 text-warning">'. $item['list_heading2'] .'</h3><p class="payment-period">'.$item['payment_period'].'</p><p>' . $item['list_content'] . '</p><a class="btn btn-outline-'.$item['custom_class'].' btn-rounded"'.'href='.$item['website_link']['url'].'>Get Started</a></div></div></div>';
				}
			}
			echo '</div>';
		}

		protected function _content_template() {
			?>
	<# if ( settings.list.length ) { #>
		<dl>
			<# _.each( settings.list, function( item ) { #>
				<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_heading1 }}}</dt>
				<dd>{{{ item.list_content }}}</dd>
				<# }); #>
		</dl>
		<# } #>
			<?php
		}
	}

						