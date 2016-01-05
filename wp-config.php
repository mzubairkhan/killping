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
define('DB_NAME', 'killping');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '.Y#bhQJ}Bg;RQlFDch3ycma#FS9{he`)XP:!7#H%pmY|kcKV=ign])^T&bR87wj0');
define('SECURE_AUTH_KEY',  '~GU^AS@o?{!J#/?MLepl7VH(sJ^m~9*d}C@HhmCJj)=Sa(NN6JIh]V|<VRyT{02j');
define('LOGGED_IN_KEY',    '#0dovnm(f),WJNav%#O5:Sfm19ck{&]T>?#[Cra0galD*Nk>I@{X8pMAS*d5JI|i');
define('NONCE_KEY',        '{X[6!-j;W]p&}e4L_+h_S,qCEhSA {$6):@@SjXZJK8}]+>x#mbo_~nT.]6SRGnD');
define('AUTH_SALT',        'uX3k0:<rkKU5w9:l~IWNai[Q0Cb9jJ]DBCXk`MH0L<Qmw20;bw&1Q0~/o]}zR,f`');
define('SECURE_AUTH_SALT', 'tD(#!!4 l1 YIg40(`[^#A]g:Q@HHL XUGPIC*qhi`Sfz~d~g{-ahuQ?7]28#G]s');
define('LOGGED_IN_SALT',   'v<FogJjIeD8IWY]C+~`K|TUoq:fg:MP9d<h1$N,d6Xr N/5zfd[ovl]m*5[wP&@@');
define('NONCE_SALT',       ' *lI=CM1}$,1w=N1*_01R%<_,Ixl0WaKXloG%YpV4>ZdQ~a]yk$W|mdztAVf*?}c');

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
