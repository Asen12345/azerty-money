<?php

/**
 * @author icyken.ru
 * @copyright 2011
 */
class Users {
    private $reg;
    private $name = "";
    private $userid = 0;
	private $salt = "callmemaybe";

	//   public  $isclass=1;
	function __construct($registry) {

            $this->reg = $registry;
            if	($_SESSION["loginid"]) $this->userid = $_SESSION["loginid"];
            if	($_SESSION["loginname"]) $this->name = $_SESSION["loginname"];

//            $this->userid = 1;
//            $this->name = 'admin';
			if (isset($_SESSION['uloginid']) && isset($_SESSION['uloginpassword'])) {
				$find = ORM::for_table('users')->where('id',$_SESSION['uloginid'])
					->where('password',$_SESSION['uloginpassword'])
					->find_one();

				if (!$find || !isset($find->id)) {
					session_destroy();
				} 
			}
    }
	
	private function list_menu_lk(){
		$row_menu = ORM::for_table('menu_lk')->order_by_asc('id')->find_array();
		view::assign('menu_lk', $row_menu);
		return true;
	}
	
	public function view_content(){
		if(isset($_GET['param2'])){
			$row_menu = ORM::for_table('menu_lk')->where('id', (int) $_GET['param2'])->find_one();
			$this->list_menu_lk();
			view::assign("menu",$row_menu);
			view::assign("personal_account",true);
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","view_content");
			return true;
		}
		return false;
	}
	
	public function profile()
	{	
		


	


		












		if ($_GET['status'] == 'success_pay')
		{
			view::assign("message",'Спасибо за покупку. Среднее время доставки заказа 5-30 минут, максимальное время 24 часа. По всем вопросам обращатсья к онлайн консультанту или по контактным данным, указанным на сайте.');
		}
		
		if ($_GET['status'] == 'success_new')
		{
			view::assign("message",'Заказ добавлен, наши менеджеры свяжутся с вами в ближайшее время');
		}
		if (!$this->getUserData('id')) $this->u_login(); else
		{



			$orders = ORM::for_table('orders')->where('uid', $this->getUserData('id'))->where_in('status', array('Выполнен', 'Оплачен, обрабатывается', 'Отменен', 'Ошибка', 'Возвращен', 'Не оплачен'))->order_by_desc('id')->find_array();
			$row_ord_payd = ORM::for_table('orders')->where('status', 'Оплачен, обрабатывается')->order_by_asc('id')->find_array();
			if(isset($row_ord_payd[0]['id'])){
				foreach($row_ord_payd as $kp => $vp){
					$arr_numb[$vp['id']] = ($kp + 1);
				}
			}
			$arr_isset = array();
			if(isset($orders[0]['id'])){
				foreach($orders as $k => $v){
					if(!isset($arr_isset[$v['status']])) $arr_isset[$v['status']] = true;
					$exp_cap = explode(":", $v['caption']);
					$orders[$k]['cap_game'] = $exp_cap[0];
					if($v['status'] == 'Оплачен, обрабатывается' and $arr_numb[$v['id']]){
						$orders[$k]['num_ord'] = $arr_numb[$v['id']];
					}
				}
			}
	






			$row_terms = ORM::for_table('content')->where('id', 10)->find_one();
			$row_materials = ORM::for_table('content')->where('id', 11)->find_one();
			$row_users = ORM::for_table('users')->where('id', $this->getUserData('id'))->find_one();
			if($_POST){
				if($row_users->money_ref >= 50 and $_POST['count_rubles'] >= 50 and $_POST['count_rubles'] <= $row_users->money_ref){
					if($row_users->score_purse){
						$row_users->money_ref -= $_POST['count_rubles'];
						$row_users->save();
						$this->withdrawal_of_funds($row_users, $_POST['count_rubles']);
					} else {
						if($_POST['score_purse'] and $_POST['payment_system']){
							$row_users->score_purse = $_POST['score_purse'];
							$row_users->type_purse = $_POST['payment_system'];
							$row_users->money_ref -= $_POST['count_rubles'];
							$row_users->save();
							$this->withdrawal_of_funds($row_users, $_POST['count_rubles']);
						} else view::assign('message', 'Неверные данные платежныой системы');
					}
				} else view::assign('message', 'Неверная сумма');
			}
			$ref = "http://".$_SERVER['HTTP_HOST']."/?ref=".$this->getUserData('id');
			$row_ref_ord = ORM::for_table('history_ref')->where('uid', $this->getUserData('id'))->order_by_desc('id')->find_array();
			if(isset($row_ref_ord[0]['id'])){
				global $psystems;
				foreach($row_ref_ord as $k => $v){
					$row_order = ORM::for_table('orders')->where('id', $v['oid'])->find_one();
					$valute = 'руб.';
					if($psystems[$row_order->payment]['cc'] != 'RUR'){
						$row_cr = ORM::for_table('currency_rate')->where('char_code', $psystems[$row_order->payment]['cc'])->find_one();
						$valute = $row_cr->symbol;
					}
					$exp_cap = explode(":", $row_order->caption);
					$row_ref_ord[$k]['cap_game'] = $exp_cap[0];
					$row_ref_ord[$k]['date'] = $row_order->date;
					$row_ref_ord[$k]['money'] = $row_order->money . ' ' . $valute;
					$row_ref_ord[$k]['status'] = $row_order->status;
				}
			}




			$all = $row_users->money;
			global $discounts;
			foreach ($discounts as $kd=>$vd){
				if ($vd['end'] != '><'){
					if ($all >= $vd['start'] and $all < $vd['end']) { $discount = $vd['d']; }
				} 
				else
				if ($all >= $vd['start']) { $discount = $vd['d']; }
			}
			if(!$discount){ $status = 'Новичок'; $discount =0; }
			if($discount > 0 and $discount < 6) $status = 'Пользователь';
			if($discount == 10) $status = 'VIP';
			
			







			$row_users = ORM::for_table('users')->where('id', $this->getUserData('id'))->find_one();
			if($_POST and isset($_POST['phone'])){
				if($_POST['pass_one']){
					if(mb_strlen($_POST['pass_one']) > 5 and  mb_strlen($_POST['pass_one']) < 20){
						if($_POST['pass_one'] == $_POST['pass_two']){
							$row_users->password = sha1(md5($this->salt . $_POST['pass_one']));
							$msg = "Пароль успешно изменен";
							unset($_SESSION["uloginid"]);
							unset($_SESSION["uloginemail"]);
							header("Location: /");
						} else $msg = "Пароли не совпадают";
					} else $msg = "Пароль должен содержать не менее 5 и не более 20 символов";
				}
				$row_users->phone = $_POST['phone'];
				$row_users->skype = $_POST['skype'];
				$row_users->icq = $_POST['icq'];
				$row_users->save();
				if($msg) view::assign('error', $msg); else {
					header('Location: /users/' . __FUNCTION__);
					die();
				}
			}
			$this->list_menu_lk();
			view::assign("discount", $discount);
			view::assign("status", $status);
			view::assign("ref", $ref);
			view::assign("ref_orders", $row_ref_ord);
			view::assign("terms", $row_terms->content);
			view::assign("row_materials", $row_materials->content);
			view::assign("orders", $orders);
			view::assign("arr_isset", $arr_isset);
			view::assign("personal_account",true);
			view::assign("users", $row_users);
			view::assign("personal_account",true);
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","profile");
		}
	}
	
/*	public function order_history(){
		if (!$this->getUserData('id')) $this->u_login(); else
		{
			$orders = ORM::for_table('orders')->where('uid', $this->getUserData('id'))->where_in('status', array('Выполнен', 'Оплачен, обрабатывается', 'Отменен', 'Ошибка', 'Возвращен', 'Не оплачен'))->order_by_desc('id')->find_array();
			$row_ord_payd = ORM::for_table('orders')->where('status', 'Оплачен, обрабатывается')->order_by_asc('id')->find_array();
			if(isset($row_ord_payd[0]['id'])){
				foreach($row_ord_payd as $kp => $vp){
					$arr_numb[$vp['id']] = ($kp + 1);
				}
			}
			$arr_isset = array();
			if(isset($orders[0]['id'])){
				foreach($orders as $k => $v){
					if(!isset($arr_isset[$v['status']])) $arr_isset[$v['status']] = true;
					$exp_cap = explode(":", $v['caption']);
					$orders[$k]['cap_game'] = $exp_cap[0];
					if($v['status'] == 'Оплачен, обрабатывается' and $arr_numb[$v['id']]){
						$orders[$k]['num_ord'] = $arr_numb[$v['id']];
					}
				}
			}
			
			$this->list_menu_lk();
			view::assign("orders", $orders);
			view::assign("arr_isset", $arr_isset);
			view::assign("personal_account",true);
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","orders_history");
			return true;
		}
		return false;
	}*/
	
	private function withdrawal_of_funds($arr_user, $cr){
		if(isset($arr_user) and isset($cr)){
			$create = ORM::for_table('withdrawal_of_money')->create();
			$create->money = $cr;
			$create->purse = $arr_user->type_purse . ': ' . $arr_user->score_purse;
			$create->uid = $arr_user->id;
			$create->save();
			global $admin_email;
			$this->sendmail('Пользоваетль ' . $arr_user->email . ' запросил выдачу своих реферальных денег, подробнее в админке', 'Запрос на выдачу денег', $admin_email, 'info@azerty-money.ru');
			view::assign("message", 'Ваш запрос отправлен');
			return true;
		}
		return false;
	}
	
	public function partner_program(){
		if (!$this->getUserData('id')) $this->u_login(); else
		{
			$row_terms = ORM::for_table('content')->where('id', 10)->find_one();
			$row_materials = ORM::for_table('content')->where('id', 11)->find_one();
			$row_users = ORM::for_table('users')->where('id', $this->getUserData('id'))->find_one();
			if($_POST){
				if($row_users->money_ref >= 50 and $_POST['count_rubles'] >= 50 and $_POST['count_rubles'] <= $row_users->money_ref){
					if($row_users->score_purse){
						$row_users->money_ref -= $_POST['count_rubles'];
						$row_users->save();
						$this->withdrawal_of_funds($row_users, $_POST['count_rubles']);
					} else {
						if($_POST['score_purse'] and $_POST['payment_system']){
							$row_users->score_purse = $_POST['score_purse'];
							$row_users->type_purse = $_POST['payment_system'];
							$row_users->money_ref -= $_POST['count_rubles'];
							$row_users->save();
							$this->withdrawal_of_funds($row_users, $_POST['count_rubles']);
						} else view::assign('message', 'Неверные данные платежныой системы');
					}
				} else view::assign('message', 'Неверная сумма');
			}
			$ref = "http://".$_SERVER['HTTP_HOST']."/?ref=".$this->getUserData('id');
			$row_ref_ord = ORM::for_table('history_ref')->where('uid', $this->getUserData('id'))->order_by_desc('id')->find_array();
			if(isset($row_ref_ord[0]['id'])){
				global $psystems;
				foreach($row_ref_ord as $k => $v){
					$row_order = ORM::for_table('orders')->where('id', $v['oid'])->find_one();
					$valute = 'руб.';
					if($psystems[$row_order->payment]['cc'] != 'RUR'){
						$row_cr = ORM::for_table('currency_rate')->where('char_code', $psystems[$row_order->payment]['cc'])->find_one();
						$valute = $row_cr->symbol;
					}
					$exp_cap = explode(":", $row_order->caption);
					$row_ref_ord[$k]['cap_game'] = $exp_cap[0];
					$row_ref_ord[$k]['date'] = $row_order->date;
					$row_ref_ord[$k]['money'] = $row_order->money . ' ' . $valute;
					$row_ref_ord[$k]['status'] = $row_order->status;
				}
			}
			$this->list_menu_lk();
			view::assign("ref", $ref);
			view::assign("ref_orders", $row_ref_ord);
			view::assign("terms", $row_terms->content);
			view::assign("row_materials", $row_materials->content);
			view::assign("users", $row_users);
			view::assign("personal_account",true);
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","partner_program");
			return true;
		}
		return false;
	}
	
	public function my_status(){
		if (!$this->getUserData('id')) $this->u_login(); else
		{
			$row_users = ORM::for_table('users')->where('id', $this->getUserData('id'))->find_one();
			$all = $row_users->money;
			global $discounts;
			foreach ($discounts as $kd=>$vd){
				if ($vd['end'] != '><'){
					if ($all >= $vd['start'] and $all < $vd['end']) { $discount = $vd['d']; }
				} 
				else
				if ($all >= $vd['start']) { $discount = $vd['d']; }
			}
			if(!$discount){ $status = 'Новичок'; $discount =0; }
			if($discount > 0 and $discount < 6) $status = 'Пользователь';
			if($discount == 10) $status = 'VIP';
			$this->list_menu_lk();
			view::assign("discount", $discount);
			view::assign("status", $status);
			view::assign("personal_account",true);
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","my_status");
			return true;
		}
		return false;
	}
	
	private function u_do_login($u,$p)
	{

		$checkRow = ORM::for_table('users')->where('email',$u)->where('password',sha1(md5($this->salt.$p)))->find_one();
		if ($checkRow->id)
		{
			$_SESSION["uloginid"] = $checkRow->id;
			$_SESSION["uloginemail"] = $checkRow->email;
			$_SESSION['uloginpassword'] = $checkRow->password;
			return true;
		} else return false;
	}
	
	

	
	public function recovery()
	{
		if($_POST)
		{	
			$usersRow = ORM::for_table('users')->where('email', $_POST['email'])->find_one();
			if($usersRow->id)
			{
				
				
				$rand = md5(rand(111111111,999999999));
				
				$create = ORM::for_table('recovery')->create();
				$create->uid = $usersRow->id;
				$create->code = $rand;
				$create->save();
				
				$this->sendmail('Здравствуйте!<br> Вы запросили восстановление пароля на сайте http://www.azerty-money.ru. <br>Для того, чтобы продолжить пройдите, пожалуйста, по ссылке: http://'.$_SERVER['HTTP_HOST'].'/users/u_rec/?code='.$rand.'<br>----<br>С уважением, Azerty Money.<br>http://www.azerty-money.ru','Восстановление пароля',$_POST['email'], 'info@azerty-money.ru');
				
				$message = "На вашу электронную почту отправлена информация";
			}else $message = "Такого почтового адреса в базе не существует";
		}
		
		view::assign("message",$message);
		view::assign("block1","site_users.tpl");
		view::assign("usersMode","rec");
	}
	
	public function u_rec()
	{
		$recoveryRow = ORM::for_table('recovery')->where('code',$_GET['code'])->find_one();
		$pass = $this->generatePassword(7);
		if($_GET['code']==$recoveryRow->code and !$recoveryRow->active)
		{
			
			$update_recovery = ORM::for_table('recovery')->where('code',$_GET['code'])->find_one();
			$update_recovery->active = 1;
			$update_recovery->save();
			
			$update_users = ORM::for_table('users')->where('id',$recoveryRow->uid)->find_one();
			$update_users->password = sha1(md5($this->salt.$pass));
			$update_users->save();
			
			$this->sendmail('Ваш новый пароль для доступа к сайту azerty-money.ru : '.$pass,'Новый пароль', $update_users->email, 'info@azerty-money.ru');
			
			echo "Новый пароль отправлен на почту";
			die();
			
		}else 
		{
			echo "404";
			die();
		}
	}










	public function u_login() {
		if (!$this->getUserData('id')){
			if ($_POST['loginname'] and $_POST['loginpassword'])
			{
				if ($this->u_do_login($_POST['loginname'],$_POST['loginpassword']))
				{
					header("Location: /"); die();
				} else
				{
					view::assign("error","Пароль не подходит");
					if(filter_var($_POST['loginname'],FILTER_VALIDATE_EMAIL)) view::assign("post",$_POST);
				}
			}
			
			view::assign("block1","site_users.tpl");
			view::assign("usersMode","login");
			return true;
		}
		return false;
	}






	
	public function u_reg() {
		if (isset($_POST['log_but']))
		{
		$error1 = "Пользователь не найден";

		$checkRow = ORM::for_table('users')->where('email',$_POST['loginname'])->where('password',sha1(md5($this->salt.$_POST['loginpassword'])))->find_one();
	
		if ($checkRow->id)

		{
			$_SESSION["uloginid"] = $checkRow->id;
			$_SESSION["uloginemail"] = $checkRow->email;
			$_SESSION['uloginpassword'] = $checkRow->password;
			header("Location: /"); die();
		}

}
		



		if (isset($_POST['reg_but']))
		{
			
		session_start();



		if ( !$_POST['g-recaptcha-response'] )
		$error = "Заполните капчу";

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$key = '6LcsWPwUAAAAAMEyoCkyKPUTWgRMKoJdgYXi0qsd';
	$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

	$data = json_decode(file_get_contents($query));

	if ( $data->success == false){
		$error = 'Капча введена неверно';
	}

	

	
		
			if ($_POST['password1'] != $_POST['password2']) $error = "Пароли не совпадают";
			//if ($_POST['captcha'] != $_SESSION['rand_code']) $error = "Неверно ввели символы, указанные на картинке";
			$checkRow = ORM::for_table('users')->where('email',$_POST['email'])->find_one();
			if (strlen($_POST['password1'])<6) $error = "Пароль должен быть больше пяти символов";
			if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $error = "Введен недопустимый адрес электронной почты";
			if ($checkRow->id) $error = "Пользователь с такой электронной почтой уже есть в базе, может это вы?";
			if (!$error)
			{
				$newRow = ORM::for_table("users")->create();
				$newRow->email = $_POST['email'];
				$newRow->password = sha1(md5($this->salt.$_POST['password1']));
				$newRow->save();
				if(isset($_COOKIE['ref']))
				{
					$update_orders = ORM::for_table('users')->where('id',$newRow->id)->find_one();
					$update_orders->ref_id = $_COOKIE['ref'];
					$update_orders->save();
				}
				$this->u_do_login($_POST['email'],$_POST['password1']);
				header("Location: /"); die();
				view::assign("usersMode","successReg");
			} else { view::assign("error",$error); view::assign("post",$_POST); }
		}
		
		view::assign("block1","site_users.tpl");
		view::assign("usersMode","reg");
	}
	
	public function u_force_registration($email) {
		if ($email)
		{
			$userRow = ORM::for_table("users")->create();
			$userRow->email = $email;
			$password = $this->generatePassword(7);
			$userRow->password = sha1(md5($this->salt.$password));
			$userRow->save();
			if(isset($_COOKIE['ref']))
			{
				$update_orders = ORM::for_table('users')->where('id',$userRow->id)->find_one();
				$update_orders->ref_id = $_COOKIE['ref'];
				$update_orders->save();
			}
			$this->u_do_login($email,$password);
			$_SESSION["uloginid"] = $userRow->id;
			$_SESSION["uloginemail"] = $userRow->email;
			return $password;
		} return false;
	}
	
	private function generatePassword($length = 8) {
		$chars = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}

		return $result;
	}
	
	public function u_logout() {
		unset($_SESSION["uloginid"]);
		unset($_SESSION["uloginemail"]);
		header("Location: /");
	}
	
	public function getUserData($type = null) {
		if ($type == 'id')
		{
			if ($_SESSION['uloginid']) return $_SESSION['uloginid'];
		}

		if ($type == 'email')
		{
			if ($_SESSION['uloginemail']) return $_SESSION['uloginemail'];
		}
		
		if ($_SESSION['uloginid'] and $_SESSION['uloginemail'])
		{
			return array("id"=>$_SESSION['uloginid'],"email"=>$_SESSION['uloginemail']);
		} else return false;
	}
	
	public function isULogin() {
		if ($_SESSION['uloginid'] and $_SESSION['uloginemail'])
			return true;
		
		return false;
	}
	
	public function getUserEmail() {
		if ($_SESSION['uloginemail'])
			return $_SESSION['uloginemail'];
		
		return false;
	}
	
	public function getuserid() {
		return $this->userid;
	}
	
	public function getusername() {
		return $this->name;
	}
	
	public function is_admin() {
		if ($_SESSION["loginaid"]==0)
		 return 1;	
		else
	     return 0;
	}
	
	public function is_login() {
		if ($_SESSION["loginid"])
		 return 1;	
		else
	     return 0;
	}
	
	public function logout() {
		unset($_SESSION["loginid"]);
		unset($_SESSION["loginname"]);
		header("Location: /admin");
	}
	
	public function login() {
		$this->reg["tpl"]->append("tpls","admin_users.tpl");
		if ($_POST["loginname"] and $_POST["loginpassword"])
		{
			$_POST["loginname"]     = strtolower($_POST["loginname"]);
			$_POST["loginpassword"] = strtolower($_POST["loginpassword"]);

			if ($this->dologin($_POST["loginname"],$_POST["loginpassword"]))
			{
				header("Location: /admin");
				die();
			} else $this->reg["tpl"]->assign("message","Неверная комбинация логин/пароль");
		}
		else $this->reg["tpl"]->assign("loginform","1");
	}
	
    public function getAreaId()
    {
        return $_SESSION["loginaid"];
    }
	
	public function info_admin(){
		if($this->is_login()){
			$row_admin = ORM::for_table('users')->where('id', (int) $this->userid)->where_not_equal('type', 0)->find_one();
			if(isset($row_admin->id)) return $row_admin; else return false;
		}
		return false;
	}
	
	private function dologin($u,$p) {


		if($u){
			$loginData = ORM::for_table('users')->where('name',$u)->where('password',$p)->find_one();

			if ($loginData->id and $loginData->type)
			{
				$_SESSION["loginid"]     = $loginData->id;
				$_SESSION["loginname"]   = $loginData->name;
				$_SESSION['loginpass'] = $loginData->password;
				return 1;			
			}

		}
	}
	
	public function mailing_buyer($data, $uid){
		$usersRow = ORM::for_table('users')->where('id', (int) $uid)->find_one();
		$data = str_replace('_', ' ', $data);
		$data = strip_tags($data, '<br>');
		$replase = array(
					'Оставьте комментарий о предпочитаемом времени доставки' => 'Комментарий',
					'Укажите имя персонажа' => 'Персонаж',
					'Укажите сторону' => 'Фракция',
					'Платежная система' => 'Способ оплаты',
					'Заказ №' => 'Номер заказа'
		);
		$data = strtr($data, $replase);
		$this->sendmail('Здравствуйте, уважаемый покупатель!<br>Вы оплатили заказ на сайте Azerty-money.ru<br>'.$data.'<br>Ваш заказ принят на обработку и в скором времени будет доставлен.<br><br>Если вы ошиблись в деталях заказа, свяжитесь с нами по контактным данным, указанным на сайте, для уточнения.', 'Оплачен заказ на сайте Azerty-money.ru', $usersRow->email, 'info@azerty-money.ru');
		return true;
	}
	
	public function sendmail($body,$theme,$to,$from) { 
		$headers = "MIME-Version: 1.0\r\n";
		$headers.= "Content-Transfer-Encoding: 8bit\r\n";
		$headers.= "Content-Type: text/html; charset=utf-8\r\n";
		$headers.= "From: ".$from."\r\n";
		$headers.= "Reply-To: ".$from."\r\n";
		$headers.= "X-Mailer: PHP/" . phpversion();
		
		    //посылаем само письмо: $to - адрес посылки, $theme - тема письма,
		    //$body - в каком виде будет сообщение,
		    //$headers - для правильного отображения в виде html
		@mail ($to,$theme,$body,$headers);
	}
	
	
	public function check_rights_admin(){
		if($this->info_admin() and sitepage == 'admin'){
			$ui = $this->info_admin();
			if($ui->type > 1){
				$arr_rights = array(
					array( 'func' => 'listGames', 'allow' => array(3, 2)),
					array( 'func' => 'elementGamesNew', 'allow' => array(3, 2)),
					array( 'func' => 'editGames', 'allow' => array(3, 2)),
					array( 'func' => 'deleteGames', 'allow' => array(3, 2)),
					array( 'func' => 'elementServicesNew', 'allow' => array(3, 2)),
					array( 'func' => 'editServices', 'allow' => array(3, 2)),
					array( 'func' => 'deleteServices', 'allow' => array(3, 2)),
					array( 'func' => 'listServices', 'allow' => array(3, 2)),
					array( 'func' => 'elementServersNew', 'allow' => array(3)),
					array( 'func' => 'editServers', 'allow' => array(3)),
					array( 'func' => 'deleteServers', 'allow' => array(3)),
					array( 'func' => 'listServers', 'allow' => array(3)),
					array( 'func' => 'elementItemNew', 'allow' => array(3)),
					array( 'func' => 'editItem', 'allow' => array(3)),
					array( 'func' => 'deleteItem', 'allow' => array(3)),
					array( 'func' => 'listItem', 'allow' => array(3)),
					array( 'func' => 'templatelist', 'allow' => array(3, 2)),
					array( 'func' => 'templateedit', 'allow' => array(3, 2)),
					array( 'func' => 'templatelistServices', 'allow' => array(3, 2)),
					array( 'func' => 'templateeditServices', 'allow' => array(3, 2)),
					array( 'func' => 'listFeedback', 'allow' => array(3)),
					array( 'func' => 'deleteFeedback', 'allow' => array(3)),
					array( 'func' => 'resolveFeedback', 'allow' => array(3)),
					array( 'func' => 'listNewFeedback', 'allow' => array(3)),
					array( 'func' => 'listFaq', 'allow' => array(3, 2)),
					array( 'func' => 'elementFaqNew', 'allow' => array(3, 2)),
					array( 'func' => 'editFaq', 'allow' => array(3, 2)),
					array( 'func' => 'deleteFaq', 'allow' => array(3, 2)),
					array( 'func' => 'listUsers', 'allow' => array(3, 2)),
					array( 'func' => 'historyRef', 'allow' => array(3, 2)),
					array( 'func' => 'listOrdersUser', 'allow' => array(3, 2)),
					array( 'func' => 'nullifyRef', 'allow' => array(3, 2)),
					array( 'func' => 'usersSearch', 'allow' => array(3, 2)),
					array( 'func' => 'newphoto', 'allow' => array(3, 2)),
					array( 'func' => 'listphoto', 'allow' => array(3, 2)),
					array( 'func' => 'listtitle', 'allow' => array(3, 2)),
					array( 'func' => 'newtitle', 'allow' => array(3, 2)),
					array( 'func' => 'edittitle', 'allow' => array(3, 2)),
					array( 'func' => 'deletetitle', 'allow' => array(3, 2)),
					array( 'func' => 'list_promo_code', 'allow' => array(3, 2)),
					array( 'func' => 'new_promo_code', 'allow' => array(3, 2)),
					array( 'func' => 'edit_promo_code', 'allow' => array(3, 2)),
					array( 'func' => 'delete_promo_code', 'allow' => array(3, 2)),
					array( 'func' => 'edit_users', 'allow' => array(3, 2)),
					array( 'func' => 'new_menu_lk', 'allow' => array(3, 2)),
					array( 'func' => 'list_menu_lk', 'allow' => array(3, 2)),
					array( 'func' => 'edit_menu_lk', 'allow' => array(3, 2))
				);
				if(isset($_GET['param1'])){
					foreach($arr_rights as $key => $value){
						if($value['func'] == $_GET['param1']){
							if(array_search($ui->type, $value['allow']) !== false) die('Доступ запрещен');
							break;
						}
					}
				}
			}
		}
		return true;
	}
}

?>