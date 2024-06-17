<!--users.php-->
<?php

require_once "config/database.php";
$page_title = "Список сотрудников";
include_once "layout_header.php";

$query = "SELECT * FROM users WHERE username NOT LIKE 'admin%'";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));

if (isset($_SESSION['message'])) {
    echo "<p>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}

echo "<table class='table table-hover table-responsive table-bordered'>";
echo "<tr>";
echo "<th>№</th>";
echo "<th>Логин пользователя</th>";
echo "<th></th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($res)) {

    extract($row);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>";
    echo "<a href='delete_user.php?id={$id}' class='btn left-margin'>";
    echo "<span class='glyphicon glyphicon-remove'></span> Удалить";
    echo "</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
include_once "layout_footer.php";