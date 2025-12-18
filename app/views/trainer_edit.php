<?php
require_once __DIR__ . '/../src/TrainersDAO.php';
$dao = new TrainersDAO();

$id = $_GET['id'];
$trainers = $dao->getAllTrainers();
$current = array_filter($trainers, fn($t) => $t['id'] == $id);
$current = reset($current);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->updateTrainer($id, $_POST['name'], $_POST['specialization']);
    header("Location: ?action=trainers_list");
    exit;
}
?>

<h1>Редагувати тренера</h1>
<form method="post">
    Ім'я: <input type="text" name="name" value="<?= $current['name'] ?>"><br>
    Спеціалізація: <input type="text" name="specialization" value="<?= $current['specialization'] ?>"><br>
    <button type="submit">Оновити</button>
</form>
