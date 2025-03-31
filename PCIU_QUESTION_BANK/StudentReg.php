<?php
include 'connectDB.php';

if (isset($_POST['register'])) {
    // $ManagerId = mysqli_real_escape_string($connection, $_POST['ManagerId']);
$StudentName = mysqli_real_escape_string($connection, $_POST['StudentName']);
$Department = mysqli_real_escape_string($connection, $_POST['Department']);
$USIN = mysqli_real_escape_string($connection, $_POST['USIN']);
$PCIUID = mysqli_real_escape_string($connection, $_POST['PCIUID']);
$StudentEmail = mysqli_real_escape_string($connection, $_POST['StudentEmail']);
$StudentPhone = mysqli_real_escape_string($connection, $_POST['StudentPhone']);

$query = "INSERT INTO studentinfo (StudentName, Department, USIN, PCIUID, StudentEmail, StudentPhone) 
VALUES ('$StudentName', '$Department', '$USIN', '$PCIUID', '$StudentEmail', '$StudentPhone')";

$queryRun = mysqli_query($connection, $query);

// Handling success and failure messages
if ($queryRun) {
    echo "<script type='text/javascript'>
    alert('You have been registered successfully! Wanna proceed?');  
  </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register yourself</title>
    <link rel="stylesheet" href="./css files/universal.css">
    <link rel="stylesheet" href="./css files/formdesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* width: 350px; */
            margin-top:10% ;
        }

        .container img {
            width: 80px;
            margin-bottom: 10px;
        }

        h4 {
            font-size: 16px;
            margin-bottom: 20px;
            text-align: left;
        }

        input, select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff5cc;
            font-size: 14px;
            display: block;
        }

        button {
            width: 50%;
            background-color: #4CAF50;
            padding: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 10px;
            font-size: 14px;
        }

        a {
            color: blue;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="LOGo.png" alt="PCIU">
        <h4>Dear Student,<br>Please fillup this form & get registered . . . </h4>
        <form method="post" action="">
            <input type="text" name="StudentName" placeholder="Enter Your Full Name" required>
            <select name="Department" required>
                <option value="" disabled selected>Department</option>
                <option>Computer Science and Engineering</option>
                <option>Electrical and Electronic Engineering</option>
                <option>Civil Engineering</option>
                <option>Textile Engineering</option>
                <option>Fashion Design and Technology</option>
                <option>English</option>
                <option>Law</option>
                <option>Business Administration</option>
                <option>Journalism and Media Studies</option>
            </select>
            <input type="text" name="USIN" placeholder="Enter Your USIN" required>
            <input type="text" name="PCIUID" placeholder="Enter Your PCIU ID" required>
            <input type="email" name="StudentEmail" placeholder="Enter Your email" required>
            <input type="tel" name="StudentPhone" placeholder="Enter Your Phone Number" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>

    <a href="index.php">
    <button style="
    background-color: #0056b3;
    color: white;
    position: fixed;
    bottom: 20px;
    left: 20px;
    height: 50px;
    width: 50px;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;">
    <i class="fa-solid fa-house" style="font-size: 18px;"></i>
    </button>

    </a>


</body>
</html>
