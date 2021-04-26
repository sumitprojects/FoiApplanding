<?php
/**
 * Header V3 Template
 *
 * @package Thim_Starter_Theme
 */


?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
        <a class="navbar-brand" href="index.html">
            <?php	
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                        echo '<img  src="' . esc_url( $logo[0]). '" alt="logo" class="logo-img img-responsive">';
                } else {
                        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                }
             ?>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
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
</div>