{if $mode=='list'}
<h1>Список вопросов</h1>
<table>
	<tr><th>Промокод</th><th>До</th><th>Размер</th><th>Действие</th></tr>
	{foreach key=key item=item from=$page_data}
	{if $key is even}
	<tr bgcolor="#f6f6f6">
	{/if}
	<td>{$item.code}</td><td>{$item.date_end|date_format:"%d.%m.%Y"}</td><td>{$item.discount_size}%</td><td><a href="/admin/forms/edit_promo_code/{$item.id}">Редактировать</a></td><td><a href="/admin/forms/delete_promo_code/{$item.id}">Удалить</a></td>
	</tr>
	{/foreach}
</table>
{/if}

{if $mode == 'new_promo_code'}
<form method="post">
	<h1>Новый промокод</h1>
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Размер скидки (проценты) : </td>
			<td><input type="text" name="new_discount_size" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Дата окончания (дата должна быть вида день.месяц.год Пример: 07.04.2015) : </td>
			<td><input type="text" name="new_date_end" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Введите код : </td>
			<td><input type="text" name="new_code" size="70"  /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Выберите игру : </td>
			<td>
			{if isset($page_data.0.id)}
				<select name="new_gid">
					<option value="0">Все</option>
					{foreach key=key item=item from=$page_data}
					<option value="{$item.id}">{$item.caption}</option>
					{/foreach}
				</select>
			{/if}
			</td>
		</tr>
	</table>
	<button type="submit">Добавить</button>
</form>
{/if}

{if $mode=='edit_promo_code'}
<form method="post">
	<h1>Новый промокод</h1>
	<table>
		<tr background="/img/tab2bg.jpg">
			<td>Размер скидки (проценты) : </td>
			<td><input type="text" name="edit_discount_size" size="70" value="{$page_data.pc.discount_size}" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Дата окончания (дата должна быть вида день.месяц.год Пример: 07.04.2015) : </td>
			<td><input type="text" name="edit_date_end" size="70" value="{$page_data.pc.date_end|date_format:'%d.%m.%Y'}" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Введите код : </td>
			<td><input type="text" name="edit_code" size="70" value="{$page_data.pc.code}" /></td>
		</tr>
		<tr background="/img/tab2bg.jpg">
			<td>Выберите игру : </td>
			<td>
			{if isset($page_data.games.0.id)}
				<select name="edit_gid">
					<option {if $page_data.pc.gid == 0} selected {/if} value="0">Все</option>
					{foreach key=key item=item from=$page_data.games}
					<option {if $item.id == $page_data.pc.gid} selected {/if} value="{$item.id}">{$item.caption}</option>
					{/foreach}
				</select>
			{/if}
			</td>
		</tr>
	</table>
	<button type="submit">Редактировать</button>
</form>
{/if}