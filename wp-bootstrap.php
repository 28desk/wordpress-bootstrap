<?php
/**
 * The multiple environment configuration for WordPress
 *
 * @author Aphichat Panjamanee <http://28desk.com>
 * @version 1.0
 *
 * Put wp-config.php above your root folder (remove original wp-config.php file in the root)
 * Put this file above your root folder
 * Define the $root variable (folder of the server root)
 * Generate the secret-key (bottom of the file)
 * Add require_once((dirname(ABSPATH)) . '/wp-bootstrap.php'); at the beginning of wp-config.php
 */

$server_name = $_SERVER['SERVER_NAME'];
$root = '';

$environments = array(
  'development' => '.dev',
  'staging' => '',
);

foreach($environments AS $key => $env) {
  if(strstr($server_name, $env)) {
    define('WP_ENVIRONMENT', $key);
    break;
  }
}

if(!defined('WP_ENVIRONMENT')) define('WP_ENVIRONMENT', 'production');

switch(WP_ENVIRONMENT) {
  case 'development':
    define('DB_NAME', '');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
  break;
  case 'staging':
    define('DB_NAME', '');
    define('DB_USER', '');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
  break;
  default:
    define('DB_NAME', '');
    define('DB_USER', '');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
  break;
}

// Begin bootstrapping
if(file_exists(dirname(__FILE__).'/'.$root.'/wp-content')) {
  define('WP_CONTENT_DIR', dirname(__FILE__).'/'.$root.'/wp-content');
} else {
  die('Path error! The root folder could not be found.');
}

define('WP_HOME', 'http://'.$server_name);
define('WP_SITEURL', 'http://'.$server_name);
define('WP_CONTENT_URL', '/wp-content');
define('DISALLOW_FILE_EDIT', true);

/*
** Generate keys and put it here
** https://api.wordpress.org/secret-key/1.1/salt/
*/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
