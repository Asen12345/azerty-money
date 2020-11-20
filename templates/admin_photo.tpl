{if isset($photoMode)}
{if $photoMode=='listelements'}
{if isset($listData)}
<b>Загруженные фото: </b><br />
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
{if $listData.0.id}
{foreach key=key from=$listData item=item}
{if $key is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
	<td><a href="/data/photo/{$item.filename}"><img src="/data/photo/{if is_numeric($item.filename[0]) }m{/if}{$item.filename}" /></a></td>
 	<td>
	<a href="/data/photo/{$item.filename}">Большое изображение</a><br />
    {if is_numeric($item.filename[0])}
	<a href="/data/photo/m{$item.filename}">Уменьшенное изображение</a>
    {/if}
	 </td>
 	<td style="padding:3px"><a onclick="return confirmSubmit()" href="/admin/{$moduleEname}/deleteElement/{$item.id}">Удалить</a></td>
{/foreach}
{/if}
</table>
{/if}
{/if}

{if $photoMode=='new'}
<form method="post" ENCTYPE="multipart/form-data">
<h2>Загрузить фото</h2>
  <input type="file" name="photoFile" />
  <input type="submit" value="Загрузить" />  
</form>
{/if}

{/if}
