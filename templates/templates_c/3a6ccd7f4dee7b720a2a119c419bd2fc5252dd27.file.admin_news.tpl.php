<?php /* Smarty version Smarty-3.1.18, created on 2020-05-16 07:02:57
         compiled from "templates/admin_news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1166594315ebf65f1499790-72404636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6ccd7f4dee7b720a2a119c419bd2fc5252dd27' => 
    array (
      0 => 'templates/admin_news.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1166594315ebf65f1499790-72404636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsMode' => 0,
    'newsData' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ebf65f152a611_77444654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ebf65f152a611_77444654')) {function content_5ebf65f152a611_77444654($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_date')) include 'smarty/plugins/function.html_select_date.php';
?><?php if (isset($_smarty_tpl->tpl_vars['newsMode']->value)) {?>
<?php if ($_smarty_tpl->tpl_vars['newsMode']->value=='listNews') {?>
<h1>Список новостей</h1>
<table>
	<tr><th>Время</th><th>Заголовок</th><th>Действие</th></tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newsData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
	<tr bgcolor="#f6f6f6">
	<?php } else { ?>
	<tr>
	<?php }?>
	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</td><td><a href="/admin/news/elementEdit/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Редактировать</a> <a href="/admin/news/deleteNews/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Удалить</a></td>
	</tr>
	<?php } ?>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['newsMode']->value=='new') {?>
<form method="post" enctype="multipart/form-data">
<h2>Новая новость</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="news_newelement_caption" size="70" /></td></tr>
</table>
Дата: 
<?php echo smarty_function_html_select_date(array('start_year'=>'-20','reverse_years'=>'true'),$_smarty_tpl);?>
<br />
Анонс: <br />
	<textarea name="news_newelement_preview" rows="20" cols="120" ></textarea><br />
Полная новость: <br />
	<textarea name="news_newelement_ntext" rows="40" cols="120" ></textarea><br />

Фото:<br />
<input type="file" name="news_photo" /><br />
<input type="submit" value="Создать новость" />
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['newsMode']->value=='edit') {?>
<form method="post" enctype="multipart/form-data">
<h2>Редактировать новость</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="news_editelement_caption" value="<?php echo $_smarty_tpl->tpl_vars['newsData']->value['caption'];?>
" size="70" /></td></tr>
</table>	
Дата: 
<?php echo smarty_function_html_select_date(array('start_year'=>'-20','reverse_years'=>'true','time'=>$_smarty_tpl->tpl_vars['newsData']->value['data']),$_smarty_tpl);?>
<br />
Анонс: <br />
<textarea name="news_editelement_preview" rows="20" cols="120" ><?php echo $_smarty_tpl->tpl_vars['newsData']->value['preview'];?>
</textarea><br />
Полная новость: <br />
<textarea name="news_editelement_ntext" rows="40" cols="120" ><?php echo $_smarty_tpl->tpl_vars['newsData']->value['ntext'];?>
</textarea><br /> 
Фото:<br />
<?php if ($_smarty_tpl->tpl_vars['newsData']->value['photo']) {?>
<img src="/data/img/news/<?php echo $_smarty_tpl->tpl_vars['newsData']->value['photo'];?>
" style="width:200px" /><br />
<?php }?>
<input type="file" name="news_photo" /><br /><br />
<input type="submit" value="Редактировать" />
</form>
<?php }?>
<?php }?>
<?php }} ?>
