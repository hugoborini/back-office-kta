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
</head>
<body>
    <h1>Catacombes</h1>
    <div class='cards'>
    <?php while($data_room = $all_room->fetch()){ ?>
<div class='card'>
    <div class='card__name'> <?=$data_room['name']?></div>
    <div class='card__description'><?=$data_room['description']?> </div>
    <div class='card__path_img'><?=$data_room['path_img']?> </div>
    <a href="admin/<?= $data_room['id_room']?>">Voir plus</a> <a href="delete/<?= $data_room['id_room']?>">Delete room</a>
</div>

    <?php }?>
 </div>
</body>
</html>