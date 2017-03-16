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
define('DB_NAME', 'larapress');

/** MySQL database username */
define('DB_USER', 'larapress');

/** MySQL database password */
define('DB_PASSWORD', 'larapress2233');

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
define('AUTH_KEY',         '6bpBU{7Z*.ThqP;Xv{D> zHhH}%0N-Tq7HGFOTm,hYhizv5g#(;b|-Dm|7KO;dM]');
define('SECURE_AUTH_KEY',  ' HDAh4?z??JU=U)h}B{N6Hf]8cOhAc.!e+l7$,T[[56{<ch+[/0BHKed^R0S|l&T');
define('LOGGED_IN_KEY',    'Se8M8mL5@lGqB0%nYouf,8V8R8cQoR*a}<,5n#r Y(<t9jp:D4~UCd#I&6R|w&hD');
define('NONCE_KEY',        'ntj+$z#!uMHQ&0 Ks`^sFp3.@{^,s ZcBCS$~P7VIUBp^76&$i66lW4_1PV.t6{H');
define('AUTH_SALT',        '?BI6pvm%@jevRrBQ{J&(]zh&ri6i}r03mDnGj~/@?Ck|P@!EE6?:rU+fNH*)+][.');
define('SECURE_AUTH_SALT', '`=vYMSGc8>n|}_|7[j8:=Lu!7P22-a_Rw4*kNMr77_^otmrnc;V[,_a0?jPA5Q7/');
define('LOGGED_IN_SALT',   'geL.1YNMbWIcXY;0d-k9,:_Vf!Wf1a^tJBap*H3VTbV4MppWKg-e,,NJ l^Wz?Ul');
define('NONCE_SALT',       'CVFZyLL3!|(JH8r+J+efydg>n>~V,yi%%l]9<vqD};qJ&p<<7l`QhE=0k/jK=ipf');

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
