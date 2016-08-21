<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage veterans
 * @since veterans 1.2
 */
?>

<?php if (have_posts())
    while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (is_front_page()) { ?>
                <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php } else { ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>

            <?php

            function has_parent() {
                global $post;
                if ($post->post_parent) {
                    return true;
                } else {
                    return false;
                }
            }
            ?>                             




            

              <?php if (!is_front_page()) { ?>

                <h1 class="child_heading">
        <?php
        if (has_parent()) {
            $parent_title = get_the_title($post->post_parent);
            echo $parent_title;
           
        } else {
            
        }
        ?>

                </h1>
         <?php } ?>       
                 

             <?php if (!is_front_page()) { ?>   
                
                
            <ul class="sub-link"> 

             <?php echo get_post_meta($post->ID,'custom_link',true); ?>               


        <?php
        if ($post->post_parent)
            $children = wp_list_pages("title_li=&child_of=" . $post->post_parent . "&echo=0");
        else
            $children = wp_list_pages("title_li=&child_of=" . $post->ID . "&echo=0");
        if ($children) {
            ?>

                    <?php echo $children; ?>

                <?php } ?>
            </ul>                                           
 <?php } ?>  

            <div class="entry-content">


                 <?php the_content(); ?>
                   <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'veterans'), 'after' => '</div>')); ?>
                <?php edit_post_link(__('Edit', 'veterans'), '<span class="edit-link">', '</span>'); ?>
            </div><!-- .entry-content -->
        </div><!-- #post-## -->

        <?php //comments_template( '', true );   ?>

    <?php endwhile; // end of the loop.  ?>
