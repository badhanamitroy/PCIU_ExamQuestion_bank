<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./css files/adminworkspace.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./css files/viewquestions.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery Library -->
</head>
<body>
    <div class="header" style="margin-bottom: 10px;">
        <h1>Hello Admin</h1>
        <p>Here you can see all the questions of respective departments.</p>
    </div>
    
    <div class="container">
    <!-- Search engine -->
    <div class="search-section">
            <form action="" method="post">
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
                <button type="submit" name="search">Search</button>
            </form>
    </div>

         <table>
            <tr>
                <th>Batch</th>
                <th>Shift</th>
                <th>Module</th>
                <th>Term</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Course Teacher</th>
                <th>Question</th>
            </tr>
        <?php
        // running Search query
        include 'connectDB.php'; 

        //fetching search results
        if(isset($_POST['search'])){
        $Department = mysqli_real_escape_string($connection, $_POST['Department']);
        $search = "SELECT * FROM questioninfo WHERE department = '$Department'AND Status = 'Approved'";
        $runsearch = mysqli_query($connection, $search);

            // Displaying Approved questions
            if (mysqli_num_rows($runsearch) > 0) {
                while ($Quesrow = mysqli_fetch_assoc($runsearch)) {
                $upload_path = './uploads/'.$Quesrow['Question']; //direct file path

            ?>
            <tr>
                <td><?php echo $Quesrow['Batch'].''. $Quesrow['Section']; ?></td>
                <td><?php echo $Quesrow['Shift']; ?></td>
                <td><?php echo $Quesrow['ModuleTitle'].''. $Quesrow['Year']; ?></td>
                <td><?php echo $Quesrow['Term']?></td>
                <td><?php echo $Quesrow['CourseCode']?></td>
                <td><?php echo $Quesrow['CourseTitle']?></td>
                <td><?php echo $Quesrow['CourseTeacher']?></td>
                <td>
                    <?php if (!empty($Quesrow['Question'])) { ?>
                        <div class="question-view">
                        <a href="./uploads/<?php echo $Quesrow['Question']; ?>" target="_blank">
                            <button class="view-button" style="padding: 10px; width: 60%;">View</button>
                        </a>
                    </div>
                    <?php } else { ?>
                        No file
                    <?php } ?>
                </td>

            </tr>
            <?php }}}?>
        </table>
    </div>
    <a href="adminworkspace.php" style="
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
    transition: background-color 0.3s, transform 0.2s;
    text-decoration: none;">
    <i class="fa-solid fa-backward" style="font-size: 18px; color: white;"></i>
</a>


</body>
</html>