<?php
class LogoutController
{
    public function __construct()
    {
        session_start();
    }

    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

$logoutController = new LogoutController();
$logoutController->logout();
?>
