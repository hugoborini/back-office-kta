<?php
$all_room = showAllRoom();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/styles.css">
    <title>Catacombes | Admin</title>
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
</head>
<body> 
<?php if($_GET['error'] == 1){
    echo '<div class="error">L\'upload de votre photo n\'a pas été pris en compte</div>';
}
?>
    <header>Catacombes</header>

    <div class="list-container">
    <ul class="list">
        <?php while($data_room = $all_room->fetch()){ ?>

        <li class="list__elem"><?=$data_room['name']?>
         <div>
            <a href="delete/<?= $data_room['id_room']?>"><i class="fa fa-trash del"></i></a>
            <a href="admin/<?= $data_room['id_room']?>/<?=$data_room['name']?>/addPhoto">Ajouter une image <i class="fa fa-plus-square add"></i></a>
            <a href="admin/<?= $data_room['id_room']?>">Voir plus...</a> 
            </div>
        </li>

        <?php }?>
    </ul>
 <a class="add-link"href="addRoom/">Ajouter une salle ? <i class="fa fa-plus-square add"></i></a>
 </div>
</body>
</html>