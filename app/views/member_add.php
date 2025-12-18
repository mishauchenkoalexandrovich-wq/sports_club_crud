<?php
require_once __DIR__ . '/../src/MembersDAO.php';
$dao = new MembersDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->addMember($_POST['name'], $_POST['age'], $_POST['email']);
    header("Location: ?action=members_list");
    exit;
}
?>

<h1>Додати учасника</h1>
<form method="post">
    Ім'я: <input type="text" name="name"><br>
    Вік: <input type="number" name="age"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Зберегти</button>
</form>
