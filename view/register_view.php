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


        <form action="" method="post" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
                <h1>Register</h1>
                <input type="text" name="first_name" placeholder="Enter Your first name" id="first_name">
                <input type="text" name="last_name" placeholder="Enter Your last name" id="last_name">
                <input type="text" name="address" placeholder="Enter Your  Address" id="address">
                <input type="email" name="email" placeholder="Enter Your Email Address" id="email">
                <input type="password" name="password" placeholder="Enter Your Password" id="password">
                <input type="password" name="cpassword" placeholder="Enter Your Password Again" id="cpassword">
                <input type="tel" name="phone_number" placeholder="Enter Your Phone Number" id="phone_number">
                <input type="file" name="profile_picture" id="profile_picture">

                

                <button type="submit" id="button">Register</button>
            </form>


        </div>
    </div>

    <script>
        const form = document.forms["myForm"];
        const btn = document.getElementById("button");

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (validateForm()) {
                form.submit();
            }
        });

        function validateForm() {
            var email = form["email"].value;
            var password = form["password"].value;
            var cpassword = form["cpassword"].value;
            var phone_number = form["phone_number"].value;

            // Check if any field is empty
            if (email.trim() === "" || password.trim() === "" || cpassword.trim() === "" || phone_number.trim() === "") {
                alert("Please fill in all fields.");
                return false;
            }

            // Check if email is valid
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Check if password meets requirements (e.g., minimum length)
            if (password.length < 8) {
                alert("Password should be at least 8 characters long.");
                return false;
            }

            // Check if passwords match
            if (password !== cpassword) {
                alert("Passwords don't match.");
                return false;
            }

            // Check if phone number is valid
            var phonePattern = /^\d{10}$/; // Assumes a 10-digit phone number format
            if (!phonePattern.test(phone_number)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>