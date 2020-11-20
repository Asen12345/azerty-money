<?php
// если была нажата кнопка "Отправить"
if($_POST['submit']) {
      // $_POST['title'] содержит данные из поля "Тема", trim() - убираем все лишние пробелы и переносы строк, htmlspecialchars() - преобразует специальные символы в HTML сущности, будем считать для того, чтобы простейшие попытки взломать наш сайт обломались, ну и  substr($_POST['title'], 0, 1000) - урезаем текст до 1000 символов. Для переменной $_POST['mess'] все аналогично
      $title = substr(htmlspecialchars(trim($_POST['title'])), 0, 1000);
      $mess =  substr(htmlspecialchars(trim($_POST['mess'])), 0, 1000000);
      $to =  substr(htmlspecialchars(trim($_POST['to'])), 0, 100);
      $from =  substr(htmlspecialchars(trim($_POST['from'])), 0, 100);
      // функция, которая отправляет наше письмо.
      var_dump(mail($to, $title, $mess, 'From:'.$from));
      echo 'Massage Sent';
}
?>
<form action="" method=post>

<p>Email test<p>
            <div align="center">
            <br />
            to
            <input type="text" name="to" size="40"><br />
            from
            <input type="text" name="from" size="40"><br />
            subject
            <input type="text" name="title" size="40"><br />
            message<br />
            <textarea name="mess" rows="10" cols="40"></textarea>
            <br />
            <input type="submit" value="Sent" name="submit"></div>
</form>
