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

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $trainer_id = $_POST['trainer_id'] ?? '';

    // Валідація
    if ($title === '') {
        $error = "Назва не може бути порожньою";
    } elseif ($date === '') {
        $error = "Дата не може бути порожньою";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        $error = "Некоректний формат дати (YYYY-MM-DD)";
    } elseif ($trainer_id === '') {
        $error = "Потрібно вибрати тренера";
    }

    // Якщо немає помилок – оновлюємо
    if ($error === "") {
        $dao->updateSession($id, $title, $date, $trainer_id);
        header("Location: ?action=sessions_list");
        exit;
    }
}
?>

<h1>Редагувати тренування</h1>
<form method="post">
    Назва: <input type="text" name="title" value="<?= htmlspecialchars($current['title']) ?>"><br>
    Дата: <input type="date" name="date" value="<?= htmlspecialchars($current['date']) ?>"><br>
    <?php if ($error !== "" && strpos($error, 'Дата') !== false): ?>
        <small style="color:red;"><?= $error ?></small><br>
    <?php endif; ?>
    Тренер:
    <select name="trainer_id">
        <?php foreach ($trainers as $t): ?>
            <option value="<?= $t['id'] ?>" <?= $t['name'] == $current['trainer_name'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($t['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <?php if ($error !== "" && strpos($error, 'Тренер') !== false): ?>
        <small style="color:red;"><?= $error ?></small><br>
    <?php endif; ?>
    <button type="submit">Оновити</button>
</form>

<?php if ($error !== "" && strpos($error, 'Назва') !== false): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>
