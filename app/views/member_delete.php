<?php
require_once __DIR__ . '/../src/MembersDAO.php';
$dao = new MembersDAO();

$id = $_GET['id'];
$dao->deleteMember($id);

header("Location: ?action=members_list");
exit;
