<?php





//if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP Old'); } 
header("content-type: text/html; charset=UTF-8");

    error_reporting(0);
    ini_set('display_errors','on');

if(!empty($_GET['ref']) and $_COOKIE['ref']!=$_GET['ref'])
{
	setcookie("ref", $_GET['ref'], time()+3600 * 24 * 365,'/');
	header('Location: /');
}

function array_map_recursive($fn, $arr) {
    $rarr = array();
    foreach ($arr as $k => $v) {
        $rarr[$k] = is_array($v)
            ? array_map_recursive($fn, $v)
            : $fn($v);
    }
    return $rarr;
}

if($_SERVER['REDIRECT_URL'] != '/forms/unitpay_result') $_GET = array_map('trim', $_GET);
$_POST = array_map_recursive('trim', $_POST);
$_COOKIE = array_map('trim', $_COOKIE);
$_REQUEST = array_map_recursive('trim', $_REQUEST); 

if(get_magic_quotes_gpc()):
    $_GET = array_map('stripslashes', $_GET);
    $_POST = array_map_recursive('stripslashes', $_POST);
    $_COOKIE = array_map('stripslashes', $_COOKIE);
    $_REQUEST = array_map_recursive('stripslashes', $_REQUEST); 
endif; 










//Конец работы с запросом
include_once('core.php'); // подключаем ядро
