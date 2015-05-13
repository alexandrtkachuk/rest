<?php 

define('DIR_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
define('LIB', 'lib' );//folders class
define('CONTROLLER', 'Controller' );
define('MODEL', 'Model' );//folders class
define('EXTENSION', 'json');
define('EXTENSIONS',serialize( 
    array('json','txt', 'html', 'xml') 
));
define('TABLE_USERS', 'carshop_users');
define('TABLE_GOODS', 'carshop_cars'); #товары
define ('TABLE_CATEGORY','');
define ('TABLE_ORDERS','');
define ('TABLE_CART','');
define('DB_NAME', 'user7');
define('USER', 'user7');
define('PASS', 'tuser7');
define('DB_HOST', '');

##########ERRORS#####################

define('ERROR_1', 'No class ');
define('ERROR_2', 'No method ');
define('ERROR_3', 'Undefiner extension');
define('ERROR_4', 'access error');
