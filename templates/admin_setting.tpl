{if $settingMode=='list'}
<h1>Список настроек</h1>
    {if isset($settings.0.id)}
        {foreach key=k item=i from=$settings}
            <b>{$i.title}</b> <a href="/admin/content/settingItem/{$i.id}">Редактировать</a><br><br>
        {/foreach}
    {/if}
{/if}

{if $settingMode=='item'}
<form method="post" enctype="multipart/form-data">
<h1>Редактирование настройки: {$setting.title}</h1>
    <p>{$setting.description}</p>

    <textarea name="setting">{$setting.value}</textarea>

    <br>

<button type="submit">Редактировать</button>
</form>
{/if}