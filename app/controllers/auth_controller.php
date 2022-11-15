<?php

require_once './app/models/user_model.php';
require_once './app/views/auth_view.php';

class AuthController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getUsuarioPorEmail($email);
        if ($user && password_verify($password, $user->pass)) {
            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;
            header("Location: " . BASE_URL);
        } 
        else {
           $this->view->showLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function loginInvitado() {
        session_start();
        $_SESSION['USER_ID'] = "-1";
        $_SESSION['IS_LOGGED'] = true;
        header("Location: " . BASE_URL);
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }

    
}

?>