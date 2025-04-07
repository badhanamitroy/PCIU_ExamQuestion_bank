<?php
include 'connectDB.php';

if (isset($_POST['register'])) {
    $StudentName = mysqli_real_escape_string($connection, $_POST['StudentName']);
    $Department = mysqli_real_escape_string($connection, $_POST['Department']);
    $USIN = mysqli_real_escape_string($connection, $_POST['USIN']);
    $PCIUID = mysqli_real_escape_string($connection, $_POST['PCIUID']);
    $StudentEmail = mysqli_real_escape_string($connection, $_POST['StudentEmail']);
    $StudentPhone = mysqli_real_escape_string($connection, $_POST['StudentPhone']);
    $Status = 'Pending'; // Default status for new CRs

    $query = "INSERT INTO crinfo (StudentName, Department, USIN, PCIUID, StudentEmail, StudentPhone, Status) 
              VALUES ('$StudentName', '$Department', '$USIN', '$PCIUID', '$StudentEmail', '$StudentPhone', '$Status')";

    $queryRun = mysqli_query($connection, $query);

    if ($queryRun) {
        echo "<script type='text/javascript'>
                alert('Registration successful! Proceed to login?');
                window.location.href='login.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Registration failed: " . mysqli_error($connection) . "');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add CR Info - Registration</title>
    <link rel="stylesheet" href="./css files/universal.css">
    <link rel="stylesheet" href="./css files/formdesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }

        .container img {
            width: 65px;
            margin-bottom: 15px;
        }

        h4 {
            font-size: 16px;
            margin-bottom: 20px;
            text-align: left;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff5cc;
            font-size: 14px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
        }

        button {
            width: 60%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .home-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .home-btn:hover {
            background-color: #003d82;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="LOGo.png" alt="PCIU Logo">
        <h4>Dear Class Representative,<br>Please fill out this form to register yourself.</h4>
        <form method="post" action="">
            <div class="form-group">
                <input type="text" name="StudentName" id="StudentName" placeholder="Enter Your Full Name" required>
            </div>
            <div class="form-group">
                <select name="Department" id="Department" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                    <option value="Electrical and Electronic Engineering">Electrical and Electronic Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Textile Engineering">Textile Engineering</option>
                    <option value="Fashion Design and Technology">Fashion Design and Technology</option>
                    <option value="English">English</option>
                    <option value="Law">Law</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Journalism and Media Studies">Journalism and Media Studies</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="USIN" id="USIN" placeholder="Enter Your USIN" required>
            </div>
            <div class="form-group">
                <input type="text" name="PCIUID" id="PCIUID" placeholder="Enter Your PCIU ID" required>
            </div>
            <div class="form-group">
                <input type="email" name="StudentEmail" id="StudentEmail" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="StudentPhone" id="StudentPhone" placeholder="Enter Your WhatsApp Number" required>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>

    <a href="index.php">
        <button class="home-btn">
            <i class="fa-solid fa-house" style="font-size: 18px;"></i>
        </button>
    </a>
</body>
</html>