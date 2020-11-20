<?php /* Smarty version Smarty-3.1.18, created on 2020-05-25 18:00:18
         compiled from "templates/admin_games.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2504663555ec6d6902b88a8-07759717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8feee9366090117bae0e56b68093893787387e2b' => 
    array (
      0 => 'templates/admin_games.tpl',
      1 => 1590418813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2504663555ec6d6902b88a8-07759717',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec6d690360536_16625752',
  'variables' => 
  array (
    'gamesMode' => 0,
    'gamesData' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec6d690360536_16625752')) {function content_5ec6d690360536_16625752($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['gamesMode']->value=='list') {?>
<h1>Список игр</h1>
<form method="post">
	<table>
		<tr><th><a href="/admin/forms/listGames?sort=caption">Заголовок</a></th><th><a href="/admin/forms/listGames?sort=sort">Рейтинг</a></th><th>Действие</th></tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gamesData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
		<tr bgcolor="#f6f6f6">
		<?php } else { ?>
		<tr>
		<?php }?>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><input type="text" style="width:70px;" name="sorting[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
"></td><td><a href="/admin/forms/editGames/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> <a href="/admin/forms/deleteGames/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td></tr>
		<?php } ?>
	</table>
	<br>
	<button type="submit">Сохранить сортировку</button>
</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['gamesMode']->value=='gamesNew') {?>
<form method="post" enctype="multipart/form-data">
<h1>Добавление игры</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Игра : </td>
  <td><input type="text" name="games_name" size="70"  /></td></tr>
  <tr><td>На главную</td>
  <td>
  <select name="games_popular">
	<option value="0" >Нет</option>
	<option value="1" >Да</option>
  </select>
  </td></tr>
      <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании игры!</td></tr>
</table>
    Описание:<br />
    <textarea name="games_atext" cols=110 rows=15></textarea><br />
Фото:<br />
<input type="file" name="games_photo" /><br />
Фото отзывов:<br />
<input type="file" name="feedback_photo" /><br />

<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['gamesMode']->value=='gamesEdit') {?>
<form method="post" enctype="multipart/form-data">
<h1>Редактирование игры</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Игра : </td>
  <td><input type="text" name="games_name" size="70" value="<?php echo $_smarty_tpl->tpl_vars['gamesData']->value['caption'];?>
" /></td></tr>
  <tr><td>На главную</td>
  <td>
  <select name="games_popular">
	<option value="0" <?php if ($_smarty_tpl->tpl_vars['gamesData']->value['popular']==0) {?>selected<?php }?>>Нет</option>
	<option value="1" <?php if ($_smarty_tpl->tpl_vars['gamesData']->value['popular']==1) {?>selected<?php }?>>Да</option>
  </select>



  <tr background="/img/tab2bg.jpg"><td>Родительская категория:(вписывать заголовок) </td>
    <td><input type="text" name="games_parent" size="70" <?php if (isset($_smarty_tpl->tpl_vars['gamesData']->value['parent_name'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['gamesData']->value['parent_name'];?>
"<?php }?> /></td></tr>






  <tr background="/img/tab2bg.jpg"><td>Адрес страницы : </td>
      <td><input type="text" name="games_url" size="70" <?php if (isset($_smarty_tpl->tpl_vars['gamesData']->value['link'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['gamesData']->value['link'];?>
"<?php }?> /></td></tr>
  <tr><td colspan="2" style="color:red;">Поле адрес не стоит трогать,если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>

      </td></tr>
</table>
Описание:<br />
<textarea name="games_atext" cols=110 rows=15><?php if (isset($_smarty_tpl->tpl_vars['gamesData']->value['about'])) {?><?php echo $_smarty_tpl->tpl_vars['gamesData']->value['about'];?>
<?php }?></textarea><br />
Фото:<br />
<?php if ($_smarty_tpl->tpl_vars['gamesData']->value['photo']) {?>
<img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['gamesData']->value['photo'];?>
" style="width:160px" /><br />
<?php }?>
<input type="file" name="games_photo" /><br /><br />
Фото отзывов:<br />
<?php if ($_smarty_tpl->tpl_vars['gamesData']->value['photo_feedback']) {?>
<img src="/data/photo/<?php echo $_smarty_tpl->tpl_vars['gamesData']->value['photo_feedback'];?>
" style="width:100px" /><br />
<?php }?>
<input type="file" name="feedback_photo" /><br /><br />


<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
