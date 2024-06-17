<!--config/database.php-->
<?php

$host = 'localhost';
$database = 'twop';
$user = 'root';
$password = '';


$conn = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
}
