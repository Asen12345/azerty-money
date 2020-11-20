<?php
class content extends ControllerSite {

	public $module_name = "Контент";
	

	public function bread()
	{
		$this->assign('foo','bar');

// Compile and display the template.
$this->display('site_1.tpl');
	}



	
	public function categories()
	{
		$this->setMode('categories');
		$this->reg["view"]->addBlock('block1','site_content.tpl');
	}
	public function faq()
	{
		$questions = ORM::for_table('faq')->order_by_desc('category')->find_array();
		$this->setMode('faq');
		$this->setData($questions);
		$this->reg["view"]->addBlock('block1','site_content.tpl');
	}

	public function cateus()
	{
		session_start();
		$cate = $_GET['cateus'];
		$cate_table = ORM::for_table('categories')->where('maid', $cate)->find_many();
		$_SESSION['cats'] = $cate_table;
		
		$elements = ORM::for_table('services_item')->where('sid', $cate)->where('active',1)->where('parent', 0)->find_many();
	    $_SESSION['elem'] = $elements;
		$elements1 = ORM::for_table('services')->where('gid', $cate)->where('parent', 0)->find_many();
		$_SESSION['elem1'] = $elements1;

		$this->setMode('cateus');
		$this->reg["view"]->addBlock('block1','site_content.tpl');

	}

	public function itemca()
	{
		session_start();
		$itemc = $_GET['itemca'];
		$itemc_table = ORM::for_table('services')->where('parent', $itemc)->find_many();
		$_SESSION['itemca'] = $itemc_table;
		$itemc_table1 = ORM::for_table('services_item')->where('parent', $itemc)->find_many();
		


		$this->setData($itemc_table1);
		$this->setMode('itemca');
		$this->reg["view"]->addBlock('block1','site_content.tpl');

	}

	

	
	public function gamingam()
	{
		session_start();
		$page_game = $_GET['game'];
		$game = ORM::for_table('games')->where('children', $page_game)->find_many();
		$_SESSION['game'] = $game;
		 



		$this->setMode('gamingam');
		$this->reg["view"]->addBlock('block1','site_content.tpl');

	}
	public function catalog()
	{
		session_start();

		//print_r($sort__category);





/*
		$this->setData($questions);
		$questions = ORM::for_table('faq')->order_by_desc('category')->find_array();
		*/

		if (isset($_GET['page'])){
			$page = $_GET['page'];
		} else {
			$_GET['page'] = 1;
		}
	
		$limit = 15;
		$number = ($page * $limit) - $limit;
		//$res_count = ORM::for_table('services_item')->find_array();
		//$res_count = ORM::for_table('services_item')->select('*')->find_array();
		$res_count = ORM::for_table('games')->select('id')->where('children', '0')->count();
		$str_pag = ceil($res_count / $limit);
		$test_1 = "12311313";
		$_SESSION['test'] = $str_pag;
		//echo  '<div class="catalog__pages">';
	//	for ($i = 1; $i <=$str_pag; $i++){
		
			//echo ' <a style="text-decoration:none;" href=http://mykombain.ru/content/test?page='.$i.'>'.
		
		
		 
	

			
			
			
		//	$i
			
			
			
		//	.'</a>';
	//	}	

		//echo '</div>';
	//	$this->assign('sections',$str_pag);
				
		$this->setMode('catalog');
		$this->reg["view"]->addBlock('block1','site_content.tpl');
	}
	
	public function view()
	{

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$key = '6LdQI_8UAAAAAFg5QXTClXvSj8IUt4VBeuq70FAi';
		$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
	
		$data = json_decode(file_get_contents($query));
	
		if ( !$data->success == false){
		
	



if($_POST){
	global $admin_email;
	$this->reg["users"]->sendmail("Пользователь ". $_POST['nam']  ."  отправил сообщение ". $_POST['text'] . ". Почта:".  $_POST['mal'] . ".","Оставлено сообщение на сайте Azerty-money.ru",$admin_email,'info@azerty-money.ru');


}
}

		if (is_numeric($_GET['param2']))
		{
			$pageData = ORM::for_table('content')->where('id',$_GET['param2'])->find_one();
			if (!count($pageData)) $this->reg['view']->go404();
			$this->reg["view"]->addBlock('block1','site_content.tpl');
			$this->setData($pageData);
			$this->setMode("one");			
		} else
			$this->reg->go404();			
	}



	public function result()
	{


		$this->reg["news"]->setMode("result");
		$this->reg["view"]->addBlock('block1','site_content.tpl');
	}
	



	public function mainpage()
	{
		session_start();

		$_SESSION['vb'] = "123123123123123";
		$this->reg["news"]->setMode("main");
		$this->reg["view"]->addBlock('block1','site_mainpage.tpl');
    }
	public function feedback()
	{
		session_start();


		$coun = ORM::for_table('feedback')->count();
	$_SESSION['feed_cou'] = $coun;
	
		
				if (isset($_GET['page1'])){
					$page1 = $_GET['page1'];
				} else {
					$_GET['page1'] = 1;
				}
			
				$limit1 = 15;
				$number1 = ($page1 * $limit1) - $limit1;
				$res_count1 = ORM::for_table('feedback')->select('id')->count();
				$str_pag1 = ceil($res_count1 / $limit1);
				$test_1 = "12311313";

				$_SESSION['feed_c'] = $str_pag1;

				$_SESSION['test1'] = $str_pag1;


		if($_GET['param3'])
		{
			$data = ORM::for_table('feedback')->order_by_desc('data')->where('display', 1)->offset(($_GET['param3']*8)-8)->limit(8)->find_array();
		} else $data = ORM::for_table('feedback')->order_by_desc('data')->where('display', 1)->find_array();
		if(isset($data[0]['id'])){
			foreach($data as $k => $v){
				$rg = ORM::for_table('games')->where('id', $v['gid'])->find_one();
				$data[$k]['gimg'] = $rg->photo_feedback;
			}
		}
		$name=trim(htmlspecialchars($_POST['name']));
		$feedback=htmlspecialchars($_POST['comment']);





		$url1 = 'https://www.google.com/recaptcha/api/siteverify';
		$key1 = '6Le4JP8UAAAAAARfitwfr4T_77wZ6ffEeRvOVjuK';
		$query1 = $url1.'?secret='.$key1.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
	
		$data1 = json_decode(file_get_contents($query1));
	
		if ( !$data1->success == false){


		if($_POST)
		{
			if($name and $feedback and $_POST['email'])
			{
				global $admin_email;
				
				$create = ORM::for_table('feedback')->create();
				$create->set_expr('data', 'NOW()');
				$create->name = $name;
				$create->text_feedback = $feedback;
				$create->email = $_POST['email'];
				$create->gid = (int) $_POST['game'];
				$create->save();
				
				$this->reg["users"]->sendmail("Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.","Оставлен отзыв на сайте Azerty-money.ru",$admin_email,'info@azerty-money.ru');
				
				/*$headers ="Content-type: text/plain; charset=utf-8\r\n";
				$headers.="From:info@azerty-money.com";
				mail("Azerty-money@yandex.ru, Azerty-orders@yandex.ru","Оставлен отзыв на сайте Azerty-money.ru","Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.",$headers);*/
				//$message = "Спасибо, Ваш отзыв был оставлен, Ваше мнение важно для нас. Отзыв будет добавлен на страницу после проверки модератором.";
			}else
			{

				if (!$name) 
				{
					$b = 1;
					//$error = "Не заполнено поле имя.";
				}
				if(!$feedback)
				{
					$b = 1;
				//$error = "Не заполнено поле отзыв.";
				}
				if(!$_POST['email']){
					$b = 1;
					//$error = "Не заполнено поле email.";
				}
			
				$a = 1;
				if( $a != 1 )//!$name and !$feedback and !$_POST['captcha'])
				{
					$error= "Неверно заполнены поля.";
				}
			}
		}
		}
		$paginatorData = $this->m->get_paginator_data(-1,$where);
        $data["paginatorData"] = $paginatorData;
		$ru = ORM::for_table('users')->where('id', 1)->find_one();
		$data['admin_name'][] = $ru->first_name;
		$row_games = ORM::for_table('games')->order_by_asc('caption')->find_array();
		$this->setData($data);
		view::assign("error",$error);
		view::assign("message",$message);
		view::assign("games",$row_games);
		$this->setMode('feedback');
		$this->reg["view"]->addBlock('block1','site_content.tpl');
	}
	public function search()
	{
		$search=$_POST['q'];
		if ($search)
		{
				$searchData = $this->m->processSearchForm($search);
				if ($searchData['0']['id'])
				{
					foreach ($searchData as $klevel=>$vlevel)
					{
						$link = ORM::for_table('services')->where('gid',$vlevel['id'])->find_array();
						if ($link[0]['id']) 
							$searchData[$klevel]['service_id'] = $link[0]['id'];
							$searchData[$klevel]['link'] = $link[0]['link'];
					}
				}
				$this->setData($searchData);
				$this->setMode('search');
				$this->reg["view"]->addBlock('block1','site_content.tpl');
			
		} else
		{
			header("Location: /");
			die();
		}
	}	    
	
	public function crone_status(){
		$row_orders = ORM::for_table('orders')->where('status', 'Не оплачен')->order_by_desc('id')->find_many();
		if(!empty($row_orders)){
			foreach($row_orders as $kr => $vr){
				if((time() - (strtotime($vr->date))) > 60*60*72){
					$vr->status = 'Отменен';
					$vr->save();
				}
			}
			die('всё');
		}
		die('404');
		return false;
	}
	
	public function crone_cbr(){
		global $admin_email;
		$arr_cc = array(
							'R01235' => array('cc' => 'USD', 'symbol' => '$'),
							'R01239' => array('cc' => 'EUR', 'symbol' => '€'),
							'R01720' => array('cc' => 'UAH', 'symbol' => '₴'),
							'R01090' => array('cc' => 'BYR', 'symbol' => 'Br')
						);
		$url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d/m/Y');
		$fgc = simplexml_load_file($url);
		if($fgc and is_object($fgc)){
			$arr_valute = $fgc->xpath('Valute');
			if($arr_valute and is_array($arr_valute)){
				foreach($arr_valute as $key => $value){
					$attribs = $value->attributes();
					if(isset($arr_cc[(string) $attribs['ID']]['cc'])){
						$row_valute = ORM::for_table('currency_rate')->where('vid', (string) $attribs['ID'])->where('char_code', (string) $arr_cc[ (string) $attribs['ID']]['cc'])->find_one();
						if(isset($row_valute->id)){
							$row_valute->nominal = (int) $value->Nominal;
							$row_valute->value = (float) str_replace(',', '.', $value->Value);
							$row_valute->set_expr('date', 'NOW()');
							$row_valute->save();
						} else {
							$this->reg["users"]->sendmail("Курс валют на Azerty!","Добавилась новая запись в базу!",$admin_email,'info@azerty-money.ru');
							$create_valute = ORM::for_table('currency_rate')->create();
							$create_valute->name = (string) $value->Name;
							$create_valute->symbol = (string) $arr_cc[ (string) $attribs['ID']]['symbol'];
							$create_valute->char_code = (string) $value->CharCode;
							$create_valute->nominal = (int) $value->Nominal;
							$create_valute->value = (float) str_replace(',', '.', $value->Value);
							$create_valute->set_expr('date', 'NOW()');
							$create_valute->vid = (string) $attribs['ID'];
							$create_valute->save();
						}
					}
				}
				die('всё');
			} else {
				$this->reg["users"]->sendmail("Не забирается курс валют на Azerty!","Проверить парсер и базу, накрылись валютные расчеты!",$admin_email,'info@azerty-money.ru');
				die();
			}
		} else {
			$this->reg["users"]->sendmail("Не забирается курс валют на Azerty!","Проверить парсер и базу, накрылись валютные расчеты!",$admin_email,'info@azerty-money.ru');
			die();
		}
		die('404');
		return false;
	}
}
?>