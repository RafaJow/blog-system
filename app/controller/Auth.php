<?php

function isUserLoggedIn() {
    session_start();   
    $logado = $_SESSION['user_id'];
    session_write_close();
    
    return $logado;
}

?>
