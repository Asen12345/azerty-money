<?php
  $db_host     = 'localhost';
  $db_user     = 'azerty1902_azerm';
  $db_password = 'SDgj6Sdgjl643Zc4';
  $db_name     = 'azerty1902_azerm';
 $usemodules  = array('content', 'news','file', 'forms');
 define("imagespath","data/photo/");
 define("attachpath","data/_files/");

	define("DIGISELLER_ID", 327994);

 $admin_email = 'Azerty-money@yandex.ru, Azerty-orders@yandex.ru';
 
 $discounts = array(
	array('start'=>100,'end'=>500,'d'=>1),
	array('start'=>500,'end'=>2000,'d'=>2),
	array('start'=>2000,'end'=>5000,'d'=>3),
	array('start'=>5000,'end'=>10000,'d'=>4),
	array('start'=>10000,'end'=>30000,'d'=>5),
	array('start'=>30000,'end'=>'><','d'=>10)
 );

 //payment systems
 $psystems = array( 1  => array('caption' => 'WebMoney WMR', 'img' => 'webmoney.png', 'cc' => 'RUR', 'sort' => 1),
					2  => array('caption' => 'Qiwi(Без комиссии)', 'img' => 'qiwi.png', 'cc' => 'RUR', 'sort' => 7),
					3  => array('caption' => 'Yandex(без комиссии)', 'img' => 'yandex.png', 'cc' => 'RUR', 'sort' => 9),
					4  => array('caption' => 'Webmoney WMP', 'img' => 'webmoney.png', 'cc' => 'RUR', 'sort' => 3)/*,
					5  => array('caption' => 'Webmoney(wmb)', 'cc' => 'BYR', 'sort' => 5)*/,
					6  => array('caption' => 'Webmoney WMZ', 'img' => 'webmoney.png', 'cc' => 'USD', 'sort' => 2),
					7  => array('caption' => 'Webmoney WME', 'img' => 'webmoney.png', 'cc' => 'EUR', 'sort' => 4),
					8  => array('caption' => 'Банковские карты(EU)', 'img' => 'mastercard.png', 'cc' => 'RUR', 'sort' => 11),
					9  => array('caption' => 'Евросеть, Связной', 'img' => 'evroeset.png', 'cc' => 'RUR', 'sort' => 15)/*,
					10 => array('caption' => 'Web Money(Robokassa)', 'cc' => 'RUR', 'sort' => 6),
					11 => array('caption' => 'МТС, Теле 2, Билайн(Robokassa)', 'cc' => 'RUR', 'sort' => 12),
					13 => array('caption' => 'Qiwi кошелек(unitpay)', 'cc' => 'RUR', 'sort' => 8)*/,
					14 => array('caption' => 'Банковские карты (Россия и СНГ)', 'img' => 'mastercard.png', 'cc' => 'RUR', 'sort' => 10),// Unitpay
                   15 => array('caption' => 'Мегафон, МТС, Билайн, Теле 2', 'img' => 'sim.png', 'cc' => 'RUR', 'sort' => 13),/*// Unitpay
                   16 => array('caption' => 'LiqPay(Unitpay)', 'cc' => 'UAH', 'sort' => 16)*/
				  );
 
 //ROBOKASSA 
 $mrh_login = "Azerty-money";//магазин
 $mrh_pass1 = "pYsY5bxn";//платежный пароль 1
 $mrh_pass2 = "f2TWVRf9";//платежный пароль 2
 $mrh_server = 'https://auth.robokassa.ru/Merchant/Index.aspx';//адрес сервера
 
 //QIWI 
 $SHOP_ID = "269053"; //Идентификатор магазина
 
 //Яндекс.Деньги 
 $account = "410012240198778";//счет магазина
 $secret_key_yandex = "BVodoC9RM5zuBZWLtMvV9R9V";//секретный вопрос для проверки http-уведомлений
 
 //WebMoney WMR 
 $purse_wm = array(
					1 => array( 'purse' => 'R322062315414', 'key' => 'B94DD0FE-2B96-4F3F-93C5-C0133A63B75B'),
					4 => array( 'purse' => 'P235096105420', 'key' => 'ZFE281ND-4F85-81RP-8B31-9E4C13QEE59A'),
					6 => array( 'purse' => 'Z104022336863', 'key' => '9F7827BD-8656-4616-8B38-964C1F4EE587'),
					7 => array( 'purse' => 'E382496715720', 'key' => 'E72EA51B-BF81-4F85-BCEB-AB5239C590BC')
				   );//кошелек
 
 //Unitpay
 $project_id_unitpay = '5158';
 $secret_key_unitpay = '5f591bc7c4bc22dea59a48ce240a4f67';
 
 // default templates
 
 $template_main   = "site_1.tpl";