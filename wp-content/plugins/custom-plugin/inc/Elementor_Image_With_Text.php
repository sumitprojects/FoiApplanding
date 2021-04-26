			<?php

			class Elementor_Image_With_Text extends \Elementor\Widget_Base {

				public function get_name() {
					return 'image-with-text';
				}

				public function get_title() {
					return __( 'Image With Text', 'plugin-name' );
				}
				public function get_icon() {
					return 'fa fa-picture-o';
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
						'list_title', [
							'label' => __( 'Title', 'plugin-domain' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => __( 'List Title' , 'plugin-domain' ),
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
								[
									'list_title' => __( 'Title #2', 'plugin-domain' ),
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
					echo '<div class="row mb-5">';
					if ( $settings['list'] ) {
						foreach (  $settings['list'] as $item ) {
							echo '<div class="col foi-feature"><div class="elementor-repeater-item-' . $item['_id'] . '"><img src="'.$item['image']['url'].'" alt="user" class="feature-icon"><h5>' . $item['list_title'] . '</h5></div>';
							echo '<div>' . $item['list_content'] . '</div></div>';
						}
					}
					echo '</div>';
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