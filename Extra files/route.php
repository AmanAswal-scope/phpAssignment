 <?php
session_start();


$protectedRoutes = [
    '/dashboard',
    '/admin',
    
];


$route = $_SERVER['REQUEST_URI'];

if (in_array($route, $protectedRoutes)) {

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php');
        exit;
    }
}

switch ($route) {
    case '/dashboard':
        include 'dashboard.php';
        break;
    case '/admin':
        include 'admin.php';
        break;
  
    default:
        include '404.php'; 
        break;
}
?> 
