<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CustomWidgets
 */

get_header();
?>

<main class="page-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <section class="page-header">
                    <h1>Blog Profile</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb foi-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Profile</li>
                        </ol>
                    </nav>
                </section>
                <section class="foi-page-section pt-0">
                    <div class="row">
                        <?php
								$args=array(
									'post_type'			=> 'post',
									'post_status'		=> 'publish',
									'orderby'			=>	'ID',
									'order'				=>	'DESC'
								);
								$posts=new WP_Query($args);
								if($posts->have_posts()):
									while($posts->have_posts()):
										$posts->the_post();
							?>
                        <div class="col-md-6">
                            <article class="blog-post media">
                                <div class="blog-post-thumbnail-wrapper">
                                    <a href="<?php the_permalink($posts->ID); ?>"><img
                                            src="<?php the_post_thumbnail_url(); ?>" alt="blog" width="155px"
                                            class="blog-post-thumbnail mr-md-3"></a>
                                    <span class="blog-post-badge">Trending</span>
                                </div>
                                <div class="media-body">
                                    <p class="blog-post-date"><?php the_date('d M Y'); ?></p>
                                    <a href="<?php the_permalink($posts->ID); ?>">
                                        <h5 class="blog-post-title"><?php the_title(); ?></h5>
                                    </a>
                                    <p class="blog-post-excerpt"><?php the_excerpt(); ?></p>
                                </div>
                            </article>
                        </div>
                        <?php
							wp_reset_query();
									endwhile;
								endif;
							?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center">
                                <a href="#!" class="load-more-link">Load More</a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
get_sidebar();
get_footer();