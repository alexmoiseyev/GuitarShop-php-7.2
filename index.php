<?php require_once('./pages/header.php') ?>
<?php session_start(); ?>

<?php
$ident = $_GET['something'];
$search = $_GET['search_input'];

if($_GET['search_input'] == ''){
    switch($ident){
        case 'Бас':
            $row = $pdo->prepare("SELECT * FROM card WHERE type='Бас'");
            break;
        case 'Электрогитара':
            $row = $pdo->prepare("SELECT * FROM card WHERE type='Электрогитара'");
            break;
        case 'Акустическая гитара':
            $row = $pdo->prepare("SELECT * FROM card WHERE type='Акустическая гитара'");
            break;
        default:
            $row = $pdo->prepare("SELECT * FROM card");
    }
}else{
    $row = $pdo->prepare("SELECT * FROM card WHERE name OR description LIKE'%$search%'");
}
$row->execute();
$cards=$row->fetchAll(PDO::FETCH_OBJ);

    
?>
<?php
    define("SERVERNAME","localhost");
    define("DB_LOGIN","root");
    define("DB_PASSWORD","root");
    define("DB_NAME","myfirstdraw");

    $title = $description = $im = '';
    $connect = new mysqli(SERVERNAME, DB_LOGIN, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM `card` ORDER BY `id` DESC";
    $result = $connect->query($sql);
?>

        <div><?php echo $_GET['search_input']?> </div>
        <main class="main">
            <p><?php ?></p>
            <div class="container">
                <div class="card__block">
                    <?php foreach($cards as $card): ?>
                        <div class="card">
                        <p class="card__type"><?php echo $card->type; echo ':' . $card->price . '$'?></p>
                            <a href="./functions/data.php?something=<?php echo $card->id ?>">
                                <p class="card__title"><?php echo $card->name ?></p>
                                <img class="card__img" src="./functions/img/<?php echo $card->filename?>" alt="card__img">
                                <p class="card__text"><?php echo $card->description ?></p>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </main>
<?php require_once('./pages/footer.php') ?>