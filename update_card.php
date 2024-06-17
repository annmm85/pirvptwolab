<!--update_card.php-->
<?php
require_once "config/database.php";

$page_title = "Обновление парковочной карты.";
require_once "layout_header.php";
?>
    <div class="right-button-margin">
        <a href="index.php" class="btn btn-default pull-right">Просмотр всего списка</a>
    </div>
<?php
if (!empty((int)$_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM `parking_cards` WHERE  `id` = '$id'");
    $row = mysqli_fetch_assoc($query);
} elseif ($_POST) {
    $id = strip_tags($_POST['id']);
    $brand_car = strip_tags($_POST['brand_car']);
    $car_state_number = strip_tags($_POST['car_state_number']);
    $owner_phone = strip_tags($_POST['owner_phone']);
    $parking_space = strip_tags($_POST['parking_space']);
    $date_time_entry = strip_tags($_POST['date_time_entry']);
    $date_time_exit = strip_tags($_POST['date_time_exit']);
    $price = strip_tags($_POST['price']);
    $sale = strip_tags($_POST['sale']);
    $debt_payment = strip_tags($_POST['debt_payment']);

    $query = "UPDATE parking_cards SET 
              brand_car = '$brand_car', 
              car_state_number = '$car_state_number', 
              owner_phone = '$owner_phone', 
              parking_space = '$parking_space', 
              date_time_entry = '$date_time_entry', 
              date_time_exit = '$date_time_exit', 
              price = '$price', 
              sale = '$sale', 
              debt_payment = '$debt_payment' 
              WHERE id = $id";

    $res = mysqli_query($conn, $query);
    if (!$res) die (mysqli_error($conn));

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = 'Запись обновлена';
        header('location: index.php');
    }
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <tr><td>Марка авто</td><td><input type="text" name="brand_car" class="form-control" value="<?= $row['brand_car'] ?>"/></td></tr>
            <tr><td>Гос номер авто</td><td><input type="text" name="car_state_number" class="form-control" value="<?= $row['car_state_number'] ?>"/></td></tr>
            <tr><td>Телефон владельца авто</td><td><input type="tel" name="owner_phone" class="form-control" value="<?= $row['owner_phone'] ?>"/></td></tr>
            <tr><td>Парковочное место</td><td><input type="number" name="parking_space" class="form-control" value="<?= $row['parking_space']?>"/></td></tr>
            <tr><td>Дата и время въезда</td><td><input type="datetime-local" name="date_time_entry" class="form-control" value="<?=$row['date_time_entry'] ?>"/></td></tr>
            <tr><td>Дата и время выезда</td><td><input type="datetime-local" name="date_time_exit" class="form-control" value="<?=$row['date_time_exit'] ?>"/></td></tr>
            <tr><td>Цена</td><td><input type="number" step="0.01" name="price" class="form-control" value="<?= $row['price']?>"/></td></tr>
            <tr><td>Скидка</td><td><input type="number" step="0.01" name="sale" class="form-control" value="<?=$row['sale'] ?>"/></td></tr>
            <tr><td>Задолженность по оплате</td><td><input type="number" step="0.01" name="debt_payment" class="form-control" value="<?= $row['debt_payment']?>"/></td></tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary">Обновить</button></td>
            </tr>
        </table>
    </form>

<?php
require_once "layout_footer.php";
?>