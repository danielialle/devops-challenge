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
define( 'DB_NAME', 'caseinfo' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'danielialle' );

/** MySQL hostname */
define( 'DB_HOST', 'database-1.cndqlf2jwce3.us-east-2.rds.amazonaws.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'XyOG`meM9KCY%s%SJhsy171hhMfw4MnW#VMne3y-EE 2r.1l0tQTAZDAL`OwwjCH');
define('SECURE_AUTH_KEY',  '$8gTHj|AAsy4LV|?^o<i<E|X)3ulta _{5SOp^WiT_2S4Tfav=j#OGV*ik4_:(Ba');
define('LOGGED_IN_KEY',    '2ybXyg%+TkaVMUj5/=jmxYRq1E,W!CWt^Hpxj?#qq0-1|j!#CmKM5+UI-?Ec7 Q/');
define('NONCE_KEY',        'k?0KIKi?A^^ve=.-v5egYd!czzvOxbd,%$rs%,&Ar8WtU<oQ+LP.B}c4g0b7b-j:');
define('AUTH_SALT',        'o-EI$-j/Z3C4wj@08L#>qzN-E:UJdgguW[-JZ57SyHyE|#8Ji~Kv%M6oKO$.2AcR');
define('SECURE_AUTH_SALT', '.]xf%CRh)=ZS1X@,-sXM}g|8P^yYU?M`ZanTc7/-zM*MY/mLMs:ep(J`GYK-`d1g');
define('LOGGED_IN_SALT',   'X| SV_4X@rPk7p+]>0kdbj{CQ<PLk3z[XE}o{EkR@?.eykW/sx|_L]SB6@|!<A~l');
define('NONCE_SALT',       'v}oo||3zDMr|Nre6vBI=j.[7(!MKSjh&HVB%M_h:$=:HlDrs@>!K^-;Lh+r/ov-B');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
