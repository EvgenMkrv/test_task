<?php

class Contact
{

    public function storeContact(string $name, $phone): string
    {
        if (!empty($name) && !empty($phone)) {

            if (!preg_match('/^[0-9]{10}/', $phone)) {
                return 'Ошибка! Номер должен содержать 10 цифр без пробелов и других символов.';
            }

            $contact['name'] = $name;
            $contact['phone'] = $phone;

            if (file_exists(__DIR__ . '/contacts.json')) {
                $contacts = json_decode(file_get_contents('contacts.json'), true);
            }

            $contacts[] = $contact;

            file_put_contents(__DIR__ . '/contacts.json', json_encode($contacts));

            return 'Контакт успешно добавлен!';
        }

        return 'Ошибка! Необходимо заполнить все поля.';
    }

    public function read(): array
    {
        if (file_exists(__DIR__ . '/contacts.json')) {
            return json_decode(file_get_contents(__DIR__ . '/contacts.json'), true);
        }

        return [];
    }

    public function delete($id): void
    {
        $contacts = json_decode(file_get_contents( __DIR__ . '/contacts.json'), true);

        if (array_key_exists($id, $contacts)) {
            unset($contacts[$id]);
        }

        file_put_contents(__DIR__ . '/contacts.json', json_encode($contacts));
    }
}