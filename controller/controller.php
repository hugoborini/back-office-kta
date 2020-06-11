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
    header('Location: admin');
    exit;
}