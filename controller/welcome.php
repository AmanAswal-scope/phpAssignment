<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A28089;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        tr{
          background-color: #C2BEBE 
        }
        th, td {
          
            padding: 12px;
            text-align: left;
            border-bottom: 1.5px solid #A28089;
            background-color: rgba(255, 255, 255, 0.586);
          
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .form-group button {
            display: block;
            width: 100%;
            
            padding: 10px;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
.b{
  margin-left: 470px;
}

    </style>
</head>
<body>
    <h1>Welcome to Dashboard </h1>
    <h2 > 
    <!-- <button class="btn btn-dark onclick="redirectToAnotherPage()" class="redirect-button">Go to Admin panel</button>
    <button class="btn btn-dark onclick="redirectTologoutPage()" class="redirect-button">logout</button> -->
    <div class="b">
    <button class="btn btn-dark" onclick="redirectToAnotherPage()">Go to Admin panel</button>
  
    <button  class="btn btn-dark" onclick="redirectTologoutPage()">logout</button>

    </div>
    <h1> Your details</h1>

    </h2>


    <?php
require '../config/databaseconnection.php';


session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}




// for db connection
$con = connect_db();


 
$email = $_SESSION['email'];
echo "<script>console.log('Email: " . $email . "');</script>";

$select = "SELECT * FROM `user_details` WHERE `email` = '$email'";
    $result = mysqli_query($con, $select);
    if (mysqli_num_rows($result) > 0) {
        echo '<table style="border-collapse: collapse; width: 100%; margin-bottom: 20px; background-color: #fff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">';
        echo '<tr>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">first_name</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">last_name</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">address</th>';

        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Id</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Email</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Password</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Contact Number</th>';
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Profile Picture</th>'; // Add the new column for Profile Picture
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">created_datetime</th>'; // Add the new column for Profile Picture
        
        echo '<th style="padding: 15px; text-align: left; border-bottom: 1.5px solid #3e3b3b;">Actions</th>';
      
        echo '</tr>';


        //fetching details using mysqli_fetch_assoc
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';

            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['password'] . '</td>';
            echo '<td>' . $row['phone_number'] . '</td>';
            $profilePicturePath = $row['profile_picture'];
            echo '<td><img src="' . $profilePicturePath . '" width="100" height="100"></td>';
            

          echo '<td>' . $row['created_datetime'] . '</td>';
            echo '<td>';
            echo '<button   style=" border: 1.5px solid #3e3b3b; "style=" border: 1.5px solid #ddd;" class="btn btn-dark" onclick="updateRecord(' . $row['id'] . ')">Update</button>';
            echo '<button    style=" border: 1.5px solid #ddd;" class="btn btn-dark" onclick="deleteRecord(' . $row['id'] . ')">Delete</button>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No user records found.";
    }

    $con->close();
    ?>




    <script>
var email = "<?php echo $email; ?>"; 
        console.log(email);


       function updateRecord(id) {

    var email = prompt("Enter new email:");
    var password = prompt("Enter new password:");
    var phoneNumber = prompt("Enter new phone number:");

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'update.php';

  
    var idInput = document.createElement('input');
    idInput.type = 'hidden';
    idInput.name = 'id';
    idInput.value = id;
    form.appendChild(idInput);

    var emailInput = document.createElement('input');
    emailInput.type = 'hidden';
    emailInput.name = 'email';
    emailInput.value = email;
    form.appendChild(emailInput);

    var passwordInput = document.createElement('input');
    passwordInput.type = 'hidden';
    passwordInput.name = 'password';
    passwordInput.value = password;
    form.appendChild(passwordInput);

    var phoneNumberInput = document.createElement('input');
    phoneNumberInput.type = 'hidden';
    phoneNumberInput.name = 'phone_number';
    phoneNumberInput.value = phoneNumber;
    form.appendChild(phoneNumberInput);

    
    document.body.appendChild(form);
    form.submit();
}

function redirectToAnotherPage() {
      
 
        window.location.href = "admin.php";
    }


    function redirectTologoutPage() {
        window.location.href = "logout.php";
    }



        function deleteRecord(id) {
  if (confirm('Are you sure you want to delete this record?')) {

   
    var xhr = new XMLHttpRequest();  
    xhr.open('POST', 'delete.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

   
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert('Record deleted successfully');
        location.reload(); 
      }
    };

    
    xhr.send('id=' + id);
  }
}

    </script>
</body>
</html>