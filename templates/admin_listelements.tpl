{if isset($listData)}
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
{foreach key=key from=$listData item=item}
{if $key is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
	{foreach key=key1 from=$item item=item1}
		<td style="padding:3px">{$item1}</td>
 	{/foreach}
 	<td style="padding:3px"><a href="/admin/{$moduleEname}/{if isset($methodName)}{$methodName}{else}elementEdit{/if}/{$item.id}">Редактировать</a></td>
	{if $item.id > 3}
		<td style="padding:3px"> | Адрес страницы: content/view/{$item.id}</td>
	{/if}
{/foreach}
</tr>
<tr></tr>
<tr></tr>
<tr><td colspan=3><form action="/admin/content/elementNew"><input type="submit" value="Добавить страницу"></form></td></tr>
</table>
{/if}