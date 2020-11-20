{if $contentMode=='listFaq'}
<h1>Список вопросов</h1>
<table>
	<tr><th>Вопрос</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.question}</td><td><a href="/admin/content/editFaq/{$item.id}">Редактировать</a></td><td><a href="/admin/content/deleteFaq/{$item.id}">Удалить</a></td>
	</tr>
	{/foreach}
</table>
{/if}

{if $contentMode=='elementFaqNew'}
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
{/if}

{if $contentMode=='editFaq'}
<form method="post">
<h1>Редактировать вопрос</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Категория : </td>
  <td><input type="text" name="edit_category" size="70" value="{$contentData.category}" /></td></tr>
  </table>
 Вопрос:<br />
<textarea name="edit_question" class="mceNoEditor" cols=110 rows=15>{$contentData.question}</textarea><br /><br />
 Ответ:<br />
<textarea name="edit_answer" class="mceNoEditor" cols=110 rows=15>{$contentData.answer}</textarea><br /><br />
<button type="submit">Редактировать</button>
</form>
{/if}