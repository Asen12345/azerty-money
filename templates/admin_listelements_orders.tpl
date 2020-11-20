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
{if $listData}
<h1>Список заказов</h1>
<form class="search" action="/admin/forms/ordersSearch" method="post">
	<input type="search" name="q" size=30 placeholder="Введите номер заказа">
	<input class="search-btn" type="submit" value="Поиск">
</form>
<table>
<script>
{literal}
function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}
{/literal}
</script>
<tr><td>id</td><td style="width:350px">Услуга</td><td>Время заказа</td><td>Сумма</td><td>e-mail</td><td>Статус</td><td style="width:150px">Поменять</td></tr>
{foreach key=key from=$listData item=item}
{if $key is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
<td>{$item.id}</td>
<td>{$item.caption|truncate:127}, <a href="javascript:void(0);" onclick="$('#terms-of-service #cont').html('{$item.data|escape:'quotes'}');$('#terms-of-service').modal().open();">подробнее</a></td>
<td>{$item.date}</td>
<td>{if $item.money==-1}По договоренности{else}{$item.money}{/if}</td>
<td>{$item.email}</td>
<td>{$item.status}</td>
<td>
{if $item.status == 'Обрабатывается'}
	{if $item.money == -1}
		<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/{$item.id}">Выполнен</a> | 
	{else}
		<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/{$item.id}">Оплачен</a> | 
	{/if}
{/if}
{if $item.status == 'Оплачен, обрабатывается'}
	<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/{$item.id}">Выполнен</a>| <a style="text-decoration:underline;" href="/admin/forms/ordersError/{$item.id}">Ошибка</a> |  <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/{$item.id}">Возвращен</a> | 
{/if}
{if $item.status == 'Ошибка'}
	<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/{$item.id}">Выполнен</a>| <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/{$item.id}">Возвращен</a> | 
{/if}
{if $item.status == 'Выполнен' and $item.money != -1}
{elseif $item.status == 'Отменен' or $item.status == 'Возвращен'}
{else}
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesCancel/{$item.id}">Отменен</a>
{/if}

</td>
{*************
{if $item.comment}
<tr><td></td><td colspan=5 style="color:green;">Комментарий: {$item.comment}</td></tr>
{/if}
*************}
{if isset($listData[$key+1].status) and ($listData[$key+1].status != $item.status)}
<tr><td colspan=6>
<hr /></td></tr>
{/if}
</tr>
	{/foreach}
</table>
{if isset($still)}
<br><a href="/admin/forms/listOrders?count={$still}"><button type="button">Еще заказы</button></a>
{/if}
{/if}



{if $formsMode == 'search'}
{if $searchData.id}
<h1>Результаты</h1>

<table>
<script>
{literal}
function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}
{/literal}
</script>
<tr><td>#</td><td style="width:350px">Услуга</td><td><nobr>Время заказа</nobr></td><td>Сумма</td><td>e-mail</td><td>Статус</td><td style="width:150px">Поменять</td></tr>

{if $key is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
<td>{$searchData.id}</td>
<td>{$searchData.caption|truncate:127}, <a href="#" onclick="$('#terms-of-service #cont').html('{$searchData.data|escape:'quotes'}');$('#terms-of-service').modal().open();">подробнее</a></td>
<td>{$searchData.date}</td>
<td>{if $searchData.money==-1}По договоренности{else}{$searchData.money}{/if}</td>
<td>{$searchData.email.email}</td>
<td>{$searchData.status}</td>
<td>
{if $searchData.status == 'Обрабатывается'}
	{if $searchData.money == -1}
		<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/{$searchData.id}">Выполнен</a> | 
	{else}
		<a style="text-decoration:underline;" href="/admin/forms/ordersExecute/{$searchData.id}">Оплачен</a> | 
	{/if}
{/if}
{if $searchData.status == 'Оплачен, обрабатывается'}
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/{$searchData.id}">Выполнен</a> | <a style="text-decoration:underline;" href="/admin/forms/ordersError/{$searchData.id}">Ошибка</a> |<a style="text-decoration:underline;" href="/admin/forms/ordersReturned/{$searchData.id}">Возвращен</a> | 
{/if}
{if $searchData.status == 'Ошибка'}
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesExecute/{$searchData.id}">Выполнен</a> | <a style="text-decoration:underline;" href="/admin/forms/ordersReturned/{$searchData.id}">Возвращен</a> | 
{/if}
{if $searchData.status == 'Выполнен' and $searchData.money != -1}
{elseif $searchData.status == 'Отменен' or $searchData.status == 'Возвращен'}
{else}
	<a style="text-decoration:underline;" href="/admin/forms/ordersServicesCancel/{$searchData.id}">Отменен</a>
{/if}

</td>
{if isset($searchData[$key+1].status) and ($searchData[$key+1].status != $searchData.status)}
<tr><td colspan=6>
<hr /></td></tr>
{/if}
</tr>

</table>
{else}
<h1>Результатов нет</h1>
{/if}
{/if}