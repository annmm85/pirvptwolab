<!--layout_header.php-->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $page_title ?></title>

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- кастомный CSS -->
    <link rel="stylesheet" href="libs/css/style.css" />
</head>
<body>
<header class="header">
    <nav>
        <?php session_start() ?>
        <ul class="header-ul">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php">Вход</a></li>
                <li><a href="register.php">Регистрация</a></li>
            <?php else: ?>
                <li><a href="index.php">Главная</a></li>
                <?php if (strpos($_SESSION['username'], 'admin') !== false): ?>
                    <li><a href="users.php">Сотрудники</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Выход</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
    <!-- container -->
    <div class="container">

        <!-- page header -->
        <div class="page-header">
            <h1><?= $page_title ?></h1>
        </div>