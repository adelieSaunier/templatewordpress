<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xKpxw1R YkAY2F2;pVgS07^tWA!e#1wT-1-UgM,UDgBIOmo(QJ@j[gii-c+7?RU~' );
define( 'SECURE_AUTH_KEY',  'hg|*E0ncg3q]6[TG`2gP(eyn7Jw}+^`X}4M?C29E39#K.Pv/411]ep3{wByRVh0F' );
define( 'LOGGED_IN_KEY',    '^2I1_+Mc,#4LJ%(s>;a_i2}zwkLBJ`<*Jp{VO#UQ=PGmzp_{Z;>Rt%u$0#129[`c' );
define( 'NONCE_KEY',        '<.A~1_ss.:e|km|bEA&cx,DKDQx0Cmn:5@!1I_~XwO6o OpJqpWjUZmU|#}2b.{U' );
define( 'AUTH_SALT',        'BsWM Mx:EGFMnXziG%EKb(v+jTuvqe.Ud7oL8r1bifC&j:xpHV t|$(/C{f7e_O|' );
define( 'SECURE_AUTH_SALT', '=&PGEgfzJrqN/I5!Z@zWe1LUJ^P@5a`?[-__%EF(Dj^n(j>oHXS9NOEwoa:wL#Pl' );
define( 'LOGGED_IN_SALT',   'z!eU7oac[aC!z[$!|r}0.|y m[qrI3dTqe%vxR!~FH)?wIdj88MX+Q7}c7I!7%[8' );
define( 'NONCE_SALT',       '7-td0qr7wo<MJdflMmV:RI$$@mN_}V%|4-k>DxKvpv2kej|oKs5e_$jGIL+E/NZ^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD','direct');