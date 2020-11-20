<?php /* Smarty version Smarty-3.1.18, created on 2020-05-21 22:46:21
         compiled from "templates/admin_promo_code.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19369927645ec6da8d5bf5b3-46151093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4ab40167083bcac56a1d076eff50aed390ffc5' => 
    array (
      0 => 'templates/admin_promo_code.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19369927645ec6da8d5bf5b3-46151093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mode' => 0,
    'page_data' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec6da8d6a38b5_17048431',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec6da8d6a38b5_17048431')) {function content_5ec6da8d6a38b5_17048431($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['mode']->value=='list') {?>
<h1>Список вопросов</h1>
<table>
	<tr><th>Промокод</th><th>До</th><th>Размер</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
	<tr bgcolor="#f6f6f6">
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
</td><td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['date_end'],"%d.%m.%Y");?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['discount_size'];?>
%</td><td><a href="/admin/forms/edit_promo_code/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td><td><a href="/admin/forms/delete_promo_code/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
	</tr>
	<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mode']->value=='new_promo_code') {?>
<form method="post">
	<h1>Новый промокод</h1>
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Размер скидки (проценты) : </td>
			<td><input type="text" name="new_discount_size" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Дата окончания (дата должна быть вида день.месяц.год Пример: 07.04.2015) : </td>
			<td><input type="text" name="new_date_end" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Введите код : </td>
			<td><input type="text" name="new_code" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Выберите игру : </td>
			<td>
			<?php if (isset($_smarty_tpl->tpl_vars['page_data']->value[0]['id'])) {?>
				<select name="new_gid">
					<option value="0">Все</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
					<?php } ?>
				</select>
			<?php }?>
			</td>
		</tr>
	</table>
	<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['mode']->value=='edit_promo_code') {?>
<form method="post">
	<h1>Новый промокод</h1>
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Размер скидки (проценты) : </td>
			<td><input type="text" name="edit_discount_size" size="70" value="<?php echo $_smarty_tpl->tpl_vars['page_data']->value['pc']['discount_size'];?>
" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Дата окончания (дата должна быть вида день.месяц.год Пример: 07.04.2015) : </td>
			<td><input type="text" name="edit_date_end" size="70" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['page_data']->value['pc']['date_end'],'%d.%m.%Y');?>
" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Введите код : </td>
			<td><input type="text" name="edit_code" size="70" value="<?php echo $_smarty_tpl->tpl_vars['page_data']->value['pc']['code'];?>
" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Выберите игру : </td>
			<td>
			<?php if (isset($_smarty_tpl->tpl_vars['page_data']->value['games'][0]['id'])) {?>
				<select name="edit_gid">
					<option <?php if ($_smarty_tpl->tpl_vars['page_data']->value['pc']['gid']==0) {?> selected <?php }?> value="0">Все</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['page_data']->value['games']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['page_data']->value['pc']['gid']) {?> selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</option>
					<?php } ?>
				</select>
			<?php }?>
			</td>
		</tr>
	</table>
	<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
