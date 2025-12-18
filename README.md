# Sports Club CRUD

##  Призначення
CRUD‑система для роботи з базою даних спортивного клубу.  
Реалізація на PHP з використанням **PDO** та **prepared statements** для безпечної взаємодії з БД.

##  Структура проєкту
- `public/` — роутінг та точка входу (`index.php`)
- `src/` — логіка, DAO, клас `DB.php`
- `views/` — HTML‑шаблони для відображення CRUD‑операцій
- `.nginx/` — конфігурація веб‑сервера
- `docker-compose.yml` — опис контейнерів (PHP, Nginx, MySQL)
- `.env.example` — приклад змінних середовища
- `app.sql` — SQL‑дамп для ініціалізації БД

##  Запуск
1. Скопіювати `.env.example` у `.env` та налаштувати параметри:
   ```ini
   DB_HOST=db
   DB_PORT=3306
   DB_NAME=app
   DB_USER=root
   DB_PASS=root
