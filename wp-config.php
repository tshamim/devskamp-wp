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
define('DB_NAME', 'devskamp');

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
define('AUTH_KEY',         '0+%-yDa.Y,{T:tQaV_y~^6S3q)5Ld9y#(v}YY,RO<y6f~xy[Io9Snp%R>t2_Ui,5');
define('SECURE_AUTH_KEY',  'U;N3$w$gow&.lKT#_REO j!@,ZUq)yDJ~^KF,SB8I}+;ex30q6FtS1H_6]ZKh!Z+');
define('LOGGED_IN_KEY',    'A6I)EV^U)P0$i|vF:&9P8YTyZ#>^OwBm@}1]KLO//EL@>Po}`7le28V6r~{efTt4');
define('NONCE_KEY',        '5?t}r($K5K<J+=Iq1:+uK9?cAILZLj*&yaB-!v2K,Aj[O4|@?,&?9kManXIxPg/<');
define('AUTH_SALT',        's,A|s!.7G<%akl@$K&V)F+/1GS_;I(DDSnE^~k~u&oyhK[cVa_:4zt:-1|j!l9lL');
define('SECURE_AUTH_SALT', 'p A:F>4t|bI2s9&VOV8(7V0_,)eWfxSW^w)dKm%=g14ih(L+z|WXjWNRK}^Gg`F^');
define('LOGGED_IN_SALT',   'y=#WHWs4&~!m;N<=Tha1@[n2H77onP [/CDkWU/$C`Wl^FYj!<@/$p;;q(z ^xHd');
define('NONCE_SALT',       'sUcGJ?e% (74lQ_>=mMCeJB`R12`rqaufz(Q6DqT*C*_xsR!O8vdi9rE?Yx%`W-7');

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
