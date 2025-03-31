<?php
session_start();

include 'connectDB.php';


if(isset($_POST['Proceed'])){

    $USIN = mysqli_real_escape_string($connection, $_POST['USIN']);
    $PCIUID = mysqli_real_escape_string($connection, $_POST['PCIUID']);
    $StudentEmail = mysqli_real_escape_string($connection, $_POST['StudentEmail']);
    $StudentPhone = mysqli_real_escape_string($connection, $_POST['StudentPhone']);    

    $query = "SELECT * FROM studentinfo 
                WHERE PCIUID = '$PCIUID' AND 
                      StudentEmail = '$StudentEmail' AND 
                      StudentPhone = '$StudentPhone'";
    
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
         // Fetch user data and start session
         while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['USIN'] = $row['USIN'];
            $_SESSION['Department'] = $row['Department'];
            $_SESSION['StudentName'] = $row['StudentName'];
            $_SESSION['PCIUID'] = $row['PCIUID'];
            $_SESSION['StudentEmail'] = $row['StudentEmail'];
            $_SESSION['Student'] = $row['Student'];
         }
    }
            // Redirect to a dashboard or main page after successful login
            header("Location: Quesuploadpage.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Upload Form</title>
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
            width: 350px;
        }

        .container img {
            width: 80px;
            margin-bottom: 10px;
        }

        h4 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
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
        <h4>Please fill up this form & Proceed</h4>
        <form method="post" action="">
        <!-- <input type="text" name="USIN" placeholder="Enter Your USIN" required> -->
            <input type="text" name="PCIUID" placeholder="Enter Your PCIU ID" required>
            <input type="email" name="StudentEmail" placeholder="Enter Your email" required>
            <input type="tel" name="StudentPhone" placeholder="Enter Your Phone Number" required>
            <button type="submit" name="Proceed">Proceed</button>
        </form>
        <p>Not yet registered? <a href="StudentReg.php">Register now</a></p>
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
