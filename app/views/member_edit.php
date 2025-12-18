<?php
require_once __DIR__ . '/../src/MembersDAO.php';
$dao = new MembersDAO();

$id = $_GET['id'];
$members = $dao->getAllMembers();
$current = array_filter($members, fn($m) => $m['id'] == $id);
$current = reset($current);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->updateMember($id, $_POST['name'], $_POST['age'], $_POST['email']);
    header("Location: ?action=members_list");
    exit;
}
?>

<h1>Редагувати учасника</h1>
<form method="post">
    Ім'я: <input type="text" name="name" value="<?= $current['name'] ?>"><br>
    Вік: <input type="number" name="age" value="<?= $current['age'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $current['email'] ?>"><br>
    <button type="submit">Оновити</button>
</form>
