<?php
require_once __DIR__ . '/../src/SessionsDAO.php';
$dao = new SessionsDAO();

$id = $_GET['id'];
$dao->deleteSession($id);

header("Location: ?action=sessions_list");
exit;
