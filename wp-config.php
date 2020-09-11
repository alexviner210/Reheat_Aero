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
define( 'DB_NAME', 'reheat_aero_db' );

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
define( 'AUTH_KEY',         'EmIs}kF/=,6#Ax)`3dN6SrXY^)Rx65OYQ^(c)&=kWfXiAkjjOOGIlHzaN-)*#!Ml' );
define( 'SECURE_AUTH_KEY',  ',Rr{tD/Tj/-$(BP6vy-GSQ1rq(~3|mga$;|:QLfJGqiByaNr%W90RG#Cf4r@5$Z_' );
define( 'LOGGED_IN_KEY',    'y6>j1or.!7(#P pi$e)^RU];S0kT>7&O$2)fWfYp`X VGm1fa?%VYj`4nfkBK@o=' );
define( 'NONCE_KEY',        'kOw(RrBd14yCL^9!Z0<5@uM1;^Vlq0 ,ct/pyA.8+)X4i2c)u)%USE5IoOl@&M+P' );
define( 'AUTH_SALT',        'cz:P7K2+.HW@R8WCFDh;]8#nC%2NKmjeK.lMEve9_An m7^3-{5YQ-R;ECU.<u=Y' );
define( 'SECURE_AUTH_SALT', 'zw(vb4?B16hJc%p)<:%FKvaX~,,iEvnfZa*50!znGqm{R+_ejO$d7JFg(q|+OCm~' );
define( 'LOGGED_IN_SALT',   'v}@%QOp7./%u+inc{BIMYG]s$uI$Bh=V~N-^?;?pCr%:D0q{w$b/7FxU+xMclI/*' );
define( 'NONCE_SALT',       'NNQx)?.f[+.!g!rgW#d%ER*QfS]yq4~*NZp8y<kYx/&3%D?L9b-kiv`Svjlqt3hj' );

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
