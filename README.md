#The multiple environment configuration for WordPress

* Put wp-config.php above your root folder (remove original wp-config.php file in the root)
* Put this file above your root folder
* Define the $root variable (folder of the server root)
* Generate the secret-key (bottom of the file)
* Add require_once((dirname(ABSPATH)) . '/wp-bootstrap.php'); at the beginning of wp-config.php
