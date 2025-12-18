<?php
$action = $_GET['action'] ?? 'members_list';

switch ($action) {
    case 'members_list': include '../views/members_list.php'; break;
    case 'member_add': include '../views/member_add.php'; break;
    case 'member_edit': include '../views/member_edit.php'; break;
    case 'member_delete': include '../views/member_delete.php'; break;

    case 'trainers_list': include '../views/trainers_list.php'; break;
    case 'trainer_add': include '../views/trainer_add.php'; break;
    case 'trainer_edit': include '../views/trainer_edit.php'; break;
    case 'trainer_delete': include '../views/trainer_delete.php'; break;

    case 'sessions_list': include '../views/sessions_list.php'; break;
    case 'session_add': include '../views/session_add.php'; break;
    case 'session_edit': include '../views/session_edit.php'; break;
    case 'session_delete': include '../views/session_delete.php'; break;

    case 'member_sessions_list': include '../views/member_sessions_list.php'; break;
    case 'member_session_add': include '../views/member_session_add.php'; break;
    case 'member_session_delete': include '../views/member_session_delete.php'; break;



    default: echo "<h1>404 Not Found</h1>";
}
