<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>AdminPanel</title>
</head>
<body>
    <h2 style="text-align:center; padding-top: 100px;">Вход в аккаунт</h2>
    <form action="../functions/admin.php" method="post" style="text-align:center; padding-top: 100px; ">
        <div class = "form-group">
            <input type="text" placeholder="введите логин" name = "name" id="login__input">
        </div>
        <div class = "form-group">
            <input type="text" placeholder="введите пароль" name = "password" id="password__input">
        </div>
            <button type = "submit" class = "btn btn-primary" id="btn">Войти</button>
    </form>
    <script src="login.js"></script>
</body>

</html>