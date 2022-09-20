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
define( 'DB_NAME', 'module_speedtest' );

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
define( 'AUTH_KEY',         'T.W*u-pJvv&lz_(a$,IOz/5v@FtaU#RsDv0bgczEDwN,2knOIqu|E?OD>oN!7*>t' );
define( 'SECURE_AUTH_KEY',  'jZ^wz}v2ta$i!ENt0Ng0?=)]C$z%#LxN1Qp%{l[>Nsg5P.OK3T^lU4W4V<S6bB>x' );
define( 'LOGGED_IN_KEY',    'WmpXE6GH;}%`@D&TfS?#r[9JXx(B|5kwxGocK$J1sw$v!UaC4|GTCcAo[`<NaJwn' );
define( 'NONCE_KEY',        'oNNGfG.xx@~%96Oq8bF$R%phB(&VGbL#]fNg|m9<>C2<nmf}o&5ff_q0xzOp;z$#' );
define( 'AUTH_SALT',        'yv^i*4V)G-CQ%n@H4_wl*S_*xnnw@Paw0EF>c$b=h4o[BZC&q (K>?Q5 enrkXIW' );
define( 'SECURE_AUTH_SALT', '$UAr(Y;je(akd,/]}fD>A*]j=XWvnGQ:X9FLyjBq];gp@?:xzu`<]o5ewbiHOBlY' );
define( 'LOGGED_IN_SALT',   'r6#i|PL.%^KQ~h^>(o+xC]<(1PO[cQMl=(J?X95Qm-L!VmmWEw8Ki]AEnC$(,=2}' );
define( 'NONCE_SALT',       '_OEza.FmjCVWckCy41R&2#&BsbN)[y6s(8y,dw0lI#PvTU6o`?)1Ev!a.NuE8vU&' );

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
