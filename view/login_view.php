<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="containertwo">
            <form action="" method="post" name="myForm">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Enter Your Email Address" id="email">
                <input type="password" name="password" placeholder="Enter Your Password" id="password">
                <button id="button">Login</button>
               <h2>
                <a href="../controller/register.php" class="register-button" style="color: black; font-weight: bold;">Want to Register?</a>
                </h2>
            </form>
        </div>
    </div>
    <script>
        const btn = document.getElementById("button");

        btn.addEventListener('click', Checked);

        function Checked() {
            if (document.myForm.email.value == "") {
                alert("Please Enter Email Address");
                document.myForm.email.focus();
                return false;
            } else if (document.myForm.password.value == "") {
                alert("Please Enter Password");
                document.myForm.password.focus();
                return false;
            } else {
                document.myForm.submit();
                return true;
            }
        }
    </script>
</body>
</html>
