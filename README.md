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
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/Вход.png)
2. Страница регистрации
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/Регистрация.png)
3. Главная страница сайта
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/Главный%20страница%20сайта.png)

Доступ к третьей странице невозможен не вошедшему на сайт пользователю.

## Пользовательские сценарии работы

1. Пользователь вводит в адресной строке index.php и попадает на форму регистрации. Если ввести логин, которые уже есть в базе данных, то на экране появляется сообщение "Такой пользователь уже существует". Если пользователь не заполняет или заполняет частично поля и нажимает на кнопку "Зарегистрироваться", то появляется сообщение "Не все поля были заполнены". При регистрации с уникальным логином пользователь переходит на сайт под своим новым аккаунтом.
2. Пользователь вводит в адресной строке auth.php и попадает на форму входа. Если пользователь введет неверные данные, то появляется сообщение "Неверный логин или пароль". Если пользователь не заполняет или заполняет частично поля и нажимает на кнопку "Войти", то появляется сообщение "Не все поля были заполнены". Если пользователь введет не существующий логин и пароль, то появляется сообщение "Такого пользователя не существует". Если пользователь вводит верные данные, то успешно попадает на сайт.
3. Если пользователь уже зашел на сайт, то, введя в адресной строке "auth.php" или "index.php", он останется на той же странице, на которой был. Если пользователь еще не зашел на сайт, то, введя в адресной строке "profile.php", он останется на той же странице, на которой был.

## Описание API сервера и его хореографии

Сервер использует HTTP GET запросы с полями full_name(ФИО) user_name (логин) и password (пароль).

1. Алгоритм входа на сайт - отправляется запрос, который возвращает данные о пользователе с отправленным логином. Если найдены не все данные, то на экране пользователь видит сообщение "Не все поля были заполнены". Если найдены - пароль сверяется с захешированным из базы данных и совершается вход. В ином случае на экране пользователь видит сообщение "Неверный логин или пароль". Если данные о пользователе с данным логином не были найдены вообще - появляется текст "Такого пользователя не существует".
2. Алгоритм регистрации на сайте - отправляется запрос, который возвращает данные о потенциально новом пользователе. Если найдены не все данные, то на экране пользователь видит сообщение "Не все поля были заполнены". Если найдены данные - происходит проверка логина на уникальность: либо логин уникален и пользователь зарегистрирован, либо такой логин уже есть, и появляется сообщение "Такой пользователь уже существует".
3. Функция аутентификации пользователя - происходит запрос на проверку логина и пароля. Если такого логина не было найдено в базе данных, то появляется сообщение "Такого пользователя не существует". Если введённый логин есть базе данных, то введённый пароль хэшируется и сверяется с паролем этого аккаунта. Если пароль подтвержден, то открывается сессия этого пользователя, и он может пользоваться сайтом. В ином случае на экране пользователь видит сообщение "Неверный логин или пароль".

## Описание структуры базы данных

Для администрирования сервера MySQL и просмотра содержимого базы данных используется браузерное приложение phpMyAdmin. Используется 4 столбцов:
1. "id" типа int с автоматическим приращением для выдачи уникальных id каждому зарегистрированному пользователю,
2. "full_name" типа varchar для хранения ФИО пользователя,
3. "login" типа varchar для хранения логина пользователя,
4. "password" типа varchar для хранения пароля пользователя в хешированном виде.
Демонстрация этой базы данных.
![alt-текст](https://github.com/MaksikLastik/Labwork-1/blob/main/База%20данный.png)

## Описание алгоритмов

1. Алгоритм входа на сайт
2. Алгоритм регистрации на сайте
3. Функция аутентификации пользователя

## Примеры HTTP запросов/ответов

## Значимые фрагменты кода

1. Алгоритм входа на сайт
2. Алгоритм регистрации на сайте
3. Функция аунтентификации пользователя
