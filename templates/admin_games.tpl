{if $gamesMode=='list'}
<h1>Список игр</h1>
<form method="post">
	<table>
		<tr><th><a href="/admin/forms/listGames?sort=caption">Заголовок</a></th><th><a href="/admin/forms/listGames?sort=sort">Рейтинг</a></th><th>Действие</th></tr>
		{foreach key=key item=item from=$gamesData}
		{if $key is even}
		<tr bgcolor="#f6f6f6">
		{else}
		<tr>
		{/if}
		<td>{$item.caption}</td><td><input type="text" style="width:70px;" name="sorting[{$item.id}]" value="{$item.sort}"></td><td><a href="/admin/forms/editGames/{$item.id}">Редактировать</a> <a href="/admin/forms/deleteGames/{$item.id}">Удалить</a></td></tr>
		{/foreach}
	</table>
	<br>
	<button type="submit">Сохранить сортировку</button>
</form>
{/if}
{if $gamesMode=='gamesNew'}
<form method="post" enctype="multipart/form-data">
<h1>Добавление игры</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Игра : </td>
  <td><input type="text" name="games_name" size="70"  /></td></tr>
  <tr><td>На главную</td>
  <td>
  <select name="games_popular">
	<option value="0" >Нет</option>
	<option value="1" >Да</option>
  </select>
  </td></tr>
      <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании игры!</td></tr>
</table>
    Описание:<br />
    <textarea name="games_atext" cols=110 rows=15></textarea><br />
Фото:<br />
<input type="file" name="games_photo" /><br />
Фото отзывов:<br />
<input type="file" name="feedback_photo" /><br />

<button type="submit">Добавить</button>
</form>
{/if}

{if $gamesMode=='gamesEdit'}
<form method="post" enctype="multipart/form-data">
<h1>Редактирование игры</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Игра : </td>
  <td><input type="text" name="games_name" size="70" value="{$gamesData.caption}" /></td></tr>
  <tr><td>На главную</td>
  <td>
  <select name="games_popular">
	<option value="0" {if $gamesData.popular==0}selected{/if}>Нет</option>
	<option value="1" {if $gamesData.popular==1}selected{/if}>Да</option>
  </select>



  <tr background="/img/tab2bg.jpg"><td>Родительская категория:(вписывать заголовок) </td>
    <td><input type="text" name="games_parent" size="70" {if isset($gamesData.parent_name)}value="{$gamesData.parent_name}"{/if} /></td></tr>






  <tr background="/img/tab2bg.jpg"><td>Адрес страницы : </td>
      <td><input type="text" name="games_url" size="70" {if isset($gamesData.link)}value="{$gamesData.link}"{/if} /></td></tr>
  <tr><td colspan="2" style="color:red;">Поле адрес не стоит трогать,если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>

      </td></tr>
</table>
Описание:<br />
<textarea name="games_atext" cols=110 rows=15>{if isset($gamesData.about)}{$gamesData.about}{/if}</textarea><br />
Фото:<br />
{if $gamesData.photo}
<img src="/data/photo/{$gamesData.photo}" style="width:160px" /><br />
{/if}
<input type="file" name="games_photo" /><br /><br />
Фото отзывов:<br />
{if $gamesData.photo_feedback}
<img src="/data/photo/{$gamesData.photo_feedback}" style="width:100px" /><br />
{/if}
<input type="file" name="feedback_photo" /><br /><br />


<button type="submit">Редактировать</button>
</form>
{/if}