<?php

class Elementor_Widget_Test extends \Elementor\Widget_Base {

	public function get_name() {
		return 'repeater';
	}

	public function get_title() {
		return __( 'Repeater', 'plugin-name' );
	}
    public function get_icon() {
		return 'fa fa-repeat';
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
			'select_layout', [
				'label' => __( 'Select Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => __( 'feature' , 'plugin-domain' ),
				'options' => [
					'feature'  => __( 'Feature', 'plugin-domain' ),
					'faq-home-footer' => __( 'FAQ Home', 'plugin-domain' ),
					'faq' => __( 'FAQ', 'plugin-domain' ),
					
				],
			]
		);
		$repeater = new \Elementor\Repeater();

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
	if($settings['select_layout']=='feature'):
		echo '<div class="row">';
		if ( $settings['list'] ) {
			foreach (  $settings['list'] as $item ) {
				echo '<div class="col"><div class="elementor-repeater-item-' . $item['_id'] . '"><h5>' . $item['list_title'] . '</h5></div>';
				echo '<div>' . $item['list_content'] . '</div></div>';
			}
		}
		echo '</div>';
	elseif($settings['select_layout']=='faq-home-footer'):
			echo '<div class="row">';
		if ( $settings['list'] ) {
			$len = count($settings['list'])%2==0?count($settings['list']):count($settings['list'])+1;
			$counter=0;
			foreach ( $settings['list'] as $index => $item ) {
				echo $counter==0?'<div class="col-lg-6">':'';
				$counter++;
				if($counter<$len/2):
					echo '<div class="card mb-3 landing-faq-card elementor-repeater-item-' . $item['_id'] . '"><div class="card-header bg-white" id="faq'.$index.'Title"><a href="#faq'.$index.'Collapse" class="d-flex align-items-center" data-toggle="collapse" aria-expanded="true"><h6 class="mb-0">'. $item['list_title'] .'</h6> <i class="far fa-plus-square ml-auto"></i></a></div><div id="faq'.$index.'Collapse" class="collapse" aria-labelledby="faq'.$index.'Title" style=""><div class="card-body"><p class="mb-0 text-gray">' . $item['list_content'] . '</p></div></div></div>';
				endif;
				echo $counter==$len/2?'</div>':'';
				$counter = $counter==$len/2?0:$counter;
			}
		}
		echo '</div>';
	else:
		echo '<section class="py-5 mb-5">';
		if ( $settings['list'] ) {
			$counter=0;
			foreach (  $settings['list'] as $index => $item ) {
				$counter++;
				echo '<div class="card faq-card elementor-repeater-item-' . $item['_id'] . '"><div class="card-header bg-white" id="faq'.$index.'Title"><a href="#faq'.$index.'Collapse" class="d-flex align-items-center" data-toggle="collapse" aria-expanded="true"><h6 class="mb-0">'. $item['list_title'] .'</h6> <i class="far fa-plus-square ml-auto"></i></a></div><div id="faq'.$index.'Collapse" class="collapse" aria-labelledby="faq'.$index.'Title" style=""><div class="card-body"><p class="mb-0 text-gray">' . $item['list_content'] . '</p></div></div></div>';
			}
		}
		echo '</section>';
	endif;	
	
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
