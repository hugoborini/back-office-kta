<?php
function dbConnect() {
    try { $bdd = new PDO('mysql:host=localhost;dbname=catacombes;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception  $e) {
        $retour["sucess"] = false;
        $retour["msg"] = "chakal c pas bon";
    die('Error : ' .  $e->getMessage());
    }
    return $bdd;
}


function getAllRoom(){
    $bdd = dbConnect();

    $req = $bdd->query("SELECT * from room");

    return $req;
}

function getRoom($id_room){
    $bdd = dbConnect();
    
    $req = $bdd->prepare("SELECT * from room WHERE id_room = :id_room");
    $req->execute([
        "id_room" => $id_room
    ]);

    return $req;
}

function getPicsAndFacts($id_room){
    $bdd = dbConnect();

    $req = $bdd->prepare("SELECT * from images WHERE id_room = :id_room");
    $req->execute([
        "id_room" => $id_room
    ]);

    return $req;
}

function postRoom($name, $path_img, $description ){
    $bdd = dbConnect();
    $req = $bdd->prepare('INSERT INTO `room`(`name`, `path_img`, `description`) VALUES (:name, :path_img, :description)');
    $req->execute(array(
        'name' => $name,
        'path_img' => $path_img,
        'description' => $description
    ));
}

function deleteRoom($id_room){
    $bdd = dbConnect();
    $req = $bdd->prepare('DELETE FROM `room` WHERE id_room = :id_room');
    $req->execute(array(
        'id_room' => $id_room,
    ));
}
