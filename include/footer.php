  <footer class="footer" id="footer">
    <div class="container">
      <div class="footer__wrap">
        <img src="../data/img/logo-big.png" alt="Logo" class="footer__logo">
        <ul class="header__menu footer__menu">
          <li>
            <a href="/" class="header__item">
              Главная
            </a>
          </li>
          <li>
            <a href="/catalog" class="header__item">
              Каталог игр
            </a>
          </li>
          <li>
            <a href="/faq" class="header__item">
              F.A.Q
            </a>
          </li>
          <li>
            <a href="/garantii" class="header__item">
              Гарантии
            </a>
          </li>
          <li>
            <a href="/postavshikam" class="header__item">
              Поставщикам
            </a>
          </li>
          <li>
            <a href="/contacts" class="header__item">
              Контакты
            </a>
          </li>
        </ul>
        <div class="footer__discounts">
          <div class="icons__info discount__info"
            data-title="Скидка накопительная и рассчитывается по суммарному количеству потраченных Вами денег. Указывайте один и тот же e-mail. Если Вы хотите получать максимальную скидку 10%">
            <img src="../data/img/info-icon.svg" alt="" class="discount__img">
          </div>
          <div class="discount__row">
            <h4 class="discount__title">
              Сумма заказов, руб.
            </h4>
            <div class="discount__rate">
              Скидка
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              100 - 500
            </div>
            <div class="discount__rate">
              1%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              500 - 2000
            </div>
            <div class="discount__rate">
              2%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              2000 - 5000
            </div>
            <div class="discount__rate">
              3%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              5000 - 10000
            </div>
            <div class="discount__rate">
              4%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              10000 - 30000
            </div>
            <div class="discount__rate">
              5%
            </div>
            <div class="disc__row-after"></div>
          </div>
          <div class="discount__row">
            <div class="discount__point">
              VIP статус > 30000
            </div>
            <div class="discount__rate">
              10%
            </div>
            <div class="disc__row-after"></div>
          </div>
        </div>
        <div class="footer__call">
          <button class="btn secondary__btn footer__btn">
            Связатся с нами
          </button>
          <div class="offer__time discount__time">
            <img src="../data/img/icon-clock.svg" alt="Clock" class="time__icon">
            с 11:00 до 23:00
          </div>
        </div>
      </div>
      <div class="footer__credits">
        2020 © Все права защищены
      </div>
    </div>
  </footer>
  <div class="modal">
    <div class="modal-dialog main-modal">
      <button class="modal-close main-modal__close"></button>
      <div class="modal-head lined">
        <h2 class="modal__title">
          Напиши нам
        </h2>
        <h2 class="modal__title title_second">
          Отправь заявку менеджеру
        </h2>
      </div>
      <div class="modal-body">
        <div class="modal__links">
          <a href="#" class="modal__btn btn-skype">
            <img src="../data/img/skype-icon.png" alt="Skype" class="modal__icon">
            Skype
          </a>
          <a href="#" class="modal__btn btn-discord">
            <img src="../data/img/discord-icon.png" alt="discord" class="modal__icon">
            Discord
          </a>
          <a href="#" class="modal__btn btn-whatsapp">
            <img src="../data/img/whatsapp-icon.png" alt="whatsapp" class="modal__icon">
            Whatsapp
          </a>
          <a href="#" class="modal__btn btn-telegram">
            <img src="../data/img/telegram-icon.png" alt="telegram" class="modal__icon">
            Telegram
          </a>
          <a href="#" class="modal__btn btn-email">
            <img src="../data/img/email-icon.png" alt="email" class="modal__icon">
            Email
          </a>
        </div>
        <h2 class="modal__title title_small">
          Отправь заявку менеджеру
        </h2>
        <form action="#" class="js-form" id="popupResult">
          <label for="#modal_input_select"></label>
          <select name="smodal_input_select" id="modal_input_select" class="brown-input modal-input">
            <option value="Skype">Напишите мне в Skype</option>
            <option value="Discord">Напишите мне в Discord</option>
            <option value="Whatsapp">Напишите мне в Whatsapp</option>
            <option value="Telegram">Напишите мне в Telegram</option>
            <option value="Email">Напишите мне в Email</option>
          </select>
          <label for="modal__input_link" class="changeable-label">Ваш Login Skype </label>
          <input type="name" class="brown-input modal-input" id="modal__input_link" required>

          <label for="modal__input_text">Что вас интересует</label>
          <textarea name="text" type="text" class="brown-input modal-input" id="modal_input_text" required></textarea>
          <button type="submit" class="btn button form__btn contacts-form__btn form__footer contacts-form__footer"
            data-submit>
            Отправить
          </button>
        </form>
      </div>
    </div>
  </div>
  <script src="../data/js/jquery-3.5.0.min.js"></script>
  <script type="text/javascript"
    src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
  <script src="../data/js/slick.min.js"></script>
  <script src="../data/js/main.js"></script>