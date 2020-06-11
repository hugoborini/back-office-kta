<?php
    $room = showARoom($room_id);
    $Parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php while($data_room = $room->fetch()){ ?>
    <p><?=$data_room['name']?></p>
    <?=$Parsedown->text($data_room['description']);?>
    <p><?=$data_room['path_img']?></p>
    <?php }?>
    
</body>
</html>