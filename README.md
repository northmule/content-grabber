# content-grabber
Grabber of content from various sources

**Забрать записи из Групп ВК и "запостить" на сайт под управлением WordPress**
 - Настроить .env
 - Настроить config/autoload/grabber.global.php
 - Применить миграции php bin/doctrine.php migrations:migrate
 - Запустить script/run.php

**Возможности**
- Забирает текст записи из ВК
- Забирает Изображения из запии ВК
- Забирает комментарии из записи ВК
- По API создаёт запись в WordPress по шаблону из data/templates
- По API создаёт комментарии в WordPress
- Учитывает собранный записи, повторно не забирает.

