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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'retailsy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '35!m_S(+]Sk#H|kfI5Hu%0e:V3M$2{r/KnQzO0z~eC,|&,@-4jrW&=gLQYkLc-0!' );
define( 'SECURE_AUTH_KEY',  'I`0(Wv&(>&)u9Pz:4wkRW9zJcT_wTt>pB<)Ol/Ly7[)`|fEWO&ftY;jv6k Lc)!s' );
define( 'LOGGED_IN_KEY',    'Z]`xTuKtvJN?X~qnvNd]HL1.5>i#Tn!m.G{m?aJ]>XOB3KlI]6g}{eZ$[i%9Fst^' );
define( 'NONCE_KEY',        'v$w([E{_a!%?bs+FC64O0m-W9~,PD&/b-R!k{A#BIH7<=XzcO/XyIXBA,jUEXD;D' );
define( 'AUTH_SALT',        '^<@M`5pqm#@o @=E/UIIArVL <4:aKt4<S@%]AA6*|QV<.BogeX*ckTTH{RjOL]P' );
define( 'SECURE_AUTH_SALT', '|yNrwnB(nwD?3m]r[p[ZZN0 }1q1{bV$OV<l)={#CbYps8C%*yy&GV*Lvq|w|^gf' );
define( 'LOGGED_IN_SALT',   'a6v8!-N[7:!|Q~H`Ij]>3~*cLc7l&Li?I&c3|f/mzb7ZZON&6`bSZ9IYv1cT6:`>' );
define( 'NONCE_SALT',       'UEV[3<U[pGxE.lnQ52,z/xbLj<ZQG&Ut&)Orq{&iOf{X#ftH?9X)JqxidCo$@%xl' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
