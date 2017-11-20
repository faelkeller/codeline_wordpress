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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'codeline_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '05#YW&SUr4*$<1W*Aj2HNL>So(]_Ll~/9JR0shw]J)J)[v06eMlOvSa#4Iy2%JP3');
define('SECURE_AUTH_KEY',  'EXFg4S>}^N<7T$W]H[>6$NmcSnm^+2!3 iUrd$p)w0Y}5*v{;g^[FE-amp*(KzA_');
define('LOGGED_IN_KEY',    'yGMv(%?IlEJ:_Cxso|e J:%.4B|69x!o#8E`>s&Fltj+x7PZ:sCIqor!V~(e$S/g');
define('NONCE_KEY',        '$kn&]~9*5r7D=V;fQV*_odD[*#2WRSDrQHZSO&)T%!yJ&9M!=<iGd)lOPn*>vtV!');
define('AUTH_SALT',        'lX48@mOqIL+1Zi0U vLlx@8!Ad<N1yv$K^X_mxIJ^D=]!qd#nZAb*k.51Ay?rO#I');
define('SECURE_AUTH_SALT', '[>pXdrFuhLE=Tsai@Dv;}:a)> GuQHaJQe/v*?pA|!M|c0={fLq#^Qk%)Du<ct1^');
define('LOGGED_IN_SALT',   'oa;DSSK Crag5OVdAy84ljAh{[oX%{~CA8=4V%s!}!o-8n~Fj~_02^2}0|K|5Kc9');
define('NONCE_SALT',       '^|HwQ|^VI>[Jxe!W|_6sjBLx+<K&C_Q/H^/na6yQjcx/.g8qHpf~)/L-jq`+Mu]:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
