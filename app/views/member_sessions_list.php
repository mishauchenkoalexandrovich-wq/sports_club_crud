<?php
require_once __DIR__ . '/../src/MemberSessionsDAO.php';
$dao = new MemberSessionsDAO();
$links = $dao->getAllMemberSessions();
?>

<h1>Зв’язки учасників із тренуваннями</h1>
<a href="?action=member_session_add">Додати зв’язок</a>
<table border="1">
    <tr><th>ID</th><th>Учасник</th><th>Тренування</th><th>Дата</th><th>Дії</th></tr>
    <?php foreach ($links as $l): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['member_name'] ?></td>
            <td><?= $l['session_title'] ?></td>
            <td><?= $l['date'] ?></td>
            <td>
                <a href="?action=member_session_delete&id=<?= $l['id'] ?>">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
