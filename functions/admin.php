<?php
    require_once 'connect.php'
   
?>
<?php session_start(); ?>
<?php
    $name = $_POST["name"];
    $password = $_POST["password"];

    $sql = $pdo->prepare("SELECT id,name FROM user WHERE name=:name AND password=:password");
    $sql->execute(array('name'=>$name,'password'=>$password));
    $array=$sql->fetch(PDO::FETCH_ASSOC);
    if($array['id'] > 0){
        $_SESSION['name'] = $array["name"];
        header("Location:/index.php");
    }
    else{
        header("Location:/pages/login.php");
    }
    
?>