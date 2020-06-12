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

// function PostARoom($name, $path_img, $description){
//     postRoom($name, $path_img, $description );
//     header ('Location: /back-office-kta/admin');
//     exit;
// }

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