<?php
	class Path
	{
        private $reg;
    	public  $isclass=1;
        function __construct($registry) {
            $this->reg = $registry;
        }		
       
       public function loadmodules() {
	   		global $usemodules;
			foreach ($usemodules as $k=>$v)
			{
				if (sitepage=="site")
				{
					if (file_exists(_modulespath."/".$v."/main.php"))
					{
						include_once(_modulespath."/".$v."/model.php");
						$modelName = "M".$v;
						$tempModel = new $modelName($this->reg,$v);
						include_once(_modulespath."/".$v."/main.php");
						$temp = new $v($this->reg,$v);
						$temp->setModel($tempModel);
						$this->reg->set($v,$temp);
						unset($temp);					
						unset($modelName);
						unset($tempModel);
					}
				}
			   	if (sitepage=="admin")
			    {
					if (file_exists(_modulespath."/".$v."/admin.php"))
					{
						include_once(_modulespath."/".$v."/model.php");
						$modelName = "M".$v;
						$tempModel = new $modelName($this->reg,$v);
						include_once(_modulespath."/".$v."/admin.php");
						$temp = new $v($this->reg,$v);
						$temp->setModel($tempModel);
						$this->reg->set($v,$temp);
						unset($temp);					
						unset($modelName);
						unset($tempModel);
					}		
				}

			//подгружаем настройки
				unset($r);
				unset($tmp);
			}		
	   }
       
       public function analysePath()
       {
            // Работаем с путем переданным через .htaccess в переменную q (get)
            if (isset($_GET["q"])) {
             $q=htmlspecialchars(trim($_GET['q'],"\/")); // обрезать лишние слеши
             $t=(explode('/',$q)); // превратить в массив переменных
             $tt=0;
             foreach ($t as $k=>$v)
             { 
             	if ($k=="0") {
                 if ($v=="admin")
            	 {
            	    if ($t[$k+1]) $_GET["m"]=$t[$k+1]; 
            	 	$tt=-1;
            		define("sitepage","admin"); 
                    session_start();
                    $users = new Users($this->reg);
                    $this->reg->set('users', $users);
            	 }
            	 else 
            	 {
                   if (defined("sitepage"))
                   {
                        $this->reg["view"]->assign("purl","/".$v);
                   }

                    if (!defined("sitepage"))    
                    {
                        $_GET["m"]=$v;
                    }
                 } 
            	}
            	 else if ($k+$tt>0) $_GET["param".($k+$tt)]=$v;
             } // структура запроса : site.ru/?m=первый_параметр&param1=второй_параметр&....&paramN=N_параметр
            }
 
            $this->reg["tpl"]->assign("fullPath",$_GET['q']);
            //if ($_GET['param2']) $_GET['param2'] = iconv("UTF-8","CP1251",$_GET['param2']); //странно
            if (!defined("sitepage")) 
            {
                $users = new Users($this->reg);
                $this->reg->set ('users', $users);                   
                define("sitepage","site");
            }
       }
	   
		public function getMap()
		{
			$level1 = ORM::for_table('games')->order_by_asc('sort')->find_array();
			/*if ($level1['0']['id'])
			{
				foreach ($level1 as $klevel=>$vlevel)
				{
					$level2 = ORM::for_table('services')->order_by_asc('id')->where('gid',$vlevel['id'])->find_array();
					if ($level2[0]['id']) 
						$level1[$klevel]['a'] = $level2;
				}
			}*/
			
			return $level1;
		}

		public function getPopular()
		{



			$popular = ORM::for_table('games')->where('popular',1)->order_by_asc('sort')->find_array();
			/*if ($popular['0']['id'])
			{
				foreach ($popular as $klevel=>$vlevel)
				{
					$link = ORM::for_table('services')->order_by_desc('sort')->where('gid',$vlevel['id'])->find_array();
					if ($link[0]['id']) 
						$popular[$klevel]['service_id'] = $link[0]['id'];
						$popular[$klevel]['links'] = $link[0]['link'];
					
				}
			}*/
		
			
			return $popular;
		}
		public function Test()
		{


			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$key = '6Len6f8UAAAAAKLaTNrnei2Q7SULxyeNJWtnqSXy';
			$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
		
			$data = json_decode(file_get_contents($query));
		
			if ( !$data->success == false){

	if($_POST['Логин']){
		global $admin_email;
		$this->reg["users"]->sendmail('Отправлена заявка ' . $_POST['smodal_input_select'] . ' Логин:' . $_POST['Логин'] . ' Сообщение: ' . $_POST['sub'] . '.' , 'Отправлена заявка', $admin_email, 'info@azerty-money.ru');


	}
}

		}




	public function bread(){


$serv = $_SERVER['REQUEST_URI'];

if($serv == "/"){
	$nav_li = " ";

}
elseif ($serv == "/faq") {


	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  F.A.Q.
  </div>';
}
elseif ($serv == "/garantii/") {


	
	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  Гарантии
  </div>';
}

elseif ($serv == "/postavshikam/") {


	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  Поставщикам
  </div>';
}
elseif ($serv == "/contacts") {


	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  Контакты
  </div>';
}
elseif ($serv == "/catalogs") {


	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  Каталог игр
  </div>';
}

elseif ($serv == "/catalogs") {


	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  Каталог игр
  </div>';
}

elseif ( strpos($serv, 'gamingam?game')) {

$id_gam = $_GET['game'];

	$gam_bred = ORM::for_table('games')->where('id', $id_gam)->find_one();



	$nav_li = '	<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__home">
	  Главная
	</a> /  <a href="/catalogs" class="breadcrumbs__home"> Каталог игр </a> /  ' . $gam_bred->caption . '
  </div>';
}



elseif ( strpos($serv, 'itemca?itemca')) {

	$id_cat1 = $_GET['itemca'];
	
		$gam_bred2 = ORM::for_table('categories')->where('id', $id_cat1)->find_one();
	
	
	
		$nav_li = '	<div class="breadcrumbs">
		<a href="/" class="breadcrumbs__home">
		  Главная
		</a> /  <a href="/catalogs" class="breadcrumbs__home"> Каталог игр </a> /  ' . $gam_bred2->caption . '
	  </div>';
	}
	elseif ($serv == "/content/feedback") {


		$nav_li = '	<div class="breadcrumbs">
		<a href="/" class="breadcrumbs__home">
		  Главная
		</a> /  Отзывы
	  </div>';
	}



elseif ( strpos($serv, 'cateus?cateus')) {

	$id_cat = $_GET['cateus'];
	
		$gam_bred1 = ORM::for_table('games')->where('id', $id_cat)->find_one();
	
	
	
		$nav_li = '	<div class="breadcrumbs">
		<a href="/" class="breadcrumbs__home">
		  Главная
		</a> /  <a href="/catalogs" class="breadcrumbs__home"> Каталог игр </a> /  ' . $gam_bred1->caption . '
	  </div>';
	}






else {


	$nav_li = ' ';
}



return $nav_li;


}

public function News()
{
	$news = ORM::for_table('news')->find_many();
	$ft = "123123123123123";
	return $ft;
}

public function categ()
{
	$categ = ORM::for_table('categories')->where('id', $_GET['itemca'])->find_array();
	$categ1 = $categ[0];
	return $categ1;
}


		public function getFeedback()
		{
			$feedback = ORM::for_table('feedback')->limit(5)->where('display',1)->find_array();
			if(isset($feedback->id)) $feedback->count = ORM::for_table('feedback')->where('display',1)->count();
			return $feedback;
		}
		public function getNews()
		{
			$news1 = ORM::for_table('news')->limit(3)->order_by_desc('data')->find_array();
			if(isset($news1->id)) $news1->count = ORM::for_table('news')->count();
			return $news1;
		}
		public function getHeaders()
		{
			$getHeaders = ORM::for_table('headers')->where('link',$_GET['q'])->find_array();
			return $getHeaders;
		}
	}
?>