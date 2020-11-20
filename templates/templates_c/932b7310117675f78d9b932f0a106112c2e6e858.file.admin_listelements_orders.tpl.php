<?php /* Smarty version Smarty-3.1.18, created on 2020-05-21 22:45:45
         compiled from "templates/admin_listelements_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20435848785ec6da697bafb7-43895791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '932b7310117675f78d9b932f0a106112c2e6e858' => 
    array (
      0 => 'templates/admin_listelements_orders.tpl',
      1 => 1589539959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20435848785ec6da697bafb7-43895791',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listData' => 0,
    'key' => 0,
    'item' => 0,
    'still' => 0,
    'formsMode' => 0,
    'searchData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5ec6da698c97f3_81744281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ec6da698c97f3_81744281')) {function content_5ec6da698c97f3_81744281($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'smarty/plugins/modifier.truncate.php';
?><div class="modal" id="terms-of-service" style="display: none">
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
<?php if ($_smarty_tpl->tpl_vars['listData']->value) {?>
<h1>Список заказов</h1>
<form class="search" action="/admin/forms/ordersSearch" method="post">
	<input type="search" name="q" size=30 placeholder="Введите номер заказа">
	<input class="search-btn" type="submit" value="Поиск">
</form>
<table>
<script>

function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}

</script>
<tr><td>id</td><td style="width:350px">Услуга</td><td>Время заказа</td><td>Сумма</td><td>e-mail</td><td>Статус</td><td style="width:150px">Поменять</td></tr>
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
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['caption'],127);?>
, <a href="javascript:void(0);" onclick="$('#terms-of-service #cont').html('<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['item']->value['data']);?>
');$('#terms-of-service').modal().open();">подробнее</a></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
<td><?php if ($_smarty_tpl->tpl_vars['item']->value['money']==-1) {?>По договоренности<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
<?php }?></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
<td>
<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Обрабатывается') {?>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['money']==-1) {?>
		<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Выполнен</a> | 
	<?php } else { ?>
		<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Оплачен</a> | 
	<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Оплачен, обрабатывается') {?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Выполнен</a>| <a style="text-decoration:underline;" href="/admin/forms/ordersError/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Ошибка</a> |  <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Возвращен</a> | 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Ошибка') {?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Выполнен</a>| <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Возвращен</a> | 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='Выполнен'&&$_smarty_tpl->tpl_vars['item']->value['money']!=-1) {?>
<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['status']=='Отменен'||$_smarty_tpl->tpl_vars['item']->value['status']=='Возвращен') {?>
<?php } else { ?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesCancel/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Отменен</a>
<?php }?>

</td>

<?php if (isset($_smarty_tpl->tpl_vars['listData']->value[$_smarty_tpl->tpl_vars['key']->value+1]['status'])&&($_smarty_tpl->tpl_vars['listData']->value[$_smarty_tpl->tpl_vars['key']->value+1]['status']!=$_smarty_tpl->tpl_vars['item']->value['status'])) {?>
<tr><td colspan=6>
<hr /></td></tr>
<?php }?>
</tr>
	<?php } ?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['still']->value)) {?>
<br><a href="/admin/forms/listOrders?count=<?php echo $_smarty_tpl->tpl_vars['still']->value;?>
"><button type="button">Еще заказы</button></a>
<?php }?>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['formsMode']->value=='search') {?>
<?php if ($_smarty_tpl->tpl_vars['searchData']->value['id']) {?>
<h1>Результаты</h1>

<table>
<script>

function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}

</script>
<tr><td>#</td><td style="width:350px">Услуга</td><td><nobr>Время заказа</nobr></td><td>Сумма</td><td>e-mail</td><td>Статус</td><td style="width:150px">Поменять</td></tr>

<?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)) {?>
<tr bgcolor="#f6f6f6">
<?php } else { ?>
<tr>
<?php }?>
<td><?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
</td>
<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['searchData']->value['caption'],127);?>
, <a href="#" onclick="$('#terms-of-service #cont').html('<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['searchData']->value['data']);?>
');$('#terms-of-service').modal().open();">подробнее</a></td>
<td><?php echo $_smarty_tpl->tpl_vars['searchData']->value['date'];?>
</td>
<td><?php if ($_smarty_tpl->tpl_vars['searchData']->value['money']==-1) {?>По договоренности<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['searchData']->value['money'];?>
<?php }?></td>
<td><?php echo $_smarty_tpl->tpl_vars['searchData']->value['email']['email'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['searchData']->value['status'];?>
</td>
<td>
<?php if ($_smarty_tpl->tpl_vars['searchData']->value['status']=='Обрабатывается') {?>
	<?php if ($_smarty_tpl->tpl_vars['searchData']->value['money']==-1) {?>
		<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Выполнен</a> | 
	<?php } else { ?>
		<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Оплачен</a> | 
	<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['searchData']->value['status']=='Оплачен, обрабатывается') {?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Выполнен</a> | <a style="text-decoration:underline;" href="/admin/forms/ordersError/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Ошибка</a> |<a style="text-decoration:underline;" href="/admin/forms/ordersReturned/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Возвращен</a> | 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['searchData']->value['status']=='Ошибка') {?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Выполнен</a> | <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Возвращен</a> | 
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['searchData']->value['status']=='Выполнен'&&$_smarty_tpl->tpl_vars['searchData']->value['money']!=-1) {?>
<?php } elseif ($_smarty_tpl->tpl_vars['searchData']->value['status']=='Отменен'||$_smarty_tpl->tpl_vars['searchData']->value['status']=='Возвращен') {?>
<?php } else { ?>
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesCancel/<?php echo $_smarty_tpl->tpl_vars['searchData']->value['id'];?>
">Отменен</a>
<?php }?>

</td>
<?php if (isset($_smarty_tpl->tpl_vars['searchData']->value[$_smarty_tpl->tpl_vars['key']->value+1]['status'])&&($_smarty_tpl->tpl_vars['searchData']->value[$_smarty_tpl->tpl_vars['key']->value+1]['status']!=$_smarty_tpl->tpl_vars['searchData']->value['status'])) {?>
<tr><td colspan=6>
<hr /></td></tr>
<?php }?>
</tr>

</table>
<?php } else { ?>
<h1>Результатов нет</h1>
<?php }?>
<?php }?><?php }} ?>
