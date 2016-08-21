<?php
/**
 * The template for displaying Category Archive pages.
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
                <h1 class="page-title"><?php
printf(__('%s', 'veterans'), '<span>' . single_cat_title('', false) . '</span>');
?></h1>
                <?php
                $category_description = category_description();
                if (!empty($category_description))
                    echo '<div class="archive-meta">' . $category_description . '</div>';

                /* Run the loop for the category page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-category.php and that will be used instead.
                 */
                get_template_part('loop', 'category');
                ?>
            </div><!--vform-->
        </div><!-- #content -->
    </div><!--container-right-->

    
     <?php dynamic_sidebar('container_links_section') ?>
    
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
