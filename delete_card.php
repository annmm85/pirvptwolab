<!--delete_card.php-->
<?php
session_start();
require_once "config/database.php";

if (!empty((int)$_GET['id'])) {

    $id = (int)$_GET['id'];

    $query = "DELETE FROM parking_cards WHERE id=$id";
    $res = mysqli_query($conn, $query);
    if (!$res) die (mysqli_error($conn));

    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['message'] = 'Товар '. $id .' удален.';
        header('location: index.php');
    }
}