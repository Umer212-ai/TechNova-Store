<?php
// admin/includes/auth.php - Admin Session Protection
// Include this file at the top of every admin page (except login.php).

session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
?>
