<?php
require_once __DIR__ . '/../src/MembersDAO.php';
$dao = new MembersDAO();
$members = $dao->getAllMembers();
?>

<h1>Список учасників</h1>
<a href="?action=member_add">Додати учасника</a>
<table border="1">
    <tr><th>ID</th><th>Ім'я</th><th>Вік</th><th>Email</th><th>Дії</th></tr>
    <?php foreach ($members as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= $m['name'] ?></td>
            <td><?= $m['age'] ?></td>
            <td><?= $m['email'] ?></td>
            <td>
                <a href="?action=member_edit&id=<?= $m['id'] ?>">Редагувати</a> |
                <a href="?action=member_delete&id=<?= $m['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
