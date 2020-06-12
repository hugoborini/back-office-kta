<?php
// session_start();

require "model/model.php";

function checkAccount($user, $pass){
    if(isset($user) && isset($pass)){
        if($user === 'admin' && $pass === 'pass'){
            $_SESSION['user'] = 'admin';
            $_SESSION['pass'] = 'pass';
            
            echo 'ouiiii';
            header('Location: admin');
            exit;
        }
    }
}
function showAllRoom(){
    $showAllRoom = getAllRoom();
    return $showAllRoom;
}
function showARoom($room_id){
    $showARoom = getRoom($room_id);
    return $showARoom;
}
function deleteARoom($room_id){
    $deleteARoom = deleteRoom($room_id);
    header('Location: /back-office-kta/admin');
    exit;
}

function PostARoom($name, $imagename, $description){
    if(isset($_FILES['image']) AND $_FILES['photo']['error'] == 0 ){
        if($_FILES['image']['size'] <= 1000000){
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extension_autorisées = array('png');
            $newname = $_FILES['image']['name'];


    
            if(in_array($extension_upload , $extension_autorisées)) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $newname);
                postRoom($name, $newname, $description );
                header ('Location: /back-office-kta/admin');
                exit;
            }
            else {
                echo 'non';
            }
        } 
    }else {
        echo 'non de non';
    }
}

function str_format($name){
    $name_tab = ["Montsouris", "Cimetière Montparnasse", "Val de Grâce", "Bunker Allemand", "Cabinet de minéralogie", "Souterrains de l'observatoire", "La plage"];
    if (in_array($name, $name_tab)){
    $name_tmp = strtolower($name);
    $name_tmp = str_replace(" ", "-", $name_tmp);
    $name_tmp = str_replace("é", "e", $name_tmp);
    $name_tmp = str_replace("è", "e", $name_tmp);
    $name_tmp = str_replace("â", "a", $name_tmp);
    if($name_tmp == "la-plage"){
        $name_tmp = "plage";
    }
    if ($name_tmp == "souterrains-de-l'observatoire"){
        $name_tmp = "souterrains-observatoire";
    }
        return $name_tmp;
    } else {
        $name_tmp = 'upload';
        return $name_tmp;
}
}

function upload($name, $id_room, $fact){
    $name =  str_format($name);
    if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0 ){
        if($_FILES['image']['size'] <= 1000000){
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extension_autorisées = array('png');
            $newname = $_FILES['image']['name'];


    
            if(in_array($extension_upload , $extension_autorisées)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $name.'/' . $newname);
                addPhoto('/' .$name   ."/" . $newname, $id_room, $fact);
                header ('Location: /back-office-kta/admin');
                exit;
            }
            else {
                echo 'non';
            }
        } 
    }else {
        echo 'non de non';
    }
}