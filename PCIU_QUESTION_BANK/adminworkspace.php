<?php
include 'connectDB.php';

// Fetch new uploads
$newuploads = "SELECT * FROM questioninfo WHERE Status IS NULL";
$runnewuploads = mysqli_query($connection, $newuploads);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./css files/adminworkspace.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>
    <div class="header">
        <h1>Hello Admin</h1>
        <p>Here you can view uploaded questions and approve or deny them</p>
    </div>

    <div class="button-container">
        <a href="allquestions.php">
            <button class="check-button">Check Existing Questions</button>
        </a>
        <a href="adminquesupload.php">
            <button class="check-button">Upload Exam Questions</button>
        </a>
    </div>

    <div class="uploads-section">
        <h2>New Uploads</h2>
        <hr><br>
        <div class="uploads-container">
            <?php
            if (mysqli_num_rows($runnewuploads) > 0) {
                while ($newuploadrow = mysqli_fetch_assoc($runnewuploads)) {
                    $filePath = "./uploads/" . $newuploadrow['Question']; 
            ?>

            <div class="card" id="card-<?php echo $newuploadrow['Qid']; ?>">
                <div class="card-header">
                    <span><?php echo $newuploadrow['Department']; ?><br>
                        <?php echo $newuploadrow['Batch'].'-'.$newuploadrow['Shift'].'-'.$newuploadrow['Section']; ?>
                    </span>
                </div>
                <div class="card-body">
                    <div class="question-view">
                        <a href="<?php echo $filePath; ?>" target="_blank">
                            <button class="view-button"><i class="fa-solid fa-eye"></i> <br> View Question</button>
                        </a>
                    </div>
                    <div class="info">
                        <p><strong><?php echo $newuploadrow['CourseCode']; ?></strong></p>
                        <p><strong><?php echo $newuploadrow['CourseTitle']; ?></strong></p>
                        <p><strong><?php echo $newuploadrow['ModuleTitle'].' '. $newuploadrow['Year']; ?></strong></p>
                        <p><strong><?php echo $newuploadrow['Term']; ?></strong></p>
                    </div>
                </div>
                <div class="card-footer">
                    <p><strong>Course conducted by:</strong> <?php echo $newuploadrow['CourseTeacher']; ?></p>
                    <p><strong>Question uploaded by:</strong> <?php echo $newuploadrow['PCIUID']; ?></p>
                    <p><strong>Uploaded on:</strong> <?php echo $newuploadrow['UploadDate'].' on '. $newuploadrow['UploadTime']; ?></p>
                    <div class="action-buttons">
                        <button class="approve approve-button" onclick="updateStatus(<?php echo $newuploadrow['Qid']; ?>, 'Approved')">Approve</button>
                        <button class="delete decline-button" onclick="deleteFile(<?php echo $newuploadrow['Qid']; ?>, '<?php echo $filePath; ?>')">Decline & Delete</button>
                    </div>
                </div>
            </div>

            <?php }} else {
                echo "<div style='text-align: center; width: 100%;'>
                            <h3>No new uploads found</h3>
                      </div>";
            } ?>
        </div>
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

    <script>
    function updateStatus(qid, status) {
        $.ajax({
            url: "update_status.php",
            type: "POST",
            data: { qid: qid, status: status },
            success: function(response) {
                if (response.trim() === "success") {
                    $("#card-" + qid).fadeOut("slow"); // Remove card on success
                } else {
                    alert("Error updating status");
                }
            }
        });
    }

    function deleteFile(qid, filePath) {
        if (confirm("Are you sure you want to decline and delete this file?")) {
            $.ajax({
                url: "delete_file.php",
                type: "POST",
                data: { qid: qid, filePath: filePath },
                success: function(response) {
                    if (response.trim() === "deleted") {
                        $("#card-" + qid).fadeOut("slow"); // Remove card after deletion
                    } else {
                        alert("Error deleting file");
                    }
                }
            });
        }
    }
    </script>
</body>
</html>