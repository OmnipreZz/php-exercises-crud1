<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exercises Crud1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
</head>
<body>

<h1>Exercises Crud1</h1>
<br><br>


<?php
// try {
//     $pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
//     foreach ($pdo->query('SELECT*FROM clients') as $row) {
//     print_r($row);
//     }
//     $pdo = null;
// } catch (PDOException$e) {
//     print 'Erreur!:'.$e->getMessage().'<br>';
// }
?>


<h2>Exercice 1</h2>
<h3>Afficher tous les clients.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT lastName, firstName FROM clients') as $row) {
    echo $row['lastName'].' '.$row['firstName'].' - ';
}
?>
<br><br><hr><br>


<h2>Exercice 2</h2>
<h3>Afficher tous les types de spectacles possibles.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT type FROM showTypes') as $row) {
    echo $row['type'].'<br>';
}
?>
<br><hr><br>


<h2>Exercice 3</h2>
<h3>Afficher les 20 premiers clients.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT lastName, firstName FROM clients WHERE id < 20') as $row) {
    echo $row['lastName'].' '.$row['firstName'].'<br>';
}
?>
<br><hr><br>


<h2>Exercice 4</h2>
<h3>N'afficher que les clients possédant une carte de fidélité.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT * FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber WHERE cardTypesId = 1') as $row) {
    echo $row['lastName'].' '.$row['firstName'].'<br>';
}
?>
<br><hr><br>


<h2>Exercice 5</h2>
<h3>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT lastName, firstName FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC') as $row) {
    echo 'Nom: '.$row['lastName'].'<br>'.'Prénom: '.$row['firstName'].'<br><br>';
}
?>
<br><hr><br>


<h2>Exercice 6</h2>
<h3>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT*FROM shows ORDER BY title ASC') as $row) {
    echo $row['title'].' par '.$row['performer'].', le '.$row['date'].' à '.$row['startTime'].'<br><br>';
}
?>
<br><hr><br>


<h2>Exercice 7</h2>
<h3>Afficher tous les clients.</h3>
<?php
$pdo = new PDO('mysql:host=den1.mysql1.gear.host;dbname=colyseum;charset=utf8', 'colyseum', 'Sz6x?NDz_4TL');
foreach ($pdo->query('SELECT * FROM clients INNER JOIN cards ON clients.cardNumber = cards.cardNumber') as $row) {
    if($row['cardTypesId'] == 1) {
        echo 'Nom: '.$row['lastName'].'<br>Prénom: '.$row['firstName'].'<br>Date de naissance: '.$row['birthDate'].'<br>Carte de fidélité: Oui<br>Numéro de carte: '.$row['cardNumber'].'<br><br>';
    } else {
        echo 'Nom: '.$row['lastName'].'<br>Prénom: '.$row['firstName'].'<br>Date de naissance: '.$row['birthDate'].'<br>Carte de fidélité: Non'.'<br><br>';
    }
}
?>

    
</body>
</html>


