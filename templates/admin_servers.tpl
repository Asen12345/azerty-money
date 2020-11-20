{if $serversMode=='list'}
<h1>Список серверов</h1>
{if isset($serversData.0.id)}
	{foreach key=k item=i from=$serversData}
		{if isset($i.services.0.id)}
		<b>{$i.caption}</b><br><br>
			{foreach key=k2 item=i2 from=$i.services}
				{if isset($i2.servers.0.id)}
				<div style="margin-left:20px;">
				<b>{$i2.caption}</b><br>
				<form method="post">
				<table>
					<tr><th>№</th><th>Заголовок</th><th>Сортировка</th><th>Действие</th></tr>
					{foreach key=key item=item from=$i2.servers}
					{if $key is even}
					<tr bgcolor="#f6f6f6">
					{else}
					<tr>
					{/if}
					<td>{$key+1}</td><td>{$item.caption}</td><td><input type="text" name="sort_server[{$item.id}]" style="width:70px" value="{$item.sort}"></td><td><a href="/admin/forms/editServers/{$item.id}">Редактировать</a> <a href="/admin/forms/deleteServers/{$item.id}">Удалить</a></td></tr>
					{/foreach}
				</table>
				<br>
				<button type="submit">Сохранить сортировку</button>
				</form>
				<br>
				<br>
				</div>
				{/if}
			{/foreach}
		{/if}
	{/foreach}
{/if}
{/if}
{if $serversMode=='serversNew'}
<form method="post" enctype="multipart/form-data">
<h1>Добавление сервера</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Сервер : </td>
  <td><input type="text" name="servers_name" size="70"  /></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="services_type">
  {foreach key=key item=item from=$serversData}
	<option value="{$item.id}" >{$item.caption} -> {$item.game_caption}</option>
  {/foreach}
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
{/if}
{if $serversMode=='serversEdit'}
<form method="post" enctype="multipart/form-data">
<h1>Редактирование сервера</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Сервер : </td>
  <td><input type="text" name="servers_name" size="70" value="{$serversData.0.caption}" /></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="services_type">
  {foreach key=key item=item from=$serversData.services}
	<option value="{$item.id}" {if $serversData.0.services==$item.id}selected{/if}>{$item.caption}->{$item.game_caption}</option>
  {/foreach}
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Коэффициент : </td>
  <td><input type="text" name="servers_coef" size="70" value="{$serversData.0.coef}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Применить цену ко всем серверам : </td>
  <td><input type="checkbox" name="servers_all_price" size="70" /></td></tr>
</table>

<button type="submit">Редактировать</button>
</form>
{/if}