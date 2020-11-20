{if isset($docsMode)}
{literal}
  <script language="javascript">
function add_input(obj)
{
var new_input=document.createElement('div');
new_input.innerHTML='<input type="file" name="attachedFiles[]">';
new_input.innerHTML+='<input type="text" name="attachedFilesCaption[]">';
new_input.innerHTML=new_input.innerHTML+'<input type="button" value="+" onclick="add_input(this.parentNode)">';
new_input.innerHTML=new_input.innerHTML+'<input type="button" value="-" onclick="del_input(this.parentNode)">';
if (obj.nextSibling)
    document.getElementById('attachedFiles').insertBefore(new_input,obj.nextSibling)
else document.getElementById('attachedFiles').appendChild(new_input);
}
function del_input(obj)
{
document.getElementById('attachedFiles').removeChild(obj)
}
</script>
{/literal}
{if $docsMode=='new'}
<form method="post" enctype="multipart/form-data">
<h2>Новые Документы</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="docs_newelement_caption" size="70" /></td></tr>
</table>
Дата: 
{html_select_date start_year='-20' reverse_years='true'}<br /><br />
Описание документов: <br />
	<textarea name="docs_newelement_text" rows="40" cols="120" ></textarea><br />

<h2>Прикрепить файлы:</h2>
<div id="attachedFiles">
<div>
    <input type="file" name="attachedFiles[]" />
    <input type="text" name="attachedFilesCaption[]" />
    <input type="button" value="+" onclick="add_input(this.parentNode)" />
</div>
</div>

  <br />
<br />
<input type="submit" value="Создать" />
</form>
{/if}

{if $docsMode=='edit'}
<form method="post" enctype="multipart/form-data">
<!--<h2>Редактировать Документы</h2>-->
<input type="hidden" name="docs_editelement_id" value="{$docsData.data.id}" />
<!--  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="docs_editelement_caption" value="{$docsData.data.caption|escape}" size="70" /></td></tr>
</table>	
Дата: 
{html_select_date start_year='-20' reverse_years='true' time=$docsData.data.date}<br /><br />
Описание документов: <br />
<textarea name="docs_editelement_text" rows="40" cols="120" >{$docsData.data.text}</textarea><br />-->
{if isset($docsData.files)}
<script>
{literal}
function confirmSubmit()
{
var otvet=confirm("Вы действительно хотите удалить элемент?");
  return otvet;
}
{/literal}
</script>
<!--<h2>Прикрепленные файлы:</h2>-->
<h2>Документы:</h2>
<table>
{foreach from=$docsData.files key = fk item = fi}
{if $fk is even}
<tr bgcolor="#f6f6f6">
{else}
<tr>
{/if}
    <td><a href="/file/view/{$fi.id}">{$fi.file}</a></td><td><a onclick="return confirmSubmit()" href="/admin/file/deleteElement/{$fi.id}">удалить файл</a></td>
</tr>
{/foreach}
</table>
{/if}
<!--<h2>Прикрепить файлы:</h2>-->
<h2>Загрузить документы:</h2>
<div id="attachedFiles">
<div>
    <input type="file" name="attachedFiles[]" />
    <input type="text" name="attachedFilesCaption[]" />
    <input type="button" value="+" onclick="add_input(this.parentNode)" />
</div>
</div>

  <br />
<br />
<input type="submit" value="Редактировать" />
</form>
{/if}
{/if}
