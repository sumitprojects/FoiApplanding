    <?php

    class Elementor_aboutRepeater_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'about';
        }

        public function get_title() {
            return __( 'About', 'plugin-name' );
        }
        public function get_icon() {
            return 'fa fa-star';
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
                    'default' => __( 'List Title' , 'plugin-domain' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'small_title', [
                    'label' => __( 'Samll Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Small Title' , 'plugin-domain' ),
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
            echo '';
            if ( $settings['list'] ) {
                $counter=1;
                foreach (  $settings['list'] as $item ) {
                    $counter++;
                if($counter%2==0):
                echo '<section class="foi-page-section pt-0"><div class="row"><div class="col-md-6 mb-4 mb-md-0 pr-lg-0"><h2 class="about-section-one-title">'.$item['list_title'].' <span class="font-weight-normal">'.$item['small_title'].'</span></h2> <div class="about-section-one-content"><p>'.$item['list_content'].'</p></div></div>';
                echo '<div class="col-md-6 pl-lg-0 d-flex align-items-center align-items-lg-end"><img src="'.$item['image']['url'].'" alt="about" class="img-fluid" width="448px"></div></div></section>';
                else:
                    echo '<section class="foi-page-section"><div class="row"><div class="col-md-6 mb-5 mb-md-0"><img src="'.$item['image']['url'].'" alt="about" class="img-fluid" width="448px"></div>';
                    echo '<div class="col-md-6"><h2 class="about-section-one-title">'.$item['list_title'].' <span class="font-weight-normal">'.$item['small_title'].'</span></h2> <div class="about-section-one-content"><p>'.$item['list_content'].'</p></div></div></div></section>';
                endif;  
                }
            }
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

                        
                                
                            
                        