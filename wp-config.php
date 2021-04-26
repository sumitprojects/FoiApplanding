<?php
define( 'WP_CACHE', true );

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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', '' );


/** MySQL database username */

define( 'DB_USER', '' );


/** MySQL database password */

define( 'DB_PASSWORD', '' );


/** MySQL hostname */

define( 'DB_HOST', '' );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );


/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'oc{{@<KnIe#/kWfPw1~9eL%qz4pu8x;ixy4w(&zvID_bY|6_7M?Or 6sDCmN3_t$' );

define( 'SECURE_AUTH_KEY',  'Kgx73{%!$hPjS]IWe_cJ6f&C2q/tX2r4:Kb_%JXn_GY1<hCxgf9GY;d1p+t]0yw>' );

define( 'LOGGED_IN_KEY',    'XQkW0M0Iy!v_M?[H4VQ93:?U=Ig}ZQWMah=KfNf8O/E/N6sBCf[_Cf_H!g}/f]9Q' );

define( 'NONCE_KEY',        'WXr@@n(KMZ FIzuBbUiXOtx).XOM^]xK](?yEX:>ZNGEvU!IcfcmcUv(#n- kW_1' );

define( 'AUTH_SALT',        'cY<s`![)LM%Fh$._D<t4j]<RB:e7#MeH_9z/hE@K099U^@>zhR]>xUj{Kw|$|R&w' );

define( 'SECURE_AUTH_SALT', '*]QoP[-k[<7asD>B+^u149(}9|kMtKDI<r>PQ;}5TGwaKP7@@9^WzO4g:VjGz~8{' );

define( 'LOGGED_IN_SALT',   'CadWP:Z}jBj!;}_v.97[M,oItb>C3yu|6$2U~oyA`a[M<Pu?n3s{7D8OT4t`q;yq' );

define( 'NONCE_SALT',       '/b7z:DX:qSpRDzd^--3!?o5G>T+#^~&ZsQ!q3p+ gp[2F4}Q8 ~k_y2zpFd!yNd[' );


/**#@-*/


/**

 * WordPress Database Table prefix.

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

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', true );


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

