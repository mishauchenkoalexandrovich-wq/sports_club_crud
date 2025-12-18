<?php
require_once __DIR__ . '/../src/SessionsDAO.php';
$dao = new SessionsDAO();
$sessions = $dao->getAllSessions();
?>

<h1>Список тренувань</h1>
<a href="?action=session_add">Додати тренування</a>
<table border="1">
    <tr><th>ID</th><th>Назва</th><th>Дата</th><th>Тренер</th><th>Дії</th></tr>
    <?php foreach ($sessions as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= $s['title'] ?></td>
            <td><?= $s['date'] ?></td>
            <td><?= $s['trainer_name'] ?></td>
            <td>
                <a href="?action=session_edit&id=<?= $s['id'] ?>">Редагувати</a> |
                <a href="?action=session_delete&id=<?= $s['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
