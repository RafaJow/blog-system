<?php
class Auth
{
    public function __construct()
    {
        
    }

    public function isUserLoggedIn()
    {
        $isLogged = false;
        session_start();
        $isLogged = $_SESSION['user_id'];
        session_write_close();

        if($isLogged != false){
            return true;
        }
        return false;
    }

    public function getLoggedUserId()
    {
        $loggedUserId = false;
        session_start();
        if ($_SESSION['user_id'] != false) {
            $loggedUserId = $_SESSION['user_id'];
        }
        session_write_close();

        return $loggedUserId;
    }
    public function showLogin()
    {
        header('Location:../');
    }
}
