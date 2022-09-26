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
define( 'DB_NAME', 'wp-ujicoba' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '_7|EQ_73I0kfGG$nRV6QZ!![mFiJ~W3=j( *@I<N SSOS5PLxtsC*oBod[36`x:f' );
define( 'SECURE_AUTH_KEY',  '&n)$4r%5voNvHPSPVMloTUf<I+SQ@Dn@5AZm{:U)?XGat;46QA.?/Km,7a]R]kN)' );
define( 'LOGGED_IN_KEY',    '$h:mF-N+(L1;V7#MBJVZ[=@F?55.}J+jJ) 3#g|VT@>DPUsj<ArmCNS,=Tm[wJPi' );
define( 'NONCE_KEY',        '2udKd)|mG]]nE@t9P[ E>~6=[uFu{nz3@P3rDk^30[#7:MqD)6wEkl5osJN;nr%C' );
define( 'AUTH_SALT',        'FhN2-/=zD}0x:DaV7kA%^0*pn8?^MCZ7H3)B*!zulEt-:x_[`P}#tB,e+]H84&G0' );
define( 'SECURE_AUTH_SALT', 'vP4VHi>r+X>M.zB>}{m9W]N,p?*-#4P*}ew/H.%d;-e._Paq;>z-ncQQD>{1h~cN' );
define( 'LOGGED_IN_SALT',   '+I6b_lx7?9*(~w7a+WxJu%vs/*Zo:Fv:TmF2c*9R9PV!C@VNyARB?j2$ @[/*G:,' );
define( 'NONCE_SALT',       'nXzIC6SpyQt*[Kp0k}HQDrx}y)(876~?W=.IxJ_w!<x^%uKGjnvXPq.>W0LE=0lX' );

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
