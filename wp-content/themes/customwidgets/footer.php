<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CustomWidgets
 */

?>

<footer id="colophon" class="foi-footer text-white site-footer">
    <div class="container">
        <div class="row footer-content">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                <a href="<?php echo home_url('contact'); ?>" class="btn btn-danger btn-lg">Contact form</a>
            </div>
        </div>
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <div class="py-3">
                    <img src="<?php echo get_theme_mod('footer_logo'); ?>" alt="FOI">
                </div>
                <p class="font-os font-weight-semibold mb3"><?php echo get_theme_mod('footer_desc'); ?></p>
                <div>
                    <button class="btn btn-app-download mr-2"><img src="<?php echo get_theme_mod('button_logo1'); ?>"
                            alt="App store"></button>
                    <button class="btn btn-app-download"><img src="<?php echo get_theme_mod('button_logo2'); ?>"
                            alt="play store"></button>
                </div>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <?php dynamic_sidebar('payment_details') ?>

                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <?php dynamic_sidebar('services') ?>

                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <p>
                    &copy; foi. 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer"
                        class="text-reset">BootstrapDash</a>.
                </p>
                <p><?php echo get_theme_mod('copyright'); ?></p>
                <nav class="social-menu">
                    <a href="<?php echo get_theme_mod('facebook'); ?>"><img
                            src="<?php echo get_theme_mod('facebook_img'); ?>" alt="facebook"></a>
                    <a href="<?php echo get_theme_mod('instagram'); ?>"><img
                            src="<?php echo get_theme_mod('instagram_img'); ?>" alt="facebook"></a>
                    <a href="<?php echo get_theme_mod('twitter'); ?>"><img
                            src="<?php echo get_theme_mod('twitter_img'); ?>" alt="facebook"></a>
                    <a href="<?php echo get_theme_mod('youtube'); ?>"><img
                            src="<?php echo get_theme_mod('youtube_img'); ?>" alt="facebook"></a>
                </nav>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/popper.js/popper.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script defer>
jQuery(document).ready(function() {
    jQuery(".menu-item").addClass("nav-item");
    jQuery(".menu-item a").addClass("nav-link");
    jQuery("#menu-item-21").addClass("active");
    jQuery(".plan1").addClass("border-warning");
    jQuery(".plan2").addClass("border-primary");
    jQuery(".plan3").addClass("border-success");
    jQuery(".text1").addClass("text-warning");
    jQuery(".text2").addClass("text-primary");
    jQuery(".text3").addClass("text-success");
    jQuery(".button1").addClass("btn-outline-warning");
    jQuery(".button2").addClass("btn-primary");
    jQuery(".button3").addClass("btn-outline-success");
    jQuery("#menu-menu-2").addClass("nav flex-column");
    jQuery("#menu-menu-3").addClass("nav flex-column");
    jQuery("ul.sub-menu a").addClass('nav-link');
    jQuery('#menu-item-185 a.nav-link').prepend('<span class="badge badge-pill badge-secondary ml-3">Hiring</span>');
  
});

</script>

</body>

</html>