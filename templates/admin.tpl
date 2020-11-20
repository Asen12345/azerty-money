<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	{literal}
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
	{/literal}
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
				{if $user_info.type != 3 and $user_info.type != 2}
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
				{/if}
				<h3>Заказы</h3>
                <ul class="nav">
<li><a href="/admin/forms/listOrders?count=100">Список</a></li>
				</ul>
				{if $user_info.type != 3}
				{if $user_info.type != 2}
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
				{/if}
                <h3>Отзывы</h3>
                <ul class="nav">
<li><a href="/admin/content/listNewFeedback">Новые отзывы</a></li>
<li><a href="/admin/content/listFeedback">Все отзывы</a></li>
				{if $user_info.type == 1}
<li><a href="/admin/content/edit_name_admin">Настройки логина</a></li>
				{/if}
				</ul>
				{if $user_info.type != 2}
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
				{/if}
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
				{if $user_info.type != 2}
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
				
				<h3>Фон услуг</h3>
                <ul class="nav">
                    <li><a href="/admin/content/newbackhoto">Добавить</a></li>
                    <li><a href="/admin/content/listbackphoto">Список</a></li>
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
				{/if}
				{/if}
            </div>
			
            <div id="center-column">
{if isset($message)}
<p style="font-size:12pt; font-weight:bold; color:red;">{$message}</p>
{/if}
{if isset($block1)}
{include file=$block1}	
{else}
{/if}
<script language="javascript">
{literal}
function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}
{/literal}
</script>
            </div>
        </div>
</div>
</body>
</html>