<?php
require_once __DIR__ . '/../src/TrainersDAO.php';
$dao = new TrainersDAO();

$id = $_GET['id'];
$dao->deleteTrainer($id);

header("Location: ?action=trainers_list");
exit;
