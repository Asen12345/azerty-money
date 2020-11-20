{if isset($fileMode)}
{if $fileMode=='new'}
<form method="post" enctype="multipart/form-data">
<h2>Загрузить файл</h2>
<b>Заголовок : </b><br />
<input type="text" size=60 name="file_newelement_caption" /><br />
<input type="file" name="file_newelement_file" /><br />
<input type="submit" value="Загрузить">
</form>
{/if}
{if $fileMode=='edit'}
<form method="post" enctype="multipart/form-data">
<h2>Редактировать информацию о файле</h2>
<b>Заголовок : </b><br />
<input type="text" size=60 name="file_editelement_caption" value="{$fileData.caption|escape}" /><br />
<input type="submit" value="Редактировать">
</form>
{/if}
{if $fileMode=='list'}
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
{foreach key=key from=$fileData item=item}
{if $key is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
	{foreach key=key1 from=$item item=item1}
		<td style="padding:3px">{$item1}</td>
 	{/foreach}
 	<td style="padding:3px"><a  href="/../admin/file/elementEdit/{$item.id}">Редактировать</a></td>
 	<td style="padding:3px"><a onclick="return confirmSubmit()" href="/admin/file/deleteElement/{$item.id}">Удалить</a></td>
</tr>
{/foreach}
</table>
{/if}
{/if}