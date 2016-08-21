<?php
/*
Plugin Name: URL Params
Plugin URI: http://asandia.com/wordpress-plugins/urlparams/
Description: Short Code to grab any URL Paramater
Version: 0.4
Author: Jeremy B. Shapiro
Author URI: http://www.asandia.com/
*/

/*
URL Params (Wordpress Plugin)
Copyright (C) 2011 Jeremy Shapiro

*/

//tell wordpress to register the shortcode
add_shortcode("urlparam", "urlparam");

function urlparam($atts) {
  $atts = shortcode_atts(array(
        'param'           => '',
        'default'        => '',
	'dateformat'	=> '' 
        ), $atts);

  $params = preg_split('/\,\s*/',$atts['param']);

  foreach($params as $param)
  {
     if($_REQUEST[$param])
     {
	if(($atts['dateformat'] != '') && strtotime($_REQUEST[$param]))
	{
		return date($atts['dateformat'], strtotime($_REQUEST[$param]));
	} else {
		return $_REQUEST[$param];
	}
     }
  }
          
  return $atts['default'];
}

?>
