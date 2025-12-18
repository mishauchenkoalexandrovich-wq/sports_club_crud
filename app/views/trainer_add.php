<?php
require_once __DIR__ . '/../src/TrainersDAO.php';
$dao = new TrainersDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->addTrainer($_POST['name'], $_POST['specialization']);
    header("Location: ?action=trainers_list");
    exit;
}
?>

<h1>Додати тренера</h1>
<form method="post">
    Ім'я: <input type="text" name="name"><br>
    Спеціалізація: <input type="text" name="specialization"><br>
    <button type="submit">Зберегти</button>
</form>
