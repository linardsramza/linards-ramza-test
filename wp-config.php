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
define( 'DB_NAME', 'awavedb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'h?7s3}Q)}%7~S b3U5O5N }Q,n>SY[nO|P7fM<qg8nb;nIMzG28&[v@<fhN9Ku_O' );
define( 'SECURE_AUTH_KEY',  'i,f@(d&]=4h&x@bg:LKJ<,T(fOT=FUxhPR&lbE!ZS*`Gsq2kpN5jf5q6-UVw$>QU' );
define( 'LOGGED_IN_KEY',    'oC8v!}- IL-4_$Pv}*s0lK^pci_f!|Vn{mRY>0,SL4moWJ4}+!q]rC65T_`<?NB!' );
define( 'NONCE_KEY',        'P0U$v?4TjdwEqxNfc^M&Xl^TwQkpd64qTa=*BHzQlnHyh0U <EwGwKI(?0MBPmH:' );
define( 'AUTH_SALT',        ',q^,Ep`{p(CD9e*MY>>C(RyXtpMCsH~ IgFy],65HMcrP`qXR{9F&!h76snvct`K' );
define( 'SECURE_AUTH_SALT', '!UkDy0bKnT$2pST|`EwDP k#(@~(0y^:hR8rBe_T[*Z,;Vpq9/DLF^Aj![Hx5aGf' );
define( 'LOGGED_IN_SALT',   'l73r6!NO%fH2SLY~i9}=]?i.uJh&de9^sW8$im&@PgftnkiVj6ShVlV5EP^D_`){' );
define( 'NONCE_SALT',       'X#]L(_zF= ;Db7d6eIQ^AnZE>B3[QK=?,ao4{ui/Z4cjfaWOOykQ,/p.ms] lyIt' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
