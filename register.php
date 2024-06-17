<!--register.php-->
<?php
require_once 'config/database.php';

$page_title = "Регистрация";
include_once "layout_header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE  username = '$username'");
    if (mysqli_affected_rows($conn) == 0) {
        $res = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')");
        if ($res) {
            header('Location: login.php');
            exit();
        } else {
            mysqli_error($conn);
        }
    } else {
        echo "Пользователь с таким именем уже существует.";
    }
}
?>

<form action="register.php" method="post">
    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td>Логин</td>
            <td><input type="text" name="username" class="form-control" required></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="password" class="form-control" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </td>
        </tr>
    </table>
</form>
