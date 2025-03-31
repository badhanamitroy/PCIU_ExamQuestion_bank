<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCIU Question Bank</title>
    <link rel="stylesheet" href="./css files/universal.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>

        .container {
            flex: 1;
            width: 90%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
        }


        .title h1 {
            /* background-color: #581845; */
            color:  #581845;;
            display: inline-block;
            padding: 0px 40px;
            border-radius: 25px;
            font-size: 40px;
            font-weight: bold;
            font-family: 'Pacifico', cursive; /* Stylish font */
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); */
        }

        .content {
            margin: 20px 0;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            text-align: justify;
            padding: 0 10px;
        }

        .buttons {
            margin-top: 30px;
        }

        .get-btn {
            background-color: #3b3b98;
        }

        .upload-btn {
            background-color: #1f3c88;
        }

        footer {
            height: 20vh; /* 10% of viewport height */
            /* background-color: #d19c32; */
            color: black;
            text-align: center;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            /* padding: 5px; */
        }
        footer h4 {
            font-family: ADlam display;
            font-size: 14px;
        }
        footer h4 a{
            color: #000;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="https://www.portcity.edu.bd/" target="_blank">
                <img src="pciulogo.png" alt="Port City International University">
            </a>
        </div>
        <div class="title">
            <h1>Question Bank</h1>
        </div>
        <div class="content">
            <p>Dear Students,</p>
            <p>We all know how important previous question papers are for exams to understand the pattern of questions. This platform has been designed to ease your access to past papers. Here, you can browse, download, and even upload question papers. Your uploaded questions will be available after approval.</p>
            <p style="text-align: center;">Enjoy this platform!</p>
        </div>
        <div class="buttons">
            <a href="viewquestions.php">
                <button class="get-btn">Get Questions</button>
            </a>
            <a href="login.php">
                <button class="upload-btn" >Upload Questions</button>
            </a>
        </div>
    </div>
    <footer>
        <h4>Developed with love © <a href="https://www.facebook.com/BadhanAmitRoy.25/" target="_blank">Badhan Roy Amit</a> [CSE 28-Day-A]</h4>
    </footer>

    <script>

    </script>
</body>
</html>
