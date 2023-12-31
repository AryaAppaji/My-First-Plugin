<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'my-first-plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '61AEQtxfTQkgrVWqtgWuMwa8Izd6ND3NoTRW6ms8mRisXCYCSDo1KN5uoEWxtZlk' );
define( 'SECURE_AUTH_KEY',  'yCcW2KbAM0JLnsKj2e0w2ZKhJ9dkZu7UnhF42sTnJN40AgKYio7h5THxGuvP1Zyo' );
define( 'LOGGED_IN_KEY',    'siGY1mF9HD4xs3lYtSpTDJK3Lea93H0YVVNRQEPs5jryI0KbQS02ZrWczyUSaXN9' );
define( 'NONCE_KEY',        '632DaSxwRep1gEjZhRoLCzhtDu4gwzyJYJCxLrdjs3O7qCT9YT7FSl116zz78zVl' );
define( 'AUTH_SALT',        'GwWtHrxrFaWXW4vl4tx79v4rFX0k3IDXPAKeWmAVVQkm4OdO0fa42uqOdYrPmA32' );
define( 'SECURE_AUTH_SALT', 'fIstA5GS9rDnufX3NGOUcw6XSFsmCaqFtucUnoXgtJZkCHGboVk0qScAWNv4S18b' );
define( 'LOGGED_IN_SALT',   'PsTKeoO4jIVQHqSIXVOxWuWRrKJUI6yzlVa7sutt63jzu5cpEMft2RZHxrpzmzAr' );
define( 'NONCE_SALT',       'a8xHrfahLLCCoSpmWU53drWjZ8KmGSIS822F39EALV0wnMKvo2Jbuykk1ta3jujM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
