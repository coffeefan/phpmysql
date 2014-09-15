<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'toor');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         ' Xu/k==%M_Jw+HQ|-|fN2++P/QTSiF#5$8pqKDO.#d;Cb~x[M#H1py>pk}lb>QRD');
define('SECURE_AUTH_KEY',  '<pG2`#XF|vD4_f7LJjLh.l%sd),ocvqps_<1kJ~g79gU%|IV!Fd66<-3eld-Cuv$');
define('LOGGED_IN_KEY',    'ch;L0!M88xv+)FsF({W2iC9]^zp@)`I,a|x o81>5;q n|9U*ii+}t:=4c=+Ixm!');
define('NONCE_KEY',        ' ;M;f[1f.Cf1[i;D!5_4)PlK*R3<r[H<//w=+rEhYPn:~w=vCvhiRy1+7C)>&[$8');
define('AUTH_SALT',        '8[ijkV.JPB?H|1HEYC`9jg#%J|mCN*lGc8u474d-fsJ06A9:#MHhd~yVKwVz`;@(');
define('SECURE_AUTH_SALT', 'Y#an5E5[<q^dJ{W>}~Pz_Gf/sd;AxM0Qf3fQ@%|Ym9 d*.dK*)Ro%yn#hPW*%Eh]');
define('LOGGED_IN_SALT',   ';HamIkqN38_bAQ--AlQJ!fd,QO-iYZ(G$46Cq),PG5@a-Jv7,Sjee>;B||3~+/w7');
define('NONCE_SALT',       'SArG+z&|++|j^eBfB^WGS+:c5|WR`VpBEmVL+ELRm1ubNA:4v:Gg+o(~^9CGy&V/');

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
