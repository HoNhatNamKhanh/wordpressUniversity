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
define( 'DB_NAME', 'university' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY', '`67b5&cW6MM<Uf)[ngQWJg<fv=/$i1>-hjXCN!%EFstDW9oJ[1v`,@Kx&i?AXKm7' );
define( 'SECURE_AUTH_KEY', 'gkv[3F1RLOx*Z^XTh8YzK$3(,jq?um~L(8GW.?,WefEi#V~MO?7NlkK.kIN($TmA' );
define( 'LOGGED_IN_KEY', 'D-Bm$S<8Og,RWbYkn-xTL8K,KgvI&$Bi@I8uy4P<q2o`wlnBlaY)a5zwa>PX AH+' );
define( 'NONCE_KEY', 'x7XfO7W8koemp|Dz:5qhWw$<o9(xtoCS/mBp(o<x$8(t=Qdx,Zj+d-*+/;#5%R)P' );
define( 'AUTH_SALT', '5yYUquFe0i=bL%)picx`~keTUTm#gzXj<z{nXzKCPw;G+9(lvzO{j/bBocs@UMJl' );
define( 'SECURE_AUTH_SALT', '#u-Dkzgnt/<LcA]f#bZt9^XGP]L~8 tY4m*p}{J4(pJN7Dnbo?[gfdyY<C&n6c>n' );
define( 'LOGGED_IN_SALT', 'wct@{RMKjbAy4|y60)GC<YpQae@E_jLr`I?TiQIp47Uv?l@A1MI@*(xXr24>q89J' );
define( 'NONCE_SALT', ',++.[+-gHy:]qx!!8%udoKg#hsk*#OnKp0XG@Z_4]&thQnSzIy_^bbVz%Vje@20T' );

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';