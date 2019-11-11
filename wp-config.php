<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define('DB_NAME', 'usrseigneuriei01_site1');
/** MySQL database username */
define('DB_USER', 'usrseigneuriei01_usrprospec01');
/** MySQL database password */
define('DB_PASSWORD', 'PGCtVr8e7WwB75j');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', true);
//define('DISALLOW_FILE_EDIT', true);
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Q%?-p~>-` 3A|< 9DH$1URm$-68Wlj+t}fIKQaWDWyTvYFa_#,U)VKCzfFxDOc*;');
define('SECURE_AUTH_KEY',  'JC{UhRv!,viznem(qAkra0|Q{BEblh$>BuS]>(3qWR j`d_IVajmZ4+V`PE6>0hP');
define('LOGGED_IN_KEY',    '*i:Kq5~H ,LTiuGi#vl(|34#<_G=*[K)m#637:T2eC;eiBa|y=SY`mAHZ7>%=E8<');
define('NONCE_KEY',        '*`HE@MXufOx1J;Q+S[ =VRIRn}~$.v3~dFz.1rFI?YrA~dRM&u8I%^YUZ|3zd!~!');
define('AUTH_SALT',        'F*6JD%2omD1NS:BEL:|$OJ;o:u[C%*e<>+e-Pf?hhEh^.;>SM~v=Uiz.x=wxre+(');
define('SECURE_AUTH_SALT', '7$!V2:?WyqTY *|8YWO+GA> 9n$6jQh&&&S^x2D;_}_-d#*x5Xm>7{*T&P#h*lx`');
define('LOGGED_IN_SALT',   'UNXM1}tg4Ui(+=cyN+ 2f{_hjp-5K^v7ay]SaE!|D5gn]4Ose{.juzt_{P]:_}{Y');
define('NONCE_SALT',       'Mz_P{+I1IY-`}qIuB83IupqTf6w]N:X>]A}34BLx+jZOh%%[B3uEl1-0{hqK0xP ');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'psio_';
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
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'WP_MEMORY_LIMIT', '256M' );
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
