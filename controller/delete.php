<?php
require 'config/databaseconnection.php';

class DeleteRecord
{
    private $con;// it cannot be accessed directly from outside the class that why is declared as private 

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit;
        }

        $this->con = connect_db();
    }

    public function deleteRecord()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id']; // Get the ID of the record to delete from the POST data

            $deleteQuery = "DELETE FROM user_details WHERE id = $id"; // Construct the delete query

            if (mysqli_query($this->con, $deleteQuery)) { // Execute the delete query
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . mysqli_error($this->con); // Display error message if the deletion fails
            }
        } else {
            echo "Invalid request"; // If the 'id' parameter is not present in the POST data, display an invalid request message
        }

        mysqli_close($this->con);
    }
}

$deleteRecord = new DeleteRecord();
$deleteRecord->deleteRecord();
?>
