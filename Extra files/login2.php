<!-- php -S localhost:8000 -->

<?php

session_start();
$protectedRoutes = [
    '/admin',
    '/welcome',
    
    // Add more protected routes as needed
];

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: welcome.php');
    exit;
}

// Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
//     $_SESSION['loggedin'] = true;
//     $_SESSION['username'] = 'example_user'; // Set the username or any other relevant data

//     // Redirect to the dashboard or protected page
//     header('Location: welcome.php');
//     exit;
// }








if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform user authentication (e.g., check credentials against a database)
    
    // Assuming successful authentication
    $username = ''; // Initialize the variable to store the username
    
    // Retrieve the username from the database based on the user's credentials
    // Implement your database query here to fetch the username based on the provided credentials
    $email = $_POST['email'];
    $password = $_POST['password'];


    
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "phpLogin";
    // Assuming you are using MySQLi to connect to the database
   // $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    // Prepare the query and perform the database query
    $sql = "SELECT email FROM user_details WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check if any row was returned
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    }

    // Close the database connection
    mysqli_close($conn);

    // If the username is fetched successfully, set session variables
    if ($email) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $email; // Set the fetched username in the session variable
        error_log('Username: ' . $email);
        // Redirect to the dashboard or protected page
        header('Location: welcome.php');
        exit;
    } else {
        // Authentication failed, handle accordingly (e.g., display error message)
    }
}








if(isset($_POST['email']))
{
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "phpLogin";
$con = mysqli_connect($servername, $username, $password, $dbname);


if(!$con)
{
    die("connect to this database failed due to" . mysqli_connect_error());
}


$email = $_POST['email'];
$password = $_POST['password'];
$select = "SELECT * FROM `user_details` WHERE email = '$email' && password = '$password' ";
$result = mysqli_query($con, $select);


if(mysqli_num_rows($result) > 0)
{
    header('Location: welcome.php');
}

 else
  {
    echo "Invalid Email or Password";
  }
$con->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="containertwo">


            <form action="" method="post" name="myForm">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Enter Your Email Address" id="email">
                <input type="password" name="password" placeholder="Enter Your Password" id="password">
               <button id="button">Login</button>
            </form>


        </div>
    </div>
    <script>
        const btn =document.getElementById("button");

        btn.addEventListener('click', Checked);

        function Checked(){
            if(document.myForm.email.value == ""){
                alert("Please Enter Email Address");
                document.myForm.email.focus();
                return false;
            } else if(document.myForm.password.value == "") {
                alert("Please Enter Password");
                document.myForm.password.focus();
                return false;
            } 
            else{
                document.myForm.submit();
                return true;
            }
        }

    </script>
</body>
</html>