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
define('DB_NAME', 'xuki3582_ata');

/** MySQL database username */
define('DB_USER', 'xuki3582_ata_user');

/** MySQL database password */
define('DB_PASSWORD', '12345678aA@');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_POST_REVISIONS', false );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Pa^5FyNL</xTznAMTC69`BVgT^KzyltHaA1RDcA=#*QczOUnUO2bSh+l~m|l6L%W');
define('SECURE_AUTH_KEY',  '*r,_PqKkgSoBS,4Zy4]G2(^1*}p}L(/5QI.db5py/(ckUa<]B&]5M+u&xT4M0d1j');
define('LOGGED_IN_KEY',    '*O+o=+TJ`iC{-qiE}`KaCDM$@]gD[`te2;NCzPYFw0%C=va*Xw~uaTEJj,%/v7}%');
define('NONCE_KEY',        '7,v7D:g%QSj(sGqJ(%?A>3k5M-}m{{r5e2$wX?XGn>@>>WY^~|8=%^Taj:Aq^BCd');
define('AUTH_SALT',        '5Y~l2*klsQxi]P-:8|!J_hz2YhK$6j!aP&X/jk%i1)SG:JrzDpY+/9_A,Qdh>ViM');
define('SECURE_AUTH_SALT', '7,.H)45bA?R1OmY}5AKi7.#<7SB=>*p6z$4aq L>7vv4EC Y;;Fbyu_8WuWO[>o^');
define('LOGGED_IN_SALT',   'f<oAL4(JIB@BXVsvP[kv_V{L1PSj}wZE%Jrk>I&Gym&D8+ yX?%dHL8{%||WHQAn');
define('NONCE_SALT',       '&e.mjGfq6CtoE:j:>WgfHZ%^fr_HlGLbK3iLQ }8XAZ5k~j<RQ2y,%JGl7U%P*?3');
define( 'WP_AUTO_UPDATE_CORE', false );
// define('FORCE_SSL_ADMIN', true);
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sm_';

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
