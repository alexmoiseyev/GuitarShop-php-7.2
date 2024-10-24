<?php require_once '../functions/connect.php'; ?>
<?php
    define("SERVERNAME","localhost");
    define("DB_LOGIN","root");
    define("DB_PASSWORD","root");
    define("DB_NAME","GuitarShop");
    session_start();
    $title = $description = $im = '';
    

    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM `card` ORDER BY `id` DESC";
    $result = $connect->query($sql);
    for($user = array();$row=$result->fetch_assoc();$user[]=$row);
?>
<?php
    if(isset($_POST["save"])){
        

        $list=['.php','.zip','.rar','.js','.html'];
        foreach($list as $item){
            if(preg_match("/$item$/",$_FILES['im']['name']))exit("Расшерение файла не подходит");
        }

        $type=getimagesize($_FILES['im']['tmp_name']);
        if($type && ($type['mime'] != 'image/png' || $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')){
            if($_FILES['im']['name']< 1024 * 1000){
                $upload='img/'.$_FILES['im']['name'];

                if(move_uploaded_file($_FILES['im']['tmp_name'],$upload)) echo "Файл загружен";
                    
                else echo "Ошибка загрузки файла";
                
            }
            else exit ("Размер файла превышен");
        }
        
        else exit ("Тип файла не подходит");
        

    }
    echo $filepage;
    
?>

<?php
    $sql = "SELECT * FROM `card`";
    $result = $connect->query($sql);
    for($user = array();$row=$result->fetch_assoc();$user[]=$row);
    header('Location: ../index.php');



    $name = $_POST['name']??'0';
    $description = $_POST['description']??'0';
    $im = $_FILES['im']['name'];
    $price = $_POST['price']??'0';
    $type_=$_POST['type']??'0';
    $url=$_SERVER["REQUEST_URI"];
    $url=explode('/', $url);
    $str=$url[4];
    echo $str;
    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    $sql="INSERT INTO `card` (`name`, `description`, `filename`, `price`, `type` ) VALUES ('$name','$description','$im','$price','$type_')";
    $connect->query($sql);
    $connect->close();
    

?>