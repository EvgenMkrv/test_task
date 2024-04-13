<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/entities/Contact.php';

$contacts = new Contact();

$contacts->delete($_POST['id']);