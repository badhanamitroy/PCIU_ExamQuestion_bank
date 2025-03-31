<?php
include 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['qid']) && isset($_POST['status'])) {
        $qid = $_POST['qid'];
        $status = $_POST['status'];

        $updateQuery = "UPDATE questioninfo SET Status='$status' WHERE Qid='$qid'";
        if (mysqli_query($connection, $updateQuery)) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>
