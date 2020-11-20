{if $contentMode=='listTitle'}
<h1>Список тайтлов</h1>
<table>
	<tr><th>№</th><th>Тайтл</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$key+1}</td><td>{$item.title}</td><td><a href="/admin/content/edittitle/{$item.id}">Редактировать</a></td><td><a href="/admin/content/deletetitle/{$item.id}">Удалить</a></td>
	</tr>
	{/foreach}
</table>
{/if}

{if $contentMode=='elementTitleNew'}
<form method="post">
<h1>Новый тайтл</h1>
  <table>
  <tr><td colspan="2" style="color:red;">Урл вписывается без слэша</td></tr>
  <tr background="/img/tab2bg.jpg"><td>Урл : </td>
  <td><input type="text" name="new_link" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="new_title" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="new_description" size="70"  /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="new_keywords" size="70"  /></td></tr>
  </table>
<button type="submit">Добавить</button>
</form>
{/if}

{if $contentMode=='editTitle'}
<form method="post">
<h1>Редактировать тайтл</h1>
  <table>
  <tr><td colspan="2" style="color:red;">Урл вписывается без слэша</td></tr>
  <tr background="/img/tab2bg.jpg"><td>Урл : </td>
  <td><input type="text" name="edit_link" size="70" value="{$contentData.link}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="edit_title" size="70" value="{$contentData.title}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="edit_description" size="70" value="{$contentData.description}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="edit_keywords" size="70" value="{$contentData.keywords}" /></td></tr>
  </table>
<button type="submit">Редактировать</button>
</form>
{/if}