<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Личный кабинет</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../data/css/bootstrap.min.css">
  <link rel="stylesheet" href="../data/css/normalize.css">
  <link rel="stylesheet" href="../data/css/main.css">
  <link rel="stylesheet" href="../data/css/media.css">
</head>

<body>
  <div class="menu">
    <div class="menu__title">
      Меню
    </div>
    <img src="../data/img/menu-line.png" alt="" class="menu__line">
    <ul class="menu__links">
     <li>
        <a href="/" class="menu__item menu__item_active">
          Главная
        </a>
      </li>
      <li>
        <a href="/catalog" class="menu__item">
          Каталог игр
        </a>
      </li>
      <li>
        <a href="/faq" class="menu__item">
          F.A.Q
        </a>
      </li>
      <li>
        <a href="/garantii" class="menu__item">
          Гарантии
        </a>
      </li>
      <li>
        <a href="/postavshikam" class="menu__item">
          Поставщикам
        </a>
      </li>
      <li>
        <a href="/contacts" class="menu__item">
          Контакты
        </a>
      </li>
    </ul>
    <img src="../data/img/menu-line.png" alt="" class="menu__line">
    <div class="menu__footer">
      <a href="#" class="menu__user">
        Аккаунт
      </a>
      <a href="#" class="menu__user">
        Вход
      </a>
    </div>
  </div>
  <button class="bar__btn btn btn__first">
    <div class="bar__btn-before"></div>
    Оставьте нам сообщение
  </button>
  <div class="chat">
    <button class="bar__btn btn chat__btn">
      Чат с оператором
    </button>
    <div class="chat__header">
      <img src="../data/img/chat-img.png" alt="Admin" class="chat__admin-img">
      <div class="chat__admin">
        <div class="admin-name">
          Ирина
        </div>
        <div class="admin-text">
          Поддержка клиентов
        </div>
      </div>
    </div>
    <div class="chat__messages">
      <div class="chat__beg">
        Чат начат
      </div>
      <div class="message">
        <img src="../data/img/chat-img.png" alt="Admin" class="message__img">
        <div class="message__admin">
          Здравствуйте! Отвечу на все вопросы по работе сайта или услугам! (Вам ответит наш свободный оператор, не
          робот).
        </div>
      </div>
      <div class="message">
        <div class="message__user">
          Здравствуйте! Отвечу на все вопросы по работе сайта или услугам! (Вам ответит наш свободный оператор, не
          робот).
        </div>
        <img src="../data/img/chat-img-2.png" alt="Admin" class="message__img">
      </div>
      <div class="new-message">
        <textarea class="message__area" placeholder="Введите сюда сообщение"></textarea>
        <button class="message__btn">
          <img src="../data/img/chat-btn.png" alt="" class="message__btn-icon">
        </button>
      </div>
    </div>
  </div>
  <div class="admin-wrap">

    <!-- Тут начинается "Header" (повторяюшиеся элементы) -->
    <div class="header" id="header">
      <div class="container">
        <div class="header-nav">
          <a href="#" class="logo">
            <img src="../data/img/logo.png" alt="Logo">
          </a>
          <ul class="header__menu">
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
          <input type="text" class="header__input" placeholder="Введите названия игры">
          <a href="#" class="header__admin header__search">
            <img src="../data/img/search.svg" alt="search" class="admin__logo search__logo">
          </a>
          <a href="admin.html" class="header__admin">
            <img src="../data/img/user.svg" alt="User" class="admin__logo">
          </a>
        </div>
        <div class="header__bar">
          <div class="header__hamburger">
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
          </div>
          <div class="offer__time">
            <img src="../data/img/icon-clock.svg" alt="Clock" class="time__icon">
            с 11:00 до 23:00
          </div>
        </div>