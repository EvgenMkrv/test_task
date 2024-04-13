<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/entities/Contact.php';

$contact = new Contact();

$contacts = $contact->read();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <script src="/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Телефонная книга</title>
</head>
<body>
<main class="page-contacts">
    <h1>Телефонная книга</h1>
    <a class="button" href="/add_contact.php">Добавить контакт</a>
    <div class="contacts-item-header">
        <b class="contacts-item-header-field">Имя</b>
        <b class="contacts-item-header-field">Телефон</b>
    </div>
    <ul class="contacts-list">
        <?php foreach ($contacts as $key => $contact): ?>
        <li class="contact-item">
            <span class="contact-item-field"><?=$contact['name']?></span>
            <span class="contact-item-field"><?=$contact['phone']?></span>
            <button class="real-button" value="<?=$key?>">Удалить</button>
        </li>
        <?php endforeach; ?>
    </ul>
</main>
</body>
</html>