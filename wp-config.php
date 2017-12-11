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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '8tV28WH/#f~T3ekJE@8jA]#t7idFq+>5!@j$#@Eh*SLf%bd=5aSeey=BcNe<[Lu.');
define('SECURE_AUTH_KEY',  '%G3rIsur=@3e`Xv6W=U9P[kxtv45rABb-b(hA^`f*;zy49GRMbX[|]:<kA6kD4Q|');
define('LOGGED_IN_KEY',    '9cZ}%~.`{Rm4.f/E8<-J3[2.b<nw;?d(AQ;xkK.y[3-{#5Zq:Z1u75B.e[-/+RSb');
define('NONCE_KEY',        '^/Y?hMt4krj1S~J9*s&y;5My!/:-m>EmcJyv2 y.UA9Oq9XXRX?6z)@cbv3%{8XF');
define('AUTH_SALT',        '0@8SP4UpSf#8z6EY[Llc]2xYsgHlk6rCBIIKXMahig~8|Eu]iTS=nRC^(^zHpc@w');
define('SECURE_AUTH_SALT', '>`>nUC~&HZXc8+S> <!`Ceb7B<Q2:l0.hh<qwchWa[9q`^YJ$elCd>m=dqB]gOx(');
define('LOGGED_IN_SALT',   'I*Y?ig6|ME3LRMl$,TXD&ZBE+X~d(I+b9$5.?j#SO7D)TE?Xd E]@*5wk^5$)uZ ');
define('NONCE_SALT',       'E&JSW~GwIzG/JeT6V!J5?<&oFDXv+ghBp$ ,uFS#a]caz+M22F7|i^(w$YHt8KM/');

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
