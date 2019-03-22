<?php 


ini_set('display_errors', 1);
error_reporting(E_ALL);


define('ROOT', dirname(__FILE__));
session_start();


require ROOT.'/application/core/Router.php';
require ROOT.'/application/config/db_connect.php';

$router_obj = new Router();
$router_obj->run();


 ?>