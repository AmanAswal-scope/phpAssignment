<?php

require '../config/databaseconnection.php';

class Pagination
{
    private $con;
    private $recordsPerPage;
    private $totalRecords;
    private $totalPages;

    public function __construct($con, $recordsPerPage)
    {
        $this->con = $con;
        $this->recordsPerPage = $recordsPerPage;
    }

    public function getTotalPages()
    {
        return $this->totalPages;
    }

    public function getCurrentPage()
    {
        return isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    }

    public function getStartFrom()
    {
        $currentPage = $this->getCurrentPage();
        return ($currentPage - 1) * $this->recordsPerPage;
    }

    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

    public function calculateTotalPages()
    {
        $totalRecordsQuery = "SELECT COUNT(*) AS total FROM user_details"; // Query to count the total number of records
        $result = mysqli_query($this->con, $totalRecordsQuery);
        $row = mysqli_fetch_assoc($result);
        $this->totalRecords = $row['total']; // Total number of records
        $this->totalPages = ceil($this->totalRecords / $this->recordsPerPage); // Calculate the total number of pages
    }

    public function getRecords()
    {
        $startFrom = $this->getStartFrom();
        $search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search term from the query string

        $query = "SELECT * FROM user_details"; // Initial query to fetch all records
        if (!empty($search)) {
            $query .= " WHERE email LIKE '%$search%' OR phone_number LIKE '%$search%'"; // Add search condition to the query
        }

        $query .= " LIMIT $startFrom, $this->recordsPerPage"; // Add pagination limits to the query
        $result = mysqli_query($this->con, $query); // Execute the final query to fetch records

        return $result;
    }
}

class AdminPage
{
    private $con;
    private $pagination;

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header('Location: login.php');
            exit;
        }

        $this->con = connect_db(); // calling db connection function.
        $this->pagination = new Pagination($this->con, 3); // Initialize pagination with 3 records per page
    }

    public function render()
    {
        $this->pagination->calculateTotalPages();
        $result = $this->pagination->getRecords();

        require '../view/admin_user_details.php';//importing admin_user_details_html page 

        mysqli_close($this->con);
        echo $html;
        require '../view/admin_view.php'; // importing admin_html page
    }
}

$adminPage = new AdminPage();
$adminPage->render();
?>

































