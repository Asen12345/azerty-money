{if $servicesItemMode=='list'}
    <input class="btn_update_digiseller" type="button" value="Обновить товары с digiseller.ru">

    <h1>Список товаров</h1>



        <b>Товары без категории (с digiseller.ru)</b><br>
    {if isset($digisellerItems.0.id)}
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    {foreach key=key item=item from=$digisellerItems}
                        {if $key is even}
                            <tr bgcolor="#f6f6f6">
                        {else}
                        <tr>
                        {/if}
                    <td>{$item.caption}</td>
                    <td><a href="/admin/forms/editItem/{$item.id}">Редактировать</a></td>
                    </tr>
                    {/foreach}
                </table>
            <br>
            <br>
    {else}
        отсутствуют<br>
        <br>
    {/if}


{$servicesItemData.0.id}

    {if isset($servicesItemData.0.id)}
        {foreach key=k item=i from=$servicesItemData}
            {if isset($i.s_i.0.id)}
                <b>{$i.caption}</b><br>
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    {foreach key=key item=item from=$i.s_i}
                        {if $key is even}
                            <tr bgcolor="#f6f6f6">
                        {else}
                        <tr>
                        {/if}
                    <td>{$item.caption}</td><td><a href="/admin/forms/editItem/{$item.id}">Редактировать</a> <a href="/admin/forms/deleteItem/{$item.id}">Удалить</a></td>
                    </tr>
                    {/foreach}
                </table>
                <br>
                <br>
            {/if}
        {/foreach}
    {/if}

    {literal}
    <script>
        $('body').on('click', '.btn_update_digiseller', function(e)
        {
            e.preventDefault();
            $(this).prop('disabled','disabled');
            $(this).val('Пожалуйста ожидайте. Страница перезагрузится автоматически...');

            $.ajax({
                url: 'updateDigiseller',
                type: "POST",
                dataType: "html",
                data: 'btn_update_digiseller=1',

                success: function (response) {
                    location.reload();
                }
            });
        });
    </script>
    {/literal}
{/if}

{if $servicesItemMode=='listCategory'}
    <h1>Список товаров</h1>

    {if isset($items.0.id)}
        <form method="post">
            <table>
                <tr>
                    <td colspan="5">
                        <select name="item_new_cat">
                            <option value="0">Выберите категорию</option>
                            {foreach key=key item=item from=$services}
                                <option value="{$item.id}" >{$item.caption} -> {$item.game_caption}</option>
                            {/foreach}
                        </select>
                        <input type="submit" value="Переместить выбранные товары">
                    </td>
                </tr>
                <tr>
                    <th style="width: 20px"></th>
                    <th>Заголовок</th>
                    <th>Услуга</th>
                    <th>Игра</th>
                    <th>Действие</th>
                </tr>
                {foreach key=key item=item from=$items}
                    {if $key is even}
                        <tr bgcolor="#f6f6f6">
                            {else}
                        <tr>
                    {/if}
                    <td><input type="checkbox" name="item_ids[]" value="{$item.id}"> </td>
                    <td>{$item.caption}</td>
                    <td>{$item.service.caption}</td>
                    <td>{$item.game.caption}</td>
                    <td><a href="/admin/forms/editItem/{$item.id}">Редактировать</a></td>
                    </tr>
                {/foreach}
            </table>
        </form>
        <br>
        <br>
    {else}
        отсутствуют<br>
        <br>
    {/if}



    {if isset($servicesItemData.0.id)}
        {foreach key=k item=i from=$servicesItemData}
            {if isset($i.s_i.0.id)}
                <b>{$i.caption}</b><br>
                <table>
                    <tr><th>Заголовок</th><th>Действие</th></tr>
                    {foreach key=key item=item from=$i.s_i}
                        {if $key is even}
                            <tr bgcolor="#f6f6f6">
                                {else}
                            <tr>
                        {/if}
                        <td>{$item.caption}</td><td><a href="/admin/forms/editItem/{$item.id}">Редактировать</a> <a href="/admin/forms/deleteItem/{$item.id}">Удалить</a></td>
                        </tr>
                    {/foreach}
                </table>
                <br>
                <br>
            {/if}
        {/foreach}
    {/if}
{/if}

{if $servicesItemMode=='servicesItemNew'}
<form method="post" enctype="multipart/form-data">
<h2>Новый товар</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="item_newelement_caption" size="70" required/></td></tr>
  <tr><td>Услуга</td>
  <td>
  <select name="item_services_type">
  {foreach key=key item=item from=$servicesItemData.services}
	<option value="{$item.id}" >{$item.caption} -> {$item.game_caption}</option>
  {/foreach}
  </select>
  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Цена : </td><td><input type="text" name="item_newelement_price" size="70" /></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Ссылка : </td><td><input type="text" name="item_newelement_link" size="70" /></td></tr>
  <tr><td>Выводить :</td>
  <td>
  <select name="item_newelement_active">
	<option value="1" >Да</option>
	<option value="0" >Нет</option>
  </select>

  </td>
  </tr>
      <tr><td colspan="2" style="color:red;">Адрес страницы генерируется автоматически! Изменить его можно при редактировании товара!</td></tr>

      <tr>
          <td>Фильтр 1</td>
          <td><input type="text" name="filter_1" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 2</td>
          <td><input type="text" name="filter_2" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 3</td>
          <td><input type="text" name="filter_3" value=""></td>
      </tr>
      <tr>
          <td>Фильтр 4</td>
          <td><input type="text" name="filter_4" value=""></td>
      </tr>

      <tr>
          <td>Преимущество 1</td>
          <td>
              <select name="advantages_id_1">
                  <option value="0" selected>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" >{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 2</td>
          <td>
              <select name="advantages_id_2">
                  <option value="0" selected>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" >{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 3</td>
          <td>
              <select name="advantages_id_3">
                  <option value="0" selected>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" >{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>
</table>
    <br>
    Краткое описание: <br />
    <textarea name="short_about" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 1:
    <input type="text" name="caption_about" value="">
    <br />
    Описание вкладки 1: <br />
    <textarea name="item_newelement_about" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 2:
    <input type="text" name="caption_characteristic" value="">
    <br />
    Описание вкладки 2: <br />
    <textarea name="characteristic" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 3:
    <input type="text" name="caption_review" value="">
    <br />
    Описание вкладки 3: <br />
    <textarea name="review" rows="20" cols="120" ></textarea><br />

    <br>
    Название вкладки 4:
    <input type="text" name="caption_activation" value="">
    <br />
    Описание вкладки 4: <br />
    <textarea name="activation" rows="20" cols="120" ></textarea><br />



    <p> Категория: </p>
    <input type="text" name="paren"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
    <p> Фоновая картинка: </p>
    <input type="file" name="test_im[]" /><br><br>
    <p> Передняя картинка: </p>
    <input type="file" name="test_im1[]" /><br><br>

   


Фото:<br />
<input type="file" name="item_newelement_photo" required/><br /><br />

    Слайдер: <br />
    <div class="slider_images">
        <div class="add_slider">
            <a href="#" class="add_slider_btn">Добавить изображение</a>
        </div>
    </div>
    <br />
    <br />
<input type="submit" value="Создать товар" />
    <br />
    <br />
    <br />
</form>
{/if}


{if $servicesItemMode=='servicesItemEdit'}
<form method="post" enctype="multipart/form-data">
<h2>Редактировать товар</h2>
  <table>
  <tr background="/img/tab2bg.jpg"><td>Заголовок : </td><td><input type="text" name="item_editelement_caption" size="70" value="{$servicesItemData.item.caption}" required/></td></tr>
  <tr><td>Услуга</td>
  <td>

<!----
  <select name="item_services_type">
  {foreach key=key item=item from=$servicesItemData.services}
	<option value="{$item.id}" {if $servicesItemData.item.sid==$item.id}selected{/if}>{$item.caption} -> {$item.game_caption}</option>
  {/foreach}
  </select>-->





  



    {foreach item="item" from=$servicesItemData.services }
    {foreach from=$item.game_caption item=tagitem key=kex}
      {if !$done.$tagitem}
        {$done.$tagitem = 1}
        <b>  {$tagitem}</b><br>
        <select name="item_services_type">
  
            <option>
            
            
            </option>
            
          
            {for $foo=1 to {$id|@count}}
            <option>{$foo}</option>
          {/for}
          


            </select><br><br>
      {/if}
    {/foreach}
  {/foreach}



  </td></tr>
  <tr background="/img/tab2bg.jpg"><td>Цена : </td><td><input type="text" name="item_editelement_price" size="70" value="{$servicesItemData.item.price}"/></td></tr>
  <tr background="/img/tab2bg.jpg"><td>Ссылка : </td><td><input type="text" name="item_editelement_link" size="70" value="{$servicesItemData.item.link}"/></td></tr>
  <tr><td>Выводить :</td>
  <td>
  <select name="item_editelement_active">
	<option value="1" {if $servicesItemData.item.active==1}selected{/if}>Да</option>
	<option value="0" {if $servicesItemData.item.active==0}selected{/if}>Нет</option>
  </select>
  </td>
  </tr>

      <tr>
          <td>Адрес страницы:</td>
          <td><input type="text" name="seo_link" value="{$servicesItemData.item.seo_link}"></td>
      </tr>
      <tr><td colspan="2" style="color:red;">Если хотите, чтобы адрес сформировался автоматически - оставьте поле пустым! Руками поле адрес не стоит трогать, если не надо менять адрес станицы. Но если это сделать необходимо,то : слэш перед адресом обязателен! Адрес обязательно должен быть на латинице без пробелов!</td></tr>
      <tr>
          <td>Фильтр 1</td>
          <td><input type="text" name="filter_1" value="{$servicesItemData.item.filter_1}"></td>
      </tr>
      <tr>
          <td>Фильтр 2</td>
          <td><input type="text" name="filter_2" value="{$servicesItemData.item.filter_2}"></td>
      </tr>
      <tr>
          <td>Фильтр 3</td>
          <td><input type="text" name="filter_3" value="{$servicesItemData.item.filter_3}"></td>
      </tr>
      <tr>
          <td>Фильтр 4</td>
          <td><input type="text" name="filter_4" value="{$servicesItemData.item.filter_4}"></td>
      </tr>

      <tr>
          <td>Преимущество 1</td>
          <td>
              <select name="advantages_id_1">
                  <option value="0" {if $servicesItemData.item.advantages_id_1 == 0}selected{/if}>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" {if $servicesItemData.item.advantages_id_1 == $item.id}selected{/if}>{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 2</td>
          <td>
              <select name="advantages_id_2">
                  <option value="0" {if $servicesItemData.item.advantages_id_2 == 0}selected{/if}>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" {if $servicesItemData.item.advantages_id_2 == $item.id}selected{/if}>{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>
      <tr>
          <td>Преимущество 3</td>
          <td>
              <select name="advantages_id_3">
                  <option value="0" {if $servicesItemData.item.advantages_id_3 == 0}selected{/if}>---</option>
                  {foreach key=key item=item from=$servicesItemData.advantages}
                      <option value="{$item.id}" {if $servicesItemData.item.advantages_id_3 == $item.id}selected{/if}>{$item.caption}</option>
                  {/foreach}
              </select>
          </td>
      </tr>


</table>

    <br>
    Краткое описание:
    <br />
    <textarea name="short_about" rows="20" cols="120" >{$servicesItemData.item.short_about}</textarea><br />

    <br>
    Название вкладки 1:
    <input type="text" name="caption_about" value="{if $servicesItemData.item.caption_about}{$servicesItemData.item.caption_about}{else}Описание{/if}">
    <br />
    Описание вкладки 1: <br />
    <textarea name="item_editelement_about" rows="20" cols="120" >{$servicesItemData.item.about}</textarea><br />


    <br>
    Название вкладки 2:
    <input type="text" name="caption_characteristic" value="{$servicesItemData.item.caption_characteristic}">
    <br />
    Описание вкладки 2: <br />
    <textarea name="characteristic" rows="20" cols="120" >{$servicesItemData.item.characteristic}</textarea><br />

    <br>
    Название вкладки 3:
    <input type="text" name="caption_review" value="{$servicesItemData.item.caption_review}">
    <br />
    Описание вкладки 3: <br />
    <textarea name="review" rows="20" cols="120" >{$servicesItemData.item.review}</textarea><br />

    <br>
    Название вкладки 4:
    <input type="text" name="caption_activation" value="{$servicesItemData.item.caption_activation}">
    <br />
    Описание вкладки 4: <br />
    <textarea name="activation" rows="20" cols="120" >{$servicesItemData.item.activation}</textarea><br />

Фото:<br />
{if $servicesItemData.item.photo}
<img src="/data/photo/{$servicesItemData.item.photo}" style="width:160px" /><br />
{/if}
<input type="file" name="item_editelement_photo" {if !$servicesItemData.item.photo}required{/if}/><br /><br />


    Слайдер: <br />
    <div class="slider_images">

        {foreach key=key item=item from=$servicesItemData.sliders}
            <div>
                <input type="hidden" name="slider_images_old[{$item.id}]" value="{$item.photo}">
                <img src="/data/img-sliders/{$item.photo}" style="width: 160px" > <input type="text" name="sort_order_old[{$item.id}]" value="{$item.sort_order}" size="3" maxlength="3" required> <a href="#" class="delete_slider_btn">Удалить</a>
            </div>
        {/foreach}




        <div class="add_slider">
            <a href="#" class="add_slider_btn">Добавить изображение</a>
        </div>
    </div>
    <br />
    <br />
    <p> Категория: </p>
    <input type="text" name="paren1" value="{$smarty.session.par}"><br> <br>
    <p style="color: red;"> Картинки должны лежать в /data/img </p>
<p> Фоновая картинка: </p>
<input type="file" name="testimg2[]" multiple><br><br>
<p> Передняя картинка: </p>
<input type="file" name="testimg3[]" multiple><br><br>

<input type="submit" value="Редактировать товар" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href ="/admin/forms/deleteItem/{$servicesItemData.item.id}">Удалить товар</a>
    <br />
    <br />
    <br />
</form>
{/if}
{literal}
    <style>
        .slider_images div{
            margin-top: 10px;
        }
        .slider_images div img {
            vertical-align: middle;
        }
    </style>
    <script>
        $(function(){
            $('.add_slider_btn').click(function(e){
                e.preventDefault();
                $('.add_slider').before('<div><input type="file" name="slider_images[]" required> <input type="text" name="sort_order[]" value="0" size="3" maxlength="3" required> <a href="#" class="delete_slider_btn">Удалить</a></div>');
            });

            $('.slider_images').on('click', '.delete_slider_btn', function(e) {
                e.preventDefault();
                $(this).parent().remove();
            });
        });
    </script>
{/literal}