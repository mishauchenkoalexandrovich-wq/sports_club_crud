<?php
require_once __DIR__ . '/../src/MemberSessionsDAO.php';
require_once __DIR__ . '/../src/MembersDAO.php';
require_once __DIR__ . '/../src/SessionsDAO.php';

$dao = new MemberSessionsDAO();
$membersDao = new MembersDAO();
$sessionsDao = new SessionsDAO();

$members = $membersDao->getAllMembers();
$sessions = $sessionsDao->getAllSessions();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->addMemberSession($_POST['member_id'], $_POST['session_id']);
    header("Location: ?action=member_sessions_list");
    exit;
}
?>

<h1>Додати зв’язок</h1>
<form method="post">
    Учасник:
    <select name="member_id">
        <?php foreach ($members as $m): ?>
            <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Тренування:
    <select name="session_id">
        <?php foreach ($sessions as $s): ?>
            <option value="<?= $s['id'] ?>"><?= $s['title'] ?> (<?= $s['date'] ?>)</option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Зберегти</button>
</form>
