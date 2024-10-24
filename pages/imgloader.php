<?php require_once '../functions/connect.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Админка добавления фото</title>   
</head>
<body>
    <div style = "text-align:center;">
    <h1>Добавление фото</h1>
    <?php if(!empty($_SESSION['name'])) :?>

        <?php echo "Добрый день, ".$_SESSION['name']; ?>
        <br>
        <a href= "/functions/logout.php">Выйти</a>

        <?php 
            $sql=$pdo->prepare("SELECT * FROM card");
            $sql->execute();
            $res=$sql->fetch(PDO::FETCH_OBJ);?>
        
        <form action = "../functions/imgloader-act.php?a=1&b=2&c=3/<?php echo $res->id ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Название">
            <input type="text" name="description" placeholder="Описание">
            <input type="text" name="type" list="instruments" placeholder="Тип">
            <input type="text" name="price" placeholder="Цена">
            <p><input type="file" name="im" ></p>
            <input type="submit" name="save" value="Сохранить">
        </form>
        <br>
        <img src="../functions/img/<?php echo $res->filename ?>" width="200">

        <?php else:
        echo'<h2>Вы не авторизованы?</h2>';
        echo'<a href = "/">На главную</a>';
    ?>    
    <?php endif ?>
    </div>

    <datalist id="instruments">
        <option value="Бас">
        <option value="Электрогитара">
        <option value="Акустическая гитара">
    </datalist>

</body>
</html>