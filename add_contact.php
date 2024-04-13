<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/entities/Contact.php';

$contact = new Contact();

if (!empty($_POST)) {

    $message = $contact->storeContact($_POST['name'], $_POST['phoneNumber']);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <title>Добавить контакт</title>
</head>
<body>
<main class="page-contacts">
    <h1>Добавить контакт</h1>
    <a class="button" href="/">Главная</a>
    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <div class="input-field">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="input-field">
            <label for="phoneNumber">Телефон</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" required>
        </div>
        <input class="real-button" type="submit" value="Добавить">
    </form>
    <?php if (isset($message) && str_contains($message, 'Ошибка')):?>
    <div class="message error"><?=$message?></div>
    <?php elseif (isset($message)):?>
    <div class="message success"><?=$message?></div>
    <?php endif;?>
</main>
</body>
</html>


