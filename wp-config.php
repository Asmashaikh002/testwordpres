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
define( 'DB_NAME', 'testwordpres' );

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
define( 'AUTH_KEY',         '=ziLtq5iZM-rK;Vq;_UNPK~B48HFuM-2|*djK9W}Lu|V(`&=/<F&u$9Qh=~2s Qp' );
define( 'SECURE_AUTH_KEY',  'Nl+!xw9)%xwFgg7/7f1F`QGlJ>t*|`DcUm$0Qn?sL~7#M7h7]0d,-:~%f`[h#Ld)' );
define( 'LOGGED_IN_KEY',    '8V/HoPB9eNVn%)5>{@QdPrYVA.i.d^Pz&F0a8xinHY(d_!t4lC AY YcAovC#3Dl' );
define( 'NONCE_KEY',        '~sDdQDYeJdexA&`pY#ST}Dj2KHKtpJic_P^Q*VAJYlq0iRp#_gn&Ott1u>Lzj#kH' );
define( 'AUTH_SALT',        'V*66BU8rM_ !QZP7RRpr;c@0]O<Zacf8%?>)l%SW8S-<BSAC3>N6T1.2on$#^g]}' );
define( 'SECURE_AUTH_SALT', '^Y!Y#=M7+ibPZs0?OMg{D5}Ia3LYXNo/ie1P]@U8p3#Wkb1v&#wD[N*EQS`8m/9]' );
define( 'LOGGED_IN_SALT',   ']0yZZhQtC[?U2A1xBchydA[O>dvnz^k.]U#d?Rbf)_%1:uAwqz)V1N%:g]a1$?>G' );
define( 'NONCE_SALT',       'lafz2)DVJ[+jaXkaHnm>)n9yjOIZVSSFd&QRsA~W2(fUwK3sjUptR] >P4}h5/Pg' );

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
