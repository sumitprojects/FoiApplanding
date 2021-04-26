<?php

class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'testimonial';
    }

    public function get_title() {
        return __( 'Testimonial', 'plugin-name' );
    }
    public function get_icon() {
        return 'fa fa-text-width';
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
                'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                        'name' => __( 'Title #1', 'plugin-domain' ),
                        'position' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
                    ],
                    [
                        'name' => __( 'Title #2', 'plugin-domain' ),
                        'position' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        echo '<div class="row">';
        if ( $settings['list'] ) {
            foreach (  $settings['list'] as $item ) {
                echo '<div class="col"><div class="team-member-card"><img src="'.$item['image']['url'].'" alt="user" class="team-member-avatar"><div class="media-body"><h6 class="mb-0">'.$item['name'].'</h6><p>'.$item['position'].'</p></div></div></div>';
            }
        }
        echo '</div>';
    }

    protected function _content_template() {
        ?>
<# if ( settings.list.length ) { #>
    <dl>
        <# _.each( settings.list, function( item ) { #>
            <dt class="elementor-repeater-item-{{ item._id }}">{{{ item.name }}}</dt>
            <dd>{{{ item.position }}}</dd>
            <# }); #>
    </dl>
    <# } #>
        <?php
    }
}