<?php
require_once __DIR__ . '/../src/SessionsDAO.php';
require_once __DIR__ . '/../src/TrainersDAO.php';

$dao = new SessionsDAO();
$trainersDao = new TrainersDAO();
$trainers = $trainersDao->getAllTrainers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->addSession($_POST['title'], $_POST['date'], $_POST['trainer_id']);
    header("Location: ?action=sessions_list");
    exit;
}
?>

<h1>Додати тренування</h1>
<form method="post">
    Назва: <input type="text" name="title"><br>
    Дата: <input type="date" name="date"><br>
    Тренер:
    <select name="trainer_id">
        <?php foreach ($trainers as $t): ?>
            <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Зберегти</button>
</form>
