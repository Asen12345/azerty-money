<?php /* Smarty version Smarty-3.1.18, created on 2020-05-26 21:58:38
         compiled from "templates/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4197025535ebea710c07937-05088166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbc753ec07d8d57d926d816f0e718758e490a1b' => 
    array (
      0 => 'templates/admin.tpl',
      1 => 1590519516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4197025535ebea710c07937-05088166',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebea710cc58e6_95092995',
  'variables' => 
  array (
    'user_info' => 0,
    'message' => 0,
    'block1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebea710cc58e6_95092995')) {function content_5ebea710cc58e6_95092995($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Администрирование</title>
<link  href="/css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/scripts/tiny_mce/tiny_mce.js"></script>
<!--<script type="text/javascript" src="/scripts/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="/scripts/jquery.autocomplete.min.js"></script>
<link rel="stylesheet" type="text/css" href="/scripts/x/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="/scripts/x/thickbox.css" />
<script type="text/javascript" src="/css/jquery.the-modal.js"></script>
<link rel="stylesheet" type="text/css" href="/css/the-modal.css" />

<script type="text/javascript">
	
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		editor_deselector : "mceNoEditor",
		relative_urls : false,
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code,|,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,print,,fullscreen",

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins


		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		translate_mode : true,
		language : "ru"

	});
	
</script>

<!--[if IE]> 
<link rel="stylesheet" type="text/css" href="/css/ie-sucks.css" />
<![endif]-->
</head>

<body>
    <div id="main">
        <div id="header">
            <a href="/admin" class="logo"><h1>Администрирование сайта</h1></a>
            <ul id="top-navigation">
                <li><a href="/admin" class="active">Управление содержимым</a></li>
				<li><a href="/admin/users/logout">Выйти</a></li>

            </ul>
        </div>

        <div id="middle">
            <div id="left-column">
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']!=3&&$_smarty_tpl->tpl_vars['user_info']->value['type']!=2) {?>
                    <h3>Настройки</h3>

                    <ul class="nav">
                        <li><a href="/admin/content/settingList">Настройки</a></li>
                    </ul>


                <h3>Страницы</h3>

                <ul class="nav">
<li><a href="/admin/content/listelements">Список контентных страниц</a></li>
<li><a href="/admin/content/templatelist">Список страниц шаблонов</a></li>
<li><a href="/admin/content/templatelistServices">Список страниц шаблонов оплаты</a></li>
				</ul>
                
                <h3>Меню ЛК</h3>
                <ul class="nav">
<li><a href="/admin/content/new_menu_lk">Добавить</a></li>
<li><a href="/admin/content/list_menu_lk">Список</a></li>
				</ul>




				<h3> Категории</h3>
                <ul class="nav">
<li><a href="/admin/content/new_cat">Добавить</a></li>
<li><a href="/admin/content/list_cat">Список</a></li>
				</ul>







				
                <h3>F.A.Q.</h3>
                <ul class="nav">
<li><a href="/admin/content/elementFaqNew">Добавить</a></li>
<li><a href="/admin/content/listFaq">Список</a></li>
				</ul>
				<?php }?>
				<h3>Заказы</h3>
                <ul class="nav">
<li><a href="/admin/forms/listOrders?count=100">Список</a></li>
				</ul>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']!=3) {?>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']!=2) {?>
                <h3>Пользователи</h3>
                <ul class="nav">
<li><a href="/admin/content/listUsers?count=100">Список</a></li>
<li><a href="/admin/content/withdrawal_of_money">Заявки на вывод денег</a></li>
				</ul>
				
                <h3>Новости</h3>
                <ul class="nav">
<li><a href="/admin/news/elementNew">Добавить новость</a></li>
<li><a href="/admin/news/listNews">Список новостей</a></li>
				</ul>
				<?php }?>
                <h3>Отзывы</h3>
                <ul class="nav">
<li><a href="/admin/content/listNewFeedback">Новые отзывы</a></li>
<li><a href="/admin/content/listFeedback">Все отзывы</a></li>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']==1) {?>
<li><a href="/admin/content/edit_name_admin">Настройки логина</a></li>
				<?php }?>
				</ul>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']!=2) {?>
                <h3>Игры</h3>
                <ul class="nav">
<li><a href="/admin/forms/elementGamesNew">Добавить</a></li>
<li><a href="/admin/forms/listGames">Список</a></li>
				</ul>
				
                <h3>Услуги</h3>
                <ul class="nav">
<li><a href="/admin/forms/elementServicesNew">Добавить</a></li>
<li><a href="/admin/forms/listServices">Список</a></li>
				</ul>
				<?php }?>
                <h3>Товары</h3>
                <ul class="nav">
<li><a href="/admin/forms/elementItemNew">Добавить</a></li>
<li><a href="/admin/forms/listItem">Список</a></li>
<li><a href="/admin/forms/listItemCategory">Групповое перемещение товаров</a></li>
				</ul>
				
				<h3>Серверы</h3>
                <ul class="nav">
<li><a href="/admin/forms/elementServersNew">Добавить</a></li>
<li><a href="/admin/forms/listServers">Список</a></li>
				</ul>
				<?php if ($_smarty_tpl->tpl_vars['user_info']->value['type']!=2) {?>
				<h3>Загрузка изображений</h3>
                <ul class="nav">
<li><a href="/admin/content/newphoto">Добавить</a></li>
<li><a href="/admin/content/listphoto">Список</a></li>
				</ul>

                <h3>Иконки услуг</h3>
                <ul class="nav">
                    <li><a href="/admin/content/newservicephoto">Добавить</a></li>
                    <li><a href="/admin/content/listservicephoto">Список</a></li>
                </ul>

                    <h3>Иконки преимуществ</h3>
                    <ul class="nav">
                        <li><a href="/admin/content/newadvantagesphoto">Добавить</a></li>
                        <li><a href="/admin/content/listadvantagesphoto">Список</a></li>
                    </ul>

				<h3>Тайтлы</h3>
                <ul class="nav">
<li><a href="/admin/content/newtitle">Добавить</a></li>
<li><a href="/admin/content/listtitle">Список</a></li>
				</ul>

				<h3>Промокоды</h3>
                <ul class="nav">
<li><a href="/admin/forms/new_promo_code">Добавить</a></li>
<li><a href="/admin/forms/list_promo_code">Список</a></li>
				</ul>
				<?php }?>
				<?php }?>
            </div>
			
            <div id="center-column">
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>
<p style="font-size:12pt; font-weight:bold; color:red;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['block1']->value)) {?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['block1']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
<?php } else { ?>
<?php }?>
<script language="javascript">

function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}

</script>
            </div>
        </div>
</div>
</body>
</html><?php }} ?>
