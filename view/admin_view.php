
<!DOCTYPE html>
<html lang="en">
    <style>
        body{
            background-color: #A28089;
        }
.user-table {
  width: 100%;
  margin-top: 60px;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.user-table th,
.user-table td {
    
  padding: 17px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  background-color: #f9f9f9;
}

.pagination {
  margin-top: 20px;
}

.pagination a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #f1f1f1;
  color: #333;
  text-decoration: none;
}

.search-form {
  margin-top: 20px;
}

.search-form input[type="text"] {
  width: 300px;
  padding: 8px;
  margin-top: 50px;
  margin-left: 400px;
  border: 3px solid #ddd;
  border-radius: 3px;
}

.search-form button {
  padding: 8px 15px;
  border: none;
  border-radius: 3px;
  background-color: #333;
  color: #fff;
  cursor: pointer;
}

#btnback
{
float: right;
margin-top: -415px;
margin-right: 10px;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button id="btnback" class="btn btn-dark" onclick="redirectTowelcomePage()" class="redirect-button">Go Back</button>
    <script>

function redirectTowelcomePage() {
        window.location.href = "welcome.php";
    }

    </script>
</body>
</html>