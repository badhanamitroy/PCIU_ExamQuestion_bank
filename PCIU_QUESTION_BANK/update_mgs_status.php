<?php
include 'connectDB.php';

header('Content-Type: application/json');

if (isset($_POST['mgid'])) {
    $mgid = mysqli_real_escape_string($connection, $_POST['mgid']);
    $markRead = "UPDATE mgsadmin SET Status = 'Read' WHERE mgid = '$mgid'";
    $queryRun = mysqli_query($connection, $markRead);

    if ($queryRun) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No mgid provided']);
}

mysqli_close($connection);
?>