<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db1386365_rctractorguy');

/** MySQL database username */
define('DB_USER', 'u1386365_admin');

/** MySQL database password */
define('DB_PASSWORD', 'y2[()KlMxW');

/** MySQL hostname */
define('DB_HOST', 'mysql2640int.cp.blacknight.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'CwPh>|5<g]S.!l`UA,eD6Rh|D7D_?pd4OaP`|. w+NPQ}Y]|@fIm;hGUSJ{F1%oz');
define('SECURE_AUTH_KEY',  'M%<Slu2^>Hoh$Lz=sSM|d bG!uE2VBzwEi.5$=hLq&6yDtw+$P!&-.9Xhkq6rR</');
define('LOGGED_IN_KEY',    'qodgn;+?I]d7]`vBh?c)arsUfMB:zY51)v{7 (tA+[n<`6oob>u@LX(d)+h tbp4');
define('NONCE_KEY',        'd~U9_J}R*f5Syu;!vOvh>?$Cu<?Oc]xV`x8d}Yt3=q#3a`B[hU`ym:H{OYv$mw=,');
define('AUTH_SALT',        'Q`@H-##r7<zuyryHCK1c^<Hu`]=z|VP6@=w&dEHp2md@T/v9CZDqhCkc-82d0}9Q');
define('SECURE_AUTH_SALT', 'T4RK.EX55/Rr8SBnaiqcw6zK#i&yHl-`XIv%QtzewX_:v]TIqZ[1&Vk[47We5A-_');
define('LOGGED_IN_SALT',   'HEn5^&-`:2$YKwQ{EVs-EG!6+TStMC<tWXtZGaL4Z/W}`H8.oLurY6~L!#SBf>u)');
define('NONCE_SALT',       'lx?-);|$C0Q$Z 5.e}RPqx_wMY6WZIy++*`Q@G4oq8Z&4<=BSc0>P0-&($)F95b-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
