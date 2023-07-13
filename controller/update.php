<?php

require 'config/databaseconnection.php'; // Importing databaseconnection file

class UpdateRecord
{
    private $con;

    public function __construct()
    {
        $this->con = connect_db(); // Using connect_db function from the above imported file
    }

    public function updateRecord()
    {
        // Check if the record ID and new values were sent in the request
        if (isset($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone_number'])) {
            $id = $_POST['id'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];

            // Prepare the update statement
            $updateQuery = "UPDATE user_details SET email = '$email', password = '$password', phone_number = '$phone_number' WHERE id = $id";

            // Execute the update statement
            if (mysqli_query($this->con, $updateQuery)) {
                // Update successful
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "welcome.php";
                            alert("Record updated successfully");
                        }, 500); // 1000 milliseconds = 3 seconds
                      </script>';
            } else {
                echo "Error updating record: " . mysqli_error($this->con); // Error occurred during update
            }
        } else {
            echo "Invalid request"; // Invalid request
        }

        mysqli_close($this->con); // Close the database connection
    }
}

$updateRecord = new UpdateRecord();
$updateRecord->updateRecord();
?>
