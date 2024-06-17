<!--create_card.php-->
<?php
require_once "config/database.php";

$page_title = "Создание парковочной карты.";
require_once "layout_header.php";
?>
    <div class="right-button-margin">
        <a href="index.php" class="btn btn-default pull-right">Просмотр всего списка</a>
    </div>
<?php
if ($_POST) {
    $brand_car = strip_tags($_POST['brand_car']);
    $car_state_number = strip_tags($_POST['car_state_number']);
    $owner_phone = strip_tags($_POST['owner_phone']);
    $parking_space = strip_tags($_POST['parking_space']);
    $date_time_entry = strip_tags($_POST['date_time_entry']);
    $date_time_exit = strip_tags($_POST['date_time_exit']);
    $price = strip_tags($_POST['price']);
    $sale = strip_tags($_POST['sale']);
    $debt_payment = strip_tags($_POST['debt_payment']);

    $query = "INSERT INTO parking_cards (brand_car, car_state_number, owner_phone, parking_space, date_time_entry, date_time_exit, price, sale, debt_payment) VALUES ('$brand_car', '$car_state_number','$owner_phone','$parking_space','$date_time_entry','$date_time_exit','$price', '$sale', '$debt_payment')";

    $res = mysqli_query($conn, $query);
    if (!$res) die (mysqli_error($conn));

    if (mysqli_affected_rows($conn) == 1) {
        $_SESSION['message'] = 'Запись добавлена';
        header('location: index.php');
    }
}
?>
    <form action="" method="post">

        <table class="table table-hover table-responsive table-bordered">

            <tr><td>Марка авто</td><td><input type="text" name="brand_car" class="form-control"/></td></tr>
            <tr><td>Гос номер авто</td><td><input type="text" name="car_state_number" class="form-control"/></td></tr>
            <tr><td>Телефон владельца авто</td><td><input type="tel" name="owner_phone" class="form-control"/></td></tr>
            <tr><td>Парковочное место</td><td><input type="number" name="parking_space" class="form-control"/></td></tr>
            <tr><td>Дата и время въезда</td><td><input type="datetime-local" name="date_time_entry" class="form-control"/></td></tr>
            <tr><td>Дата и время выезда</td><td><input type="datetime-local" name="date_time_exit" class="form-control"/></td></tr>
            <tr><td>Цена</td><td><input type="number" name="price" class="form-control"/></td></tr>
            <tr><td>Скидка</td><td><input type="number" name="sale" class="form-control"/></td></tr>
            <tr><td>Задолженность по оплате</td><td><input type="number"name="debt_payment" class="form-control"/></td></tr>
            <tr>
                <td></td>
                <td> <button type="submit" class="btn btn-primary">Создать</button></td>
            </tr>
        </table>
    </form>

<?php // подвал
require_once "layout_footer.php";
?>



