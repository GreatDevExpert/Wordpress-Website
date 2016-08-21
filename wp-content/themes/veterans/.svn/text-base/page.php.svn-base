<?php
/**
 * The template for displaying all pages.
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage veterans
 * @since veterans 1.0
 */

get_header(); ?>
              

              
		 

     <div id="container">
         
           <div class="container-left"><?php get_sidebar(); ?></div>
           
			<div class="container-right">
                            <div id="content" role="main">
                                <div class="vform">
                                    
                                   
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
                                </div>

			</div><!-- #content -->
                        </div><!--container-right-->
           
            <?php dynamic_sidebar('container_links_section') ?>
		</div><!-- #container -->


<?php get_footer(); ?>
