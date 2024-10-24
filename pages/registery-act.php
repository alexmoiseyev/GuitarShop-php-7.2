<?php
    define("SERVERNAME","localhost");
    define("DB_LOGIN","root");
    define("DB_PASSWORD","root");
    define("DB_NAME","GuitarShop");
    session_start();
?>
<?php
    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM `user`";
    $result = $connect->query($sql);
    for($user = array();$row=$result->fetch_assoc();$user[]=$row);



    $name = $_POST['name']??'0';
    $password = $_POST['password']??'0';
    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    if($name && $password != ' '){
        $sql="INSERT INTO `user` (`name`, `password`) VALUES ('$name','$password')";
        $connect->query($sql);
        $connect->close();
        header('Location: ../index.php');
    }else{
        echo 'введите данные';
    }
?>