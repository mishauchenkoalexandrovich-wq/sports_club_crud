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
        <td><?= (int)$t['id'] ?></td>
        <td><?= htmlspecialchars($t['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($t['specialization'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
        <td>
            <a href="?action=trainer_edit&id=<?= (int)$t['id'] ?>">Редагувати</a> |
            <a href="?action=trainer_delete&id=<?= (int)$t['id'] ?>">Видалити</a>
        </td>
    </tr>
<?php endforeach; ?>

</table>
