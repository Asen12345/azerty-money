{if $formsMode == 'partners'}
<div class="faq-wrapper" style="background-image: none !important;">

    <!-- Тут начинается "Header" (повторяюшиеся элементы) -->
    <section class="seller" id="seller">
      <div class="container">
        <div class="head-of">
        
          <h1 class="title-of">
            Поставщикам
          </h1>
        </div>
        <div class="seller__body">
          <img src="img/faq-line.png" alt="" class="faq__line">
          <h2 class="name-of">
            Ведется набор поставщиков во всех играх
          </h2>
          <form method="post" class="brown-form seller__form">
            <input name="Контакты" type="text" class="brown-input seller__input" placeholder="Как с вами связатся?" required>
            <input name="game_name" type="text" class="brown-input seller__input" placeholder="Игра, сервер, реалм" required>
            <textarea name="Данные" class="brown-input seller__textarea" placeholder="Количество и цена"
              required></textarea>
              <div class="g-recaptcha" data-sitekey="6LerZvwUAAAAAL0L9V_AMXXzcqHT9eUCt7pi58Ct"></div>
            <div class="form__footer">
              <div class="form__alert">
                Внимание! Мы выполняем заказы с 11:00 до 23:00 (Москва, GMT+3, UTC+3)
              </div>
              <button type="submit" class="btn form__btn">
                Отправить
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
{/if}











{if $formsMode == 'game'}
    <article class="content-info">
        <h2>{$formsData.caption} </h2>
        <div class="content-info-div">
            <script>
  
                window.location = "https://azerty-money.ru/cateus?cateus={$smarty.get.param2}";
                
                </script>
       
                
            {if isset($formsData.services.0.id)}

                {foreach key=key item=item from=$formsData.services}
                        <a class="game-services" href="{$item.link}">
                            <div class="photo">
                                {if $item.photo}
                                    <div class="image" style="background-image: url('{$item.photo}')"></div>
                                {/if}
                            </div>
                            <p class="caption">
                                {$item.caption} 
                            </p>
                        </a>
                {/foreach}
                <div class="clear"></div>
                <div class="game-description">{$formsData.about}</div>
            {/if}
        </div>
    </article>
{/if}



{if $formsMode == 'itemform'}
<div class="container">
<div class="head-of">
    <div class="breadcrumbs">
		<a href="/" class="breadcrumbs__home">
		  Главная
		</a> /  Оформить заказ
	  </div>
    <h1 class="title-of">
        {$formsData.service.caption}
    </h1>
  </div>
</div>
<section class="product" id="product">
    <div class="container">
      <div class="product__wrap">


      <!--  <div class="product__previews">
            <a data-fancybox="gallery" href="https://azerty-money.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="https://azerty-money.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="https://azerty-money.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
            <a data-fancybox="gallery" href="https://azerty-money.ru/data/img/slide1.png" class="previews__item">
              <img src="img/slider-1.png" alt="Product">
              <div class="previews__overlay"></div>
            </a>
          </div>-->
          <style>



            .product__slider .slick-slide{
            width: 100%;
            
            }
                        </style>
          <div class="product__previews" style="width: 10%;">
            {foreach key=key item=item from=$formsData.sliders}
          
            <a data-fancybox="gallery" href= "https://azerty-money.ru/data/img-sliders/{$item.photo}" class="previews__item">
                  <img style="width: 100%;" src= "https://azerty-money.ru/data/img-sliders/{$item.photo}" alt="Product">
             
                  <div class="previews__overlay"></div>
                </a>
             
               
           
              {/foreach}
            </div>
          
          <div class="product__slider">
          
            {foreach key=key item=item from=$formsData.sliders}
            <div>
                <a style="cursor: zoom-in" data-fancybox="gallery" href= "https://azerty-money.ru/data/img-sliders/{$item.photo}" >
                <img style="width: 100%;" src="https://azerty-money.ru/data/img-sliders/{$item.photo}" alt="Product" class="product__img">
            
            </a>
              
              </div>
          
            {/foreach}
            
           
          </div>

    



        <div class="product__offer">
          <h2 class="name-of product__title">
            {$formsData.item.caption}
          </h2>
          <div class="product__info info_short">
            {$formsData.item.short_about}
          </div>
          <div class="product__price">
            {if $formsData.item.active == 1}
            <div class="price">
              
                {$formsData.item.price} руб.
            </div>
        {else}
                <div class="price">
                    <p></p>
                    Нет в наличии
                </div>
        {/if}
          </div>
          <div class="product__footer">
         



                {if $formsData.item.active == 1}
          
                    {if strlen($formsData.item.link)==0}<form method="post">{/if}
                        <input type="hidden" name="id_service_item" value="{$formsData.item.id}" />

                        {if strlen($formsData.item.link)>0}<a href="{$formsData.item.link}">   <button class="btn product__btn"  onclick="location.href='{$formsData.item.link}'">Купить</button></a>{else}</form>{/if}
                    {if strlen($formsData.item.link)==0}<button class="btn_buy" id="button_item">Купить</button>{/if}
     
            {/if}






          
            <a href="#product__more-info" class="btn secondary__btn product__more">
              Смотреть полное описание
            </a>
            <div class="product__icons">
              <div class="icons__info" data-title="Лучшие цены и способы оплаты">
                <img src="https://azerty-money.ru/data/img/skillup-like.png" alt="Like" class="product__icon">
              </div>
              <div class="icons__info" data-title="Моментальная доставка">
                <img src="https://azerty-money.ru/data/img/skillup-fast.png" alt="Fast" class="product__icon">
              </div>
            </div>
          </div>
        </div>
      </div>
     
        {if $formsData.notice}
        <p class="product__text">
            {$formsData.notice}
        </p>
    {/if}
      
      <ul class="nav nav-tabs product-tabs" id="myTab2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#product__more-info" role="tab" aria-controls="home" aria-selected="true">Доп. информация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="order-tab" data-toggle="tab" href="#product__discount" role="tab" aria-controls="profile" aria-selected="false">Скидки</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="partner-tab" data-toggle="tab" href="#product__reviews" role="tab" aria-controls="contact" aria-selected="false">Отзывы</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade product__more-info active show" id="product__more-info" role="tabpanel" aria-labelledby="more-tab">
          <div class="product__addition">
            <div class="product__info">
                {$formsData.item.about}
            </div>
          </div>
        </div>
        <div class="tab-pane fade product__discount" id="product__discount" role="tabpanel" aria-labelledby="discount-tab">

            {if $formsData.item.discounts}
            <div id="tab-discounts" class="tab-content">
                {$formsData.discounts_text}
                {foreach key=key item=item from=$formsData.item.discounts}
                    <li>{$item.summa}$ - скидка <b>{$item.percent}%</b></li>
                {/foreach}
            </div>
        {/if}
        </div>
        <div class="tab-pane fade product__reviews" id="product__reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <div class="payment__reviews reviews">
            <h2 class="name-of reviews-name">
              Отзывы
            </h2>


           



            {foreach key=key item=item from=$feedback_item}



            <div class="reviews__item pay-line">
                <img style="width: 80px;" src="https://azerty-money.ru/data/img/user1.svg" alt="Person" class="reviews__img">
                <div class="reviews__content">
                  <div class="reviews__head">
                    <h5 class="reviews__name">
                        {$item.name}
                    </h5>
                    <div class="reviews__date">
                        <time>{$item.date}</time>
                    </div>
                  </div>
                  <div class="reviews__text">
                    {$item.info}
                                  </div>
                                  {if $item.comment}
                  <div class="reviews__admin">
                    <img src="https://azerty-money.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
                    <div class="reviews__admin-side">
                      <div class="reviews__admin-name">
                        Администратор Azerty Money
                      </div>
                      <div class="reviews__admin-text">
                        {$item.comment}
                                              </div>
                    </div>
                  </div>
                  {/if}
                </div>
              </div>
  

        {/foreach}






         
          </div>
        </div>
      </div>

      <div class="product__contacts">
        <div class="contacts-side payment__form">
          <h2 class="name-of payment__form_title">
            Оставить отзыв
          </h2>
          <form method="post" name="feedback" class="brown-form">
            <input name="name" type="text" class="brown-input" placeholder="Ваше имя" required="">
            <input name="email" type="mail" {if isset($user.email)}value="{$user.email}"{/if} class="brown-input" >
            <textarea name="comment" class="brown-input brown-textarea" placeholder="Оставьте свой отзыв здесь" required=""></textarea>
            <div class="form__footer contacts-form__footer">
              <button type="submit" class="btn form__btn contacts-form__btn">
                Оставить отзыв
              </button>
            </div>
          </form>
        </div>
        <div class="contacts-side payment__contacts">
          <h2 class="name-of payment__form_title">
            Поделиться:
          </h2>
          <div class="contacts__links">
            <a href="#" class="contacts_link">
              <img src="https://azerty-money.ru/data/img/vk-white.png" alt="VK">
            </a>
            <a href="#" class="contacts_link">
              <img src="https://azerty-money.ru/data/img/fb-white.png" alt="Facebook">
            </a>
            <a href="#" class="contacts_link">
              <img src="https://azerty-money.ru/data/img/tw-white.png" alt="Twitter">
            </a>
          </div>
          <p class="contacts_text">
            Следует заметить оставляя красный отзыв, до момента ответа продавца, вы попадаете в черный список
            Всем удачных покупок!
          </p>
        </div>
      </div>
    </div>
  </section>

<!--



    <article class="content-info">

        <div class="head-of">
            <div class="breadcrumbs">
              <a href="#" class="breadcrumbs__home">
                Главная
              </a> / х5 428. [Орда] Маг: PvE 5606 GS
            </div>
            <h1 class="title-of">
                {$formsData.service.caption}
            </h1>
          </div>
      




          


      {if $formsData.sliders}




      <section class="product" id="product">
        <div class="container">
          <div class="product__wrap">
            <div class="product__previews">
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
              <a data-fancybox="gallery" href="img/slider-1.png" class="previews__item">
                <img src="img/slider-1.png" alt="Product">
                <div class="previews__overlay"></div>
              </a>
            </div>
            <div class="product__slider slick-initialized slick-slider"></div>

 
              {foreach key=key item=item from=$formsData.sliders}
              <div>
                <img src="https://azerty-money.ru/data/img-sliders/{$item.photo}" alt="Product" class="product__img">
              </div>
              {/foreach}
            </div>


  {/if}




        <div class="content-info-div">
            <div class="item_form">
                <div class="photo">
                    <img src="/data/photo/{$formsData.item.photo}">
                </div>
                <div class="card">
                    <h3>{$formsData.item.caption}</h3>
                    <div class="card_middle">


                        {if $formsData.item.active == 1}
                            <div class="price">
                                <p>ЦЕНА:</p>
                                {$formsData.item.price}Р
                            </div>
                        {else}
                                <div class="price">
                                    <p></p>
                                    Нет в наличии
                                </div>
                        {/if}


                        <div class="short_about">
                            {$formsData.item.short_about}
                        </div>

                        <div class="advantages">
                            {foreach key=key item=item from=$formsData.advantages}
                                <div class="tooltip" data-title="{$item.caption}"><img src="/{$item.photo}"></div>
                            {/foreach}
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="card_bottom">

                        {if $formsData.item.active == 1}
                            <div class="buy">
                                {if strlen($formsData.item.link)==0}<form method="post">{/if}
                                    <input type="hidden" name="id_service_item" value="{$formsData.item.id}" />

                                    {if strlen($formsData.item.link)>0}<a href="{$formsData.item.link}"><button class="btn_buy" onclick="location.href='{$formsData.item.link}'">Купить</button></a>{else}</form>{/if}
                                {if strlen($formsData.item.link)==0}<button class="btn_buy" id="button_item">Купить</button>{/if}
                            </div>
                        {/if}

                        <div class="share">
                            <p>Поделиться:</p>
                            <div class="tooltip" data-title="ВКонтакте"><a href="http://vk.com/share.php?url=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" target="_blank"><img src="/data/img/vk_2.png"></a></div>
                            <div class="tooltip" data-title="Facebook"><a href="https://www.facebook.com/sharer.php?u=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}"  target="_blank"><img src="/data/img/fb.png"></a></div>
                            <div class="tooltip" data-title="Twitter"><a href="http://twitter.com/share?text={$formsData.item.caption}&url=http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}" target="_blank"><img src="/data/img/tw.png"></a></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>

                {if $formsData.notice}
                    <div class="notice">
                        {$formsData.notice}
                    </div>
                {/if}

              
                <div id="tabs" class="htabs">

                    {if $formsData.item.about && $formsData.item.caption_about}
                        <a href="#tab-about">{$formsData.item.caption_about}</a>
                    {/if}

                    {if $formsData.item.characteristic && $formsData.item.caption_characteristic}
                        <a href="#tab-characteristic">{$formsData.item.caption_characteristic}</a>
                    {/if}

                    {if $formsData.item.review &&  $formsData.item.caption_review}
                        <a href="#tab-review">{$formsData.item.caption_review}</a>
                    {/if}

                    {if $formsData.item.activation && $formsData.item.caption_activation}
                        <a href="#tab-activation">{$formsData.item.caption_activation}</a>
                    {/if}

                    {if $formsData.item.discounts}
                        <a href="#tab-discounts">Скидки</a>
                    {/if}

                    <a href="#tab-feedback">Отзывы</a>
                </div>


                {if $formsData.item.about && $formsData.item.caption_about}<div id="tab-about" class="tab-content">{$formsData.item.about}</div>{/if}
                {if $formsData.item.characteristic && $formsData.item.caption_characteristic}<div id="tab-characteristic" class="tab-content">{$formsData.item.characteristic}</div>{/if}
                {if $formsData.item.review &&  $formsData.item.caption_review}<div id="tab-review" class="tab-content">{$formsData.item.review}</div>{/if}
                {if $formsData.item.activation && $formsData.item.caption_activation}<div id="tab-activation" class="tab-content">{$formsData.item.activation}</div>{/if}

                {if $formsData.item.discounts}
                    <div id="tab-discounts" class="tab-content">
                        {$formsData.discounts_text}
                        {foreach key=key item=item from=$formsData.item.discounts}
                            <li>{$item.summa}$ - скидка <b>{$item.percent}%</b></li>
                        {/foreach}
                    </div>
                {/if}

                {if $feedback_item}
                    <div id="tab-feedback" class="tab-content">
                        <p>Зайдите на <a style="color: #ff0000;" href="https://www.oplata.info" title="Oplata.info" target="_blank">Oplata.info</a>, авторизуйтесь, найдите свою покупку и в поле "Ваш отзыв:" оставьте свой отзыв, после чего он появится на нашем сайте.</p>
                        <br><br>
                        <div id="cont_res">
                            {foreach key=key item=item from=$feedback_item}
                                <div class="container-news">
                                        <a class="img-comment" style="width: auto;">
                                            {if $item.type=='good'}
                                                <span class="feedback_good">+</span>
                                            {else}
                                                <span class="feedback_bad">‒</span>
                                            {/if}

                                        </a>
                                        <div class="text-comment" style="width: 595px">
                                            <time class="review-time">{$item.date}</time>
                                            <p class="content-info-div-p">{$item.info}</p>
                                            {if $item.comment}
                                                <div class="sub-comment">
                                                    <div class="text-sub-comment">
                                                        <p class="admin review_name">Ответ продавца</p>
                                                        <p class="content-info-div-p">{$item.comment}</p>
                                                    </div>
                                                </div>
                                            {/if}
                                        </div>

                                </div>
                                <span class="line"> </span>
                            {/foreach}
                            {if isset($paginatorData) and $paginatorData.count>1}
                                <div class="pagination">
                                    <p>Страницы:</p>
                                    <ul>{if $paginatorData.page>5 and $paginatorData.count > 4}
                                            <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, {$digiseller_id});">1</a></li>
                                            <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                        {/if}
                                        {section name = pager start = 1 loop = $paginatorData.page+4 }
                                            {if $smarty.section.pager.index>0 and $smarty.section.pager.index>($paginatorData.page-4) and $smarty.section.pager.index<$paginatorData.count+1}
                                                <li {if $paginatorData.page==$smarty.section.pager.index}class="pagination-li active"{/if}  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$smarty.section.pager.index}, {$digiseller_id});">{$smarty.section.pager.index}</a></li>
                                            {/if}
                                        {/section}
                                        {if $smarty.section.pager.index<$paginatorData.count and $paginatorData.count>4}
                                            <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                            <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$paginatorData.count}, {$digiseller_id});">{$paginatorData.count}</a></li>
                                        {/if}
                                    </ul>
                                </div>
                            {/if}
                        </div>
                    </div>
                {else}
                    <div id="tab-feedback" class="tab-content">
                        <div class="header-comment">
                            <a id="leave-review" class="pen a-zoloto-wow active-leave-review">
                                <span class="blue-text">Оставить отзыв</span>
                            </a>
                            <a id="collapse-review" class="pen a-zoloto-wow">
                                <span  class="blue-text">Свернуть</span>
                            </a>
                            <p class="all-comment"><strong><a {if $feedback.count < 8} href="/content/feedback#{$feedback.id}" {else}href="/content/feedback/page/1#{$feedback.id}"{/if}>Все отзывы</a></strong><span>({$feedback.count})</span></p>
                            <div class="field-form-review">
                                <h3 id="leave-a-review" class="leave_a_comment">Оставить отзыв</h3>
                                <form name="feedback" method="post" action="/content/feedback{if $feedback.count > 8}/page/1{/if}">
                                    <p class="leave_a_comment-p">Ваше имя:</p>
                                    <input class="input_name" required type="text" name="name">
                                    <p class="leave_a_comment-p">Ваша эл. почта</p>
                                    <input {if isset($user.email)} value="{$user.email}" {/if} class="gold_input_name" required name="email">
                                    <input type="hidden" name="game" value="{$formsData.service.gid}">

                                    <p class="leave_a_comment-p">Ваш отзыв:</p>
                                    <textarea required class="input_comment" name="comment" cols="40" rows="3"></textarea>
                                    <p class="kod">Введите символы указанные на картинке</p>
                                    <img  src = "/data/captcha/captcha.php" >
                                    <input required class="input_kod" type = "text" name = "captcha">
                                    <div class="btn-wrap">
                                        <input class="btn" type="submit" value="Оставить отзыв">
                                    </div>
                                </form>
                            </div>
                        </div>
                        {if isset($error)}<p class="register-p" style="color:red">{$error}</p>{/if}
                        <div id="cont_res">
                            {if isset($feedback_game.0.id)}
                                {foreach key=key item=item from=$feedback_game}
                                    {if $item.id>0}
                                        <div class="container-news">
                                            <a class="img-comment"><img src="/data/photo/{$gimg}"></a>
                                            <div class="text-comment">
                                                <p class="review_name">{$item.name}</p>
                                                <time class="review-time">({$item.data|date_format:"%d.%m.%Y \ %H:%M"})</time>
                                                <p class="content-info-div-p" name="{$item.id}">{$item.text_feedback}{if $item.is_edited}<br><span>Отредактировано администратором</span>{/if}</p>
                                                {if $item.answer}
                                                    <div class="sub-comment">
                                                        <a class="img-sub-comment"><img src="/data/img/sack.png"></a>
                                                        <div class="text-sub-comment">
                                                            <p class="admin review_name">{$admin_name}</p>
                                                            <p class="content-info-div-p">{$item.answer}</p>
                                                        </div>
                                                    </div>
                                                {/if}
                                            </div>
                                        </div>
                                        <span class="line"> </span>
                                    {/if}
                                {/foreach}
                                {if isset($paginatorData) and $paginatorData.count>1}
                                    <div class="pagination">
                                        <p>Страницы:</p>
                                        <ul>{if $paginatorData.page>5 and $paginatorData.count > 4}
                                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, {$gid});">1</a></li>
                                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                            {/if}
                                            {section name = pager start = 1 loop = $paginatorData.page+4 }
                                                {if $smarty.section.pager.index>0 and $smarty.section.pager.index>($paginatorData.page-4) and $smarty.section.pager.index<$paginatorData.count+1}
                                                    <li {if $paginatorData.page==$smarty.section.pager.index}class="pagination-li active"{/if}  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$smarty.section.pager.index}, {$gid});">{$smarty.section.pager.index}</a></li>
                                                {/if}
                                            {/section}
                                            {if $smarty.section.pager.index<$paginatorData.count and $paginatorData.count>4}
                                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$paginatorData.count}, {$gid});">{$paginatorData.count}</a></li>
                                            {/if}
                                        </ul>
                                    </div>
                                {/if}
                            {/if}
                        </div>
                    </div>
                {/if}

                {literal}
                    <script type="text/javascript">
                        $('#tabs a').tabs();
                    </script>
                {/literal}
            </div>
        </div>
    </article>-->
{/if}




{if $formsMode == 'service_items'}
    <article class="content-info">
        <h2>{$formsData.caption}</h2>
        <div class="content-info-div filter_item">

            <!-- <form class="filters">
                {if $data.filter_1.filter}
                    <div class="filter">
                        <label for="filter_1">{$data.filter_1.filter}:</label>
                        <select id="filter_1" name="filter_1">
                            <option value=""></option>
                            {foreach key=key item=item from=$data.filter_1.filters}
                                <option value="{$item}">{$item}</option>
                            {/foreach}
                        </select>
                    </div>
                {/if}

                {if $data.filter_2.filter}
                    <div class="filter">
                        <label for="filter_2">{$data.filter_2.filter}:</label>
                        <select id="filter_2" name="filter_2">
                            <option value=""></option>
                            {foreach key=key item=item from=$data.filter_2.filters}
                                <option value="{$item}">{$item}</option>
                            {/foreach}
                        </select>
                    </div>
                {/if}

                {if $data.filter_3.filter}
                    <div class="filter">
                        <label for="filter_3">{$data.filter_3.filter}:</label>
                        <select id="filter_3" name="filter_3">
                            <option value=""></option>
                            {foreach key=key item=item from=$data.filter_3.filters}
                                <option value="{$item}">{$item}</option>
                            {/foreach}
                        </select>
                    </div>
                {/if}

                {if $data.filter_4.filter}
                    <div class="filter">
                        <label for="filter_4">{$data.filter_4.filter}:</label>
                        <select id="filter_4" name="filter_4">
                            <option value=""></option>
                            {foreach key=key item=item from=$data.filter_4.filters}
                                <option value="{$item}">{$item}</option>
                            {/foreach}
                        </select>
                    </div>
                {/if}

                <div class="filter">
                    <label for="filter_search">Поиск по названию:</label>
                    {if $data.search_desc}<div class="tooltip" data-title="{$data.search_desc}">{/if}
                        <input class="search-input-field" type="search" name="filter_search" id="filter_search" placeholder="Введите текст">
                        <input class="search-btn" type="submit" value="">
                    {if $data.search_desc}</div>{/if}
                </div> 

                <input type="hidden" id="p_get" value="{$p_get}">

            </form>-->
      
              
           

          

         


             

          







       
        </div>

        <section class="skillup skillup-account" id="skillup">
            <div class="container">
                <form class="filters">
              <div class="skillup__inputs lined skillup__inputs_wrap">
                
                <div class="skillup-account__inputs">


                  


                  






                {if $data.filter_1.filter}
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        {$data.filter_1.filter}
                    </div>
                  
                    <select name="filter_1" id="filter_1" class="skillup__input">
                        <option value=""></option>
                        {foreach key=key item=item from=$data.filter_1.filters}
                            <option value="{$item}">{$item}</option>
                        {/foreach}
                    </select>
                  </div>
                  {/if}









              {if $data.filter_2.filter}
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        {$data.filter_2.filter}:
                    </div>
                  
                    <select name="filter_2"id="filter_2" class="skillup__input">
                        <option value=""></option>
                        {foreach key=key item=item from=$data.filter_2.filters}
                            <option value="{$item}">{$item}</option>
                        {/foreach}
                    </select>
                  </div>
                  {/if}





                  {if $data.filter_3.filter}
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        {$data.filter_3.filter}:
                    </div>
                    <label for="#sort-fraction" class="sort__category"></label>
                    <select  name="filter_3" id="filter_3" class="skillup__input">
                        <option value=""></option>
                        {foreach key=key item=item from=$data.filter_3.filters}
                            <option value="{$item}">{$item}</option>
                        {/foreach}
                    </select>
                  </div>
                  {/if}



             



              {if $data.filter_4.filter}
                  <div class="catalog__sort skillup-account__sort">
                    <div class="sort__text">
                        {$data.filter_4.filter}:
                    </div>
                   
                    <select name="filter_4" id="filter_4" class="skillup__input">
                        <option value=""></option>
                        {foreach key=key item=item from=$data.filter_4.filters}
                            <option value="{$item}">{$item}</option>
                        {/foreach}
                    </select>
                  </div>
                  {/if}

                  <input type="hidden" id="p_get" value="{$p_get}">

       
              


                </div>




          


               

                <div class="skillup__sort skillup__sort_search">
                    <div class="skillup__search-text">
                      Поиск по названию:
                    </div>
                    {if $data.search_desc}<div class="tooltip" data-title="{$data.search_desc}">{/if}
                        <div style="    background: rgba(53, 53, 53, 0.95);
                        display: flex;
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        align-items: center;
                        border-radius: 12px;">
                    <input style="margin-bottom: 0px; background: rgba(53, 53, 53, 0);   border: 0px solid;
                    background-image: none;" type="text" name="filter_search" class="kot brown-input skillup__search" placeholder="Введите текст">
                    <input style="margin-right: 15px;" class="kott admin__logo search__logo" type="image" src="https://azerty-money.ru/data/img/skill-search-icon.png">
                     </div>
                    {if $data.search_desc}</div>{/if}
 
                </div>



                <div class="catalog__sort skillup__sort">
                  <div class="sort__text sort__text_sort">
                    Сортировка:
                  </div>
                  <label for="#sort-category"></label>
                  <select style="    background: rgba(98, 98, 98, 0.95);
                  border: 1px solid rgba(255, 255, 255, 0.2);
                  border-radius: 12px;
                  padding: 15px;
                  margin-left: 30px;
                  color: #fff;" name="sort__category" id="sort-category1" class="skillup__input">
                    <option  class="rating rating-active sort-z" onclick="sorting('rait', $(this));" value="rait">Рейтинг</option>
                    <option  class="sort-a-z" onclick="sorting('a_z', $(this));" value="a_z">А-я</option>
                  
                  
                  </select>
                
                </div>
              </div>



        

        </form>




            


           
              <div class="skillup__wrap products">










         
      
      






















                      {$foo = 0}   
		
                      {$test = $smarty.get.ser_item * 8}
                      {$test1 = $test + 1}
                      {$test2 = $test1 - 8}
              






        {if isset($formsData.elements.0.id)}

            {foreach key=key item=item from=$formsData.elements}


  
            <div style="display: none;"> {$foo++}   </div> 
            {if $foo < $test2 }
              
            {continue}
            
            
                  {/if}
              {if $foo == $test1 }
              
        {break}
        
        
              {/if}


       

            <div sort="{$item.sort}" class="skillup__item games__card">
                {if $item.photo}
                <img style="height: 75%;" src="https://azerty-money.ru/data/photo/{$item.photo}" alt="Skillup" class="skillup__bg">           
            {else}
                <img src="https://azerty-money.ru/data/img/azerty_money-foto.png">
            {/if}
                <div class="skillup__head">
                  <h5 class="skillup__name">
                    {$item.caption}
                  </h5>
                  <span class="skillup__price">
                    {$item.price}
                  </span>
                  <span class="skillup__cur">
                    ₽
                  </span>
                </div>
                <div class="skillup__bottom">
                  <div class="skillup__icons">
                    <div class="icons__info" data-title="Лучшие цены и способы оплаты">
                      <img src="https://azerty-money.ru/data/img/skillup-like.png" alt="Like" class="skillup__img">
                    </div>
                    <div class="icons__info" data-title="Моментальная доставка">
                      <img src="https://azerty-money.ru/data/img/skillup-fast.png" alt="Fast" class="skillup__img">
                    </div>
                    <div class="icons__info" data-title="Гарантия качества">
                      <img src="https://azerty-money.ru/data/img/skillup-safe.png" alt="Shield" class="skillup__img">
                    </div>
                  </div>
                  <a href="{$item.seo_link}" class="btn skillup__btn">
                    Купить
                  </a>
                </div>
              </div>


             




         








                     

                           <div class="advantages" style="display: none;">
                                {foreach key=key1 item=advantage from=$item.advantages}
                                    <div class="tooltip" data-title="{$advantage.caption}"><img src="/{$advantage.photo}"></div>
                                {/foreach}
                            </div> 

                            <div class="clear" style="display: none;"></div>
                       
             
            {/foreach}



         


        </div>









        {if $smarty.session.co_it > 1}

        <div class="catalog__pages review__pages">

       {if $smarty.get.ser_item > 2}
          <a
          style="text-decoration:none;" href=?ser_item=1>
     
        1
            </a>

        

          <a
          style="text-decoration:none;" href="#">
       ...
            </a>
            {/if}
          {for $foo=1 to $smarty.session.ser_item1}
          {$tes = $smarty.get.ser_item + 1}
          {$tes1 = $smarty.get.ser_item - 1}
      
          {if $tes < $foo }
      
          {break}
          {/if}
          {if $tes1 > $foo }
          {continue}
        
          {/if}

      
    
    
          <a class="	{if $foo == $smarty.get.ser_item }  active__page   {/if}"
          style="text-decoration:none;" href=?ser_item={$foo}>
            {$foo}
            </a>
            {/for}

            {if $smarty.get.ser_item < $smarty.session.co_it - 2}

            <a
            style="text-decoration:none;">
           
          
               ...
         
      
           
              </a>



            <a
            style="text-decoration:none;" href=?ser_item={$smarty.session.co_it}>
           
          
                <p>{$smarty.session.co_it}</p>
         
      
           
              </a>


              {/if}
          </div>


{/if}






















    </div>
    </section>
 <!-- 
            <div class="clear"></div>
            {if isset($data.paginatorData) and $data.paginatorData.count>1}
                <div class="pagination">
                    <p>Страницы:</p>
                    <ul>{if $data.paginatorData.page>5 and $data.paginatorData.count > 4}
                            <li class="pagination-li"><a href="{$p_get}">1</a></li>
                            <li class="pagination-li"><a href="#">...</a></li>
                        {/if}
                        {section name = pager start = 1 loop = $data.paginatorData.page+4 }
                            {if $smarty.section.pager.index>0 and $smarty.section.pager.index>($data.paginatorData.page-4) and $smarty.section.pager.index<$data.paginatorData.count+1}

                                <li {if $data.paginatorData.page == $smarty.section.pager.index}class="pagination-li active"{/if}  class="pagination-li">
                                    {if $smarty.section.pager.index == 1}
                                        <a href="{$p_get}">{$smarty.section.pager.index}</a>
                                    {else}
                                        <a href="{$p_get}?page={$smarty.section.pager.index}">{$smarty.section.pager.index}</a>
                                    {/if}
                                </li>
                            {/if}
                        {/section}
                        {if $smarty.section.pager.index<$data.paginatorData.count and $data.paginatorData.count>4}
                            <li class="pagination-li"><a href="#">...</a></li>
                            {if $smarty.section.pager.index == 1}
                                <li class="pagination-li"><a href="{$p_get}">{$data.paginatorData.count}</a></li>
                            {else}
                                <li class="pagination-li"><a href="{$p_get}?page={$data.paginatorData.count}">{$data.paginatorData.count}</a></li>
                            {/if}
                        {/if}
                    </ul>
                </div>
            {/if}-->
   
        {else}
        <p style="color:white">В категории временно нет товаров</p>
        {/if}
 

    </article>
{/if}









<script>
	$("body").on("click","#button_item", function(e){
			alert(' Что бы купить этот товар свяжитесь с нами по контактным данным или через онлайн чат');
			});
</script>
{if $formsMode == 'levelup'}
    <article class="content-info">
    <h2>{$formsData.caption}</h2>
    <div class="content-info-div">
        <form method="post">
            <p class="content-info-div-p">{$formsData.about}</p>
            <input class="gold_input_name" {if isset($user.email)}value="{$user.email}"{/if} name="email">
            <p class="leave_a_comment-p">Ваша эл. почта</p>
            <p class="input_information-p">Оставьте ваши контактные данные</p>
            <textarea class="input_information" name="Оставьте ваши контактные данные" cols="40" rows="3"></textarea>
            <div class="accord">
                <input id="ch1" type="checkbox" required>
                <label for="ch1">Я ознакомился с <a target="_blank" href="/content/view/3">условиями соглашения</a></label>
            </div>
            <div class="btn-wrap">
                    <button class="btn" type="submit">Отправить заявку</button>
            </div>
        </form>
    </div>
    </article>
{/if}

{if $formsMode == 'text'}
<div class="container" style="margin-bottom: 100px;">
    <article class="content-info">
    <h2>{$formsData.caption}</h2>
    <div class="content-info-div">
            <p class="content-info-div-p">{$formsData.about}</p>
    </div>
    </article>
</div>
{/if}

{if $formsMode == 'paymentYandex'}
    {if isset($user.id) and $user.id == $pyandex.uid or isset($cook_order) and $cook_order == $pyandex.code}
    <article class="content-info">
    <h2>Оплата заказа</h2>
    <div class="container" style="margin-bottom: 100px;"> 
    <div class="content-info-div">
        
              <p class="leave_a_comment-p">{$pyandex.data}</p>
        </div>
              <br>
              <div style="display: flex;
              justify-content: center;"> </div>
        <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/small.xml?account={$account}&quickpay=small&yamoney-payment-type=on&button-text=02&button-size=m&button-color=orange&targets=Заказ №{$pyandex.id}&default-sum={$pyandex.money}&label={$pyandex.id}" width="160" height="42"></iframe>
    </div>
    </div>
</div>
    </article>
    {else}
    <article class="content-info">
    <h2>404</h2>
    <p>Страница не найдена<br>
    К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
    Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
    </article>
    {/if}
{/if}

{if $formsMode == 'paymentRobo'}
    {if isset($user.id) and $user.id == $probo.uid or isset($cook_order) and $cook_order == $probo.code}
    <article class="content-info">
    <h2>Оплата заказа</h2>
    <div class="container" style="margin-bottom: 100px;"> 
    <div class="content-info-div">
        <p class="leave_a_comment-p">{$probo.data}</p><br>
        <div class="btn-wrap"  style="display: flex;
        justify-content: center;">
            <a href="{$url}"><button class="btn" type="submit">Купить</button></a>
        </div>
    </div>
</div>
    </article>
    {else}
    <article class="content-info">
    <h2>404</h2>
    <p>Страница не найдена<br>
    К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
    Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
    </article>
    {/if}
{/if}

{if $formsMode == 'paymentWM'}
    {if isset($user.id) and $user.id == $paywm.uid or isset($cook_order) and $cook_order == $paywm.code}
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">
            <p class="leave_a_comment-p">{$paywm.data}</p><br>
            <form id=pay name=pay method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp">
                <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{$paywm.money}">
                <input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="{$description}">
                <input type="hidden" name="LMI_PAYMENT_NO" value="{$paywm.id}">
                <input type="hidden" name="LMI_PAYEE_PURSE" value="{$purse}">
                <div class="btn-wrap"  style="display: flex;
                justify-content: center;">
                    <button class="btn" type="submit">Купить</button>
                </div>
            </form>
        </div>
    </div>
        </article>
    {else}
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    {/if}
{/if}

{if $formsMode == 'paymentQiwi'}
    {if isset($user.id) and $user.id == $pqiwi.uid or isset($cook_order) and $cook_order == $pqiwi.code}
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">

            <p class="leave_a_comment-p">{$pqiwi.data}</p><br>
            <form id="post_paym" name="post_paym" method="GET" action="https://w.qiwi.com/order/external/create.action" onsubmit="return check_form($(this));">
            <p class="leave_a_comment-p">Введите свой номер киви кошелька, вместе с кодом страны(+7,+38 и т.д.)</p>
            <input type="text" class="gold_input_name_qiwi" name="to" required>
            <input type="hidden" value="{$shop_id}" name="from">
            <input type="hidden" value="{$pqiwi.money}" name="summ">
            <input type="hidden" value="Payment orders: {$pqiwi.id}" name="com">
            <input type="hidden" value="1056" name="lifetime">
            <input type="hidden" value="false" name="check_agt">
            <input type="hidden" value="RUB" name="currency">
            <input type="hidden" value="{$pqiwi.id}" name="txn_id">
            <input type="hidden" value="http://www.azerty-money.ru/forms/qiwiSuccess" name="successUrl">
            <input type="hidden" value="http://www.azerty-money.ru/forms/qiwiFail" name="failUrl">
            <div class="btn-wrap"  style="display: flex;
            justify-content: center;">
                <input type="hidden" value=0 name="calc_type" />
                <button class="btn" type="submit">Купить</button>
            </div>
            </form>
        </div>
    </div>
        </article>
    {else}
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    {/if}
{/if}


{if $formsMode == 'payment_unitpay'}
    {if isset($user.id) and $user.id == $order_data.uid or isset($cook_order) and $cook_order == $order_data.code}
        <article class="content-info">
        <h2>Оплата заказа</h2>
        <div class="container" style="margin-bottom: 100px;"> 
        <div class="content-info-div">
            <p class="leave_a_comment-p">{$order_data.data}</p><br>
            {if isset($phone_unit)}
            <form method="post">
                <p class="leave_a_comment-p">Введите номер телефона(только цифры, пример: 79871234567)</p>
                <input type="text" class="gold_input_name_qiwi" required name="phone_unit">
                <div class="btn-wrap">
                    <button class="btn" type="submit">Купить</button>
                </div>
            </form>
            {else}
            <div class="btn-wrap"  style="display: flex;
            justify-content: center;">
                <a href="{$redirect_url}"><button class="btn" type="submit">Купить</button></a>
            </div>
            {/if}
        </div>
    </div>
        </article>
    {else}
        <article class="content-info">
        <h2>404</h2>
        <p>Страница не найдена<br>
        К сожалению, если вы оказались на этой странице - что то пошло не так.<br>
        Для решения данной проблемы напишите нашим операторам и сообщите о проблеме.</p>
        </article>
    {/if}
{/if}

{if $formsMode == 'order'}
    {if $formsData.type==0}
    <script>
        function calculation_price(val){
            if(val){
                var coef = {$servers.0.coef};
                var array_coef = { 0:'0'{foreach key=key item=item from=$servers},{$item.id}:'{$item.coef}'{/foreach}};
                coef = array_coef[val];
                var money = Number(unit_of_currency()) / coef;
                var nmoney = money.toFixed(2);
                return nmoney;
            }
            return false;
        }
        $(document).ready(function() {

            var spent = {$spentMoney};
            var all_money = spent;
            var pc = 0;
            var min_price = {if isset($min_price) and $min_price}{$min_price}{else}50{/if};
            var one_val = 1;
            var vv = 1;
            var symbol = '<del> P</del>';
            var symbol_end = '<img src="/data/img/rouble.png">';
          
            setTimeout(function(){
                $('.payment__item_active').trigger('click');
}, 1000);




          $(".payment__item").click(function(){
            var inp = $(".payment__item_active input").attr('value');
            $("#inp_hid").attr('value', inp);
                var cc = $(".payment__item_active input").attr('cc');
              
                if(cc && cc != 'RUR'){
                  var cc = $(".payment__item_active input").attr('cc');
                    $.ajax({
                        type: 'POST',
                        url : '/forms/currency_rate',
                        dataType:'text',
                        data: "cc=" + cc,
                        success:function(data){
                           
                 console.log(data)
                         
                          
                              
                                data = JSON.parse(data);
                             
                                symbol = data["symbol"];
console.log(symbol);
                                symbol_end = symbol;
                                vv = data["value"] / data["nominal"];
                                one_val = data["nominal"] / data["value"];
                                var min_text = one_val * min_price;
                                $('select[name=server]').change();
                                if(min_text){
                                    min_text = Math.round(parseFloat(min_text) * 100) / 100;
                                    $('#message_minimum').text('Минимальная сумма заказа ' + min_text + ' ' + data['symbol']);
                                    $('.bg-valut').html(data['symbol']);
                                } else {
                                    alert('Произошла ошибка при смене валюты, свяжитсь с менеджером1');
                                    $('select[name=payment]').val(1).change();
                                }
                           
                        }
                    });
                } else {
                    $('#message_minimum').text('Минимальная сумма заказа ' + min_price + ' ').append('<del> P</del>');
                    symbol = '<del> P</del>';
                    one_val = 1;
                    vv = 1;
                    $('.bg-valut').html('<img src="/data/img/rouble.png">');
                    symbol_end = '<img src="/data/img/rouble.png">';
                    $('select[name=server]').change();
                }
            });
            $('input[name=promo_code]').on('keyup paste cut', function(){
                $.ajax({
                    type: 'POST',
                    url : '/forms/promo_code',
                    dataType:'text',
                    data: 'code=' + $(this).val() + '&gid=' + {$formsData.gid},
                    success:function(data){
                        if(data) pc = Number(data); else pc = 0;
                        if($('select[name=server]').val()) $('select[name=server]').change();
                    }
                });
            });
            var coef = {$servers.0.coef};
            $('select[name=server]').change(function ()
            {
                var discount = 0;
                {foreach key=key item=item from=$discounts}
                    if (all_money>={$item.start} {if $item.end!='><'}&& all_money<{$item.end}{/if}) { discount = {$item.d}}
                {/foreach}
                discount += pc;
                var array_coef = { 0:'0'{foreach key=key item=item from=$servers},{$item.id}:'{$item.coef}'{/foreach}};
                coef = array_coef[$('select[name=server]').val()];

                var total = 0;
                var $row = $(this).parent();
                var n1 = parseFloat($('input[name=calc1]').val());
                var n2 = parseFloat($('input[name=calc2]').val());

                var nm = calculation_price($(this).val());
                $('p[name=sum_game]').find('span').html(' ' + (Math.round((nm * one_val) * 1000) / 1000) + ' ' + symbol);
                $('p[name=sum_game]').show();

                if ($.isNumeric(n1) || $.isNumeric(n2))
                {
                    var money = n2;
                    var valute = n2 * coef * vv;

                    valute = Math.ceil((valute * (discount / 100 + 1))*100)/100;

                    $('input[name=calc_type]').val('0');

                    $('input[name=calc1]').val(valute);
                    $('input[name=calc2]').val(money);

                    $('p[name=n_discount]').text(discount + ' %');
                    $('p[name=c_discount]').text('Ваша скидка:');

                    $('p[name=n_sum]').text(money).append('<span class="sum-valut">' + symbol_end + '</span>');
                    $('p[name=c_sum]').text('Итого к оплате:');
                }

            });

            $('input[name=calc1],input[name=calc2]').keyup(function(e) {
                var discount = 0;
                {foreach key=key item=item from=$discounts}
                    if (all_money>={$item.start} {if $item.end!='><'}&& all_money<{$item.end}{/if}) { discount = {$item.d}}
                {/foreach}
                discount += pc;
                var total = 0;
                var $row = $(this).parent();
                var n1 = parseFloat($('input[name=calc1]').val());
                var n2 = parseFloat($('input[name=calc2]').val());

                if ($.isNumeric(n1) || $.isNumeric(n2))
                {
                    if (parseFloat($(this).val()) == n2) // вводил я оплачу
                    {
                        var money = n2;
                        var valute = n2 * coef * vv;

                        valute = Math.ceil((valute * (discount / 100 + 1))*100)/100;
                        $('input[name=calc_type]').val('0');
                    }

                    if (parseFloat($(this).val()) == n1) // вводил я покупаю
                    {
                        var valute = n1;
                        var money = n1 / coef / vv;
                        //all_money = spent;

                        money = Math.round((money / (discount / 100 + 1) )*100)/100;
                        $('input[name=calc_type]').val('1');
                    }


                    $('input[name=calc1]').val(valute);
                    $('input[name=calc2]').val(money);

                    $('p[name=n_discount]').text(discount + ' %');
                    $('p[name=c_discount]').text('Ваша скидка:');

                    $('p[name=n_sum]').text(money).append('<span class="sum-valut">' + symbol_end + '</span> ');
                    $('p[name=c_sum]').text('Итого к оплате:');

                }
            });
        });


    </script>
    {/if}
  
    {include file=$formsData.template}

    <!--<article class="content-info">
    <h2>{$formsData.caption}</h2>
    <div class="content-info-div">
        <form method="post" onsubmit="return check_form($(this));">
           {*** <p class="content-info-div-p">{$formsData.about}</p> ***}
               {$formsData.order_info}
            <p style="float:right;" >Для отображения цены выберите сервер</p>
    {include file=$formsData.template}
    {if $formsData.type == 0}
    <input class="gold_input_name" name="promo_code">
    <p class="leave_a_comment-p calculator">Промокод</p>
    {/if}
    <div class="accord">
        <input id="ch1" type="checkbox" required>
        <label for="ch1">Я ознакомился с <a target="_blank" href="/content/view/3">условиями соглашения</a></label>
    </div>
    <div class="for_payment">
        <p class="p-for_payment" name="c_discount"></p>
        <p class="sum" name="n_discount" style="background:none"></p>
    </div>
    <div class="for_payment">
        <p class="p-for_payment" name="c_sum"></p>
        <p class="sum" name="n_sum"></p>
    </div>
    <div class="btn-wrap">
        <input type="hidden" value=0 name="calc_type" />
        {if $formsData.type==0}
        <input type="hidden" value="" name="manok_1" />
        <input type="hidden" value="i_got" name="manok_2" />
        {/if}
        <button class="btn" type="submit">Купить</button>
        </form>
    </div>
    </div>
    </article>
    <article class="content-info">
        <h2>Отзывы</h2>
        <div class="content-info-div">
            <div class="header-comment">
                <a id="leave-review" class="pen a-zoloto-wow active-leave-review">
                    <span class="blue-text">Оставить отзыв</span>
                </a>
                <a id="collapse-review" class="pen a-zoloto-wow">
                    <span  class="blue-text">Свернуть</span>
                </a>
                <p class="all-comment"><strong><a {if $feedback.count < 8} href="/content/feedback#{$feedback.id}" {else}href="/content/feedback/page/1#{$feedback.id}"{/if}>Все отзывы</a></strong><span>({$feedback.count})</span></p>
                <div class="field-form-review">
                    <h3 id="leave-a-review" class="leave_a_comment">Оставить отзыв</h3>
                    <form name="feedback" method="post" action="/content/feedback{if $feedback.count > 8}/page/1{/if}">
                        <p class="leave_a_comment-p">Ваше имя:</p>
                        <input class="input_name" required type="text" name="name">
                        <p class="leave_a_comment-p">Ваша эл. почта</p>
                        <input {if isset($user.email)} value="{$user.email}" {/if} class="gold_input_name" required name="email">
                        <p class="leave_a_comment-p">Выберите игру</p>
                        <select class="gold_game_selection" required name="game">
                            {if isset($games.0.id)}
                            {foreach key=key item=item from=$games}
                            <option {if $gid == $item.id} selected {/if} value="{$item.id}">{$item.caption}</option>
                            {/foreach}
                            {/if}
                        </select>
                        <p class="leave_a_comment-p">Ваш отзыв:</p>
                        <textarea required class="input_comment" name="comment" cols="40" rows="3"></textarea>
                        <p class="kod">Введите символы указанные на картинке</p>
                        <img  src = "/data/captcha/captcha.php" >
                        <input required class="input_kod" type = "text" name = "captcha">
                        <div class="btn-wrap">
                            <input class="btn" type="submit" value="Оставить отзыв">
                        </div>
                    </form>
                </div>
            </div>
            {if isset($error)}<p class="register-p" style="color:red">{$error}</p>{/if}
            <div id="cont_res">
                {if isset($feedback_game.0.id)}
                {foreach key=key item=item from=$feedback_game}
                {if $item.id>0}
                    <div class="container-news">
                        <a class="img-comment"><img src="/data/photo/{$gimg}"></a>
                        <div class="text-comment">
                            <p class="review_name">{$item.name}</p>
                            <time class="review-time">({$item.data|date_format:"%d.%m.%Y \ %H:%M"})</time>
                            <p class="content-info-div-p" name="{$item.id}">{$item.text_feedback}{if $item.is_edited}<br><span>Отредактировано администратором</span>{/if}</p>
                            {if $item.answer}
                            <div class="sub-comment">
                                <a class="img-sub-comment"><img src="/data/img/sack.png"></a>
                                <div class="text-sub-comment">
                                    <p class="admin review_name">{$admin_name}</p>
                                    <p class="content-info-div-p">{$item.answer}</p>
                                </div>
                            </div>
                            {/if}
                        </div>
                    </div>
                    <span class="line"> </span>
                {/if}
                {/foreach}
                {if isset($paginatorData) and $paginatorData.count>1}
                    <div class="pagination">
                        <p>Страницы:</p>
                        <ul>{if $paginatorData.page>5 and $paginatorData.count > 4}
                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination(1, {$gid});">1</a></li>
                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                            {/if}
                            {section name = pager start = 1 loop = $paginatorData.page+4 }
                                {if $smarty.section.pager.index>0 and $smarty.section.pager.index>($paginatorData.page-4) and $smarty.section.pager.index<$paginatorData.count+1}
                                    <li {if $paginatorData.page==$smarty.section.pager.index}class="pagination-li active"{/if}  class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$smarty.section.pager.index}, {$gid});">{$smarty.section.pager.index}</a></li>
                                {/if}
                            {/section}
                            {if $smarty.section.pager.index<$paginatorData.count and $paginatorData.count>4}
                                <li class="pagination-li"><a href="javascript:void(0);">...</a></li>
                                <li class="pagination-li"><a href="javascript:void(0);" onclick="func_pagination({$paginatorData.count}, {$gid});">{$paginatorData.count}</a></li>
                            {/if}
                        </ul>
                    </div>
                {/if}
                {/if}
            </div>
            <p class="content-info-div-p">{$formsData.about}</p>
        </div>
    </article>-->
{/if}