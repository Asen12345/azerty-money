<?php /* Smarty version Smarty-3.1.18, created on 2020-06-03 19:20:42
         compiled from "templates/admin_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10044556585ebea8b2999d25-48030286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94e752cf1eceba802e513cf4585a7816dc1c2b45' => 
    array (
      0 => 'templates/admin_content.tpl',
      1 => 1591201239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10044556585ebea8b2999d25-48030286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebea8b2b0c4d4_19314177',
  'variables' => 
  array (
    'contentMode' => 0,
    'contentData' => 0,
    'foo' => 0,
    'key' => 0,
    'item' => 0,
    'still' => 0,
    'param2' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebea8b2b0c4d4_19314177')) {function content_5ebea8b2b0c4d4_19314177($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['contentMode']->value)) {?>
<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='new') {?>
<form method="post">
<h2>Новая страница</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="content_newelement_caption" size=70 /></td></tr>
</table>	
	<textarea name="content_newelement_content" rows="40" cols="100" ></textarea><br />
<br />
<input type="submit" value="Создать">
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit') {?>
<form method="post">
<h2>Редактировать страницу</h2>

<input type="hidden" name="content_editelement_id" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['id'];?>
" />
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="content_editelement_caption" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contentData']->value['caption'], ENT_QUOTES, 'UTF-8', true);?>
" size=70 /></td></tr>
</table>	
<textarea name="content_editelement_content" rows="40" cols="100" ><?php echo $_smarty_tpl->tpl_vars['contentData']->value['content'];?>
</textarea><br />

<input type="submit" value="Редактировать">
</form>
<?php }?>






<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='new_cat') {?>
<b>Добавить категорию</b><br />
<form enctype='multipart/form-data' method="post">
	<p>Название категории: </p>
<input name="name_cat" type=text><br>
<p>Title: </p>
<input name="titl" type=text><br>
<p>Description: </p>
<input name="desc" type=text><br>
<p>keywords: </p>
<input name="keyw" type=text><br>
<p>Название привязанной игры: </p>
<select name="namegame">
	<option></option>
	<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_SESSION['gam_t']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
	
	<option>
<?php echo $_smarty_tpl->tpl_vars['foo']->value['caption'];?>

	</option>


	<?php } ?>
</select>

<p style="color: red;"> Картинки должны лежать в data/img </p>
<p>Фоновая картинка: </p>
<input type="file" name="test_img" /><br>
<p>Передняя картинка: </p>
<input type="file" name="test_img1" /><br><br>
<input  type=submit value="Редактировать">
</form>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit_cat') {?>

<b>Редактирование категории</b><br />
<form enctype='multipart/form-data' method="post">


	<p>Title: </p>
	<input name="titl" type=text value="<?php if ($_smarty_tpl->tpl_vars['contentData']->value['title']) {?> <?php echo $_smarty_tpl->tpl_vars['contentData']->value['title'];?>
 <?php }?>"><br>
	<p>Description: </p>
	<input name="desc" type=text value="<?php if ($_smarty_tpl->tpl_vars['contentData']->value['description']) {?> <?php echo $_smarty_tpl->tpl_vars['contentData']->value['description'];?>
 <?php }?>"><br>
	<p>keywords: </p>
	<input name="keyw" type=text value="<?php if ($_smarty_tpl->tpl_vars['contentData']->value['keywords']) {?> <?php echo $_smarty_tpl->tpl_vars['contentData']->value['keywords'];?>
 <?php }?>"><br>

	<p>Название категории: </p>
<input name="name_cat" type=text value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['caption'];?>
"><br>
<p>Название привязанной игры: </p>
<select name="namegame">
	<option></option>
	<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_SESSION['gam_t']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
	
	<option>
<?php echo $_smarty_tpl->tpl_vars['foo']->value['caption'];?>

	</option>


	<?php } ?>
</select>
<p style="color: red;"> Картинки должны лежать в data/img </p>
<p>Фоновая картинка: </p>
<input type="file" name="im5[]" /><br>
<p>Передняя картинка: </p>
<input type="file" name="test_img1" /><br><br>
<input  type=submit value="Редактировать">
</form>






<?php }?>



<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='list_cat') {?>
<h1>Список категорий</h1>
<form method="POST">
<select name="sor">
	<option>Выберите игру</option>
	<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_SESSION['och']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
	<option>
		<?php echo $_smarty_tpl->tpl_vars['foo']->value[0]['caption'];?>

	</option>
	<?php } ?>
</select>
<input type="submit" name="btn_s" value="Сортировать">
</form>
<table>
	<tr><th>Название</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['key']->value>=0) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><a href="/admin/content/edit_cat/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактирование</a><a href="/admin/content/deleteCat/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> | Удалить</a></td>
	</tr>
	
	<?php } ?>
</table>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='commerceList') {?>
<?php if ($_smarty_tpl->tpl_vars['contentData']->value[0]['id']) {?>
<b>Список заявок: </b><br />
<table>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr><td><span <?php if ($_smarty_tpl->tpl_vars['item']->value['visited']==0) {?>style="text-decoration:underline;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</span></td><td><a href="/admin/content/commerce/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">посмотреть подробно</a></td></tr>
<?php } ?>
</table>
<?php } else { ?>
<b>Заявок нет</b>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='commerce') {?>
<b><?php echo $_smarty_tpl->tpl_vars['contentData']->value['caption'];?>
</b><br />
<pre>
<?php echo $_smarty_tpl->tpl_vars['contentData']->value['fields'];?>

</pre><?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='templatelist') {?>
<h1>Список страниц шаблонов</h1>
<b>Делайте резервные копии шаблонов перед редактированием!</b>
<table>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td><td><a href="/admin/content/templateedit/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Изменить</a></td><td><a href="/templates/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" download="">Резервная копия</a></td></tr>
<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='templateedit') {?>
<b>Редактирование шаблона</b><br />
<form method="post">
<textarea contenteditable="true" cols=130 name="templateedittext" rows=40 class="mceNoEditor"><?php echo $_smarty_tpl->tpl_vars['contentData']->value;?>
</textarea><br />
<input type=submit value="Редактировать">
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='templatelistServices') {?>
<h1>Список страниц шаблонов оплаты</h1>
<b>Делайте резервные копии шаблонов перед редактированием!</b>
<table>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td><td><a href="/admin/content/templateeditServices/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">Изменить</a></td><td><a href="/templates/services/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" download="">Резервная копия</a></td></tr>
<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='templateeditServices') {?>
<b>Редактирование шаблона</b><br />
<form method="post">
<textarea cols=130 name="templateedittext" rows=40 class="mceNoEditor"><?php echo $_smarty_tpl->tpl_vars['contentData']->value;?>
</textarea><br />
<input type=submit value="Редактировать">
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='one') {?>
ПОМОЩЬ
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listFeedback') {?>
<h1>Список отзывов</h1>
<table>
	<tr><th>Время</th><th>Имя</th><th>Email</th><th>Игра</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['key']->value>=0) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['gcap'];?>
</td><td><a href="/admin/content/edit_feedback/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактирование</a><a href="/admin/content/deleteFeedback/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> | Удалить</a></td>
	</tr>
	<tr><td colspan="3"><b>Отзыв :</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>
</td></tr>
	<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listNewFeedback') {?>
<?php if ($_smarty_tpl->tpl_vars['contentData']->value[0]['display']=='0') {?>
<h1>Новые отзывы</h1>
<table>
	<tr><th>Время</th><th>Имя</th><th>Email</th><th>Игра</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['key']->value>=0) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['gcap'];?>
</td><td><a href="/admin/content/edit_feedback/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактирование </a><a href="/admin/content/deleteFeedback/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> | Удалить</a></td><td><a href="/admin/content/resolveFeedback/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Одобрить</a></td>
	</tr>
	<tr><td colspan="3"><b>Отзыв :</b> <?php echo $_smarty_tpl->tpl_vars['item']->value['text_feedback'];?>
</td></tr>
	<?php } ?>
</table>
<?php } else { ?>
<h1>Новых отзывов нет</h1>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listUsers') {?>
<div class="modal" id="terms-of-service" style="display: none">
    <a href="#" class="close">×</a>
	<div id="cont"></div>
</div>
<script>
	// attach close button handler
	$('.modal .close').on('click', function(e){
		e.preventDefault();
		$.modal().close();
	});
</script>
<h1>Пользователи</h1>
<form class="search" action="/admin/content/usersSearch" method="post">
	<input type="search" name="q" size=30 placeholder="Введите email">
	<input class="search-btn" type="submit" value="Поиск">
</form>
<table>
	<tr><th>Email</th><th>Контакты</th><th>Реф. процент</th><th><a href="/admin/content/listUsers">Деньги</a></th><th><a href="/admin/content/listUsers/ref">Реферальные деньги</a></th><th>Действия</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']!=1) {?>
	<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td><td><a href="javascript:void(0);" onclick="$('#cont').html('Телефон: <?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<br><br>Skype: <?php echo $_smarty_tpl->tpl_vars['item']->value['skype'];?>
<br><br>ICQ: <?php echo $_smarty_tpl->tpl_vars['item']->value['icq'];?>
');$('#terms-of-service').modal().open();">Контакты</a></td><td><?php if ($_smarty_tpl->tpl_vars['item']->value['percent_ref']) {?><?php echo $_smarty_tpl->tpl_vars['item']->value['percent_ref'];?>
<?php } else { ?>5<?php }?>%</td><td><a href="/admin/content/listUsers"><?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
 руб.</a></td><td><?php if ($_smarty_tpl->tpl_vars['item']->value['money_ref']) {?><a href="/admin/content/listUsers/ref"><?php echo $_smarty_tpl->tpl_vars['item']->value['money_ref'];?>
 руб.</a> <a href="/admin/content/nullifyRef/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Обнулить</a> | <a href="/admin/content/historyRef/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">История рефералов</a> <?php }?></td><td><a href="/admin/content/listOrdersUser/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Список заказов </a><a href="/admin/content/edit_users/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">| Редактирование</a></td>
	</tr>
	<?php }?>
	<?php } ?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['still']->value)) {?>
<br><a href="/admin/content/listUsers<?php echo $_smarty_tpl->tpl_vars['param2']->value;?>
?count=<?php echo $_smarty_tpl->tpl_vars['still']->value;?>
"><button type="button">Еще пользователи</button></a>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listOrdersUser') {?>
	<?php if ($_smarty_tpl->tpl_vars['contentData']->value['orders'][0]['uid']==$_smarty_tpl->tpl_vars['contentData']->value['users']['id']) {?>
		<h1>Заказы пользователя</h1>
		<table>
			<tr><th>id</th><th>Заказ</th><th>Статус</th></tr>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
				<tr bgcolor="#f6f6f6">
			<?php } else { ?>
				<tr>
			<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
			</tr>
			<?php } ?>
		</table>
	<?php } else { ?>
		<h1>Заказов нет</h1>
	<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='search') {?>
<div class="modal" id="terms-of-service" style="display: none">
    <a href="#" class="close">×</a>
	<div id="cont"></div>
</div>
<script>
	// attach close button handler
	$('.modal .close').on('click', function(e){
		e.preventDefault();
		$.modal().close();
	});
</script>
<h1>Результаты</h1>
<table>
	<tr><th>Email</th><th>Контакты</th><th>Реф. процент</th><th><a href="/admin/content/listUsers">Деньги</a></th><th><a href="/admin/content/listUsers/ref">Реферальные деньги</a></th><th>Действия</th></tr>
	<?php if ($_smarty_tpl->tpl_vars['contentData']->value['id']!=1) {?>
	<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['contentData']->value['email'];?>
</td><td><a href="javascript:void(0);" onclick="$('#cont').html('Телефон: <?php echo $_smarty_tpl->tpl_vars['contentData']->value['phone'];?>
<br><br>Skype: <?php echo $_smarty_tpl->tpl_vars['contentData']->value['skype'];?>
<br><br>ICQ: <?php echo $_smarty_tpl->tpl_vars['contentData']->value['icq'];?>
');$('#terms-of-service').modal().open();">Контакты</a></td><td><?php if ($_smarty_tpl->tpl_vars['contentData']->value['percent_ref']) {?><?php echo $_smarty_tpl->tpl_vars['contentData']->value['percent_ref'];?>
<?php } else { ?>5<?php }?>%</td><td><?php echo $_smarty_tpl->tpl_vars['contentData']->value['money'];?>
 руб.</td><td><?php if ($_smarty_tpl->tpl_vars['contentData']->value['money_ref']) {?><?php echo $_smarty_tpl->tpl_vars['contentData']->value['money_ref'];?>
 руб.<a href="/admin/content/nullifyRef/<?php echo $_smarty_tpl->tpl_vars['contentData']->value['id'];?>
">Обнулить</a><?php }?></td><td><a href="/admin/content/listOrdersUser/<?php echo $_smarty_tpl->tpl_vars['contentData']->value['id'];?>
">Список заказов</a><a href="/admin/content/edit_users/<?php echo $_smarty_tpl->tpl_vars['contentData']->value['id'];?>
"> | Редактирование</a></td>
	</tr>
	<?php }?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='history') {?>
<h1>Рефералы</h1>
<table>
	<tr><th>Email</th><th>Заказы</th><th>Пл. система</th></tr>
	<?php if ($_smarty_tpl->tpl_vars['contentData']->value['id']!=1) {?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['cap_ord'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['payment'];?>
</td></tr>
	<?php } ?>
	<?php }?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='newphoto') {?>
<form method="post" enctype="multipart/form-data">
<h1>Добавление изображения</h1>
Фото:<br />
<input type="file" name="newelement_photo" /><br />
<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listphoto') {?>
<h1>Список изображений</h1>
<table>
 <tr><td colspan="2" style="color:red;">Отсортированы по возрастанию, последнее добавленное сверху</td></tr>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr><td><a href="/data/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a> | <a href="/admin/content/listphoto?del=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">удалить</a></td></tr>
<?php } ?>
</table>
<?php }?>

    <?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='newservicephoto') {?>
        <form method="post" enctype="multipart/form-data">
            <h1>Добавление иконки услуг</h1>
            Иконка:<br />
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Добавить</button>
        </form>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listservicephoto') {?>
        <h1>Иконки услуг</h1>
        <table>
            <tr><td colspan="2" style="color:red;">Отсортированы по возрастанию, последнее добавленное сверху</td></tr>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <tr><td><a href="/data/img-service/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a> | <a href="/admin/content/listservicephoto?del=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
">удалить</a></td></tr>
            <?php } ?>
        </table>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='newadvantagesphoto') {?>
        <form method="post" enctype="multipart/form-data">
            <h1>Добавление иконки преимуществ</h1>
            Заголовок: <br />
            <input type="text" name="caption"> <br />
            Иконка:<br />
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Добавить</button>
        </form>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='editadvantagesphoto') {?>
        <form method="post" enctype="multipart/form-data">
            <h1>Редактирование иконки преимуществ</h1>
            Заголовок: <br />
            <input type="text" name="caption" value="<?php if ($_smarty_tpl->tpl_vars['contentData']->value['caption']) {?><?php echo $_smarty_tpl->tpl_vars['contentData']->value['caption'];?>
<?php }?>"> <br />
            Иконка:<br />
            <?php if ($_smarty_tpl->tpl_vars['contentData']->value['photo']) {?>
                <img src="/<?php echo $_smarty_tpl->tpl_vars['contentData']->value['photo'];?>
" style="width:30px" /><br />
            <?php }?>
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Редактировать</button>
        </form>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listadvantagesphoto') {?>
        <h1>Иконки преимуществ</h1>
        <?php if ($_smarty_tpl->tpl_vars['contentData']->value) {?>
            <table>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <tr><td><a target="_blank" href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a> | <a href="/admin/content/editadvantagesphoto/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> | <a href="/admin/content/listadvantagesphoto?del=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td></tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            Тут пока ничего нет
        <?php }?>
        <br>
        <a href="/admin/content/newadvantagesphoto">Добавить</a>

    <?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit_name_admin') {?>
<h1>Настройки</h1>
<form method="post">
Имя админа в отзывах:
<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['first_name'];?>
" name="name" size="90" /><br />
<button type="submit">Изменить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit_feedback') {?>
<h2>Редактировать отзыв</h2>
<form method="post">
Отзыв: <textarea name="edit_feedback" rows="5" cols="100" class="mceNoEditor" ><?php echo $_smarty_tpl->tpl_vars['contentData']->value['text_feedback'];?>
</textarea><br /><br />
Ответ: <textarea name="edit_answer" rows="5" cols="100" class="mceNoEditor" ><?php echo $_smarty_tpl->tpl_vars['contentData']->value['answer'];?>
</textarea><br /><br />
<input type="submit" value="Редактировать">
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='withdrawal_of_money') {?>
<h1>Список заявок на вывод</h1>
<table>
	<tr><th>Пользователь</th><th>Выводимые деньги</th><th>Платежная система</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['key']->value>=0) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['purse'];?>
</td><td><a href="/admin/content/withdrawal_of_money/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Выполнен</a></td>
	</tr>
	<?php } ?>
</table>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit_users') {?>
<h2>Редактировать данные пользователя</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Реф. процент : </td>
			<td><input type="text" name="percent_ref" value="<?php if ($_smarty_tpl->tpl_vars['contentData']->value['percent_ref']) {?><?php echo $_smarty_tpl->tpl_vars['contentData']->value['percent_ref'];?>
<?php } else { ?>5<?php }?>" size=70 /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Платежная система : </td>
			<td><input type="radio" name="type_purse" <?php if ($_smarty_tpl->tpl_vars['contentData']->value['type_purse']=='qiwi') {?>checked<?php }?> value="qiwi" size=70 />Qiwi
			<input type="radio" name="type_purse" <?php if ($_smarty_tpl->tpl_vars['contentData']->value['type_purse']=='webmoney') {?>checked<?php }?> value="webmoney" size=70 />WebMoney
			<input type="radio" name="type_purse" <?php if ($_smarty_tpl->tpl_vars['contentData']->value['type_purse']=='yandexmoney') {?>checked<?php }?> value="yandexmoney" size=70 />Яндекс.Деньги</td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Номер кошелька : </td>
			<td><input type="text" name="score_purse" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['score_purse'];?>
" size=70 /></td>
		</tr>
	</table>	
	<input type="submit" value="Редактировать">
</form>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='list_menu_lk') {?>
<h1>Список страниц меню ЛК</h1>
<table>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['contentData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><a href="/admin/content/edit_menu_lk/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Изменить</a></td><td><a href="/admin/content/list_menu_lk?del=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td></tr>
<?php } ?>
</table>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='new_menu_lk') {?>
<h2>Добавить пункт</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Заголовок : </td>
			<td><input type="text" name="new_caption" size=70 /></td>
		</tr>
	</table>	
	<textarea name="new_content" rows="40" cols="100" ></textarea><br />
<input type="submit" value="Добавить">
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='edit_menu_lk') {?>
<h2>Редактировать пункт</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Заголовок : </td>
			<td><input type="text" name="edit_caption" size=70 value="<?php echo $_smarty_tpl->tpl_vars['data']->value['caption'];?>
" /></td>
		</tr>
	</table>	
	<textarea name="edit_content" rows="40" cols="100" ><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea><br />
<input type="submit" value="Редактировать">
</form>
<?php }?>

<?php }?>
<?php }} ?>
