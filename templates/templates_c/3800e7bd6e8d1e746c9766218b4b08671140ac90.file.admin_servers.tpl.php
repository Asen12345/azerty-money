<?php /* Smarty version Smarty-3.1.18, created on 2020-05-22 13:21:54
         compiled from "templates/admin_servers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3092000005ec7a7c21c3cd0-99348866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3800e7bd6e8d1e746c9766218b4b08671140ac90' => 
    array (
      0 => 'templates/admin_servers.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3092000005ec7a7c21c3cd0-99348866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'serversMode' => 0,
    'serversData' => 0,
    'i' => 0,
    'i2' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec7a7c22bfcd2_91103104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec7a7c22bfcd2_91103104')) {function content_5ec7a7c22bfcd2_91103104($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['serversMode']->value=='list') {?>
<h1>Список серверов</h1>
<?php if (isset($_smarty_tpl->tpl_vars['serversData']->value[0]['id'])) {?>
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['serversData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['i']->value['services'][0]['id'])) {?>
		<b><?php echo $_smarty_tpl->tpl_vars['i']->value['caption'];?>
</b><br><br>
			<?php  $_smarty_tpl->tpl_vars['i2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i2']->_loop = false;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i2']->key => $_smarty_tpl->tpl_vars['i2']->value) {
$_smarty_tpl->tpl_vars['i2']->_loop = true;
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['i2']->key;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['i2']->value['servers'][0]['id'])) {?>
				<div style="margin-left:20px;">
				<b><?php echo $_smarty_tpl->tpl_vars['i2']->value['caption'];?>
</b><br>
				<form method="post">
				<table>
					<tr><th>№</th><th>Заголовок</th><th>Сортировка</th><th>Действие</th></tr>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i2']->value['servers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
					<tr bgcolor="#f6f6f6">
					<?php } else { ?>
					<tr>
					<?php }?>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><input type="text" name="sort_server[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" style="width:70px" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
"></td><td><a href="/admin/forms/editServers/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> <a href="/admin/forms/deleteServers/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td></tr>
					<?php } ?>
				</table>
				<br>
				<button type="submit">Сохранить сортировку</button>
				</form>
				<br>
				<br>
				</div>
				<?php }?>
			<?php } ?>
		<?php }?>
	<?php } ?>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['serversMode']->value=='serversNew') {?>
<form method="post" enctype="multipart/form-data">
<h1>Добавление сервера</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Сервер : </td>
  <td><input type="text" name="servers_name" size="70"  /></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="services_type">
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['serversData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
 -> <?php echo $_smarty_tpl->tpl_vars['item']->value['game_caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Коэффициент : </td>
  <td><input type="text" name="servers_coef" size="70" /></td></tr>
  <tr><td colspan="2" style="color:red;">Коэффициент рассчитывается по формуле: валюта / рубли. Важно! При добавлении нецелого числа в поле "Коэффициент" целая часть отделяется от остаточной точкой. </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Применить цену ко всем серверам : </td>
  <td><input type="checkbox" name="servers_all_price" size="70" /></td></tr>
  
</table>

<button type="submit">Добавить</button>
</form>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['serversMode']->value=='serversEdit') {?>
<form method="post" enctype="multipart/form-data">
<h1>Редактирование сервера</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Сервер : </td>
  <td><input type="text" name="servers_name" size="70" value="<?php echo $_smarty_tpl->tpl_vars['serversData']->value[0]['caption'];?>
" /></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="services_type">
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['serversData']->value['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['serversData']->value[0]['services']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
-><?php echo $_smarty_tpl->tpl_vars['item']->value['game_caption'];?>
</option>
  <?php } ?>
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Коэффициент : </td>
  <td><input type="text" name="servers_coef" size="70" value="<?php echo $_smarty_tpl->tpl_vars['serversData']->value[0]['coef'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Применить цену ко всем серверам : </td>
  <td><input type="checkbox" name="servers_all_price" size="70" /></td></tr>
</table>

<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
