<?php require_once './functions/connect.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <title>GuitarShop</title>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container container__flex">
                <img src="./css/images/guitar-instrument-electric-flying-v-svgrepo-com.svg" alt="logo" class="header__logo">
                <form class="search__form" action="" method="get">
                    
                    <input name="search_input" placeholder="Искать здесь..." type="search">
                    <button type="submit">Поиск</button>
                </form>
                <a href="#" class="menu_btn">&#9776;</a>
                <ul class="header__list">
                <li class="header__list-item"><a href="?something=#">Главная</a></li>
                    <li class="header__list-item"><a href="?something=Электрогитара">Электрогитары</a></li>
                    <li class="header__list-item"><a href="?something=Бас">Бас гитары</a></li>
                    <li class="header__list-item"><a href="?something=Акустическая гитара">Акустические гитары</a></li>
                    <li class="header__list-item"></li>
               
                    
                </ul>
                <?php if(!empty($_SESSION['name'])) :?>
                    <ul class="header__account">
                        <li class="header__account-btn"><a href="#openModal"><?php echo $_SESSION['name'] ?></a></li>
                    </ul>
                    <div id="openModal" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $_SESSION['name'] ?></h3>
                                    <a href="#close" title="Close" class="close">×</a>
                                </div>
                                <div class="modal-body">    
                                    <ul class="modal-body_box">
                                        <li class="modal__btn"><a href="../pages/imgloader.php">Продать</a></li>
                                        <br>
                                        <li class="modal__btn"><a href="../functions/logout.php">Выйти</a></li>
                                    </ul>
                                </div>
                                </div>
                    <?php else: ?>
                        <ul class="header__login">
                            <li class="header__login-sigin"><a href="../pages/login.php">?</a></li>
                        </ul>    
                    <?php endif ?>
            </div>
        </header>