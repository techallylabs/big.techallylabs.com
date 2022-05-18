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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i8235382_wp19' );

/** Database username */
define( 'DB_USER', 'i8235382_wp19' );

/** Database password */
define( 'DB_PASSWORD', 'S.U9xxoBvFeDLPpHulQ96' );

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
define('AUTH_KEY',         'MQhaUROPww3SC0k3wmudVrRoDCzPv48zvQGLQojWasj5zZ68x4oqf6gQ2b5gwPAg');
define('SECURE_AUTH_KEY',  'qJNDNqDwxE4J5FiCJG1htLFC6yIEWYqojmzNNUTyvyjLnavDR3kgL49DAht24qrR');
define('LOGGED_IN_KEY',    'UZrZSKEHhvDCjWsH4Mz4qSoisFPC3MHYU75vt9Vsg6rKAEGNJMQmcsH7PkRGjyAF');
define('NONCE_KEY',        'YiJ4BAlGoUkBpNrx4PCalMcqE8SyE1VZfiB5MVtir9I5rjot4oCCIwyNN8wwJS6d');
define('AUTH_SALT',        'LGleXShCwSrwCyMeU7YAhQMFsUuXOTeHlYZ6NwHYjPAocMzmhyvIfR61QSNAbDIE');
define('SECURE_AUTH_SALT', 'Rt8O7SHp4Q1zxEzG8JVRKz8wan8Lu0Xc9d2WMWGkTdzW1XTtyAV2IOG9mjzMdsxm');
define('LOGGED_IN_SALT',   'ifvWLJNAF2t8bx4QRb8hlsUkKGX8gocOSysCFcicPFIe9cQ7rXS7BTVteNLuHw1W');
define('NONCE_SALT',       '18qc1qlw1Y1k3Yb9qt8dNs9qnaN9puzEY6dfBQNJPOrPgYsVTWwOImHhZdfJqm7F');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


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
