<?php
include_once("https://azerty-money.ru/smarty/SmartyBC.class.php");
$smarty =  new SmartyBC();
$users = array(1, 2, 3, 4, 5, 6, 7, 8);

// Assign query results to template file.

$smarty->assign('foo', $users);
// Compile and display the template.
$smarty->display('site_1.tpl');


?>