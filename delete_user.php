<!--delete_user.php-->
<?php
session_start();
require_once "config/database.php";
if (!empty((int)$_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "DELETE FROM users WHERE id=$id";
    $res = mysqli_query($conn, $query);
    if (!$res) die (mysqli_error($conn));
    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['message'] = 'Пользователь '. $id .' удален.';
        header('location: users.php');
    }
}