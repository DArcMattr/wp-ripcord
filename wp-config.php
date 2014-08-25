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
require('vars.php');

define('DB_NAME', 'Your WordPress DB Name here' );     // The name of the database

// sensitive information which should not be committed to source control is
// accessed through a variable that's defined in the vars.php file

// cli-vars.php will load its own DB_USER & DB_PASSWORD values
if ( ! defined('DB_USER') ):
  define('DB_USER',          $site_info[DB_NAME]['DB_USER'] );
  define('DB_PASSWORD',      $site_info[DB_NAME]['DB_PASSWORD'] );
endif;
define('DB_HOST',          $site_info[DB_NAME]['DB_HOST'] );
define('AUTH_KEY',         $site_info[DB_NAME]['AUTH_KEY'] );
define('SECURE_AUTH_KEY',  $site_info[DB_NAME]['SECURE_AUTH_KEY'] );
define('LOGGED_IN_KEY',    $site_info[DB_NAME]['LOGGED_IN_KEY'] );
define('NONCE_KEY',        $site_info[DB_NAME]['NONCE_KEY'] );
define('AUTH_SALT',        $site_info[DB_NAME]['AUTH_SALT'] );
define('SECURE_AUTH_SALT', $site_info[DB_NAME]['SECURE_AUTH_SALT'] );
define('LOGGED_IN_SALT',   $site_info[DB_NAME]['LOGGED_IN_SALT'] );
define('NONCE_SALT',       $site_info[DB_NAME]['NONCE_SALT'] );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $site_info[DB_NAME]['table_prefix'];

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('DB_CHARSET',  'utf8' );
define('DB_COLLATE',  '' );

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
