<?php /* Smarty version Smarty-3.1.18, created on 2020-05-22 11:54:32
         compiled from "templates/admin_title.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9562933095ec7934863eaa8-74108283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fab34518970a6c29fe7fea1a2911a5fc087f218e' => 
    array (
      0 => 'templates/admin_title.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9562933095ec7934863eaa8-74108283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contentMode' => 0,
    'contentData' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec79348665d04_53566946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec79348665d04_53566946')) {function content_5ec79348665d04_53566946($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listTitle') {?>
<h1>Список тайтлов</h1>
<table>
	<tr><th>№</th><th>Тайтл</th><th>Действие</th></tr>
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
	<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td><td><a href="/admin/content/edittitle/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td><td><a href="/admin/content/deletetitle/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
	</tr>
	<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='elementTitleNew') {?>
<form method="post">
<h1>Новый тайтл</h1>
  <table>
  <tr><td colspan="2" style="color:red;">Урл вписывается без слэша</td></tr>
  <tr background="/img/tab2bg.jpg"><td>Урл : </td>
  <td><input type="text" name="new_link" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="new_title" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="new_description" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="new_keywords" size="70"  /></td></tr>
  </table>
<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='editTitle') {?>
<form method="post">
<h1>Редактировать тайтл</h1>
  <table>
  <tr><td colspan="2" style="color:red;">Урл вписывается без слэша</td></tr>
  <tr background="/img/tab2bg.jpg"><td>Урл : </td>
  <td><input type="text" name="edit_link" size="70" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['link'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="edit_title" size="70" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['title'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="edit_description" size="70" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['description'];?>
" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="edit_keywords" size="70" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['keywords'];?>
" /></td></tr>
  </table>
<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
