<?php
require '../config/databaseconnection.php';

class LoginController
{
    private $conn;

    public function __construct()
    {
        session_start();
        $this->conn = connect_db();
    }

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT email FROM user_details WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $email = $row['email'];
            }
            if ($email) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                error_log('Username: ' . $email);

                header('Location: welcome.php');
                exit;
            }
        }

        mysqli_close($this->conn);
        require '../view/login_view.php';
    }
}

$loginController = new LoginController();
$loginController->handleLogin();
?>
