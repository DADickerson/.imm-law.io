<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '8Q<Qt7l(;1iG>nZb5gw6T5zc|6Rc`sn+;GGOi~D6RHaN`.ks6+U$4qiUU?,LF<p:' );
define( 'SECURE_AUTH_KEY',   '&?aG`Mw#gZB@``f~*@p#9U1c7l`.t}DMs>k_%bj$<6rQuls83g2@rRu;//qNz)FA' );
define( 'LOGGED_IN_KEY',     'a+Pl)0;preVL.~Ad9f%81DHGB0><[BD-XDxS5907:C1>e`Qd~=SZpzJ6_FkWo}61' );
define( 'NONCE_KEY',         '}m,0&)cnmi<e>Bsu/j+^_NzOLR]5yd&$LWdzN9hmO%X>^pVIO1bgSin}{hX4FCWW' );
define( 'AUTH_SALT',         'em ?9!Y@EMs*6P1w_<e=DN6kX.zi&45i<Yi_hDSKz67aoSrO~tQVw{6l>;`lVB3G' );
define( 'SECURE_AUTH_SALT',  'NDcHML~+KglAqqB?3L^{uuQu8&K]m-R:ZOZ5P7/XpAv)rppd.?PVm$Ms]q3_:D}N' );
define( 'LOGGED_IN_SALT',    '>wGg#&2UZR+hagYx$5<%bS<&xKq&8E2giYI_k-5U;D/`F}.j!O~-RgJ;``-l,<aa' );
define( 'NONCE_SALT',        ')5;{EqZ9*!~$r7o4N)pKV9w,)D2;>K:9e+Y>c;qR5k]Ql4qGq,B3iDZe(WZ=w/G3' );
define( 'WP_CACHE_KEY_SALT', 'S9#.GNIX0C(>[)2)Ugr|ZjuB`/1`b+BC4H#G@V^kuxV_.4CwcMY6UD(psWUZWAYU' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
