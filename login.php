<!--login.php-->
<?php
require_once 'config/database.php';
$page_title = "Вход";
require_once "layout_header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE  username = '$username'");

    if (mysqli_affected_rows($conn) === 1) {
        $user = mysqli_fetch_assoc($query);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit();
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь не найден.";
    }
}
?>

<form action="login.php" method="post">
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
                <button type="submit" class="btn btn-primary">Войти</button>
            </td>
        </tr>
    </table>
</form>