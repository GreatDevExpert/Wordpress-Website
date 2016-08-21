<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vhpmentors_wp');

/** MySQL database username */
define('DB_USER', 'vhpmentors');

/** MySQL database password */
define('DB_PASSWORD', '67890389');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5/P/lA+/&x-6{+$+txT60+us7Mg|8d@hZqARm:om/zP55y$)TF x|B|m@ [!]dgZ');
define('SECURE_AUTH_KEY',  's~`zO$Ls~bi&8*+q8-;{B _v4-YEIn-Bi&+Vd*;_/9CmU73+:S,|Go@>+jEf)Lc!');
define('LOGGED_IN_KEY',    '_+4V/oZG_&?-Y;>Bob}.XA3l(xaZpjVeJQjEg/55.0z2P_++6f5`2].X8dJw|W.F');
define('NONCE_KEY',        '>6L,8@}K1jj`kJE+)yGC#JIr}zBdcRPZ,#7Sf7wS#3j84^_kYK0!l~#T-_$z,i#}');
define('AUTH_SALT',        'X*TB-06~N*fzti/! qc~$;*gkwT3k~-jd_pP|K6#5mB0!J}d-o&3(hc_`V+]j@%*');
define('SECURE_AUTH_SALT', ':U*-kr4HEnFdHrKd4,)3d8-=F?~ztoy-z|%:W;lB`3O|s>D9Bh4Fr3o$//03e_Wt');
define('LOGGED_IN_SALT',   'E4wM5[n2aoMp}.kn(M#LZaQ1P:(*HAu4=8>B 1|auM@B_>kcr=Cq<T+H@pXT!PT8');
define('NONCE_SALT',       'X-,p[` `jp$TPv)kQJ<Rr8:q{PO[c=G|xCUJ7SqT[`ChlO=r[#(e}VEfH;I URg+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');