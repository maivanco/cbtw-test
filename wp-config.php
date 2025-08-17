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
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') );  

/** Database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER') );

/** Database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') );

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
define('AUTH_KEY',         '`U`L9; h!AOS:FRdNvc[aoT9U+]Rwan3|@||M)kBMEC;uNA|}hVj6z%Nz+cVIIml');
define('SECURE_AUTH_KEY',  'y,IVS-;uoa!|[a|&_Jix>9opSdP?|OTxrTSR&m9jUN&-iRR4=5BYI|<o:,]bLKRb');
define('LOGGED_IN_KEY',    'PpP#^`WgU!%&ZV2d~p+I*=fVB,nP|huxH(_<pI7R{$0>t&RepJ!|XWp4U(|6]&C?');
define('NONCE_KEY',        'qG#}yT7+KgiGYx3jB&F#-nB+oZn0A%Y0])= HB~c t,uFKT%|>5[m)6s9mQx5|R-');
define('AUTH_SALT',        '=IGGftmO[f|I.G=e*1h]%1H-#-GEoHBabbrK7xE$2azru-nNE%HL|GK|-s%WvmyG');
define('SECURE_AUTH_SALT', 'g-`SbXHtZkS=#7Y~#:=yg.S+@39&_%ubTw4qvx<CWt%vHQGo$0k-[=CYcD97[Cyb');
define('LOGGED_IN_SALT',   'c^2*;p}&5~s_k,j(GCHo{I$nkKR/|`Pe}WH[oA^xs0J<IB1KcIUKC1$Jwv$#c+jX');
define('NONCE_SALT',       '|ngl@3AVv,X~K3%m,/bLYRxd,*v|O@.= T,8{TI6Kz@hEt*Vd?/i9<_>VSQ$Q3 y');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
