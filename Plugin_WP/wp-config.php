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
define( 'DB_NAME', 'PluginWP' );

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
define( 'AUTH_KEY',         'fPmYSwyXnZtx9gwKgkC8sHScil44173I5EPFug5ft5Q4PMg6tElgCuV8LSHgpQDL' );
define( 'SECURE_AUTH_KEY',  'OMFVYsKFfa98M1O9SmXeLiKuwfbBgXStBEV4MDAm4bnIg7qYrmDKlSSvT61HQ5La' );
define( 'LOGGED_IN_KEY',    'SsvKG3r2gQva7gmxgSrqJTb65XPSgz4DvSLaKZ2wCzzf2byVotyDvsOe8mouhJIx' );
define( 'NONCE_KEY',        'EFhWONytOCmQtxOjBKWhnDlY7rsWcndgIJLDaTIB9K5E2oOOVXDfrMyL8LdbyTaf' );
define( 'AUTH_SALT',        'c5FD02LsYNrmthDJMKzyZgnSZZBXWKHO2ckuNd4QEqW38fWRTtbx1ztOp9Hk2ZVy' );
define( 'SECURE_AUTH_SALT', 'P8JthyERfhk5ZsVoRAjzTDzucNj9BwxP0DjnepMkaPQz4CO9JH2Ln6Lzcmq4Rxs8' );
define( 'LOGGED_IN_SALT',   'Njx7NcPA8Zwl14MUTS9FqDgwe7CGfwHOPoxW1WD9I0toypkKSgZeNADeGmXuf3fB' );
define( 'NONCE_SALT',       'F1lv8TtFPJxOHYVzAXiDvZaZMZzuxVRCgI0YBFUAfoxvPUcZdh2gtZrPq4DxzmRc' );

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
