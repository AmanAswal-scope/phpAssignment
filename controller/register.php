<?php
require '../config/databaseconnection.php';

class RegisterController
{
    private $con;

    public function __construct()
    {
        $this->con = connect_db();
    }

    public function register()
    {
        if (isset($_POST['email'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];
            $profilePictureTmpPath = isset($_FILES['profile_picture']['tmp_name']) ? $_FILES['profile_picture']['tmp_name'] : null;
            $uploadedFileName = isset($_FILES['profile_picture']['name']) ? $_FILES['profile_picture']['name'] : null;

            $uploadDirectory = "file:///C:/Users/Aman.Aswal/Desktop/php/proj1/pictures/"; // Update the directory path
            
            $profilePictureDestination = $uploadDirectory . $uploadedFileName;
            move_uploaded_file($profilePictureTmpPath, $profilePictureDestination);

            // Store the directory path in the database
            $profilePicturePath = $profilePictureDestination;

            $select = "SELECT * FROM `user_details` WHERE first_name='$first_name' AND last_name='$last_name' AND address='$address' AND email='$email' AND password='$password' AND phone_number='$phone_number' AND profile_picture='$profilePicturePath'";
            $result = mysqli_query($this->con, $select);

            if (mysqli_num_rows($result) > 0) {
                echo "User already exists!";
            } else {
                $currentDate = date('Y-m-d');
                $currentTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); // Get current date and time in Asia/Kolkata timezone
                $created_datetime = $currentTime->format('Y-m-d H:i:s');
                $sql = "INSERT INTO `user_details` (`first_name`, `last_name`, `address`, `email`, `password`, `phone_number`, `time`, `dd`, `profile_picture`, `created_datetime`) VALUES ('$first_name', '$last_name', '$address', '$email', '$password', '$phone_number', now(), '$currentDate', '$profilePicturePath', '$created_datetime');"; // Added phone number insertion

                if ($this->con->query($sql) == true) {
                    echo "You're successfully registered";
                    header('Location: login.php');
                    exit;
                } else {
                    echo "Error: $sql <br> $this->con->error";
                }
            }
        }

        $this->con->close();
        require '../view/register_view.php'; // importing register_view html
    }
}

$registerController = new RegisterController();
$registerController->register();
?>
