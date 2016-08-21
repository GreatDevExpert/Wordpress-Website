<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage veterans
 * @since veterans 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title('|', true, 'right');

// Add the blog name.
bloginfo('name');

// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && ( is_home() || is_front_page() ))
    echo " | $site_description";

// Add a page number if necessary:
if ($paged >= 2 || $page >= 2)
    echo ' | ' . sprintf(__('Page %s', 'veterans'), max($paged, $page));
?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>/custom.css" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/fonts.css" /> 
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css3.css" />
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <style>
            .baner.banner2{behavior:url("<?php bloginfo('template_url'); ?>/PIE.htc");}
        </style>



        <style type="text/css">
            /*
            body {
                    background: #333333 url(concrete_wall.png);
            } */
            .twtr-widget {
                float: left;
                width: 280px;
                margin: 0 0 0 -10px;
                /* padding: 0 0 15px; */
                /*background: #fafafa url(wavecut.png);*/

                /*** cross browser box shadow ***/
                -moz-box-shadow: 0 0 2px #fff;
                -webkit-box-shadow: 0 0 2px #fff;
                -ms-filter: "progid:DXImageTransform.Microsoft.Glow(color=#ffffff,strength=3)";
                filter:
                    progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=0,strength=3)
                    progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=90,strength=3)
                    progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=180,strength=3)
                    progid:DXImageTransform.Microsoft.Shadow(color=#ffffff,direction=270,strength=3);
                box-shadow: 0 0 2px #fff;

                /*** kind of cross browser rounded corner ***/
                -webkit-border-radius: 3px;
                -khtml-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
            }
            .twtr-hd {
                /*** cross browser rgba ***/
                background-color: transparent;
                background-color: rgba(255,255,255,0.3);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#30ffffff,endColorstr=#30ffffff);
                -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#30ffffff,endColorstr=#30ffffff)";
                display: none;
            }
            .twtr-bd {
            }
            .twtr-widget .twtr-bd .twtr-tweet {
                /* margin: 5px 0 0; */
                /* padding: 0 0 5px; */
                border-bottom: 1px solid #cecece;
            }
            .twtr-tweet:before {
                display: block;
                float: left;
                margin: -5px 0 0 5px;
                font-size: 12px; /* let's make it a big quote! */
                content: "?";
                color: #bababa;
                text-shadow: 0 1px 1px #909090;
                font-family: "times new roman", serif;
                display: none;
            }
            .twtr-ft { display: none; }

            Custome sharethis button
            .st_sharethis_custom{
                background-image: url("/img/bing.jpg") no-repeat scroll left top transparent;
                padding:0px 16px 0 0;
            }
        </style>

        <script>
            $(document).ready(function(){
 
    
    
                $('.sub-link li').last().addClass("no_bg");
                $('.sub-link li').first().addClass("no_padding");
  
            });
        </script>

    </head>





    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <div class="innerwrapper-box">
                <div class="inner-wrapper">               

                    <div class="baner <?php if (!is_front_page())
            echo 'banner2'; ?>">    

                        <?php if (is_front_page()) { ?>

                            <?php dynamic_sidebar('donatetoday_section') ?>

                        <?php } ?>

                        <div id="header">

                            <?php dynamic_sidebar('social_iconssec') ?>



                            <?php dynamic_sidebar('dropdown_section') ?>

<?php echo do_shortcode('[logout-to-default]'); ?>
                        </div><!-- #header -->




                        <div id="access" role="navigation">

<!--                            <a id="logo" href="#" title="Veterans History Project For Stydent"><img src="<?php bloginfo('template_directory') ?>/images/logo.png" alt="Veterans History Project For Stydent" /></a>-->
                            <a id="logo" title="Veterans History Project For Stydent" href="<?php echo home_url('/'); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png " alt="Veterans History Project For Stydent"/></a>
                            <?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
                            <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e('Skip to content', 'veterans'); ?>"><?php _e('Skip to content', 'veterans'); ?></a></div>
                            <?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>







                            <?php if (is_front_page()) { ?>

                                <div class="nav"><?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'primary')); ?></div>

                            <?php } else { ?>
                                <div class="nav1"><?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'primary')); ?></div>
                            <?php } ?>  




                        </div><!-- #access -->

                        <?php if (is_front_page()) { ?>
                            <?php dynamic_sidebar('flag_section') ?>

                        <?php } ?>

                    </div><!--baner-->

                    <div id="main">