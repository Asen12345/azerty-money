{if isset($newsMode)}
{if $newsMode=='listNews'}
<h1>Список новостей</h1>
<table>
	<tr><th>Время</th><th>Заголовок</th><th>Действие</th></tr>
	{foreach key=key item=item from=$newsData}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{else}
	<tr>
	{/if}
	<td>{$item.data}</td><td>{$item.caption}</td><td><a href="/admin/news/elementEdit/{$item.id}">Редактировать</a> <a href="/admin/news/deleteNews/{$item.id}">Удалить</a></td>
	</tr>
	{/foreach}
</table>
{/if}
{if $newsMode=='new'}
<form method="post" enctype="multipart/form-data">
<h2>Новая новость</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="news_newelement_caption" size="70" /></td></tr>
</table>
Дата: 
{html_select_date start_year='-20' reverse_years='true'}<br />
Анонс: <br />
	<textarea name="news_newelement_preview" rows="20" cols="120" ></textarea><br />
Полная новость: <br />
	<textarea name="news_newelement_ntext" rows="40" cols="120" ></textarea><br />

Фото:<br />
<input type="file" name="news_photo" /><br />
<input type="submit" value="Создать новость" />
</form>
{/if}

{if $newsMode=='edit'}
<form method="post" enctype="multipart/form-data">
<h2>Редактировать новость</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="news_editelement_caption" value="{$newsData.caption}" size="70" /></td></tr>
</table>	
Дата: 
{html_select_date start_year='-20' reverse_years='true' time=$newsData.data}<br />
Анонс: <br />
<textarea name="news_editelement_preview" rows="20" cols="120" >{$newsData.preview}</textarea><br />
Полная новость: <br />
<textarea name="news_editelement_ntext" rows="40" cols="120" >{$newsData.ntext}</textarea><br /> 
Фото:<br />
{if $newsData.photo}
<img src="/data/img/news/{$newsData.photo}" style="width:200px" /><br />
{/if}
<input type="file" name="news_photo" /><br /><br />
<input type="submit" value="Редактировать" />
</form>
{/if}
{/if}
