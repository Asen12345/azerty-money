<?php /* Smarty version Smarty-3.1.18, created on 2020-05-22 18:22:43
         compiled from "templates/admin_faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18014324755ec5cbd3e1c8e9-57490812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0423868f463fad27431b2ea06c51e478a6819756' => 
    array (
      0 => 'templates/admin_faq.tpl',
      1 => 1590160962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18014324755ec5cbd3e1c8e9-57490812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec5cbd3ee5158_96380776',
  'variables' => 
  array (
    'contentMode' => 0,
    'contentData' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec5cbd3ee5158_96380776')) {function content_5ec5cbd3ee5158_96380776($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='listFaq') {?>
<h1>Список вопросов</h1>
<table>
	<tr><th>Вопрос</th><th>Действие</th></tr>
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
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['question'];?>
</td><td><a href="/admin/content/editFaq/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a></td><td><a href="/admin/content/deleteFaq/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
	</tr>
	<?php } ?>
</table>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='elementFaqNew') {?>
<form method="post">
<h1>Новый вопрос</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Категория : </td>
  <td><input type="text" name="new_category" size="70"  /></td></tr>
  </table>
 Вопрос:<br />
<textarea name="new_question" class="mceNoEditor" cols=110 rows=15></textarea><br /><br />
 Ответ:<br />
<textarea name="new_answer" class="mceNoEditor" cols=110 rows=15></textarea><br /><br />
<button type="submit">Добавить</button>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['contentMode']->value=='editFaq') {?>
<form method="post">
<h1>Редактировать вопрос</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Категория : </td>
  <td><input type="text" name="edit_category" size="70" value="<?php echo $_smarty_tpl->tpl_vars['contentData']->value['category'];?>
" /></td></tr>
  </table>
 Вопрос:<br />
<textarea name="edit_question" class="mceNoEditor" cols=110 rows=15><?php echo $_smarty_tpl->tpl_vars['contentData']->value['question'];?>
</textarea><br /><br />
 Ответ:<br />
<textarea name="edit_answer" class="mceNoEditor" cols=110 rows=15><?php echo $_smarty_tpl->tpl_vars['contentData']->value['answer'];?>
</textarea><br /><br />
<button type="submit">Редактировать</button>
</form>
<?php }?><?php }} ?>
