<?php
class forms extends ControllerSite {
    public $module_name = "Формы";
	
	public function promo_code(){
		if($_POST and $_POST['code'] and $_POST['gid']){
			$row_pc = ORM::for_table('promo_code')->where('code', (string) $_POST['code'])->find_one();
			if(isset($row_pc->id) and date('Y-m-d') < $row_pc->date_end){
				if($row_pc->gid){
					if($row_pc->gid == $_POST['gid']) print($row_pc->discount_size);
				} else print($row_pc->discount_size);
				
				die();
			}
		}
		die();
		return false;
	}

	public function currency_rate(){
		
		
		if($_POST and $_POST['cc']){
			
			
			$row_cr = ORM::for_table('currency_rate')->where('char_code', $_POST['cc'])->find_one();
			
			if($row_cr){
				print(json_encode(array('nominal' => $row_cr->nominal, 'value' => $row_cr->value, 'symbol' => $row_cr->symbol)));
				die();
			}
		}
		die();
		return false;
	}
	
	private function row_currency_rate($cc){
		if(isset($cc)){
			if($cc != 'RUR'){
				$row_cr = ORM::for_table('currency_rate')->where('char_code', $cc)->find_one();
				if(isset($row_cr->id) and (time() - (strtotime($row_cr->date))) < 60 * 60 * 48){
					return $row_cr;
				}
			}
		}
		return false;
	}
	
	public function partners()
	{
		$games = ORM::for_table('games')->find_array();
		view::assign("formsData",$games);
		view::assign("formsMode","partners");
		$this->reg["view"]->addBlock('block1','site_forms.tpl');
		if ($_POST)
		{



		
	
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$key = '6LerZvwUAAAAABEgj_h-Jymy2lIg5LuwGfhBm_Zs';
		$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
	
		$data = json_decode(file_get_contents($query));
	
		if ( !$data->success == false){
		
	




			if ($_POST['Данные'])
			{
				$text = "<h2>Заявка на сайте от партнеров</h2>";
				foreach ($_POST as $keyPost=>$valuePost)
				{
					$text .= $keyPost." : ".$valuePost."; <br />";
				}

				global $admin_email;
				$this->reg["users"]->sendmail($text,'Заявка на партнерство',$admin_email,'info@azerty-money.ru');
				//view::assign("message","Заявка отправлена, мы свяжемся с вами в ближайшее время");
			}
		}
	}
	}
	
	public function feedback_game($gid, $page){
		if(isset($gid) and isset($page)){
			$row_game = ORM::for_table('games')->where('id', (int) $gid)->find_one();
			if(isset($row_game->id)){
				$cf = 1000;
				$feedback = ORM::for_table('feedback')->where('gid', $row_game->id)->order_by_desc('data')->where('display', 1)->offset(($page * $cf) - $cf)->limit($cf)->find_array();
				$ru = ORM::for_table('users')->where('id', 1)->find_one();
				$games = ORM::for_table('games')->order_by_asc('caption')->find_array();
				$count = ORM::for_table('feedback')->where('gid', $row_game->id)->where('display', 1)->count();
				$paginatorData['count'] = ceil($count / $cf);
				$paginatorData['page'] = $page;
				view::assign("feedback_game",$feedback);
				view::assign("games",$games);
				view::assign("gid",$row_game->id);
				view::assign("gimg",$row_game->photo_feedback);
				view::assign("paginatorData",$paginatorData);
				view::assign("admin_name",$ru->first_name);
				return true;
			}
		}
		return false;
	}



	public function order()
	{
		session_start();



	
		
				if (isset($_GET['feed'])){
					$page12 = $_GET['feed'];
				} else {
					$_GET['feed'] = 1;
				
				}
			
				$limit1 = 15;
				$number1 = ($page12 * $limit1) - $limit1;
			
				$res_count1 = ORM::for_table('services')->select('gid')->where('id', $_GET['param2'])->find_one();
				$real_id1 = ORM::for_table('feedback')->select('id')->where('gid', $res_count1->gid)->where('display', 1)->count();




				//print_r($res_count);
				$str_pag1 = ceil($real_id1 / $limit1);


				$_SESSION['lase'] = $str_pag1;
				//$test_1 = "12311313";
			  
				$_SESSION['feed1'] = $str_pag1;




				$res_game = ORM::for_table('games')->select('id')->where('id', $res_count1->gid)->find_one();


		$name=trim(htmlspecialchars($_POST['name']));
		$feedback=htmlspecialchars($_POST['comment']);
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
				$create->gid = $res_game->id;
				$create->save();
				
				$this->reg["users"]->sendmail("Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.","Оставлен отзыв на сайте Azerty-money.ru",$admin_email,'info@azerty-money.ru');
				
				/*$headers ="Content-type: text/plain; charset=utf-8\r\n";
				$headers.="From:info@azerty-money.com";
				mail("Azerty-money@yandex.ru, Azerty-orders@yandex.ru","Оставлен отзыв на сайте Azerty-money.ru","Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.",$headers);*/
				$message = "Спасибо, Ваш отзыв был оставлен, Ваше мнение важно для нас. Отзыв будет добавлен на страницу после проверки модератором.";
			}else
			{

				if (!$name) 
				{
					$b = 1;
					//$error = "Не заполнено поле имя.";
				}
				if(!$feedback)
				{

					//$error = "Не заполнено поле отзыв.";
					$b = 1;
				}
				if(!$_POST['email']){
					//$error = "Не заполнено поле email.";
					$b = 1;
				}
				
				if(!$name and !$feedback and !$_POST['captcha'])
				{
				//	$error= "Неверно заполнены поля.";
				$b = 1;
				}
			}
        }
		view::assign("error",$error);
		view::assign("message",$message);


		

		if (is_numeric($_GET['param2']))
		{
			$formRow = ORM::for_table('services')->where('id',$_GET['param2'])->find_one();
			
			if ($formRow->id)
			{
				if ($formRow->type == 0)
				{
					
					global $psystems;
					
					function myCmp($a, $b) {
						if ($a['sort'] === $b['sort']) return 0;
						return $b['sort'] < $a['sort'] ? 1 : -1;
					}
					uasort($psystems, 'myCmp');
					
					$this->setMode("order");
					view::assign("formsData",array("template"=>'services/'.$formRow->template,"id"=>$formRow->id,"about"=>$formRow->about,"order_info"=>$formRow->order_info,"caption"=>$formRow->caption,"min_tex"=>$formRow->min_tex,"type"=>$formRow->type,"coef"=>$formRow->coef,"gid"=>$formRow->gid));
					$userRow = ORM::for_table("users")->where('id',$this->reg["users"]->getUserData('id'))->find_one();
					if ($userRow->id) view::assign("spentMoney",$userRow->money); else view::assign("spentMoney",0); // потрачено денег этим пользователем
					
					$servers = ORM::for_table('servers')->where('services',$_GET['param2'])->order_by_asc('sort')->find_array();
					if(isset($_POST['page']) and isset($_POST['gid']) and isset($_POST['paging_game_true'])){
						$this->feedback_game($_POST['gid'], $_POST['page']);
					} else {
						$this->feedback_game($formRow->gid, 1);
					}
					view::assign("servers",$servers);
					
					view::assign("psystems",$psystems);
				}

				if ($formRow->type == 1)
				{
                    $count_items = 500;
                    $p_get = ORM::for_table('services')->where('id',$_GET['param2'])->find_one();
                    $p_get = $p_get->link;

                    $page = 1;
                    if(isset($_GET['page']) && $_GET['page']){
                        $page = (int)$_GET['page'];
                    }




					if (isset($_GET['ser_item'])){
						$page1 = $_GET['ser_item'];
					} else {
						$_GET['ser_item'] = 1;
					
					}
				
					$limit = 8;
					$number = ($page1 * $limit) - $limit;
				
					$elements = ORM::for_table('services_item')->where('sid',$_GET['param2'])->where('active',1)->count();

					$str_pag = ceil($elements / $limit);
					$test_1 = "12311313";
				  


					$_SESSION['co_it'] = $str_pag;
					$_SESSION['ser_item1'] = $str_pag;





                    $elements = ORM::for_table('services_item')->where('sid',$_GET['param2'])->where('active',1);

                    if (isset($_POST['filter_1']) && $_POST['filter_1'] != '')
                    {
                        $elements = $elements->where('filter_1', $_POST['filter_1']);
                    }

                    if (isset($_POST['filter_2']) && $_POST['filter_2'] != '')
                    {
                        $elements = $elements->where('filter_2', $_POST['filter_2']);
                    }

                    if (isset($_POST['filter_3']) && $_POST['filter_3'] != '')
                    {
                        $elements = $elements->where('filter_3', $_POST['filter_3']);
                    }

                    if (isset($_POST['filter_4']) && $_POST['filter_4'] != '')
                    {
                        $elements = $elements->where('filter_4', $_POST['filter_4']);
                    }

                    if (isset($_POST['filter_search']) && $_POST['filter_search'] != '')
                    {
                        $elements = $elements->where_like('caption', '%'.$_POST['filter_search'].'%');
                    }


                    $elements = $elements->offset(($page*$count_items)-$count_items)->limit($count_items);
                    $elements = $elements->order_by_desc('id')->find_array();


					$paginatorData = $this->m->get_paginator_page_data(-1);
					$data["paginatorData"] = $paginatorData;

                    $filter_1 = ORM::for_table('services')->select('filter_1')->where('id',$_GET['param2'])->find_one();
                    if ($filter_1 != '')
                    {
                        $filters = ORM::for_table('services_item')->distinct()->select('filter_1')->where('sid',$_GET['param2'])->where('active',1)->find_array();
                        $data['filter_1']['filters'] = array();

                        foreach ($filters as $filter)
                        {
                            $data['filter_1']['filter'] = $filter_1->filter_1;
                            $data['filter_1']['filters'][] = $filter['filter_1'];
                        }
                    }

                    $filter_2 = ORM::for_table('services')->select('filter_2')->where('id',$_GET['param2'])->find_one();
                    if ($filter_2 != '')
                    {
                        $filters = ORM::for_table('services_item')->distinct()->select('filter_2')->where('sid',$_GET['param2'])->where('active',1)->find_array();
                        $data['filter_2']['filters'] = array();

                        foreach ($filters as $filter)
                        {
                            $data['filter_2']['filter'] = $filter_2->filter_2;
                            $data['filter_2']['filters'][] = $filter['filter_2'];
                        }
                    }

                    $filter_3 = ORM::for_table('services')->select('filter_3')->where('id', $_GET['param2'])->find_one();
                    if ($filter_3 != '')
                    {
                        $filters = ORM::for_table('services_item')->distinct()->select('filter_3')->where('sid',$_GET['param2'])->where('active',1)->find_array();
                        $data['filter_3']['filters'] = array();

                        foreach ($filters as $filter)
                        {
                            $data['filter_3']['filter'] = $filter_3->filter_3;
                            $data['filter_3']['filters'][] = $filter['filter_3'];
                        }
                    }

                    $filter_4 = ORM::for_table('services')->select('filter_4')->where('id', $_GET['param2'])->find_one();
                    if ($filter_4 != '')
                    {
                        $filters = ORM::for_table('services_item')->distinct()->select('filter_4')->where('sid',$_GET['param2'])->where('active',1)->find_array();
                        $data['filter_4']['filters'] = array();

                        foreach ($filters as $filter)
                        {
                            $data['filter_4']['filter'] = $filter_4->filter_4;
                            $data['filter_4']['filters'][] = $filter['filter_4'];
                        }
                    }

                    $search_desc = ORM::for_table('services')->select('search_desc')->where('id', $_GET['param2'])->find_one();
                    if ($search_desc != '')
                    {
                        $data['search_desc'] = $search_desc->search_desc;
                    }



                    foreach ($elements as $key=>$value )
                    {
                        if ($value['advantages_id_1'])
                        {
                            $advantages = ORM::for_table('advantages')->where('id',$value['advantages_id_1'])->order_by_desc('id')->find_one();
                            if ($advantages->id){

                                $elements[$key]['advantages'][] = array('caption' => $advantages->caption, 'photo' => $advantages->photo);
                            }
                        }
                        if ($value['advantages_id_2'])
                        {
                            $advantages = ORM::for_table('advantages')->where('id',$value['advantages_id_2'])->order_by_desc('id')->find_one();
                            if ($advantages->id){

                                $elements[$key]['advantages'][] = array('caption' => $advantages->caption, 'photo' => $advantages->photo);
                            }
                        }
                        if ($value['advantages_id_3'])
                        {
                            $advantages = ORM::for_table('advantages')->where('id',$value['advantages_id_3'])->order_by_desc('id')->find_one();
                            if ($advantages->id){

                                $elements[$key]['advantages'][] = array('caption' => $advantages->caption, 'photo' => $advantages->photo);
                            }
                        }
                    }

                    $mintex1 = ORM::for_table('services')->select('min_tex')->where('id', $_GET['param2'])->find_one();
$_SESSION['mintex'] = "1";

                    $this->setMode("service_items");
					view::assign("formsData",array("elements"=>$elements, "caption"=>$formRow->caption,"type"=>$formRow->type));
					view::assign("data",$data);
					view::assign("p_get",$p_get);
				}

				if ($formRow->type == 2)
				{
					$gameRow = ORM::for_table('games')->where('id',$formRow->gid)->find_one();
					$this->setMode("levelup");
					view::assign("formsData",array("caption"=>$gameRow->caption." : ".$formRow->caption,"about"=>$formRow->about));
				}
				
				if ($formRow->type == 3)
				{
					$gameRow = ORM::for_table('games')->where('id',$formRow->gid)->find_one();
					$this->setMode("text");
					view::assign("formsData",array("caption"=>$gameRow->caption." : ".$formRow->caption,"about"=>$formRow->about));
				}
				
				$getHeaders = ORM::for_table('services')->select_many('id', 'title', 'description', 'keywords')->where('id',$formRow->id)->find_one();
				view::assign("servicesHeaders",$getHeaders);
				view::assign("min_price", $formRow->min_price);
				
			}

            else {
                die("404");
            }

		}
		

		if ($_POST and !isset($_POST['paging_game_true']))
		{
			if (!$this->checkOrderError())
			{
				if ($_POST["id_service_item"])
					$this->newOrder($_GET['param2'],$_POST["id_service_item"]);
				else
					$this->newOrder($_GET['param2']);
				
			} else view::assign("error",$this->checkOrderError());
		}

		$this->reg["view"]->addBlock('block1','site_forms.tpl');
	}

    public function game()
    {
        if (is_numeric($_GET['param2'])){
            $gameRow = ORM::for_table('games')->where('id',$_GET['param2'])->find_one();
            if ($gameRow->id)
            {

                $services = ORM::for_table('services')->where('gid',$gameRow->id)->order_by_asc('sort')->find_array();
                $this->setMode("game");
                view::assign("formsData",array("services"=>$services, "caption"=>$gameRow->caption, "about"=>$gameRow->about));
            }
            else
            {
                die("404");
            }
        }
        else
        {
            die("404");
        }


        $this->reg["view"]->addBlock('block1','site_forms.tpl');
    }

    public function xml_attribute($object, $attribute)
    {
        if(isset($object[$attribute]))
        {
            return (string) $object[$attribute];
        }
    }

    public function feedback_item($digiseller_id, $page){
        if(isset($digiseller_id) and isset($page)){
            $cf = 5000;

            $feedback = array();

            $xml = "<digiseller.request>
                            <seller>
                                <id>".DIGISELLER_ID."</id>
                            </seller>
                            <product>
                                <id>".$digiseller_id."</id>
                            </product>
                            <reviews>
                                <type>all</type>
                            </reviews>
                            <pages>
                                <num>".$page."</num>
                                <rows>".$cf."</rows>
                            </pages>
                        </digiseller.request>";

            $ch = curl_init('http://shop.digiseller.ru/xml/shop_reviews.asp');
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            $result=curl_exec($ch);

            $xmlres = simplexml_load_string($result, null, LIBXML_NOCDATA);

            foreach ($xmlres->reviews->review as $review)
            {
                $feedback[] = array('date' => $review->date,
										 'type' => $review->type,
										 'name' => $review->name,
                                         'info' => $review->info,
                                         'comment' => trim($review->comment));

            }


            $count = $this->xml_attribute($xmlres->pages, 'cnt');

            $paginatorData['count'] = ceil($count / $cf);
            $paginatorData['page'] = $page;
            view::assign("feedback_item",$feedback);
            view::assign("digiseller_id", $digiseller_id);
            view::assign("paginatorData",$paginatorData);
            return true;

        }
        return false;
    }


	public function itemform()
	




	


	





    {
session_start();



		
$name=trim(htmlspecialchars($_POST['name']));
$feedback=htmlspecialchars($_POST['comment']);







$res_count2 = ORM::for_table('services_item')->where('id',$_GET['param2'])->find_one();    
$res_count1= ORM::for_table('services')->select('gid')->where('id',$res_count2->sid)->find_one();
$res_game = ORM::for_table('games')->select('id')->where('id', $res_count1->gid)->find_one();


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
		$create->gid = $res_game->id;
		$create->save();
		
		$this->reg["users"]->sendmail("Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.","Оставлен отзыв на сайте Azerty-money.ru",$admin_email,'info@azerty-money.ru');
		
		/*$headers ="Content-type: text/plain; charset=utf-8\r\n";
		$headers.="From:info@azerty-money.com";
		mail("Azerty-money@yandex.ru, Azerty-orders@yandex.ru","Оставлен отзыв на сайте Azerty-money.ru","Пользователь ".$name." оставил отзыв на сайте Azerty-money.ru.",$headers);*/
		$message = "Спасибо, Ваш отзыв был оставлен, Ваше мнение важно для нас. Отзыв будет добавлен на страницу после проверки модератором.";
	}else
	{

		if (!$name) 
		{
			$error = "Не заполнено поле имя.";
		}
		if(!$feedback)
		{
			$error = "Не заполнено поле отзыв.";
		}
		if(!$_POST['email']){
			$error = "Не заполнено поле email.";
		}
		if($_POST['captcha'] != $_SESSION['rand_code'])
		{
			$error= "Неверно ввели символы, указанные на картинке.";
		}
		if(!$name and !$feedback and !$_POST['captcha'])
		{
			$error= "Неверно заполнены поля.";
		}
	}
}



        if (is_numeric($_GET['param2'])){
			$itemRow = ORM::for_table('services_item')->where('id',$_GET['param2'])->find_one();
		
			$_SESSION['data1'] = $data1;
             if ($itemRow->id)
            {
                $data['item'] = $itemRow;
                $data['service'] = ORM::for_table('services')->where('id',$itemRow->sid)->order_by_desc('id')->find_one();

                $page = 1;
                if(isset($_POST['page']))
                {
                    $page = (int)$_POST['page'];
                }

                if ($itemRow->digiseller_id !=0)
                {
                    $this->feedback_item($itemRow->digiseller_id, $page);
                }
                else
                {
                    $this->feedback_game($data['service']['gid'], $page);
                }


                $data['advantages'] = array();
                if ($itemRow->advantages_id_1)
                {
                    $data['advantages'][] = ORM::for_table('advantages')->where('id',$itemRow->advantages_id_1)->order_by_desc('id')->find_one();
                }
                if ($itemRow->advantages_id_2)
                {
                    $data['advantages'][] = ORM::for_table('advantages')->where('id',$itemRow->advantages_id_2)->order_by_desc('id')->find_one();
                }
                if ($itemRow->advantages_id_3)
                {
                    $data['advantages'][] = ORM::for_table('advantages')->where('id',$itemRow->advantages_id_3)->order_by_desc('id')->find_one();
                }

                $data['notice'] = ORM::for_table('setting')->where('key','notice_all_items')->find_one();
                $data['notice'] = $data['notice']->value;

                if ($itemRow->seller_id != 0 && $itemRow->seller_id != DIGISELLER_ID)
                {
                    $data['notice'] = ORM::for_table('setting')->where('key','digiseller_notice')->find_one();
                    $data['notice'] = str_replace('_seller_', $itemRow->seller_name, $data['notice']->value);
                }

                if ($data['item']['discounts'] && $itemRow->seller_id != 0)
                {
                    $data['item']['discounts'] = unserialize($data['item']['discounts']);
                    $data['discounts_text'] = ORM::for_table('setting')->where('key','discounts_text')->find_one();
                    $data['discounts_text'] = str_replace('_seller_', $itemRow->seller_name, $data['discounts_text']->value);
                }




                $data['sliders'] = ORM::for_table('sliders')->where('services_item_id',$itemRow->id)->order_by_asc('sort_order')->find_array();





                $contentHeaders['title'] = $itemRow->caption;
                $contentHeaders['description'] = trim(strip_tags($itemRow->short_about));

                $this->setMode("itemform");
                view::assign("formsData",$data);
				view::assign("error",$error);
				view::assign("message",$message);
                view::assign("contentHeaders",$contentHeaders);
            }
            else
            {
                die("404");
            }
        }
        else
        {
            die("404");
        }


        $this->reg["view"]->addBlock('block1','site_forms.tpl');
    }
	
	public function order_pay()
	{
		// if всё ок, то заплатил
		if ($_GET['oid'])
		{
			$id = $_GET['oid'];
			$orderRow = ORM::for_table('orders')->where('id',$_GET['oid'])->find_one();
			$orderRow->data = str_replace('_', ' ', $orderRow->data);
			$orderRow->data = strip_tags($orderRow->data, '<br>');
			$replase = array(
						'Оставьте комментарий о предпочитаемом времени доставки' => 'Комментарий',
						'Укажите имя персонажа' => 'Персонаж',
						'Укажите сторону' => 'Фракция',
						'Платежная система' => 'Способ оплаты',
						'Заказ №' => 'Номер заказа'
			);
			$orderRow->data = strtr($orderRow->data, $replase);
			$orderRow->data .= '-запишите номер заказа, чтобы при необходимости обратиться в службу поддержки';
			
			if ($orderRow->id)
			{
				if(!$orderRow->payment and $_POST["id_service_item"])
				{
					die("Оплата данной платежной системы невозможна");
				}
				else
				{
					if($orderRow->payment > 7  and $orderRow->payment < 12) //ROBOKASSA
					{
						if($orderRow->status == 'Оплачен, обрабатывается')
						{
							header("Location: /users/profile?status=success_pay");
						}
						
						// регистрационная информация (логин, пароль #1)
						global $mrh_login;
						global $mrh_pass1;
						global $mrh_server;

						// номер заказа
						$inv_id = $orderRow->id;

						// описание заказа
						$inv_desc = $orderRow->caption;

						// сумма заказа
						$out_summ = $orderRow->money;

						// тип товара
						$shp_item = 'money';

						// язык
						$culture = "ru";
						
						// формирование подписи
						$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
						
						// валюта
						switch ($orderRow->payment) 
						{
							case 8:
								$curr_label = 'BANKOCEAN2R';
								break;
							case 9:
								$curr_label = '';
								break;
							case 10:
								$curr_label = 'WMRM';
								break;
							case 11:
								$curr_label = '';
								break;
						}
						
						// Адрес страницы с кассой
						$url = $mrh_server."?MrchLogin=".$mrh_login."&OutSum=".$out_summ."&InvId=".$inv_id."&Desc=".$inv_desc."&SignatureValue=".$crc."&Shp_item=".$shp_item."&Culture=".$culture."&IncCurrLabel=".$curr_label;
						
						$this->setMode("paymentRobo");
						view::assign("url",$url);
						view::assign("probo",$orderRow);
						$this->reg["view"]->addBlock('block1','site_forms.tpl'); 
					}
					
					if($orderRow->payment == 2) //QIWI
					{
						global $SHOP_ID; 
						
						if($orderRow->status == 'Оплачен, обрабатывается')
						{
							header("Location: /users/profile?status=success_pay");
						}
						
						$this->setMode("paymentQiwi");
						view::assign("pqiwi",$orderRow);
						view::assign("shop_id",$SHOP_ID);
						$this->reg["view"]->addBlock('block1','site_forms.tpl'); 
					}
					
					if($orderRow->payment == 3) //Яндекс.Деньги
					{
						global $account;
						if($orderRow->status == 'Оплачен, обрабатывается')
						{
							header("Location: /users/profile?status=success_pay");
						}
						$this->setMode("paymentYandex");
						view::assign("pyandex",$orderRow);
						view::assign("account",$account);
						$this->reg["view"]->addBlock('block1','site_forms.tpl');
					}
					
					if($orderRow->payment == 1 or $orderRow->payment == 6 or $orderRow->payment == 7 or $orderRow->payment == 4) //WebMoney
					{
						global $purse_wm;
						
						if($orderRow->status == 'Оплачен, обрабатывается')
						{
							header("Location: /users/profile?status=success_pay");
						}
						$description = base64_encode('Заказ №'.$orderRow->id);
						$this->setMode("paymentWM");
						view::assign("paywm",$orderRow);
						view::assign("description",$description);
						view::assign("purse",$purse_wm[$orderRow->payment]['purse']);
						$this->reg["view"]->addBlock('block1','site_forms.tpl');
					}
					
					if($orderRow->payment == 5 or $orderRow->payment > 11 and $orderRow->payment < 17) //Unitpay
					{
						global $project_id_unitpay;
						global $secret_key_unitpay;
						
						if($orderRow->status == 'Оплачен, обрабатывается')
						{
							header("Location: /users/profile?status=success_pay");
						}
						
						if($orderRow->payment == 5 or $orderRow->payment == 14 or $orderRow->payment == 16){
							if($orderRow->payment == 5){
								$type = 'webmoney';
								$valute = 'BYR';
							}
							if($orderRow->payment == 14){
								$type = 'card';
								$valute = 'RUB';
							}
							
							if($orderRow->payment == 16){
								return false;
								$type = 'liqpay';
								$valute = 'UAH';
							}
							$hash = hash('sha256', $orderRow->id . '{up}'. $valute .'{up}'. $orderRow->caption .'{up}'. $orderRow->money .'{up}' . $secret_key_unitpay);
							//$hash = md5($orderRow->id.$valute.$orderRow->caption.$orderRow->money.$secret_key_unitpay);
							$json = 'https://unitpay.ru/api?method=initPayment&params[paymentType]=' . $type . '&params[sum]=' . $orderRow->money . '&params[account]=' . $orderRow->id . '&params[projectId]=' . $project_id_unitpay . '&params[signature]=' . $hash . '&params[currency]=' . $valute . '&params[desc]=' . $orderRow->caption . '&params[secretKey]=' . $secret_key_unitpay . '&params[ip]=' . $_SERVER['REMOTE_ADDR'];
							$arr_answer = json_decode(file_get_contents($json));
							if(isset($arr_answer->result->paymentId) and isset($arr_answer->result->redirectUrl) and $arr_answer->result->type == 'redirect'){
								$this->setMode("payment_unitpay");
								view::assign("order_data",$orderRow);
								view::assign("redirect_url", $arr_answer->result->redirectUrl);
								$this->reg["view"]->addBlock('block1','site_forms.tpl');
							} else die('404'); 
						}
						
						if($orderRow->payment == 12 or $orderRow->payment == 13 or $orderRow->payment == 15){
							if(isset($_POST['phone_unit'])){
								if($_POST['phone_unit'] and mb_strlen($_POST['phone_unit']) > 7 and is_numeric($_POST['phone_unit'])){
									if($orderRow->payment == 12){
										$type = 'sms';
										$valute = 'RUB';
									}
									
									if($orderRow->payment == 13){
										$type = 'qiwi';
										$valute = 'RUB';
									}
									
									if($orderRow->payment == 15){
										$type = 'mc';
										$valute = 'RUB';
									}
									$hash = hash('sha256', $orderRow->id . '{up}'. $valute .'{up}'. $orderRow->caption .'{up}'. $orderRow->money .'{up}' . $secret_key_unitpay);
									//$hash = md5($orderRow->id.$valute.$orderRow->caption.$orderRow->money.$secret_key_unitpay);
									$json = 'https://unitpay.ru/api?method=initPayment&params[paymentType]=' . $type . '&params[sum]=' . $orderRow->money . '&params[account]=' . $orderRow->id . '&params[projectId]=' . $project_id_unitpay . '&params[signature]=' . $hash . '&params[currency]=' . $valute . '&params[desc]=' . $orderRow->caption . '&params[phone]=' . $_POST['phone_unit'] . '&params[secretKey]=' . $secret_key_unitpay . '&params[ip]=' . $_SERVER['REMOTE_ADDR'];
									$arr_answer = json_decode(file_get_contents($json));
									//print_r($arr_answer);die();
									if($orderRow->payment == 13){
										if(isset($arr_answer->result->paymentId) and isset($arr_answer->result->redirectUrl) and $arr_answer->result->type == 'redirect'){
											header('Location: ' . $arr_answer->result->redirectUrl);
											die();
										} else die('404'); 
									}  else {
										if(isset($arr_answer->result->paymentId) and isset($arr_answer->result->statusUrl) and $arr_answer->result->type == 'invoice'){
											header('Location: ' . $arr_answer->result->statusUrl);
											die();
										} else die('404'); 
									}
								} else view::assign('message', 'Заполните поле телефон');
							}
							$this->setMode("payment_unitpay");
							view::assign("order_data",$orderRow);
							view::assign("phone_unit", true);
							$this->reg["view"]->addBlock('block1','site_forms.tpl');
						}
					}
				}
			} else die("Заказ не найден в базе, обратитесь в техническую поддержку");
		}
		else
		{
			header("Location: /forms/order_pay?oid=".$_GET['temp_oid']."");
			die();
		}
	}
	
	private function checkOrderError()
	{
		if ($_POST["id_service_item"] and !$this->reg["users"]->isULogin()) return "Для покупки товаров на сайте вам необходимо зарегистрироваться и войти в систему";
		if (!$_POST['email'] and !$_POST["id_service_item"]) return "Введите email";
		if (isset($_POST['Укажите_имя_персонажа']) and !$_POST['Укажите_имя_персонажа']) return "Укажите имя персонажа";
		if (isset($_POST['Укажите_ваш_логин_Steam']) and !$_POST['Укажите_ваш_логин_Steam']) return "Укажите логин Steam";
		if (isset($_POST['server']) and !$_POST['server']) return "Выберите сервер";
		$min_price = 50;
		$symbol = "р.";
		if(isset($_POST['server'])){
			global $psystems;
			$row_servers = ORM::for_table('servers')->where('id', (int) $_POST['server'])->find_one();
			if(isset($row_servers->id)){
				$row_services = ORM::for_table('services')->where('id', (int) $row_servers->services)->find_one();
				if(isset($row_services->id) and $row_services->min_price) $min_price = $row_services->min_price;
			}
			if($psystems[ (int) $_POST['payment']]['cc'] != 'RUR'){
				$row_cr = $this->row_currency_rate($psystems[ (int) $_POST['payment']]['cc']);
				if($row_cr == false) return print_r($_POST['payment']['cc']) . 'Произошла ошибка при расчете валюты, свяжитсь с менеджером или выберите другую платежную систему';
				$min_price = round((($row_cr->nominal / $row_cr->value) * $min_price) * 100 ) / 100;
				$symbol = $row_cr->symbol;
			}
		}
		//if (isset($_POST['calc2']) and $_POST['calc2'] < $min_price )return "Минимальная сумма заказа " . $min_price . " " . $symbol;
		if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)  and !$_POST["id_service_item"]) return "Введен недопустимый адрес электронной почты";
		$checkRow = ORM::for_table('users')->where('email',$_POST['email'])->find_one();
		//if ($checkRow->email and !$this->reg["users"]->isULogin()  and !$_POST["id_service_item"]) return "Данный адрес электронной почты уже зарегистрирован в системе. Может это ваш аккаунт и вам стоит войти на сайт?";
		if ($checkRow->email and $this->reg["users"]->isULogin() and $this->reg["users"]->getUserEmail() != $_POST['email']  and !$_POST["id_service_item"]) return "Данный адрес электронной почты уже зарегистрирован в системе и он не совпадает с почтой, указанной вами при регистрации. Вы не можете сделать заказ за другого пользователя.";

		if (!$checkRow->email and !$this->reg["users"]->isULogin()  and !$_POST["id_service_item"]) // почты в базе нет и сам пользователь не залогинен - сейчас создадим ему аккаунт, отправим доступы на почту и зайдем за него
		{
			$pass = $this->reg["users"]->u_force_registration($_POST['email']);
			$text = "Для отслеживания статуса вашего заказа мы зарегистрировали вам аккаунт. Пароль : ".$pass;
			$this->reg["users"]->sendmail($text,'Регистрация azerty-money',$_POST['email'],'info@azerty-money.ru');
		}
		return false;
	}
	
	// проверка, не пытается ли обмануть пользователь насчет скидки
	// calc_type - (0,1) 0 - вводил я оплачу, 1 - вводил я покупаю; 
	// calc1 - игровая валюта, calc2 - рубли, sum_price - суммарные потраченные деньги
	private function checkDiscount($id_server,$calc_type,$calc1,$calc2,$sum_price,$gid,$payment,$promo_code = 0)
	{
		if (!($calc_type == 0 or $calc_type == 1)) $calc_type = 0;
		$serversRow = ORM::for_table('servers')->where('id',$id_server)->find_one();
		if ($serversRow->id)
			$coef = $serversRow->coef;
		else
			return false;
		
		$pc = 0;
		if($promo_code and isset($gid)){
			$rpc = ORM::for_table('promo_code')->where('code', (string) $promo_code)->find_one();
			if(isset($rpc->id) and date('Y-m-d') < $rpc->date_end){
				if($rpc->gid){
					if($rpc->gid == $gid) $pc = $rpc->discount_size;
				} else $pc = $rpc->discount_size;
				
			}
		}
		$vv = 1;
		global $psystems;
		$row_cr = $this->row_currency_rate($psystems[ (int) $payment]['cc']);
		if($row_cr) $vv = $row_cr->value / $row_cr->nominal;
		
		if ($calc_type == 0) // вводил я оплачу
		{
			$all = $sum_price;
			$valute = $calc2 * $coef * $vv;
			global $discounts;
			foreach ($discounts as $kd=>$vd)
			{
				if ($vd['end'] != '><')
				{
					if ($all>=$vd['start'] and $all<$vd['end']) { $discount = $vd['d']; }
				}
				else
				if ($all>=$vd['start']) { $discount = $vd['d']; }
			}
			$discount += $pc;
			$valute = ceil(($valute * ($discount / 100 + 1)) * 100) / 100;
			return array('calc1'=>$valute,'calc2'=>$calc2);
		}
		
		if ($calc_type == 1) // вводил я покупаю
		{
			$valute = $calc1;
			$all = $sum_price;
			global $discounts;
			foreach ($discounts as $kd=>$vd)
			{
				if ($vd['end'] != '><')
				{
					if ($all>=$vd['start'] and $all<$vd['end']) { $discount = $vd['d']; }
				}
				else
				if ($all>=$vd['start']) { $discount = $vd['d']; }
			}
			$discount += $pc;
			$money = round((($calc1 / $coef / $vv) / ($discount / 100 + 1) ) * 100 ) / 100;
			return array('calc1'=>$calc1,'calc2'=>$money);
		}
		
	}
	
	private function newOrder($id_service,$id_service_item = null)
	{
		//print_r($_POST);
		global $psystems;
		$email = $_POST['email'];
		$userRow = ORM::for_table('users')->where('email',$email)->find_one();
		$serviceRow = ORM::for_table('services')->where('id',$id_service)->find_one();
		//print_r($serviceRow->type);
		if ($serviceRow->type == 0) // валюту
		{

			if($_POST['misu'] == "1"){
			if(!isset($_POST['manok_1']) or !isset($_POST['manok_2']) or $_POST['manok_1'] or $_POST['manok_2'] != 'i_got' or $_POST['com'] == "") return false;
			
			$promo_code = 0;
			$money = $_POST['calc2'];
			$gameRow = ORM::for_table('games')->where('id',$serviceRow->gid)->find_one();
			$serverRow = ORM::for_table('servers')->where('id',$_POST['server'])->find_one();
			$text = "<h2>".$gameRow->caption." : ".$serviceRow->caption."</h2><br />";
			$mon = $userRow->money;
			if(!$this->reg["users"]->getUserData('id')) $mon = 0;
			if(isset($_POST['promo_code']) and $_POST['promo_code']) $promo_code = $_POST['promo_code'];
			if(!isset($serverRow->id) or !isset($_POST['calc_type']) or !isset($_POST['calc1']) or !isset($_POST['calc2']) or !isset($_POST['payment'])) return false;
			$calc = $this->checkDiscount($serverRow->id,$_POST['calc_type'],$_POST['calc1'],$_POST['calc2'],$mon,$serviceRow->gid,$_POST['payment'],$promo_code);
			//print_r(array($calc, $_POST));die();
			
			$orderRow = ORM::for_table('orders')->create();
			$orderRow->caption = $gameRow->caption." : ".$serviceRow->caption.", ".$calc['calc1']." (".$calc['calc2'].")";
			//$orderRow->data = $text;
			$orderRow->set_expr('date', 'NOW()');
			$orderRow->uid = $userRow->id; //$this->reg["users"]->getUserData('id');
			$orderRow->money = $calc['calc2'];
			$orderRow->payment = $_POST['paymen'];
			$orderRow->status = 'Не оплачен';
			$orderRow->comment = $_POST['Оставьте_комментарий_о_предпочитаемом_времени_доставки'];
			$orderRow->save();
			
			foreach ($_POST as $keyPost=>$valuePost)
			{
				if ($keyPost == 'calc1') { $keyPost = 'Игровая валюта'; $valuePost = $calc['calc1']; }
				if ($keyPost == 'calc2') { $keyPost = 'Стоимость';  $valuePost = $calc['calc2']; }
				if ($keyPost == 'server') {$keyPost = 'Сервер'; $valuePost = $serverRow->caption;}
				if ($keyPost == 'calc_type') {$keyPost = 'Заказ №'; $valuePost = $orderRow->id;}
				if ($keyPost == 'paymen') {$keyPost = 'Платежная система'; $valuePost = $psystems[$_POST['paymen']]['caption'];}
				if($keyPost != 'manok_1' and $keyPost != 'manok_2') $text .= $keyPost." : ".$valuePost."; <br class='test' />";
			}
			
			$updateOrder = ORM::for_table('orders')->where('id', $orderRow->id)->find_one();
			$updateOrder->data = $text;
			$updateOrder->code = sha1($email.date('Y-m-d H:i:s').$orderRow->id);
			$updateOrder->save();
			
			setcookie("order", $updateOrder->code, time()+3600 * 24 * 10,'/');
			
			// перенаправление на оплату
			header("Location: /forms/order_pay?temp_oid=".$orderRow->id);
			die();
		}

		if ($serviceRow->type == 1 and $id_service_item) // товар
		{
			$gameRow = ORM::for_table('games')->where('id',$serviceRow->gid)->find_one();
			$service_item = ORM::for_table('services_item')->where('id',$id_service_item)->find_one();
			if ($service_item->id)
			{
				$text = "<h2>".$gameRow->caption." : ".$serviceRow->caption." : ".$service_item->caption."</h2><br />";
				$text .= "О товаре: ".$service_item->about."; <br />";
				$text .= "Цена: ".$service_item->price."; <br />";

				$orderRow = ORM::for_table('orders')->create();
				$orderRow->caption = $service_item->caption;
				$orderRow->data = $text;
				$orderRow->set_expr('date', 'NOW()');
				$orderRow->uid = $userRow->id;
				$orderRow->money = $service_item->price;
				$orderRow->status = 'Обрабатывается';
				$orderRow->comment = $_POST['Оставьте_ваши_контактные_данные'];
				$orderRow->save();

				$updateOrder = ORM::for_table('orders')->where('id', $orderRow->id)->find_one();
				$updateOrder->code = sha1($email.date('Y-m-d H:i:s').$orderRow->id);
				$updateOrder->save();
				
				setcookie("order", $updateOrder->code, time()+3600 * 24 * 10,'/');
				
				// перенаправление на оплату
				header("Location: /forms/order_pay?temp_oid=".$orderRow->id);
				die();
			} else die("При оформлении заказа произошла ошибка");


		}		
	}
		
		if ($serviceRow->type == 2) // услуга (прокачка и т.п)
		{
			$gameRow = ORM::for_table('games')->where('id',$serviceRow->gid)->find_one();
			$text = "<h2>".$gameRow->caption." : ".$serviceRow->caption."</h2><br />";
			foreach ($_POST as $keyPost=>$valuePost)
			{
				$text .= $keyPost." : ".$valuePost."; <br />";
			}

			$orderRow = ORM::for_table('orders')->create();
			$orderRow->caption = $gameRow->caption." : ".$serviceRow->caption;
			$orderRow->data = $text;
			$orderRow->set_expr('date', 'NOW()');
			$orderRow->uid = $userRow->id;
			$orderRow->money = -1;
			$orderRow->status = 'Обрабатывается';
			$orderRow->comment = $_POST['Оставьте_ваши_контактные_данные'];
			$orderRow->save();
			
			$updateOrder = ORM::for_table('orders')->where('id', $orderRow->id)->find_one();
			$updateOrder->code = sha1($email.date('Y-m-d H:i:s').$orderRow->id);
			$updateOrder->save();
			
			setcookie("order", $updateOrder->code, time()+3600 * 24 * 10,'/');
			
			global $admin_email;
			$this->reg["users"]->sendmail($orderRow->data,'Новый заказ услуги на сайте',$admin_email,'info@azerty-money.ru');

			// перенаправление в профиль
			header("Location: /users/profile?status=success_new");
			die();
		}		
	}
	
	public function roboResult()
	{
		// регистрационная информация (пароль #2)
		global $mrh_pass2;

		// чтение параметров
		$out_summ = $_REQUEST["OutSum"];
		$inv_id = $_REQUEST["InvId"];
		$shp_item = $_REQUEST["Shp_item"];
		$crc = $_REQUEST["SignatureValue"];

		$crc = strtoupper($crc);

		$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

		// проверка корректности подписи
		if ($my_crc !=$crc)
		{
		  echo "bad sign\n";
		  exit();
		}

        $orderRow = ORM::for_table('orders')->where('id', $_REQUEST["InvId"])->find_one();
        if ($orderRow->status != 'Оплачен, обрабатывается' && $orderRow->status != 'Выполнен')
        {
            global $admin_email;

            $orderRow->status = 'Оплачен, обрабатывается';
            $orderRow->save();
            $this->reg["users"]->sendmail($orderRow->data, 'Новый заказ на сайте', $admin_email, 'info@azerty-money.ru');
            $this->reg["users"]->mailing_buyer($orderRow->data, $orderRow->uid);
        }
		// признак успешно проведенной операции
		echo "OK$inv_id\n";
	}
	
	public function roboSuccess()
	{	
		
		// регистрационная информация (пароль #1)
		global $mrh_pass1;

		// чтение параметров
		$out_summ = $_REQUEST["OutSum"];
		$inv_id = $_REQUEST["InvId"];
		$shp_item = $_REQUEST["Shp_item"];
		$crc = $_REQUEST["SignatureValue"];

		$crc = strtoupper($crc);

		$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

		// проверка корректности подписи
		if ($my_crc != $crc)
		{
			echo "Несоответствие подписи заказа\n";
			exit();
		}

		// проверка наличия номера счета
		$orderRow = ORM::for_table('orders')->where('id',$_REQUEST["InvId"])->find_one();
		if( $inv_id == $orderRow->id)
		{
			header("Location: /users/profile?status=success_pay");
		}else { echo"Несоответствие данных заказа"; die();}
	}
	
	public function roboFail()
	{
		$inv_id = $_REQUEST["InvId"];
		echo "Вы отказались от оплаты. Заказ # $inv_id\n";
		die();
	}
	
	public function qiwiResult()
	{
		global $SHOP_ID; 
		$table =  ORM::for_table('orders')->where('status','Не оплачен')->where('payment', 2)->order_by_desc('id')->limit(50)->find_array();
		foreach ($table as $key=>$value)
		{
			$ch = curl_init('https://w.qiwi.com/api/v2/prv/'.$SHOP_ID.'/bills/'.$value['id'].'');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "11925198:NlPYytzvqBTk0nJVBLQn");
			curl_setopt($ch,CURLOPT_HTTPHEADER,array ( 
			"Accept: text/json",
			"Content-Type: application/x-www-form-urlencoded; charset=utf-8" ));
			$ps = curl_exec($ch);
			$my_new_array = json_decode($ps, true);
			curl_close($ch);
			if ($my_new_array)
			{
                if($my_new_array['response']['bill']['amount'] == $value['money']) {
    				if ($my_new_array['response']['bill']['status'] == 'paid')
    				{
    					global $admin_email;
    					$update_order = ORM::for_table('orders')->where('id',$my_new_array['response']['bill']['bill_id'])->find_one();
    					if ($update_order->id)
    					{
    						if ($update_order->status != 'Оплачен, обрабатывается' && $update_order->status != 'Выполнен')
    						{
    							$update_order->status = 'Оплачен, обрабатывается';
    							$update_order->save();
    							$this->reg["users"]->sendmail($update_order->data,'Новый заказ на сайте',$admin_email,'info@azerty-money.ru');
    							$this->reg["users"]->mailing_buyer ($update_order->data, $update_order->uid);
    						}
    					}
    				}
                }
			}
		}
	}
	
	public function qiwiSuccess()
	{
		header("Location: /users/profile");
	}
	
	public function qiwiFail()
	{
		echo "Оплата не прошла";
		die();
	}
	
	public function wmResult()
	{
		global $purse_wm; 
		global $admin_email;
		if(isset($_POST['LMI_PAYMENT_NO']) and $_POST['LMI_PREREQUEST']==1) 
		{
			$res = ORM::for_table('orders')->where('id',$_POST['LMI_PAYMENT_NO'])->find_one();
			if($res->id) 
			{
				if( $res->money == $_POST['LMI_PAYMENT_AMOUNT']) 
				{
					if($_POST['LMI_PAYEE_PURSE'] == $purse_wm[$res->payment]['purse'])
					{
						echo "YES";
						die();
					}else die('Неверный кошелек');
				}else die('Неверная сумма');
			}else die('Нет такого товара');
		} else {
			if(isset($_POST['LMI_HASH'])){
				$update_order = ORM::for_table('orders')->where('id',$_POST['LMI_PAYMENT_NO'])->find_one();
				$secret_key = $purse_wm[$update_order->payment]['key'];
				$common_string = $_POST['LMI_PAYEE_PURSE'].$_POST['LMI_PAYMENT_AMOUNT'].$_POST['LMI_PAYMENT_NO'].$_POST['LMI_MODE'].$_POST['LMI_SYS_INVS_NO'].$_POST['LMI_SYS_TRANS_NO'].$_POST['LMI_SYS_TRANS_DATE'].$secret_key.$_POST['LMI_PAYER_PURSE'].$_POST['LMI_PAYER_WM'];
				$hash = strtoupper(hash("sha256",$common_string));
				if($hash == $_POST['LMI_HASH'])
				{
                    if ($update_order->status != 'Оплачен, обрабатывается' && $update_order->status != 'Выполнен')
                    {
                        $update_order->status = 'Оплачен, обрабатывается';
                        $update_order->save();
                        $this->reg["users"]->sendmail($update_order->data, 'Новый заказ на сайте', $admin_email, 'info@azerty-money.ru');
                        $this->reg["users"]->mailing_buyer($update_order->data, $update_order->uid);
                    }
				}else die('Несоответствие подписи');
			}
		}
	}
	
	public function wmSuccess()
	{
		header("Location: /users/profile?status=success_pay");
	}
	
	public function wmFail()
	{
		echo "Платеж не был выполнен.";
		die();
	}
	
	public function yandexSuccess()
	{
		if (isset($_POST['label']))
		{
			if (isset($_POST['sha1_hash']))
			{
				global $secret_key_yandex;

				$common_string = $_POST['notification_type'].'&'.$_POST['operation_id'].'&'.$_POST['amount'].'&'.$_POST['currency'].'&'.$_POST['datetime'].'&'.$_POST['sender'].'&'.$_POST['codepro'].'&'.$secret_key_yandex.'&'.$_POST['label'];

				$hash = sha1($common_string);
				
				if($hash == $_POST['sha1_hash'])
				{
					global $admin_email;
					$update_orders = ORM::for_table('orders')->where('id',$_POST['label'])->find_one();
					if ($_POST['withdraw_amount'] == $update_orders->money or $_POST['amount'] == $update_orders->money)
					{
                        if ($update_orders->status != 'Оплачен, обрабатывается' && $update_orders->status != 'Выполнен')
                        {
                            $update_orders->status = 'Оплачен, обрабатывается';
                            $update_orders->save();
                            $this->reg["users"]->sendmail($update_orders->data, 'Новый заказ на сайте', $admin_email, 'info@azerty-money.ru');
                            $this->reg["users"]->mailing_buyer($update_orders->data, $update_orders->uid);
                        }
					}
				}
			}
		}
	}
	
	private function getMd5sign($params, $sk){
        ksort($params);
        unset($params['sign']);
        return md5(join(null, $params).$sk);
    }
	
	private function getSignature($method, $params, $secretKey){
		ksort($params);
		unset($params['sign']);
		unset($params['signature']);
		array_push($params, $secretKey);
		array_unshift($params, $method);

		return hash('sha256', join('{up}', $params));
	}
	
	public function unitpay_result(){
        $msg = '';
		if(isset($_GET['method']) and isset($_GET['params'])){
			if($_GET['method'] == 'check' or $_GET['method'] == 'pay'){
				global $project_id_unitpay;
				global $secret_key_unitpay;
				$params = $_GET['params'];
				if($params['projectId'] == $project_id_unitpay){
					$row_order = ORM::for_table('orders')->where('id', $params['account'])->find_one();
					if(isset($row_order->id)){
						if($params['orderSum'] == $row_order->money){
							if($_GET['method'] == 'check') $msg = 'Check Success';
							if($_GET['method'] == 'pay')
                            {
                                if ($row_order->status != 'Оплачен, обрабатывается' && $row_order->status != 'Выполнен')
                                {
                                    if ($params['signature'] == $this->getSignature($_GET['method'], $params, $secret_key_unitpay))
                                    {
                                        global $admin_email;

                                        $row_order->status = 'Оплачен, обрабатывается';
                                        $row_order->save();
                                        $this->reg["users"]->sendmail($row_order->data, 'Новый заказ на сайте', $admin_email, 'info@azerty-money.ru');
                                        $this->reg["users"]->mailing_buyer($row_order->data, $row_order->uid);
                                        $msg = 'Pay Success';

                                    }
                                    else
                                    {
                                        $msg = 'Несоответствие подписи';
                                    }
                                }
							}
						} else $msg = 'Несоответствие суммы';
					} else $msg == 'Нет такого заказа';
				} else $msg == 'Несоответствие id проекта';
			} else $msg = 'Error';
			if(isset($msg)){
				print_r(json_encode(array( "result" => array( "message" => $msg ) )));die();
			}
			print_r(json_encode(array( "result" => array( "message" => 'yes' ) )));die();
		} 
	}
	
	public function unitpay_fail(){
		print_r(json_encode(array( "result" => array( "message" => 'Ошибка проведения платежа' ) )));
		die();
	}
	
	public function unitpay_success(){
		header("Location: /users/profile?status=success_pay");
		die();
	}
}