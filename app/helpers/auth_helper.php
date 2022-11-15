<?php

class AuthHelper {

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . "showLogin");
            die();
        }
    }

    public function itsAdmin() {
        if ($_SESSION['USER_ID']=='-1'){
            return false;
        }
        else {
            return true;
        }
    }
}

?>