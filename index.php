<!--index.php-->
<?php

require_once "config/database.php";
$page_title = "Автостоянка. Список парковочных карт.";
include_once "layout_header.php";

$query = "SELECT * FROM parking_cards";
$res = mysqli_query($conn, $query);
if (!$res) die (mysqli_error($conn));
?>
    <div class="right-button-margin">
        <a href="create_card.php" class="btn btn-default pull-right">Создать карточку</a>
    </div>
<?php
if (isset($_SESSION['message'])) {
    echo "<p>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}

echo "<table class='table table-hover table-responsive table-bordered'>";
echo "<tr>";
echo "<th>№</th>";
echo "<th>Марка авто</th>";
echo "<th>Гос номер авто</th>";
echo "<th>Телефон владельца авто</th>";
echo "<th>Парковочное место</th>";
echo "<th>Дата и время въезда</th>";
echo "<th>Дата и время выезда</th>";
echo "<th>Цена</th>";
echo "<th>Скидка</th>";
echo "<th>Задолженность по оплате</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($res)) {

    extract($row);
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$brand_car}</td>";
    echo "<td>{$car_state_number}</td>";
    echo "<td>{$owner_phone}</td>";
    echo "<td>{$parking_space}</td>";
    echo "<td>{$date_time_entry}</td>";
    echo "<td>{$date_time_exit}</td>";
    echo "<td>{$price}</td>";
    echo "<td>{$sale}</td>";
    echo "<td>{$debt_payment}</td>";
    echo "<td>";
    echo "<a href='update_card.php?id={$id}' class='btn left-margin'>";
    echo "<span class='glyphicon glyphicon-edit'></span> Редактировать";
    echo "</a>";
    echo "</td>";
    echo "<td>";
    echo "<a href='delete_card.php?id={$id}' class='btn left-margin'>";
    echo "<span class='glyphicon glyphicon-remove'></span> Удалить";
    echo "</a>";
    echo "</td>";
    echo "</td>";
    echo "</tr>";

}

echo "</table>";

include_once "layout_footer.php";