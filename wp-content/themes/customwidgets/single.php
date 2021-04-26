<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CustomWidgets
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-header">
        <h1>Blog Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb foi-breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog Profile</li>
            </ol>
        </nav>
    </section>
    <section class="blog-post-header">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <p class="blog-post-date"><?php the_date('d M Y'); ?></p>
                <h1 class="blog-post-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>
    <section class="blog-post-content">
        <div class="row">
            <div class="col-12 mb-5">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="blog details" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <p class="mb-5"><?php the_content(); ?></p>
            </div>
        </div>

    </section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();