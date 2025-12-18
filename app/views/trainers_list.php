<?php
require_once __DIR__ . '/../src/TrainersDAO.php';
$dao = new TrainersDAO();
$trainers = $dao->getAllTrainers();
?>

<h1>Список тренерів</h1>
<a href="?action=trainer_add">Додати тренера</a>
<table border="1">
    <tr><th>ID</th><th>Ім'я</th><th>Спеціалізація</th><th>Дії</th></tr>
    <?php foreach ($trainers as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= $t['name'] ?></td>
            <td><?= $t['specialization'] ?></td>
            <td>
                <a href="?action=trainer_edit&id=<?= $t['id'] ?>">Редагувати</a> |
                <a href="?action=trainer_delete&id=<?= $t['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
