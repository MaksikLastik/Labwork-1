# Отчёт к лабораторной работе №1
## По курсу "Основы программирования"
Ссылка на [GitHub](https://github.com/MaksikLastik/Labwork-1)

## Текст задания
Цель работы - спроектировать и разработать систему авторизации пользователей на протоколе HTTP. Выполненные требования:
- функциональность входа/выхода,
- хранение паролей в хешированном виде,
- форма регистрации,
- хранение хэша пароля с солью.

## Пользовательский интерфейс
Необходимо создать три страницы: входа, регистрации и главную страницу сайта.
1. Страница входа
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Вход.png)
2. Страница регистрации
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Регистрация.png)
3. Главная страница сайта
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Главный%20страница%20сайта.png)

Доступ к третьей странице невозможен не вошедшему на сайт пользователю.

## Пользовательские сценарии работы

1. Пользователь вводит в адресной строке index.php и попадает на форму регистрации. Если ввести логин, которые уже есть в базе данных, то на экране появляется сообщение "Такой пользователь уже существует". При выборе уникального логина пользователь регистрируется переходит на сайт под своим новым аккаунтом.
2. Пользователь вводит в адресной строке auth.php и попадает на форму входа. Если пользователь введёт неверные данные, то появляется сообщение "Неверный логин или пароль". Если пользователь введёт верные данные, то успешно попадает на сайт.
3. Пользователь вводит в адресной строке index.php и оказывается перенаправлен на страницу со входом. Вводит свои верные данные и попадает на сайт.

## Описание API сервера и его хореографии

Сервер использует HTTP GET запросы с полями full_name(ФИО) user_name (логин) и password (пароль).

1. Алгоритм входа на сайт - отправляется запрос, который возвращает данные о пользователе с отправленным логином. Если найдены не все данные, то на экране пользователь видит сообщение "Не все поля были заполнены". Если найдены - пароль сверяется с захэшированным из базы данных и совершается вход. В ином случае на экране пользователь видит сообщение "Неверный логин или пароль". Если данные о пользователе с данным логином не были найдены вообще - появляется текст "Такого пользователя не существует".
2. Алгоритм регистрации на сайте - отправляется запрос, который возвращает данные о потенциально новом пользователе. Если найдены не все данные, то на экране пользователь видит сообщение "Не все поля были заполнены". Если найдены данные - происходит проверка логина на уникальность: либо логин уникален и пользователь зарегистрирован, либо такой логин уже есть, и появляется сообщение "Такой пользователь уже существует".
3. Функция аутентификации пользователя - происходит запрос на проверку логина и пароля. Если такого логина не было найдено в базе данных, то появляется сообщение "Такого пользователя не существует". Если введённый логин есть базе данных, то введённый пароль хэшируется и сверяется с паролем этого аккаунта. Если пароль подтвержден, то открывается сессия этого пользователя, и он может пользоваться сайтом. В ином случае на экране пользователь видит сообщение "Неверный логин или пароль".

## Описание структуры базы данных

Для администрирования сервера MySQL и просмотра содержимого базы данных используется браузерное приложение phpMyAdmin. Используется 4 столбцов:
1. "id" типа int с автоматическим приращением для выдачи уникальных id каждому зарегистрированному пользователю,
2. "full_name" типа varchar для хранения ФИО пользователя,
3. "login" типа varchar для хранения логина пользователя,
4. "password" типа varchar для хранения пароля пользователя в хешированном виде.

Демонстрация этой базы данных.
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/База%20данный.png)

## Описание алгоритмов

1. Алгоритм входа на сайт
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Алгоритм%20входа.png)
2. Алгоритм регистрации на сайте
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Алгоритм%20регистрации.png)
3. Функция аутентификации пользователя
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Алгоритм%20аутентификации.png)

## Примеры HTTP запросов/ответов
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Пользовательский%20сценарий%201.png)
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Пользовательский%20сценарий%202.png)
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Пользовательский%20сценарий%203.png)
## Значимые фрагменты кода

1. Алгоритм входа на сайт
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Код%20входа.png)
2. Алгоритм регистрации на сайте
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Код%20регистрации.png)
3. Функция аутентификации пользователя
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/images/Код%20аутентификации.png)
