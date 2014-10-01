Yii_first - Yii trial-trip
=========

## About (translation later)##

Что сделано?

- админка с функциями CRUD по категориям, страницам, пользователям, настройкам и комменатриям.
- прописаны множественные связи между таблицами (ORM и AR), что позволяет удобно отображать поля при администрировании (поиске, замене, удалении, добавлении), при этом сохраняя нормальные формы таблиц в нашей БД.
- вывод двух типов меню (верхнее и сайдбар)
- RBAC и как следствие доступ к админке
- регистрация с использованием капчи
- использована соль в процессе регистрации/авторизации пользователей для повышения безопасности приложения (поверх md5 само собой)
- генерация верхнего меню в зависимости от статуса (роли и авторизации) пользователя

Более мелкие приятные моменты:

- поставил ckeditor в качестве редактора текста для админки, провел небольшую аналитику по другим альтернативам (думаю, попробовать tinymce)
- поизучал внутренню структуру самого фреймворка.. крайне много всего и все, конечно, же в голове никак не уложить (по крайней мере сходу), но логика построения работы в целом уже ясна - использование Singleton с предустановленными конфигами и уже дальнейшая пляска с бубнами вокруг всевозможных классов с расширением вплоть до бесконечности.
- использованы методы работы с моделями: find, findAll, findByPk, findByAttributes, updateByPk
- реализован алгоритм бана пользователей

You can see it working [here](http://study.igonik.ru/yii_first/app/) as well.

## Requirements ##

- PHP 5.2.x or higher
- Passion about programming and clear mind;)

## Quick Start ##

1. First clone the repository
2. Then set the config files appropriate to your local DB and your personal preferences
3. Change password settings of admin for your initial login (you will need to remove md5+salt from verification part of UserIdentity class)

```php
<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    ...
    public function authenticate()
        if(($user===null) || (md5('jshd112j' . $this->password)!==$user->password)) 
    ...
}
```

## Details ##
Some details will be described later

## Config ##
All main files located in /app/protected/config

## Issues ##

Please submit issues through the [issue tracker](https://github.com/GonikDaniel/Yii_first/issues) on GitHub. Your help is appreciated.

## History ##

**php_project 1.1 - 01/10/2014**

- just add all file from a scratch

## Credits ##

Copyright (c) 2014 - Programmed by Gonik Daniel
Released under the [BSD License](http://www.opensource.org/licenses/bsd-license.php).
(** joke **)

