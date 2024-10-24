
<?php require_once '../functions/connect.php' ?>

<?php
$id = $_GET['something'];

?>
<?php
    $row = $pdo->prepare("SELECT * FROM card");
    $row->execute();
    $cards=$row->fetchAll(PDO::FETCH_OBJ);
?>
<?php
    define("SERVERNAME","localhost");
    define("DB_LOGIN","root");
    define("DB_PASSWORD","root");
    define("DB_NAME","GuitarShop");

    $title = $description = $im = '';
    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM `card`";
    $result = $connect->query($sql);
    for($user = array();$row=$result->fetch_assoc();$user[]=$row);
    
    array_unshift($user, NULL);
    unset($user[0]);
    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <title><?php echo $user[$_GET['something']]['title']; ?></title>
    </head>
    <body>
    <div class="wrapper">
        <div class="container">
        <a class="exit_btn" href="../index.php"><p>Назад</p></a> 
            <div class="img__block">
                <img src="../functions/img/<?= $user[$_GET['something']]['filename']; ?>" alt="card-img">
                <p class="img__block-desc"><?php echo $user[$_GET['something']]['description']; ?></p>
                <button class="img__btn">Купить</button>
            </div>

            
        </div>
    </div>
    </body>
    </html>
