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
define('AUTH_KEY',         '|&)gR`(c:QGJzp<`zb3qvy!mq7MtXz#c-kB~|Tl^0a+-&+L?*b^t[dgY5l05+kxU');
define('SECURE_AUTH_KEY',  'd$s-$2PFTJK+jXhjd|^n,[e<%>6kj)4e~!-rT2=)0f4]15|TM[>ruT0 &O8 aKnm');
define('LOGGED_IN_KEY',    'u%8a8hyqPvsXT#*uTQEkFN8hr2Pp*In1?]|dEQ|zCDMmIo>@Cf@d|t37f?a%EY8s');
define('NONCE_KEY',        '7X9k,uMy)a-KZ+|z]|)<>&ds~}[|/ T(]`+Z&o62-s@BtH*;6})Oa?@oNTd+pw9y');
define('AUTH_SALT',        '1Jj>//`*^;($*tYZPYVL7R-`yZ,&7(#+1_hp;w-,O rbf$O^|U#|:l>fwmK#W=;c');
define('SECURE_AUTH_SALT', 'vwP;_:>TC.8t!b4KDw|WpHkMA2vg<PWzs5>a)l_)Lu5M=x@-jcX&wIEW6flHHW`i');
define('LOGGED_IN_SALT',   'p.>HmZ6zY4~3L:7?|hpji#8qhbuL=.kvG_K@A|.Rmu+h&.T|<W CE4+.)|2pz+_%');
define('NONCE_SALT',       'D(.>kTh }f^ww#]~~ef-c16Yz6^*BV~tU&4ez8Bj`r?^=zKu+6VTgz%L/K=9(Rg7');

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
