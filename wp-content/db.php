<?php
/*
Added Development Environment/localhost check to return localhost URL
inspired by http://codex.wordpress.org/Running_a_Development_Copy_of_WordPress
Author: @khbites
*/

function test_localhosts( ) {
  /* DB URL is set with SetEnv in Apache https://github.com/mhoofman/wordpress-heroku#linux-or-manual-apache-config */

  if (preg_match('/localhost/',$_ENV['DATABASE_URL'])) {
    preg_match('/(.*)\/wp-.*\/(\w*\.php)+$/', $_SERVER['REQUEST_URI'], $path);
    return ("http://" . $_SERVER['HTTP_HOST'] . $path[1]);
  }

  else return false; // act as normal; will pull main site info from db
}

function pdo_log_error($message, $data = null) {
	if (strpos($_SERVER['SCRIPT_NAME'], 'wp-admin') !== false) {
		$admin_dir = '';
	} else {
		$admin_dir = 'wp-admin/';
	}
	die(<<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>WordPress &rsaquo; Error</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="{$admin_dir}css/install.css" type="text/css" />
</head>
<body>
  <h1 id="logo"><img alt="WordPress" src="{$admin_dir}images/wordpress-logo.png" /></h1>
  <p>$message</p>
  <p>$data</p>
</body>
<html>

HTML
);
}



/*
Plugin Name: PostgreSQL for WordPress (PG4WP)
Plugin URI: http://www.hawkix.net
Description: PG4WP is a special 'plugin' enabling WordPress to use a PostgreSQL database.
Version: 1.3.1
Author: Hawk__
Author URI: http://www.hawkix.net
License: GPLv2 or newer.
*/
if(! array_key_exists("DATABASE_URL", $_ENV)){
    if (version_compare( PHP_VERSION, '5.2.4', '<')) {
        pdo_log_error('PHP version on this server is too old.', sprinf("Your server is running PHP version %d but this version of WordPress requires at least 5.2.4", phpversion()));
    }

    if (!extension_loaded('pdo')) {
        pdo_log_error('PHP PDO Extension is not loaded.', 'Your PHP installation appears to be missing the PDO extension which is required for this version of WordPress.');
    }

    if (!extension_loaded('pdo_sqlite')) {
        pdo_log_error('PDO Driver for SQLite is missing.', 'Your PHP installtion appears not to have the right PDO drivers loaded. These are required for this version of WordPress and the type of database you have specified.');
    }

    /*
     * Notice:
     * Your scripts have the permission to create directories or files on your server.
     * If you write in your wp-config.php like below, we take these definitions.
     * define('DB_DIR', '/full_path_to_the_database_directory/');
     * define('DB_FILE', 'database_file_name');
     */

    /*
     * PDODIR is SQLite Integration installed directory.
     */
    if (defined('WP_PLUGIN_DIR')) {
        define('PDODIR', WP_PLUGIN_DIR . '/sqlite-integration/');
    } else {
        if (defined('WP_CONTENT_DIR')) {
            define('PDODIR', WP_CONTENT_DIR . '/plugins/sqlite-integration/');
        } else {
            define('PDODIR', ABSPATH . 'wp-content/plugins/sqlite-integration/');
        }
    }
    /*
     * FQDBDIR is a directory where the sqlite database file is placed.
     * If DB_DIR is defined, it is used as FQDBDIR.
     */
    if (defined('DB_DIR')) {
        if (substr(DB_DIR, -1, 1) != '/') {
            define('FQDBDIR', DB_DIR . '/');
        } else {
            define('FQDBDIR', DB_DIR);
        }
    } else {
        if (defined('WP_CONTENT_DIR')) {
            define('FQDBDIR', WP_CONTENT_DIR . '/database/');
        } else {
            define('FQDBDIR', ABSPATH . 'wp-content/database/');
        }
    }
    /*
     * FQDB is a database file name. If DB_FILE is defined, it is used
     * as FQDB.
     */
    if ( defined('DB_FILE' )) {
        define('FQDB', FQDBDIR . DB_FILE);
    } else {
        define('FQDB', FQDBDIR . '.ht.sqlite');
    }
    /*
     * UDF_FILE is a file that contains user defined functions.
     */
    if (version_compare(PHP_VERSION, '5.3', '<')) {
        define('UDF_FILE', PDODIR . 'functions-5-2.php');
    } elseif (version_compare(PHP_VERSION, '5.3', '>=')) {
        define('UDF_FILE', PDODIR . 'functions.php');
    }

    require_once PDODIR . 'pdodb.class.php';

}
elseif( !defined('PG4WP_ROOT'))
{
    add_filter ( 'pre_option_home', 'test_localhosts' );
    add_filter ( 'pre_option_siteurl', 'test_localhosts' );
    // You can choose the driver to load here
    define('DB_DRIVER', 'pgsql'); // 'pgsql' or 'mysql' are supported for now

    // Set this to 'true' and check that `pg4wp` is writable if you want debug logs to be written
    define( 'PG4WP_DEBUG', false);
    // If you just want to log queries that generate errors, leave PG4WP_DEBUG to "false"
    // and set this to true
    define( 'PG4WP_LOG_ERRORS', false);

    // If you want to allow insecure configuration (from the author point of view) to work with PG4WP,
    // change this to true
    define( 'PG4WP_INSECURE', true);

    // Not entirely sure why this needs to be set, but it seems to be required since wp version 4
    define('WP_USE_EXT_MYSQL', true);

    // This defines the directory where PG4WP files are loaded from
    //   2 places checked : wp-content and wp-content/plugins
    if( file_exists( ABSPATH.'/wp-content/pg4wp'))
        define( 'PG4WP_ROOT', ABSPATH.'/wp-content/pg4wp');
    else
        define( 'PG4WP_ROOT', ABSPATH.'/wp-content/plugins/pg4wp');

    // Here happens all the magic
    require_once( PG4WP_ROOT.'/core.php');
} // Protection against multiple loading
