<?php
require_once __DIR__ . '/../src/MemberSessionsDAO.php';
$dao = new MemberSessionsDAO();

$id = $_GET['id'];
$dao->deleteMemberSession($id);

header("Location: ?action=member_sessions_list");
exit;
