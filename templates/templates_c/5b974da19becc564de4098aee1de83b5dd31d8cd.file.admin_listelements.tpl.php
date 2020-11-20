<?php /* Smarty version Smarty-3.1.18, created on 2020-05-15 17:31:37
         compiled from "templates/admin_listelements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2111827515ebea7c9474704-86225234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b974da19becc564de4098aee1de83b5dd31d8cd' => 
    array (
      0 => 'templates/admin_listelements.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2111827515ebea7c9474704-86225234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listData' => 0,
    'key' => 0,
    'item' => 0,
    'item1' => 0,
    'moduleEname' => 0,
    'methodName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebea7c94b3797_75084725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebea7c94b3797_75084725')) {function content_5ebea7c94b3797_75084725($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['listData']->value)) {?>
<table>
<script>

function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}

</script>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
<tr bgcolor="#f6f6f6">
<?php } else { ?>
<tr>
<?php }?>
	<?php  $_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item1']->_loop = false;
 $_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->key => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
 $_smarty_tpl->tpl_vars['key1']->value = $_smarty_tpl->tpl_vars['item1']->key;
?>
		<td style="padding:3px"><?php echo $_smarty_tpl->tpl_vars['item1']->value;?>
</td>
 	<?php } ?>
 	<td style="padding:3px"><a href="/admin/<?php echo $_smarty_tpl->tpl_vars['moduleEname']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['methodName']->value)) {?><?php echo $_smarty_tpl->tpl_vars['methodName']->value;?>
<?php } else { ?>elementEdit<?php }?>/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']>3) {?>
		<td style="padding:3px"> | Адрес страницы: content/view/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
	<?php }?>
<?php } ?>
</tr>
<tr></tr>
<tr></tr>
<tr><td colspan=3><form action="/admin/content/elementNew"><input type="submit" value="Добавить страницу"></form></td></tr>
</table>
<?php }?><?php }} ?>
