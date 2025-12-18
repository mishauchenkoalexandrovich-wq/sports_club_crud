# Sports Club CRUD (PHP + PDO + Docker)

##  Опис
Веб‑застосунок для управління спортивним клубом. Реалізовано повний набір CRUD‑операцій для сутностей:
- **Members** (учасники)
- **Trainers** (тренери)
- **Sessions** (тренування, з прив’язкою до тренера)
- **Member_sessions** (зв’язки учасників із тренуваннями)

Проєкт працює у Docker‑середовищі з використанням:
- **PHP (PDO)** — логіка CRUD
- **MySQL** — база даних
- **Nginx** — веб‑сервер
- **phpMyAdmin** — графічний інтерфейс для роботи з БД

---

##  Структура проєкту

- `app/` — основна логіка: `public/`, `views/`, `src/`
- `src/` — додаткові DAO‑класи
- `.nginx/` — конфігурація веб‑сервера
- `app.sql` — SQL‑дамп для ініціалізації БД
- `docker-compose.yml` — опис контейнерів (PHP, Nginx, MySQL)
- `README.md` — документація


---

##  Модель даних
- **Members**: `id`, `name`, `age`, `email`
- **Trainers**: `id`, `name`, `specialization`
- **Sessions**: `id`, `title`, `date`, `trainer_id`
- **Member_sessions**: `id`, `member_id`, `session_id`

Зв’язки:
- `sessions.trainer_id → trainers.id` (багато тренувань до одного тренера)
- `member_sessions.member_id → members.id`
- `member_sessions.session_id → sessions.id` (зв’язок many‑to‑many)

---

##  Запуск через Docker
1. Клонувати репозиторій:
   ```bash
   git clone https://github.com/<твій-репозиторій>.git
   cd sports_club_crud
