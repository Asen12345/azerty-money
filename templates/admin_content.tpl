{if isset($contentMode)}
{if $contentMode=='new'}
<form method="post">
<h2>Новая страница</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="content_newelement_caption" size=70 /></td></tr>
</table>	
	<textarea name="content_newelement_content" rows="40" cols="100" ></textarea><br />
<br />
<input type="submit" value="Создать">
</form>
{/if}

{if $contentMode=='edit'}
<form method="post">
<h2>Редактировать страницу</h2>

<input type="hidden" name="content_editelement_id" value="{$contentData.id}" />
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="content_editelement_caption" value="{$contentData.caption|escape}" size=70 /></td></tr>
</table>	
<textarea name="content_editelement_content" rows="40" cols="100" >{$contentData.content}</textarea><br />

<input type="submit" value="Редактировать">
</form>
{/if}






{if $contentMode=='new_cat'}
<b>Добавить категорию</b><br />
<form enctype='multipart/form-data' method="post">
	<p>Название категории: </p>
<input name="name_cat" type=text><br>
<p>Title: </p>
<input name="titl" type=text><br>
<p>Description: </p>
<input name="desc" type=text><br>
<p>keywords: </p>
<input name="keyw" type=text><br>
<p>Название привязанной игры: </p>
<select name="namegame">
	<option></option>
	{foreach from=$smarty.session.gam_t item=foo}
	
	<option>
{$foo.caption}
	</option>


	{/foreach}
</select>

<p style="color: red;"> Картинки должны лежать в data/img </p>
<p>Фоновая картинка: </p>
<input type="file" name="test_img" /><br>
<p>Передняя картинка: </p>
<input type="file" name="test_img1" /><br><br>
<input  type=submit value="Редактировать">
</form>

{/if}




{if $contentMode=='edit_cat'}

<b>Редактирование категории</b><br />
<form enctype='multipart/form-data' method="post">


	<p>Title: </p>
	<input name="titl" type=text value="{if $contentData.title} {$contentData.title} {/if}"><br>
	<p>Description: </p>
	<input name="desc" type=text value="{if $contentData.description} {$contentData.description} {/if}"><br>
	<p>keywords: </p>
	<input name="keyw" type=text value="{if $contentData.keywords} {$contentData.keywords} {/if}"><br>

	<p>Название категории: </p>
<input name="name_cat" type=text value="{$contentData.caption}"><br>
<p>Название привязанной игры: </p>
<select name="namegame">
	<option></option>
	{foreach from=$smarty.session.gam_t item=foo}
	
	<option>
{$foo.caption}
	</option>


	{/foreach}
</select>
<p style="color: red;"> Картинки должны лежать в data/img </p>
<p>Фоновая картинка: </p>
<input type="file" name="im5[]" /><br>
<p>Передняя картинка: </p>
<input type="file" name="test_img1" /><br><br>
<input  type=submit value="Редактировать">
</form>






{/if}



{if $contentMode=='list_cat'}
<h1>Список категорий</h1>
<form method="POST">
<select name="sor">
	<option>Выберите игру</option>
	{foreach from=$smarty.session.och item=foo}
	<option>
		{$foo.0.caption}
	</option>
	{/foreach }
</select>
<input type="submit" name="btn_s" value="Сортировать">
</form>
<table>
	<tr><th>Название</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key>=0}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.caption}</td><td><a href="/admin/content/edit_cat/{$item.id}">Редактирование</a><a href="/admin/content/deleteCat/{$item.id}"> | Удалить</a></td>
	</tr>
	
	{/foreach}
</table>
{/if}


{if $contentMode=='commerceList'}
{if $contentData.0.id}
<b>Список заявок: </b><br />
<table>
{foreach key=key item=item from=$contentData}
<tr><td><span {if $item.visited==0}style="text-decoration:underline;"{/if}>{$item.caption}</span></td><td><a href="/admin/content/commerce/{$item.id}">посмотреть подробно</a></td></tr>
{/foreach}
</table>
{else}
<b>Заявок нет</b>
{/if}
{/if}

{if $contentMode=='commerce'}
<b>{$contentData.caption}</b><br />
<pre>
{$contentData.fields}
</pre>{/if}

{if $contentMode=='templatelist'}
<h1>Список страниц шаблонов</h1>
<b>Делайте резервные копии шаблонов перед редактированием!</b>
<table>
{foreach key=key from=$contentData item=item}
<tr><td>{$item}</td><td><a href="/admin/content/templateedit/{$item}">Изменить</a></td><td><a href="/templates/{$item}" download="">Резервная копия</a></td></tr>
{/foreach}
</table>
{/if}

{if $contentMode=='templateedit'}
<b>Редактирование шаблона</b><br />
<form method="post">
<textarea contenteditable="true" cols=130 name="templateedittext" rows=40 class="mceNoEditor">{$contentData}</textarea><br />
<input type=submit value="Редактировать">
</form>
{/if}

{if $contentMode=='templatelistServices'}
<h1>Список страниц шаблонов оплаты</h1>
<b>Делайте резервные копии шаблонов перед редактированием!</b>
<table>
{foreach key=key from=$contentData item=item}
<tr><td>{$item}</td><td><a href="/admin/content/templateeditServices/{$item}">Изменить</a></td><td><a href="/templates/services/{$item}" download="">Резервная копия</a></td></tr>
{/foreach}
</table>
{/if}

{if $contentMode=='templateeditServices'}
<b>Редактирование шаблона</b><br />
<form method="post">
<textarea cols=130 name="templateedittext" rows=40 class="mceNoEditor">{$contentData}</textarea><br />
<input type=submit value="Редактировать">
</form>
{/if}

{if $contentMode=='one'}
ПОМОЩЬ
{/if}

{if $contentMode=='listFeedback'}
<h1>Список отзывов</h1>
<table>
	<tr><th>Время</th><th>Имя</th><th>Email</th><th>Игра</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key>=0}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.data}</td><td>{$item.name}</td><td>{$item.email}</td><td>{$item.gcap}</td><td><a href="/admin/content/edit_feedback/{$item.id}">Редактирование</a><a href="/admin/content/deleteFeedback/{$item.id}"> | Удалить</a></td>
	</tr>
	<tr><td colspan="3"><b>Отзыв :</b> {$item.text_feedback}</td></tr>
	{/foreach}
</table>
{/if}

{if $contentMode=='listNewFeedback'}
{if $contentData.0.display == '0'}
<h1>Новые отзывы</h1>
<table>
	<tr><th>Время</th><th>Имя</th><th>Email</th><th>Игра</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key >=0}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.data}</td><td>{$item.name}</td><td>{$item.email}</td><td>{$item.gcap}</td><td><a href="/admin/content/edit_feedback/{$item.id}">Редактирование </a><a href="/admin/content/deleteFeedback/{$item.id}"> | Удалить</a></td><td><a href="/admin/content/resolveFeedback/{$item.id}">Одобрить</a></td>
	</tr>
	<tr><td colspan="3"><b>Отзыв :</b> {$item.text_feedback}</td></tr>
	{/foreach}
</table>
{else}
<h1>Новых отзывов нет</h1>
{/if}
{/if}

{if $contentMode=='listUsers'}
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
<h1>Пользователи</h1>
<form class="search" action="/admin/content/usersSearch" method="post">
	<input type="search" name="q" size=30 placeholder="Введите email">
	<input class="search-btn" type="submit" value="Поиск">
</form>
<table>
	<tr><th>Email</th><th>Контакты</th><th>Реф. процент</th><th><a href="/admin/content/listUsers">Деньги</a></th><th><a href="/admin/content/listUsers/ref">Реферальные деньги</a></th><th>Действия</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $item.id != 1}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.email}</td><td><a href="javascript:void(0);" onclick="$('#cont').html('Телефон: {$item.phone}<br><br>Skype: {$item.skype}<br><br>ICQ: {$item.icq}');$('#terms-of-service').modal().open();">Контакты</a></td><td>{if $item.percent_ref}{$item.percent_ref}{else}5{/if}%</td><td><a href="/admin/content/listUsers">{$item.money} руб.</a></td><td>{if $item.money_ref}<a href="/admin/content/listUsers/ref">{$item.money_ref} руб.</a> <a href="/admin/content/nullifyRef/{$item.id}">Обнулить</a> | <a href="/admin/content/historyRef/{$item.id}">История рефералов</a> {/if}</td><td><a href="/admin/content/listOrdersUser/{$item.id}">Список заказов </a><a href="/admin/content/edit_users/{$item.id}">| Редактирование</a></td>
	</tr>
	{/if}
	{/foreach}
</table>
{if isset($still)}
<br><a href="/admin/content/listUsers{$param2}?count={$still}"><button type="button">Еще пользователи</button></a>
{/if}
{/if}

{if $contentMode=='listOrdersUser'}
	{if $contentData.orders.0.uid == $contentData.users.id}
		<h1>Заказы пользователя</h1>
		<table>
			<tr><th>id</th><th>Заказ</th><th>Статус</th></tr>
			{foreach key=key item=item from=$contentData.orders}
			{if $key is even}
				<tr bgcolor="#f6f6f6">
			{else}
				<tr>
			{/if}
				<td>{$item.id}</td><td>{$item.caption}</td><td>{$item.status}</td>
			</tr>
			{/foreach}
		</table>
	{else}
		<h1>Заказов нет</h1>
	{/if}
{/if}

{if $contentMode=='search'}
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
<h1>Результаты</h1>
<table>
	<tr><th>Email</th><th>Контакты</th><th>Реф. процент</th><th><a href="/admin/content/listUsers">Деньги</a></th><th><a href="/admin/content/listUsers/ref">Реферальные деньги</a></th><th>Действия</th></tr>
	{if $contentData.id != 1}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$contentData.email}</td><td><a href="javascript:void(0);" onclick="$('#cont').html('Телефон: {$contentData.phone}<br><br>Skype: {$contentData.skype}<br><br>ICQ: {$contentData.icq}');$('#terms-of-service').modal().open();">Контакты</a></td><td>{if $contentData.percent_ref}{$contentData.percent_ref}{else}5{/if}%</td><td>{$contentData.money} руб.</td><td>{if $contentData.money_ref}{$contentData.money_ref} руб.<a href="/admin/content/nullifyRef/{$contentData.id}">Обнулить</a>{/if}</td><td><a href="/admin/content/listOrdersUser/{$contentData.id}">Список заказов</a><a href="/admin/content/edit_users/{$contentData.id}"> | Редактирование</a></td>
	</tr>
	{/if}
</table>
{/if}

{if $contentMode=='history'}
<h1>Рефералы</h1>
<table>
	<tr><th>Email</th><th>Заказы</th><th>Пл. система</th></tr>
	{if $contentData.id != 1}
	{foreach key=key item=item from=$contentData}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.email}</td><td>{$item.cap_ord}</td><td>{$item.payment}</td></tr>
	{/foreach}
	{/if}
</table>
{/if}

{if $contentMode=='newphoto'}
<form method="post" enctype="multipart/form-data">
<h1>Добавление изображения</h1>
Фото:<br />
<input type="file" name="newelement_photo" /><br />
<button type="submit">Добавить</button>
</form>
{/if}

{if $contentMode=='listphoto'}
<h1>Список изображений</h1>
<table>
 <tr><td colspan="2" style="color:red;">Отсортированы по возрастанию, последнее добавленное сверху</td></tr>
{foreach key=key from=$contentData item=item}
<tr><td><a href="/data/photo/{$item}">{$item}</a> | <a href="/admin/content/listphoto?del={$item}">удалить</a></td></tr>
{/foreach}
</table>
{/if}






{if $contentMode=='newbackhoto'}
<form method="post" enctype="multipart/form-data">
	<h1>Добавление фона услуг</h1>
	Иконка:<br />
	<input type="file" name="newelement_photo1" /><br />
	<button type="submit">Добавить</button>
</form>
{/if}


{if $contentMode=='listbackphoto'}
<h1>Иконки услуг</h1>
<table>
	<tr><td colspan="2" style="color:red;">Отсортированы по возрастанию, последнее добавленное сверху</td></tr>
	{foreach key=key from=$contentData item=item}
		<tr><td><a href="/data/img-service/{$item}">{$item}</a> | <a href="/admin/content/listservicephoto?del={$item}">удалить</a></td></tr>
	{/foreach}
</table>
{/if}













    {if $contentMode=='newservicephoto'}
        <form method="post" enctype="multipart/form-data">
            <h1>Добавление иконки услуг</h1>
            Иконка:<br />
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Добавить</button>
        </form>
    {/if}




	
	
    {if $contentMode=='listservicephoto'}
        <h1>Иконки услуг</h1>
        <table>
            <tr><td colspan="2" style="color:red;">Отсортированы по возрастанию, последнее добавленное сверху</td></tr>
            {foreach key=key from=$contentData item=item}
                <tr><td><a href="/data/img-service/{$item}">{$item}</a> | <a href="/admin/content/listservicephoto?del={$item}">удалить</a></td></tr>
            {/foreach}
        </table>
    {/if}





    {if $contentMode=='newadvantagesphoto'}
        <form method="post" enctype="multipart/form-data">
            <h1>Добавление иконки преимуществ</h1>
            Заголовок: <br />
            <input type="text" name="caption"> <br />
            Иконка:<br />
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Добавить</button>
        </form>
    {/if}

    {if $contentMode=='editadvantagesphoto'}
        <form method="post" enctype="multipart/form-data">
            <h1>Редактирование иконки преимуществ</h1>
            Заголовок: <br />
            <input type="text" name="caption" value="{if $contentData.caption}{$contentData.caption}{/if}"> <br />
            Иконка:<br />
            {if $contentData.photo}
                <img src="/{$contentData.photo}" style="width:30px" /><br />
            {/if}
            <input type="file" name="newelement_photo" /><br />
            <button type="submit">Редактировать</button>
        </form>
    {/if}

    {if $contentMode=='listadvantagesphoto'}
        <h1>Иконки преимуществ</h1>
        {if $contentData}
            <table>
                {foreach key=key from=$contentData item=item}
                    <tr><td><a target="_blank" href="/{$item.photo}">{$item.caption}</a> | <a href="/admin/content/editadvantagesphoto/{$item.id}">Редактировать</a> | <a href="/admin/content/listadvantagesphoto?del={$item.id}">Удалить</a></td></tr>
                {/foreach}
            </table>
        {else}
            Тут пока ничего нет
        {/if}
        <br>
        <a href="/admin/content/newadvantagesphoto">Добавить</a>

    {/if}


{if $contentMode=='edit_name_admin'}
<h1>Настройки</h1>
<form method="post">
Имя админа в отзывах:
<input type="text" value="{$contentData.first_name}" name="name" size="90" /><br />
<button type="submit">Изменить</button>
</form>
{/if}

{if $contentMode=='edit_feedback'}
<h2>Редактировать отзыв</h2>
<form method="post">
Отзыв: <textarea name="edit_feedback" rows="5" cols="100" class="mceNoEditor" >{$contentData.text_feedback}</textarea><br /><br />
Ответ: <textarea name="edit_answer" rows="5" cols="100" class="mceNoEditor" >{$contentData.answer}</textarea><br /><br />
<input type="submit" value="Редактировать">
</form>
{/if}

{if $contentMode=='withdrawal_of_money'}
<h1>Список заявок на вывод</h1>
<table>
	<tr><th>Пользователь</th><th>Выводимые деньги</th><th>Платежная система</th><th>Действие</th></tr>
	{foreach key=key item=item from=$contentData}
	{if $key>=0}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.email}</td><td>{$item.money}</td><td>{$item.purse}</td><td><a href="/admin/content/withdrawal_of_money/{$item.id}">Выполнен</a></td>
	</tr>
	{/foreach}
</table>
{/if}


{if $contentMode=='edit_users'}
<h2>Редактировать данные пользователя</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Реф. процент : </td>
			<td><input type="text" name="percent_ref" value="{if $contentData.percent_ref}{$contentData.percent_ref}{else}5{/if}" size=70 /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Платежная система : </td>
			<td><input type="radio" name="type_purse" {if $contentData.type_purse == 'qiwi'}checked{/if} value="qiwi" size=70 />Qiwi
			<input type="radio" name="type_purse" {if $contentData.type_purse == 'webmoney'}checked{/if} value="webmoney" size=70 />WebMoney
			<input type="radio" name="type_purse" {if $contentData.type_purse == 'yandexmoney'}checked{/if} value="yandexmoney" size=70 />Яндекс.Деньги</td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Номер кошелька : </td>
			<td><input type="text" name="score_purse" value="{$contentData.score_purse}" size=70 /></td>
		</tr>
	</table>	
	<input type="submit" value="Редактировать">
</form>
{/if}


{if $contentMode=='list_menu_lk'}
<h1>Список страниц меню ЛК</h1>
<table>
{foreach key=key from=$contentData item=item}
<tr><td>{$item.id}</td><td>{$item.caption}</td><td><a href="/admin/content/edit_menu_lk/{$item.id}">Изменить</a></td><td><a href="/admin/content/list_menu_lk?del={$item.id}">Удалить</a></td></tr>
{/foreach}
</table>
{/if}


{if $contentMode=='new_menu_lk'}
<h2>Добавить пункт</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Заголовок : </td>
			<td><input type="text" name="new_caption" size=70 /></td>
		</tr>
	</table>	
	<textarea name="new_content" rows="40" cols="100" ></textarea><br />
<input type="submit" value="Добавить">
</form>
{/if}

{if $contentMode=='edit_menu_lk'}
<h2>Редактировать пункт</h2>
<form method="post">
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Заголовок : </td>
			<td><input type="text" name="edit_caption" size=70 value="{$data.caption}" /></td>
		</tr>
	</table>	
	<textarea name="edit_content" rows="40" cols="100" >{$data.content}</textarea><br />
<input type="submit" value="Редактировать">
</form>
{/if}

{/if}
