<?php
require_once __DIR__ . '/../src/SessionsDAO.php';
require_once __DIR__ . '/../src/TrainersDAO.php';

$dao = new SessionsDAO();
$trainersDao = new TrainersDAO();
$trainers = $trainersDao->getAllTrainers();

$id = $_GET['id'];
$sessions = $dao->getAllSessions();
$current = array_filter($sessions, fn($s) => $s['id'] == $id);
$current = reset($current);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dao->updateSession($id, $_POST['title'], $_POST['date'], $_POST['trainer_id']);
    header("Location: ?action=sessions_list");
    exit;
}
?>

<h1>Редагувати тренування</h1>
<form method="post">
    Назва: <input type="text" name="title" value="<?= $current['title'] ?>"><br>
    Дата: <input type="date" name="date" value="<?= $current['date'] ?>"><br>
    Тренер:
    <select name="trainer_id">
        <?php foreach ($trainers as $t): ?>
            <option value="<?= $t['id'] ?>" <?= $t['name'] == $current['trainer_name'] ? 'selected' : '' ?>>
                <?= $t['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Оновити</button>
</form>
