<?php
    sleep(1); 
    if(!empty($_POST)){
        $response = new stdclass; 
        $response->idUser = $_POST['idUser']; 
        
        $response->nombre = $_POST['nombre']; 
        $response->surname = $_POST['surname']; 
        $response->date = $_POST['date']; 

        echo json_encode($response); 
    } else {
        echo 'Error'; 
    }
?>