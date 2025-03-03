<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the website, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * Database settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/

 *

 * @package WordPress

 */



// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'etardif_pfe_badminton_lachine_bd1' );



/** Database username */

define( 'DB_USER', 'etardif_pfe_badminton_lachine_u1' );



/** Database password */

define( 'DB_PASSWORD', 'pfe_badminton_lachine_mdp1' );



/** Database hostname */

define( 'DB_HOST', 'localhost' );



/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );



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

define( 'AUTH_KEY',         '$8}W4n7A]FfJ&Y!tc]t%Pj<e=9X XhwhI&wMC7l+rkRuB4N%Y[$Am|.0eTJ#5W:h' );

define( 'SECURE_AUTH_KEY',  ':@^?S9iI[:w.q2L%FNN:JvsRUz*ROt*Ag`<i^et.B~0=MXQ:Pm|!2UfcI$@u(CWr' );

define( 'LOGGED_IN_KEY',    'm+F=JMlEQV;s/teq8t6Z`jqx3BBn/w=W{Fw([%~T?Hv5QR$2>}#3sygDYD-w&m c' );

define( 'NONCE_KEY',        'B7[yuFtqfE+&ao>|b0bUFwq6U Y&mgyBtlX]BFPp~#S+{UZ1Q;$MIK3|m7VqM9O{' );

define( 'AUTH_SALT',        '].?-O]TEa;o}h#9a;[o=|N!1GmaOtB&}RO1,COIes??=2!p=c#nj9XP q^ZzOX#M' );

define( 'SECURE_AUTH_SALT', 'GFsn!XAyMxd=za<m/RF0?9TP{Tix^(>5w-z{%*)${2gqp|p2UunJG>Iia|G@R .H' );

define( 'LOGGED_IN_SALT',   'bu+j[<@AG8HF~QPIj_y!Jc)sM|J_q+ 9W<fW%r9//TEcrNa7nx6(pB7H}LCrgC$N' );

define( 'NONCE_SALT',       'n,d8}puEOoN$r: mWX^oAkmD^^,]fMf:XvReZ6{SJWP4nx|X,rO@%[wVU(`7@`oQ' );



/**#@-*/



/**

 * WordPress database table prefix.

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

 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/

 */

define( 'WP_DEBUG', false );



/* Add any custom values between this line and the "stop editing" line. */







/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

