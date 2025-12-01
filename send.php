<?php
// Куда отправлять заявки
$to = "profit-360@mail.ru";

// Забираем поля из формы (с базовой защитой от пустых значений)
$name      = isset($_POST['name']) ? trim($_POST['name']) : '';
$contact   = isset($_POST['contact']) ? trim($_POST['contact']) : '';
$goal      = isset($_POST['goal']) ? trim($_POST['goal']) : '';
$gender    = isset($_POST['gender']) ? trim($_POST['gender']) : '';
$age       = isset($_POST['age']) ? trim($_POST['age']) : '';
$height    = isset($_POST['height']) ? trim($_POST['height']) : '';
$weight    = isset($_POST['weight']) ? trim($_POST['weight']) : '';
$days      = isset($_POST['days']) ? trim($_POST['days']) : '';
$experience= isset($_POST['experience']) ? trim($_POST['experience']) : '';
$comment   = isset($_POST['comment']) ? trim($_POST['comment']) : '';

// Простейшая проверка обязательных полей
if ($name === '' || $contact === '') {
    die("Пожалуйста, вернитесь назад и заполните обязательные поля.");
}

// Тема письма
$subject = "Новая заявка по Методу ProFit";

// Текст письма
$body  = "Новая заявка с сайта ProFit:\n\n";
$body .= "Имя: {$name}\n";
$body .= "Контакт: {$contact}\n\n";
$body .= "Цель: {$goal}\n";
$body .= "Пол: {$gender}\n";
$body .= "Возраст: {$age}\n";
$body .= "Рост: {$height} см\n";
$body .= "Вес: {$weight} кг\n";
$body .= "Тренировок в неделю: {$days}\n";
$body .= "Опыт тренировок: {$experience}\n\n";
$body .= "Комментарий клиента:\n{$comment}\n";

// Заголовки письма (от кого)
$headers = "From: ProFit Site <no-reply@profit-360.ru>\r\n".
           "Reply-To: no-reply@profit-360.ru\r\n".
           "Content-Type: text/plain; charset=utf-8\r\n";

// Отправляем письмо
$mailSent = mail($to, $subject, $body, $headers);
?>
<!DOCTYPE html>
<html lang=\"ru\">
<head>
  <meta charset=\"UTF-8\">
  <title>Заявка отправлена</title>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <style>
    body {
      margin: 0;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
      background: #050608;
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .box {
      max-width: 420px;
      padding: 24px 20px;
      background: #0c0f14;
      border-radius: 18px;
      border: 1px solid #1b2230;
      text-align: center;
    }
    h1 {
      font-size: 20px;
      margin-bottom: 10px;
    }
    p {
      font-size: 14px;
      color: #a7afc0;
      margin-bottom: 10px;
    }
    a {
      color: #20c2ff;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class=\"box\">
  <?php if ($mailSent): ?>
    <h1>Заявка отправлена ✅</h1>
    <p>Спасибо! Я получил ваши данные и свяжусь с вами в ближайшее время, чтобы обсудить план тренировок и КБЖУ.</p>
  <?php else: ?>
    <h1>Ошибка отправки 😕</h1>
    <p>Не получилось отправить письмо. Попробуйте ещё раз позже или напишите мне напрямую: <br> <a href=\"mailto:profit-360@mail.ru\">profit-360@mail.ru</a></p>
  <?php endif; ?>
  <p><a href=\"index.html\">Вернуться на сайт</a></p>
</div>
</body>
</html>
