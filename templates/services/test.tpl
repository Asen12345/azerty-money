
<div class="container">
<div class="head-of">
          <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__home">
              Главная
            </a> / Оформить заказ
          </div>
          <h1 class="title-of">
            {$formsData.caption}
          </h1>
        </div>
</div>
        <section class="payment" id="payment">
      <div class="container">
        <p class="payment__text">
            {$formsData.order_info}
        </p>
        <h2 class="name-of payment__name">
          Оформить заказ
        </h2>
        <form style="width: 100% !important;" onsubmit="return check_form($(this));" method="POST" class="payment__data js-form popupResult" id="popupResult2" novalidate="novalidate">

        <div class="payment__types">

            {foreach key=key item=item from=$psystems}
          
            <div name= "payment" cc="{$item.cc}" value="{$item.cc}" class="payment__item {if $item.sort == 1} payment__item_active {/if}">
                <img src="https://azerty-money.ru/data/img/{$item.img}" alt="WebMoney" class="payment__icon">
                <span>{$item.caption}</span>
                  <input name="payment" cc="{$item.cc}" value="{$key}" type="hidden">
              </div>
            

        {/foreach}
        <input id="inp_hid" name="paymen" value="" type="hidden">


  


        </div>
        <div class="payment__wrap pay-line">
          <p class="payment__desk">
            Анотации к заказу<br><br>
            Равным образом начало повседневной работы по формированию позиции влечет за собой процесс внедрения и
            модернизации позиций, занимаемых участниками в отношении поставленных задач. С другой стороны консультация
            с
            широким активом в значительной степени обуславливает создание дальнейших направлений развития. <br><br>

            Задача организации, в особенности же реализация намеченных плановых заданий представляет собой интересный
            эксперимент проверки систем массового участия. Не следует, однако забывать, что постоянное
            информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и
            модернизации систем массового участия. Значимость этих проблем настолько очевидна, что рамки и место
            обучения кадров требуют от нас анализа направлений прогрессивного развития. Задача организации, в
            особенности же дальнейшее развитие различных форм деятельности играет важную роль в формировании
            соответствующий условий активизации. Равным образом начало повседневной работы по формированию позиции
            влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных
            задач. С другой стороны консультация с широким активом в значительной степени обуславливает создание
            дальнейших направлений развития. <br><br>

            Задача организации, в особенности же реализация намеченных плановых заданий представляет собой интересный
            эксперимент проверки систем массового участия. Не следует, однако забывать, что постоянное
            информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения.
          </p>
<div id="rov">
            <div class="data__row">
              <div class="data__name">
                Выберите сервер<span class="required" aria-required="true">*</span>
              </div>
              <div class="data__side">
                <label for="data__server"></label>



                <select name="server" id="data__server" class="data__input" required>
                    <option selected value="">---------------------------------------</option>
                {foreach key=key item=item from=$servers}
                    <option value="{$item.id}">{$item.caption}</option>
                {/foreach}
                </select>
                <script>
                    function unit_of_currency() { return 1; } //единица валюты
                </script>
                	<p class="leave_a_comment-cena"></p>
                    <p class="data__text" name="sum_game" style="display:none;">{$formsData.min_tex}<span></span></p></br>
                    <div class="clr"><span> </span></div>
            
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Валюта<span class="required" aria-required="true">*</span>
              </div>
              <div class="data__side_cur">
                <div class="side__div">
                  <input type="text" name="calc1" class="data__input data__input_cur" required="" aria-required="true">
                  <span class="addition-sm">Сумма<span class="required" aria-required="true">*</span> </span>
                  <input type="number"  name="calc2" class="data__input data__input_cur" required="" aria-required="true">
                  <span class="currency">₽</span>
                </div>
                <div id="message_minimum" class="data__text data__text_yellow">
                  Минимальная сумма заказа {if $min_price}{$min_price}{else}50{/if} P
                </div>
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Укажите имя персонажа<span class="required" aria-required="true">*</span>
              </div>
              <input type="text" name="Укажите имя персонажа" class="data__input data__input_nic" placeholder="Никнейм" required="" aria-required="true">
            </div>
            <div class="data__row">
              <div class="data__side data__side_text">
                <input type="text" {if isset($user.email)} value="{$user.email}" {/if}  name="email" class="data__input" placeholder="E-mail" required="" aria-required="true">
                <p class="data__text">
                  Накопительная система скидок. <br>
                  Для получения скидки Вам достаточно лишь указывать один и тот же email ко всем заказам. Посмотреть
                  набранный % скидки Вы можете в личном кабинете.
                </p>
              </div>
              <div style="margin-left: 20px;" class="data__side">
                <div class="discount__row">
                  <div class="discount__point">
                    100 - 500
                  </div>
                  <div class="discount__rate">
                    1%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    500 - 2000
                  </div>
                  <div class="discount__rate">
                    2%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    2000 - 5000
                  </div>
                  <div class="discount__rate">
                    3%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    5000 - 10000
                  </div>
                  <div class="discount__rate">
                    4%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    10000 - 30000
                  </div>
                  <div class="discount__rate">
                    5%
                  </div>
                </div>
                <div class="discount__row">
                  <div class="discount__point">
                    VIP статус &gt; 30000
                  </div>
                  <div class="discount__rate">
                    10%
                  </div>
                </div>
              </div>
            </div>
            <div class="data__row">
              <div class="data__name">
                Есть промокод? Укажите его здесь!
              </div>
              <input type="text" name="promo_code" class="data__input data__input_nic">
            </div>
            <div class="data__row">
              <div class="data__name">
                Связь:<span class="required" aria-required="true">*</span>
              </div>
              <textarea name="Контактные данные" class="data__input data__input_nic data__textarea" placeholder="Как с вами связаться? Укажите удобный вам способ связи (WhatsApp, Telegram, Skype, VK)" required="" aria-required="true"></textarea>
            </div>
            <div class="data__row_last">
              <div class="data__check">
                <input class="data__checkbox" type="checkbox" required>
               
                <div class="data__text">
                  Я ознакомился с <a href="#" class="data__link">условиями соглашения</a>
                </div>
              </div>
              <div class="data__total">
                <div class="total__text">
                    <p  name="c_discount"> &nbsp; </p>
                   <span><p name="n_discount" style="background:none"></p></span> 
                </div>
                <div class="total__text">
                    <style>
#test_i img{
    display: none;
}
                    </style>
                    <p name="c_sum"> &nbsp; </p>
                    <span><p  id="test_i" name="n_sum" style="background:none; display: flex; padding-left: 20px;"></p></span> 
                </div>
              </div>
            </div>
          
                <input type="hidden" value=0 name="calc_type" />
                {if $formsData.type==0}
                <input type="hidden" value="" name="manok_1" />
                <input type="hidden" value="i_got" name="manok_2" />
                {/if}
                <button type="submit" class="btn total__btn ml-auto" >
              Купить
             
            </button>
    
        </div>
        </div>
    </form>
        <div class="payment__reviews reviews">
          <h2 class="name-of reviews-name">
            Отзывы
          </h2>
          <a style="font-size: 22px; color: #ffffff;     margin-left: 5px;
          margin-right: 5px; text-decoration: underline;" href="#nav_g">
            Оставить отзыв
          </a>
          <a style="font-size: 22px; color: #ffffff;     margin-left: 5px;
          margin-right: 5px; text-decoration: underline;" href="https://azerty-money.ru/content/feedback" target="_blank">
            Все отзывы
          </a>



          {$foo = 0}   
		
          {$test = $smarty.get.feed * 15}
          {$test1 = $test + 1}
          {$test2 = $test1 - 15}



          {if isset($feedback_game.0.id)}
          {foreach key=key item=item from=$feedback_game}
          {if $item.id>0}

   <div style="display: none;"> {$foo++}   </div> 

      {if $foo < $test2 }
        
      {continue}
      
      
          {/if}
        {if $foo == $test1 }
        
    {break}
    
    
        {/if}

          <div class="reviews__item pay-line">
            <div class="payment-line"></div>
            <img src="https://azerty-money.ru/data/photo/{$gimg}" alt="Person" class="reviews__img">
            <div class="reviews__content">
              <div class="reviews__head">
                <h5 class="reviews__name">
                    {$item.name}
                </h5>
                <div class="reviews__date">
                    <time class="review-time">({$item.data|date_format:"%d.%m.%Y \ %H:%M"})</time>
                </div>
              </div>
              <div class="reviews__text">
                {$item.text_feedback}
              </div>

   {if $item.answer}
              <div class="reviews__admin">
                <img src="https://azerty-money.ru/data/img/admin-icon.png" alt="admin" class="reviews__admin-img">
                <div class="reviews__admin-side">
                  <div class="reviews__admin-name">
                    Администратор Azerty Money
                  </div>
                  <div class="reviews__admin-text">
                    {$item.answer}
                  </div>
                </div>
              </div>
              {/if}

            </div>
          </div>
          {/if}
     
          {/foreach}
          <div class="catalog__pages review__pages">
          
            {for $foo=1 to $smarty.session.feed1}
            {$tes = $smarty.get.feed + 1}
            {$tes1 = $smarty.get.feed - 1}
        
            {if $tes < $foo }
        
            {break}
            {/if}
            {if $tes1 > $foo }
            {continue}
          
            {/if}

        
      
      
            <a class="	{if $foo == $smarty.get.feed }  active__page   {/if}"
            style="text-decoration:none;" href=?feed={$foo}>
              {$foo}
              </a>
              {/for}
  
            </div>
  
  






          
              <span class="line"> </span>
              {/if}


        </div>





{if $formsData.about}
        <div class="docs__text payment__text after__text">
          {$formsData.about}
        </div>
        {/if}
        <div class="contacts-side payment__form" id="nav_g"> 
          <h2 class="name-of payment__form_title">
            Оставить отзыв
          </h2>
          <form method="POST" class="brown-form">
            <input name="name" type="text" class="brown-input" placeholder="Ваше имя" required="">
            <input name="email"  {if isset($user.email)}value="{$user.email}"{/if} type="mail" class="brown-input" placeholder="Ваша эл. почта" required="">
            <textarea  name="comment" class="brown-input brown-textarea" placeholder="Оставьте свой отзыв здесь" required=""></textarea>
            <div class="form__footer contacts-form__footer">
              <button class="btn form__btn contacts-form__btn">
                Оставить отзыв
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>