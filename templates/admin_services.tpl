{literal}
    <style>
        .services_photo_list input[type="radio"]{display: none;}

        .services_photo_list  label img{border: white solid 1px; margin: 5px; padding: 5px; height: 90px}

        .services_photo_list input[type="radio"]:checked+label img{
            border: black solid 1px;
        }


.services_photo_list1 input[type="radio"]{display: none;}

.services_photo_list1  label img{border: white solid 1px; margin: 5px; padding: 5px; height: 90px}

.services_photo_list1 input[type="radio"]:checked+label img{
    border: black solid 1px;
}
    </style>
{/literal}

{if $servicesMode=='list'}
<h1>Список услуг</h1>
{if isset($servicesData.0.id)}
{foreach key=k item=i from=$servicesData}
{if isset($i.services.0.id)}
<b>{$i.caption}</b><br>

    <form method="post">
    <table>
	<tr><th>Заголовок</th><th>Сортировка</th><th>Действие</th></tr>
        {foreach key=key item=item from=$i.services}
            {if $key is even}
            <tr bgcolor="#f6f6f6">
            {else}
            <tr>
            {/if}
            <td>{$item.caption}</td>
            <td><input type="text" name="sort_services[{$item.id}]" style="width:70px" value="{$item.sort}"></td>
            <td><a href="/admin/forms/editServices/{$item.id}">Редактировать</a>
                <a href="/admin/forms/deleteServices/{$item.id}">Удалить</a></td>
            </tr>
        {/foreach}
    </table>
    <br>
    <button type="submit">Сохранить сортировку</button>
    </form>
    <br>
    <br>
<br><br>
{/if}
{/foreach}
{/if}
{/if}
{if $servicesMode=='servicesNew'}
<form method="post" enctype="multipart/form-data">
<h1>Добавление услуги</h1>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td>
  <td><input type="text" name="services_name" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="services_title" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="services_description" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="services_keywords" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Минимальная цена : </td>
  <td><input type="text" name="services_min_price" size="70" /></td></tr>
  <tr><td>Тип</td>
  <td>
  <select name="services_type">
	<option value="0" >Валюта</option>
	<option value="1" >Товар</option>
	<option value="2" >Услуга</option>
	<option value="3" >Текст</option>
	
  </select>
  </td>
  <tr background="/img/tab2bg.jpg"><td>Шаблон : </td>
  <td><input type="text" name="services_templates" size="70" /></td></tr>
  <tr><td colspan="2" style="color:red;">При добавлении услуги с типом:"Валюта", шаблон с формой создается заранее и копируется в директорию сайта "/templates/services/". В поле "Шаблон" записывается имя скопированного шаблона, без указания пути. <br>
service1.tpl-золото WOW ru<br>
service2.tpl-золото ArcheAge<br>
service3.tpl-золото WoW Free<br>
service4.tpl-кинары Aion<br>
service5.tpl-кинары Aion Free<br>
service6.tpl-золото Diablo 3<br>
service7.tpl-адену Lineage 2<br>
service8.tpl-адену Lineage 2 Free<br>
service9.tpl-платину Rift<br>
service10.tpl-ISK EVE Online<br>
service11.tpl-treasure key Dota 2<br>
service12.tpl-саронит WoW Free<br>
  </td></tr>
  <tr><td>Игра</td>
  <td>
  <select name="services_gid">
  {foreach key=key item=item from=$servicesData}
	<option value="{$item.id}" >{$item.caption}</option>
  {/foreach}
  </select>
  </td></tr>
  <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании услуги!</td></tr>
</table>
Описание:<br />
<textarea name="services_atext" cols=110 rows=15></textarea><br />
Мини гайд (Как сделать заказ):<br />
<textarea name="services_order_info" cols=110 rows=15></textarea><br />

    <div class="services_photo_list">
        Иконка услуги: <br>
        {foreach key=key item=item from=$servicesDataPhotos}

            <input type="radio" name="services_photo" value="{$item}" id="services_photo{$key}">
            <label for="services_photo{$key}" class="services_photo"><img src="{$item}"></label>
        {/foreach}
    </div>


    <div class="services_filters">
        <br>Фильтры (актуально, только если тип услуги - "Товар"): <br>
        <table>
            <tr>
                <td>Название фильтра 1:</td>
                <td><input type="text" name="services_filter_1" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 2: </td>
                <td><input type="text" name="services_filter_2" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 3: </td>
                <td><input type="text" name="services_filter_3" size="70" value=""></td>
            </tr>
            <tr>
                <td>Название фильтра 4: </td>
                <td><input type="text" name="services_filter_4" size="70" value=""></td>
            </tr>
            <tr>
                <td>Подсказка для окна поиска: </td>
                <td><input type="text" name="services_search_desc" size="70" value=""></td>
            </tr>
        </table>
    </div>


    <p> Единица товара: </p>
    <input type="text" name="prod_on"><br> <br>

    <p> Категория: </p>
    <input type="text" name="paren"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
    <p> Фоновая картинка: </p>
    <input type="file" name="test_im[]" /><br><br>
    <p> Передняя картинка: </p>
    <input type="file" name="test_im1[]" /><br><br>

<button type="submit">Добавить</button>
</form>
{/if}

{if $servicesMode=='servicesEdit'}
<form method="post" enctype="multipart/form-data">
<h1>Редактирование услуги</h1>

  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td>
  <td><input type="text" name="services_name" size="70" value="{$servicesData.caption}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Тайтл : </td>
  <td><input type="text" name="services_title" size="70" value="{$servicesData.title}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>description : </td>
  <td><input type="text" name="services_description" size="70" value="{$servicesData.description}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>keywords : </td>
  <td><input type="text" name="services_keywords" size="70" value="{$servicesData.keywords}" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Минимальная цена : </td>
  <td><input type="text" name="services_min_price" size="70" value="{$servicesData.min_price}" /></td></tr>
  <tr><td>Тип</td>
  <td>
  <select name="services_type">
	<option value="0" {if $servicesData.type==0}selected{/if}>Валюта</option>
	<option value="1" {if $servicesData.type==1}selected{/if}>Товар</option>
	<option value="2" {if $servicesData.type==2}selected{/if}>Услуга</option>
	<option value="3" {if $servicesData.type==3}selected{/if}>Текст</option>
  </select>
  </td>
  <tr background="/img/tab2bg.jpg"><td>Шаблон : </td>
  <td><input type="text" name="services_templates" size="70" {if isset($servicesData.template)}value="{$servicesData.template}"{/if} /></td></tr>
  <tr><td>Игра</td>
  <td>
  <select name="services_gid" >
  {foreach key=key item=item from=$servicesData.games}
	<option value="{$item.id}" {if $servicesData.gid==$item.id}selected{/if}>{$item.caption}</option>
  {/foreach}
  </select>
  </td></tr>
  {if $servicesData.id > 45}
  <tr background="/img/tab2bg.jpg"><td>Адрес страницы : </td>
  <td><input type="text" name="services_url" size="70" {if isset($servicesData.link)}value="{$servicesData.link}"{/if} /></td></tr>
  <tr><td colspan="2" style="color:red;">Поле адрес не стоит трогать,если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>
  {/if}
</table>
Описание:<br />
<textarea name="services_atext" cols=110 rows=15>{if isset($servicesData.about)}{$servicesData.about}{/if}</textarea><br />
Мини гайд (Как сделать заказ):<br />
<textarea name="services_order_info" cols=110 rows=15>{if isset($servicesData.order_info)}{$servicesData.order_info}{/if}</textarea><br />

    <div class="services_photo_list">
        Иконка услуги: <br>
        {foreach key=key item=item from=$servicesDataPhotos}
            <input type="radio" name="services_photo" value="{$item}" id="services_photo{$key}" {if $item==$servicesData.front}checked="checked" {/if}>
            <label for="services_photo{$key}" class="services_photo"><img src="{$item}"></label>
        {/foreach}
    </div>






   <div class="services_photo_list1">
        Фон услуги: <br>
        {foreach key=key item=item from=$servicesDataPhotos1}
            <input type="radio" name="services_photo1" value="{$item}" id="1services_photo{$key}" {if $item==$servicesData.back}checked="checked" {/if}>
            <label for="1services_photo{$key}" class="services_photo"><img src="{$item}"></label>
        {/foreach}
    </div>

    <div class="services_filters">
        <br>Фильтры (актуально, только если тип услуги - "Товар"): <br>
        <table>
            <tr>
                <td>Название фильтра 1:</td>
                <td><input type="text" name="services_filter_1" size="70" value="{$servicesData.filter_1}"></td>
            </tr
            <tr>
                <td>Название фильтра 2: </td>
                <td><input type="text" name="services_filter_2" size="70" value="{$servicesData.filter_2}"></td>
            </tr>
            <tr>
                <td>Название фильтра 3: </td>
                <td><input type="text" name="services_filter_3" size="70" value="{$servicesData.filter_3}"></td>
            </tr>
            <tr>
                <td>Название фильтра 4: </td>
                <td><input type="text" name="services_filter_4" size="70" value="{$servicesData.filter_4}"></td>
            </tr>
            <tr>
                <td>Подсказка для окна поиска: </td>
                <td><input type="text" name="services_search_desc" size="70" value="{$servicesData.search_desc}"></td>
            </tr>
        </table>
    </div>


    <p> Единица товара: </p>
    <input type="text" name="prod_on"><br> <br>


    <p> Категория: </p>
   
    <select  name="paren">
        <option>
          
        </option>
        {foreach key=key item=item from=$smarty.session.par}


<option>
    {$item.caption}
</option>

        {/foreach}
    </select>
   
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
<p> Фоновая картинка: </p>
<input type="file" name="testimg[]" multiple><br><br>
<p> Передняя картинка: </p>
<input type="file" name="testimg1[]" multiple><br><br>
  
    
<button type="submit">Редактировать</button>
</form>
{/if}