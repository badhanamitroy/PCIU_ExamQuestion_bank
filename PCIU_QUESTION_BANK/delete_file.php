<?php
include 'connectDB.php';

if (isset($_POST['qid']) && isset($_POST['filePath'])) {
    $qid = $_POST['qid'];
    $filePath = $_POST['filePath'];

    // Delete file from server
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Remove entry from database
    $sql = "DELETE FROM questioninfo WHERE Qid = '$qid'";
    if (mysqli_query($connection, $sql)) {
        echo "deleted";
    } else {
        echo "error";
    }
}
?>
