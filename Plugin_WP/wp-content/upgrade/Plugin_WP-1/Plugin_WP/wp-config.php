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
define( 'DB_NAME', 'pluginproject' );

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
define( 'AUTH_KEY',         'q8iaCSHP3vKB66m1XApha106GiCWnu82tQ8fUzfxWNaEnIs3fWSFVPCHNUpp52AV' );
define( 'SECURE_AUTH_KEY',  'pzwBMsK2fRMocSYb2h6T0UAAymIxXdAwly2OrZ8Bp3FLYNOVlbKp559nFuKlb7oV' );
define( 'LOGGED_IN_KEY',    'm9I0WhZsTVRk3guXieaWhS2jN20BbYwBtZ8VqOtKgKr9pJBKzC6chDs2joX8Kqfc' );
define( 'NONCE_KEY',        '1tcOHKKlw5yzGFxgpsKuE0YoPAFPMsE8NmMOBTduI4cXpojjlvOIpTpNudtliyOi' );
define( 'AUTH_SALT',        'OXnPtrIhoudMb0KILH7TKOSKHQ6XEY8hcbthLFVPa0yDvTpuNENA5YNlTd6xiiiw' );
define( 'SECURE_AUTH_SALT', 'pDalrCNJUj9Pi8jMY7AIPlF8o032m4VmHAJ09SikBLhkG2mOHQe0nwmqzbmctZ5m' );
define( 'LOGGED_IN_SALT',   'd9mmdkLFNJN4NBwdlmW8V1ztgps9ezov7opCiEZF4RD1LwsZ0Zc34BLYYaYntJyA' );
define( 'NONCE_SALT',       '5hdwMjq2NtfsQxcUCqogjpExtWrp1tc8kbv8ej6fvF3PHxjouPtSypweR2P0PVO6' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
