<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage veterans
 * @since veterans 1.0
 */
get_header();
?>



<div id="container">

    <div class="container-left"><?php get_sidebar(); ?></div>
    <div class="container-right">
        <div id="content" role="main">
            <div class="vform">

                <?php
                /* Run the loop to output the post.
                 * If you want to overload this in a child theme then include a file
                 * called loop-single.php and that will be used instead.
                 */
                get_template_part('loop', 'single');
                ?>
            </div>
        </div><!-- #content -->
    </div><!--container-right-->

    
    <?php dynamic_sidebar('container_links_section') ?>



</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
