        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
                <!-- <a class="navbar-brand" href="index.html"> -->
                <?php	
                                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                            if ( has_custom_logo() ) {
                                                    echo '<img  src="' . esc_url( $logo[0]). '" alt="logo" class="logo-img img-responsive">';
                                            } else {
                                                    echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                                            }
                                    ?>


                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    <?php
                                    wp_nav_menu(
                                        array(
                                            
                                            'name'        => 'primary',
                                            'theme_location' => 'primary',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav mt-2 mt-lg-0">%3$s</ul>',
                                            
                                        )
                                    );
                                    ?>

                             <?php if(get_option('users_can_register')): ?>
                                        <ul class="navbar-nav mt-2 mt-lg-0">
                                            <li class="nav-item mr-2 mb-3 mb-lg-0">
                                                <a class="btn btn-secondary" href="register.html">Sign up</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="btn btn-secondary" href="login.html">Login</a>
                                            </li>           
                                        </ul>
                        <?php endif; ?>
                </div>
            </nav>
            <div class="header-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Great app that makes your life awesome</h1>
                        <p class="text-dark">He has led a remarkable campaign, defying the traditional mainstream
                            parties courtesy of his En Marche! movement.</p>
                        <button class="btn btn-primary mb-4">Get Started</button>
                        <div class="my-2">
                            <p class="header-app-download-title">GET OUR MOBILE APP</p>
                        </div>
                        <div>
                            <button class="btn btn-app-download mr-2"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/ios.svg"
                                    alt="App store"></button>
                            <button class="btn btn-app-download"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/android.svg"
                                    alt="play store"></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/app_1.png" alt="app"
                            width="388px" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>