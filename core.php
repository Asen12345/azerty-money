<?php
ini_set('session.gc_maxlifetime', 8640000);
ini_set('session.cookie_lifetime', 8640000);
session_set_cookie_params(8640000);
#ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'] .'../sessions/');
session_start();
define("_modulespath","modules");
define("WPATH","");

include_once('config.php'); 
include_once('classes/registry.php');
include_once('classes/path.php');
include_once('classes/users.php');
include_once('classes/modelframe.php');
include_once('classes/view.php');
require_once 'classes/idiorm.php';

$reg   = new Registry;


define('SMARTY_DIR', 'smarty/');
require_once('smarty/Smarty.class.php');

$tpl = new Smarty();
$tpl->setTemplateDir ('templates/');
$tpl->setCompileDir  ('templates/templates_c/');
$tpl->setConfigDir   ('templates/config/');
$tpl->setCacheDir    ('templates/cache/');

$reg->set('tpl', $tpl);


ORM::configure(array(
    'connection_string' => 'mysql:host='.$db_host.';dbname='.$db_name,
    'username' => $db_user,
    'password' => $db_password,
	'logging'=> true
));

ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));// ye, for sure :D

$view = new View($reg);
$reg->set ('view', $view);

$path  = new Path($reg);
$reg->set ('path', $path);


$path->analysePath();

if (sitepage=='site') 
{
    $view->prepareAlternativeViewValues();
}

$cacheArray = array();
$reg->set ('cache',$cacheArray);

$view->prepareDefaultViewValues();

$reg["path"]->loadmodules();



view::assign("categ",$path->categ());
view::assign("news",$path->News());
view::assign("map",$path->getMap());
view::assign("popular",$path->getPopular());
view::assign("feedback",$path->getFeedback());
view::assign("news1",$path->getNews());
view::assign("contentHeaders",$path->getHeaders());
view::assign("bread",$path->bread());
view::assign("test",$path->Test());


view::assign("user",$reg["users"]->getUserData());
if(isset($_COOKIE['order'])){
	view::assign("cook_order", $_COOKIE['order']);
}
global $discounts;
view::assign("discounts",$discounts);
view::assign('user_info', $reg["users"]->info_admin());
if (!$reg["users"]->is_login() and sitepage=="admin" and !(($_GET["m"]=="users" and $_GET["param1"]=="login")))
{
	header('Location: /admin/users/login/');
	die();
}		
$reg["users"]->check_rights_admin(); //доступ к функциям разных типов администраторов

$view->delegatePath();
$view->setViewValues();
$view->display();
//print_r(ORM::get_query_log());die();
?>
