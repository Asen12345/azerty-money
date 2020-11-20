<div class="header" id="header">
      <div class="container">
		<div class="header__offer">
          <div class="offer__part">
            <h1 class="offer__title">
              Игровая валюта<br>
              <span>по самым лучшим ценам</span>
            </h1>
            <p class="offer__text">
              Мы ценим каждого нашего клиента и за последние три года ни один из них не ушел от нас недовольным.
              Подтверждением тому
              служат положительные отзывы наших клиентов.
            </p>
            <a href="#" class="btn offer__btn">
              Связатся с нами
            </a>
          </div>
          <div class="offer__part">
            <div class="offer__cards">
              <div class="offer__card hei">
                <img src="data/img/offer-icon-1.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Более 9 лет на рынке
                </h4>
                <p class="offer__pros-text">
                  Более 10 000 удачных сделок
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-2.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Лучшие цены на рынке
                </h4>
                <p class="offer__pros-text">
                  Доступные цены для наших клиентов
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-3.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Партнерская программа
                </h4>
                <p class="offer__pros-text">
                  Всегда готовы сотрудничать с вами
                </p>
              </div>
              <div class="offer__card hei">
                <img src="data/img/offer-icon-4.png" alt="Star" class="offer__img">
                <h4 class="offer__pros">
                  Большой выбор
                </h4>
                <p class="offer__pros-text">
                  Игровая валюта для большого количества игр
                </p>
              </div>
            </div>
          </div>
        </div>
        <a href="#games" class="header__mouse">
          <img src="data/img/mouse.svg" alt="" class="mouse">
        </a>
	  </div>
	  </div>
<section class="games" id="games">
      <div class="container">
        <h2 class="games__title">
          Популярные игры
        </h2>
        <div class="games__wrap">
		{foreach key=key item=item from=$popular}
          <a href="{if $item.parent == 0} /cateus?cateus={$item.id} {else}/gamingam?game={$item.id}  {/if}" class="games__card">
            <img src="/data/photo/{$item.photo}" alt="Game" class="games__img">
          </a>
		  {/foreach}
        </div>
        <a style="text-decoration: none !important; " href="/catalogs">
        <button class="btn secondary__btn games__btn">
          Больше игр
        </button>
      </a>
    </section>
    <section class="comments" id="comments">
      <div class="container">
        <h2 class="comments__title">
          Наши отзывы
        </h2>
        <div class="comments__slider">




          {foreach key=key item=item from=$feedback}
          <div>
            <div class="comments__item tes_fed">
              <div class="comments__head">
              
                <div class="comments__info">
                  <div class="comments__date date">
                    {$item.data}
                  </div>
                  <div class="comments__person">
                    {$item.name}
                  </div>
              
                  <img src="data/img/comment-line.png" alt="" class="comments__line">
                </div>
              </div>
              <p class="comments__text">
                {$item.text_feedback}
              </p>
              <a href="/content/feedback" class="news__btn secondary__btn btn">
                Подробнее
              </a>
            </div>
          </div>

          {/foreach}




          
        </div>
      </div>
    </section>
    <div class="news-about">
      <section class="news" id="news">
        <div class="container">
          <h2 class="comments__title">
            Новости
          </h2>
          <div class="news__slider comments__slider">





           
            {foreach key=key item=item from=$news1}
            
            <div>
              <div class="news__item comments__item">
                <div class="news__head">
                  <h3 class="news__category">
              {$item.caption}
                  </h3>
                  <div class="news__date date">
                    {$item.data}
                  </div>
                </div>
                <div class="news__body">
                  <img src="https://azerty-money.ru/data/photo/{$item.photo}" alt="Royal" class="news__img">
                  <div class="news__info">
                    <h4 class="news__title">
                      {$item.preview}
                    </h4>
                    <img src="data/img/news-line.png" alt="" class="news__line">
                    <p class="news__text">
                     
                      {$item.ntext|truncate:200:"..."}<br>
                      <a href="https://azerty-money.ru//news/all/page" style="color: #fff; text-decoration: underline; font-size: 22px;">Все новости</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          
            {/foreach}




        


        



      
          </div>
        </div>



        
      </section>
      <section class="about" id="about">
        <div class="container">
          <h2 class="about__title">
            О Azerty-money.ru
          </h2>
          <img src="data/img/about-line.png" alt="" class="about__line">
          <p class="about__text">
            В 2011 году появилась группа в социальной сети ВКонтакте под названием Azerty Money, которая в те времена
            являлась
            одним из немногих сервисов в «Рунете», имеющих автоматизированные системы, способные проводить торговые
            операции
            с
            такими внутриигровыми предметами как игровая валюта, а также помогающие в развитии персонажей. Именно
            благодаря
            интернет-ресурсам подобным нашему, на рынке игровой валюты появилась накопительная скидка. К примеру, у нас
            при
            сумме заказов от ста до пятисот рублей скидка составляет один процент. Когда сумма превысит десять тысяч
            рублей,
            пользователь получит максимальную скидку в размере пяти процентов (не забывайте указывать одну и ту же
            электронную
            почту, чтобы получить бонус). <br><br>

            В начале в группе Azerty Money осуществляли обслуживание лишь одного сервера - wowcircle.com, к тому же не
            официального. Пользователи могли только приобрести голд для этой игровой платформы. Однако с течением
            времени
            у
            нас появился собственный интернет-портал Azerty-money.ru, на котором вы собственно сейчас и находитесь, а
            список
            услуг предоставляемых нашей группой значительно расширился и теперь он поистине огромен. На сегодняшний день
            вы
            можете получить следующие виды услуг на сайте и в группе: приобрести игровую валюту практически для любой
            современной MMORPG, включая золото и адену; заказать прокачку персонажа на официальных серверах популярных
            онлайн-игр; купить аккаунты с топовыми героями на неофициальных площадках; приобрести карты оплаты и ключи,
            а
            также игры для магазина Steam.<br><br>

            Мы ценим каждого нашего клиента и за последние три года ни один из них не ушел от нас недовольным.
            Подтверждением
            тому служат положительные отзывы, с которыми вы можете ознакомиться в любой момент в соответствующем разделе
            сайта. Главными достоинствами сервиса Azerty-money.ru всегда являлись следующие преимущества: исполнение
            заказов
            в
            самые короткие сроки (доставка осуществляется за пять-десять минут, так как кинары, адена и прочие виды
            игровых
            валют закупаются нами заранее), дружелюбная и оперативная служба поддержки и сравнительно низкие
            цены.<br><br>

            Сейчас данный интернет-портал занимается обслуживанием нескольких многопользовательских игр, а именно: EVE
            Online,
            для которой можно приобрести иски, ArcheAge, World of Warcraft, Aion, Diablo III, Rift, Lineage II, Dota 2,
            The
            Elder Scrolls Online и World of Tanks..
          </p>
        </div>
      </section>
    </div>
  </div>