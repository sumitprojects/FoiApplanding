		<?php

		class Elementor_Counter_Widget extends \Elementor\Widget_Base {

			public function get_name() {
				return 'counter';
			}

			public function get_title() {
				return __( 'counter', 'plugin-name' );
			}
			public function get_icon() {
				return 'fa fa-plus-square-o';
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
					'star',
					[
						'label' => __( 'Star', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( '*****' , 'plugin-domain' ),
						'label_block' => true,
						
					]
				);
				$repeater->add_control(
					'list_heading', [
						'label' => __( 'Heading1', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'List Heading1' , 'plugin-domain' ),
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
					'name', [
						'label' => __( 'Name', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Name' , 'plugin-domain' ),
						'label_block' => true,
					]
				);
				$repeater->add_control(
					'position', [
						'label' => __( 'Position', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Position' , 'plugin-domain' ),
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
								'list_heading' => __( 'Title #1', 'plugin-domain' ),
								'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
							],
							[
								'list_heading' => __( 'Title #2', 'plugin-domain' ),
								'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
							],
						],
						'title_field' => '{{{ list_heading }}}',
					]
				);

				$this->end_controls_section();

			}

			protected function render() {
				$settings = $this->get_settings_for_display();
				
				echo '<div class="row">';
				if ( $settings['list'] ) {
					foreach (  $settings['list'] as $item ) {
						$counter=$item['star'];
						echo '<div class="col"><div class="foi-rating">';
						if($counter<=5):
						echo str_repeat('<span class="fas fa-star checked"></span>',(int)$counter);
						
						endif;
						echo '</div><h5 class="foi-review-heading">'.$item['list_heading'].'</h5><p class="foi-review-content">'.$item['list_content'].'</p><div class="media foi-review-user"><img src="'.$item['image']['url'].'" alt="user" class="avatar"><div class="media-body"><h6 class="mb-0">'.$item['name'].'</h6><p>'.$item['position'].'</p></div></div></div>';
					}
				}
				echo '</div>';
			}

			protected function _content_template() {
				?>
		<# if ( settings.list.length ) { #>
			<dl>
				<# _.each( settings.list, function( item ) { #>
					<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_heading }}}</dt>
					<dd>{{{ item.list_content }}}</dd>
					<# }); #>
			</dl>
			<# } #>
				<?php
			}
		}