<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 18:17:15
         compiled from "templates/site_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7137538345ebe74995a3292-06783542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0312d0f5b69bf10a664d8998911f805aaa740e4f' => 
    array (
      0 => 'templates/site_1.tpl',
      1 => 1591197417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7137538345ebe74995a3292-06783542',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebe749967a5b9_72477826',
  'variables' => 
  array (
    'test' => 0,
    'servicesHeaders' => 0,
    'categ' => 0,
    'contentHeaders' => 0,
    'error' => 0,
    'message' => 0,
    'bread' => 0,
    'block1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebe749967a5b9_72477826')) {function content_5ebe749967a5b9_72477826($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['test']->value;?>

<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
	<link rel="shortcut icon" href="/data/data/data/img/favicon.ico" type="image/x-icon">
	<title><?php if ($_smarty_tpl->tpl_vars['servicesHeaders']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['servicesHeaders']->value['title'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['categ']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['categ']->value['title'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['contentHeaders']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['contentHeaders']->value['title'];?>
<?php } else { ?>Azerty-Money.ru | Купить золото, адена, кинары<?php }?><?php }?><?php }?></title>
	<meta charset="utf-8">
    <meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['servicesHeaders']->value['description']) {?><?php echo $_smarty_tpl->tpl_vars['servicesHeaders']->value['description'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['categ']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['categ']->value['title'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['contentHeaders']->value['description']) {?><?php echo $_smarty_tpl->tpl_vars['contentHeaders']->value['description'];?>
<?php } else { ?> Магазин Azerty Money - здесь вы можете купить игровую валюту и игровые товары в популярных MMO играх по доступным ценам. У нас можно купить золото wow, archeage золото, айон кинары , купить золото tera, а так же приобрести адену в L2 <?php }?> <?php }?> <?php }?>" />
	<meta name="keywords" content="<?php if ($_smarty_tpl->tpl_vars['servicesHeaders']->value['keywords']) {?><?php echo $_smarty_tpl->tpl_vars['servicesHeaders']->value['keywords'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['categ']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['categ']->value['title'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['contentHeaders']->value['keywords']) {?> <?php echo $_smarty_tpl->tpl_vars['contentHeaders']->value['keywords'];?>
 <?php } else { ?> голд, вов золото, голд wow, вов голд, золото вов, wow голд, купить вов голд, таймкарты wow, тайм карты wow, карты оплаты wow, adena, kinah, adena l2, kinah AION, купить голд, купить голд wow, аккаунты, wow тайм карты, тайм карты вов за золото, archeage gold, золото аа, archeage золото, архейдж голд, золото архейдж, архейдж золото, wowcircle gold, голд wowcircle, wowcircle голд, золото wowcircle, wowcircle золото <?php }?><?php }?> <?php }?>" />
<meta name='yandex-verification' content='55aba4786adf46ad' />
<link rel="stylesheet" href="http://mykombain.ru/data/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="http://mykombain.ru/data/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="http://mykombain.ru/data/css/jquery.dataTables.css" type="text/css" />
    <link rel="stylesheet" href="http://mykombain.ru/data/css/jquery-ui.css" type="text/css" />

    <!-- Owl Carousel Assets -->
    <link href="http://mykombain.ru/data/owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="http://mykombain.ru/data/owl-carousel/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <!--[if IE 9]><link rel="stylesheet" type="text/css" href="/data/css/ie9.css"><![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/data/css/ie8.css" />
    <![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="/data/css/ie7.css"><![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://mykombain.ru/data/owl-carousel/owl-carousel/owl.carousel.js"></script>
    <script src="http://mykombain.ru/data/js/jquery-ui.min.js"></script>
    <script src="http://mykombain.ru/data/js/jquery.dataTables.min.js"></script>

	<!-- Put this script tag to the <head> of your page -->
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>


    <script src="http://mykombain.ru/data/js/jquery.jcarousel.min.js"></script>
    <script src="http://mykombain.ru/data/js/tabs.js"></script>
    <script src="http://mykombain.ru/data/js/colorbox/jquery.colorbox.js"></script>
    <link href="http://mykombain.ru/data/js/colorbox/example3/colorbox.css" rel="stylesheet">


   
	
  <link rel="stylesheet" href="http://mykombain.ru/data/css/slick.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/slick-theme.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/normalize.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/main.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/media.css">


  <link rel="stylesheet" href="http://mykombain.ru/data/css/normalize.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/main.css">
  <link rel="stylesheet" href="http://mykombain.ru/data/css/media.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript" src="http://mykombain.ru/data/js/main.js?v=2"></script>
  <script async src="https://cse.google.com/cse.js?cx=007819452241745827737:lmt8l3bvlqp"></script>
</head>
<body>


          
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><script>alert('<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
');</script><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><script>alert('<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
');</script><?php }?>



    <div class="menu">
    <div class="menu__title">
      Меню
    </div>
    <img src="http://mykombain.ru/data/img/menu-line.png" alt="" class="menu__line">
    <ul class="menu__links">
      <li>
        <a href="/" class="menu__item menu__item_active">
          Главная
        </a>
      </li>
      <li>
        <a href="/catalogs" class="menu__item">
          Каталог игр
        </a>
      </li>
      <li>
        <a href="/faq" class="menu__item">
          F.A.Q
        </a>
      </li>
      <li>
        <a href="/garantii/" class="menu__item">
          Гарантии
        </a>
      </li>
      <li>
        <a href="/postavshikam/" class="menu__item">
          Поставщикам
        </a>
      </li>
      <li>
        <a href="/contacts" class="menu__item">
          Контакты
        </a>
      </li>
    </ul>
    <img src="http://mykombain.ru/data/img/menu-line.png" alt="" class="menu__line">
    <div class="menu__footer">
      <a href="/users/u_reg" class="menu__user">
        Аккаунт
      </a>
      <a href="/users/u_reg" class="menu__user">
        Вход
      </a>
    </div>
  </div>

  <!-- <button class="bar__btn btn btn__first">
    <div class="bar__btn-before"></div>
    Оставьте нам сообщение
  </button>


<div class="chat">
    <button class="bar__btn btn chat__btn">
      Чат с оператором
    </button>
    <div class="chat__header">
      <img src="http://mykombain.ru/data/img/chat-img.png" alt="Admin" class="chat__admin-img">
      <div class="chat__admin">
        <div class="admin-name">
          Ирина
        </div>

        <div class="admin-text">
          Поддержка клиентов
        </div>
      </div>
    </div>
    <div class="chat__messages">
      <div class="chat__beg">
        Чат начат
      </div>
      <div class="message">
        <img src="http://mykombain.ru/data/img/chat-img.png" alt="Admin" class="message__img">
        <div class="message__admin">
          Здравствуйте! Отвечу на все вопросы по работе сайта или услугам! (Вам ответит наш свободный оператор, не
          робот).
        </div>
      </div>
      <div class="message">
        <div class="message__user">
          Здравствуйте! Отвечу на все вопросы по работе сайта или услугам! (Вам ответит наш свободный оператор, не
          робот).
        </div>
        <img src="http://mykombain.ru/data/img/chat-img-2.png" alt="Admin" class="message__img">
      </div>
      <div class="new-message">
        <textarea class="message__area" placeholder="Введите сюда сообщение"></textarea>
        <button class="message__btn">
          <img src="http://mykombain.ru/data/img/chat-btn.png" alt="" class="message__btn-icon">
        </button>
      </div>
    </div>
  </div>


-->
  <div class="catalog-wrap">

 
    <!-- Тут начинается "Header" (повторяюшиеся элементы) -->
    <div class="header" id="header">
      <div class="container">
        <div class="header-nav">
          <a href="/" class="logo">
            <img src="http://mykombain.ru/data/img/logo.png" alt="Logo">
          </a>
          <ul class="header__menu">
            <li>



           
          



              <a href="/" class="header__item">
                Главная
              </a>
            </li>
            <li>
              <a href="/catalogs" class="header__item">
                Каталог игр
              </a>
            </li>
            <li>
              <a href="/faq" class="header__item">
                F.A.Q
              </a>
            </li>
            <li>
              <a href="/garantii/" class="header__item">
                Гарантии
              </a>
            </li>
            <li>
              <a href="/postavshikam/" class="header__item">
                Поставщикам
              </a>
            </li>
            <li>
              <a href="/contacts" class="header__item">
                Контакты
              </a>
            </li>
          </ul>



<form autocomplete="off" id="ma_fo" style=" flex:0.7; display: flex;   border: 1px solid #FFFFFF;
border-radius: 5px;" action="http://google.com/search" target="_blank">
  <input style="border: 0px solid #fff; background-image: none;"  name="q" autocomplete="off" type="search" class="header__input" placeholder="Введите названия игры">
  <input type="hidden" name="as_sitesearch" value="mykombain.ru">  <!-- «shpargalkablog.ru» заменить на свой адрес сайта -->
  <input class="admin__logo search__logo" style="margin-right: 10px;" type="image" src="http://mykombain.ru/data/img/search.svg" />
</form>

         
       <!--   <a href="#" class="header__admin header__search">
            <img src="http://mykombain.ru/data/img/search.svg" alt="search" class="admin__logo search__logo">
          </a>-->





          <a href='<?php if ($_SESSION['uloginemail']) {?>/users/profile<?php } else { ?>/users/u_reg<?php }?>' class="header__admin">
            <img src="http://mykombain.ru/data/img/user.svg" alt="User" class="admin__logo">
          </a>
        </div>
        <div class="header__bar">
          <div class="header__hamburger">
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
          </div>
          <div class="offer__time">
            <img src="http://mykombain.ru/data/img/icon-clock.svg" alt="Clock" class="time__icon">
            с 11:00 до 23:00
          </div>
        </div>
       
        <?php echo $_smarty_tpl->tpl_vars['bread']->value;?>

        
      </div>
    </div>
 
<!--Конец Хеадер--> 
<div class="content-wrap">
<div class="main-content">
	<?php if (isset($_smarty_tpl->tpl_vars['block1']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['block1']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
</div>
</div>


<footer class="footer" id="footer">
    <div class="container">
      <div class="footer__wrap">
        <img src="http://mykombain.ru/data/img/logo-big.png" alt="Logo" class="footer__logo">
        <ul class="header__menu footer__menu">
          <li>
            <a href="/" class="header__item">
              Главная
            </a>
          </li>
          <li>
            <a href="/catalogs" class="header__item">
              Каталог игр
            </a>
          </li>
          <li>
            <a href="/faq" class="header__item">
              F.A.Q
            </a>
          </li>
          <li>
            <a href="/garantii/" class="header__item">
              Гарантии
            </a>
          </li>
          <li>
            <a href="/postavshikam/" class="header__item">
              Поставщикам
            </a>
          </li>
          <li>
            <a href="/contacts" class="header__item">
              Контакты
            </a>
          </li>








        </ul>
        <div class="footer__discounts">
          <div class="icons__info discount__info"
            data-title="Скидка накопительная и рассчитывается по суммарному количеству потраченных Вами денег. Указывайте один и тот же e-mail. Если Вы хотите получать максимальную скидку 10%">
            <img src="http://mykombain.ru/data/img/info-icon.svg" alt="" class="discount__img">
          </div>
          <div class="discount__row">
            <h4 class="discount__title">
              Сумма заказов, руб.
            </h4>
            <div class="discount__rate">
              Скидка
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              100 - 500
            </div>
            <div class="discount__rate">
              1%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              500 - 2000
            </div>
            <div class="discount__rate">
              2%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              2000 - 5000
            </div>
            <div class="discount__rate">
              3%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              5000 - 10000
            </div>
            <div class="discount__rate">
              4%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              10000 - 30000
            </div>
            <div class="discount__rate">
              5%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              VIP статус > 30000
            </div>
            <div class="discount__rate">
              10%
            </div>
            <div class="disc__row-after"></div>
          </div>
        </div>
        <div class="footer__call">
          <button class="btn secondary__btn footer__btn">
            Связатся с нами
          </button>
          <div class="offer__time discount__time">
            <img src="http://mykombain.ru/data/img/icon-clock.svg" alt="Clock" class="time__icon">
            с 11:00 до 23:00
          </div>
        </div>
      </div>
      <div class="footer__credits">
        2020 © Все права защищены
      </div>
    </div>
  </footer>
  <div class="modal">
    <div class="modal-dialog main-modal">
      <button class="modal-close main-modal__close"></button>
      <div class="modal-head lined">
        <h2 class="modal__title">
          Напиши нам
        </h2>
        <h2 class="modal__title title_second">
          Отправь заявку менеджеру
        </h2>
      </div>
      <div class="modal-body">
        <div class="modal__links">
          <a id="sky1" href="#Skype" class="modal__btn btn-skype">
            <img src="http://mykombain.ru/data/img/skype-icon.png" alt="Skype" class="modal__icon">
            Skype
          </a>
          <a id="dis1" href="#Discord" class="modal__btn btn-discord">
            <img src="http://mykombain.ru/data/img/discord-icon.png" alt="discord" class="modal__icon">
            Discord
          </a>
          <a id="what1" href="#Whatsapp" class="modal__btn btn-whatsapp">
            <img src="http://mykombain.ru/data/img/whatsapp-icon.png" alt="whatsapp" class="modal__icon">
            Whatsapp
          </a>
          <a id="tel1" href="#Telegram" class="modal__btn btn-telegram">
            <img src="http://mykombain.ru/data/img/telegram-icon.png" alt="telegram" class="modal__icon">
            Telegram
          </a>
          <a id="ema1" href="#Email" class="modal__btn btn-email">
            <img src="http://mykombain.ru/data/img/email-icon.png" alt="email" class="modal__icon">
            Email
          </a>
        </div>
        <h2 class="modal__title title_small">
          Отправь заявку менеджеру
        </h2>
        <form method="POST"  class="js-form" id="popupResult">
          <label for="#modal_input_select"></label>
          <select name="smodal_input_select" id="modal_input_select" class="brown-input modal-input">
            <option id="sky2" value="Skype">Напишите мне в Skype</option>
            <option id="dis2" value="Discord">Напишите мне в Discord</option>
            <option id="what2" value="Whatsapp">Напишите мне в Whatsapp</option>
            <option id="tel2" value="Telegram">Напишите мне в Telegram</option>
            <option id="ema2" value="Email">Напишите мне в Email</option>
          </select>
          <label for="modal__input_link" class="changeable-label">Ваш Login Skype </label>
          <input type="name" name="Логин" class="brown-input modal-input" id="modal__input_link" required>

          <label for="modal__input_text">Что вас интересует</label>
         
          <textarea name="sub" type="text" class="brown-input modal-input" id="modal_input_text" required></textarea>
         
          <div class="g-recaptcha" data-sitekey="6Len6f8UAAAAAGm1-VtZKg0ybOwk2_1YTpeHMMEZ"></div>	
         
         
         
         
         
          <button name="sub1" id="success1" type="submit" class="btn button form__btn contacts-form__btn form__footer contacts-form__footer"
            data-submit>
            Отправить
          </button>
        </form>
      </div>
    </div>
  </div>
  


<div style=" border-radius: 15px;
position: fixed;
left: 25%;
top: 50px;
font-family: Arial, Helvetica, sans-serif;
width: 50%;
/* margin: 0px auto; */
text-align: center;
background: rgb(10, 7, 26, 0.9);
z-index: 99999;
transition: opacity 400ms ease-in 0s;
display: none;
pointer-events: none;
font-size: 20px;" id="suc_mod">
<h1 style="    color: cornsilk;
font-size: 40px;">Заявка отправлена</h1>
</div>


 
  





<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">

$(document).ready(function() {
	$('.modal__btn').on('click', function(e) {
  e.preventDefault();
  	var val = e.target.hash.slice(1);
    
    $('#modal_input_select option').each(function() {
      // по умолчанию устанавливаем у всех selected: false
      $(this).attr('selected', false);
      // Эта строка позволяет обновлять отображение выбранного элемента select
      $('#modal_input_select').val(val).trigger('change');
      if (val == $(this).attr('value')) {
        $(this).attr('selected', true);
      }
    });
  });
});







$(".contacts-form__btn").click(function(){
  var response = grecaptcha.getResponse();
if(response.length == 0){
alert("Капча не введена");

}
else{
$("#suc_mod").css("display", "block");
setTimeout(function(){
document.getElementById('suc_mod').style.display = 'none';
}, 3000);

}


});

$(".seller__form .form__btn").click(function(){
  var response = grecaptcha.getResponse();
if(response.length == 0){
alert("Капча не введена");

}
else{

  $("#suc_mod").css("display", "block");
  setTimeout(function(){
  document.getElementById('suc_mod').style.display = 'none';
}, 3000);

}
 


});








$(".reviews__btn").click(function(){
  var inp = $("#modal__input_name").val();
  var inp1 = $("#reviews_input_text").val();
  var inp2 = $("#modal__input_mail").val();
if(inp == "" || inp1 == "" || inp2 == "" ){
  $("#suc_mod").css("display", "none");
alert("Заполните поля");

}
else{
  var response = grecaptcha.getResponse();
if(response.length == 0){
alert("Капча не введена");

}
else{
  $("#suc_mod").css("display", "block");
  setTimeout(function(){
  document.getElementById('suc_mod').style.display = 'none';
}, 3000);

}
}

 


});


$("#success1").click(function(){
  var inp = $("#modal__input_link").val();
if(inp == ""){
  $("#suc_mod").css("display", "none");
alert("Заполните поля");

}
else{


  var response = grecaptcha.getResponse();
if(response.length == 0){
alert("Капча не введена");

}
else{
$(".modal").css("display", "none");
  $("#suc_mod").css("display", "block");
  setTimeout(function(){
  document.getElementById('suc_mod').style.display = 'none';
}, 3000);
}
}

 


});





$('#popupResult').submit(function (e) {
    e.preventDefault();
    var data = $('#popupResult').serializeArray();
    $.ajax({
        type: "POST",
        url: "/classes/path.php",
       dataType: text,
        success:function(){





        }
      });
      
      
      
      }); 










window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2DiiZpWLFqPIOZdqQq891ftDc196YbDd';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

<script src="http://mykombain.ru/data/js/jquery-3.5.0.min.js"></script>
  <script type="text/javascript"
    src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
  <script src="http://mykombain.ru/data/js/slick.min.js"></script>
  <script src="http://mykombain.ru/data/js/main.js"></script>
    <script src="http://mykombain.ru/data/js/jquery-3.5.0.min.js"></script>
  <script type="text/javascript"
    src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
  <script src="http://mykombain.ru/data/js/slick.min.js"></script>
  <script src="http://mykombain.ru/data/js/main.js"></script>
  <script src="http://mykombain.ru/data/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>
</html><?php }} ?>
