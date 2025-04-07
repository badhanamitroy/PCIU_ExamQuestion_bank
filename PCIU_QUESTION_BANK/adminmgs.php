<?php 
include 'connectDB.php';

if (isset($_POST['delete'])){
    $delquery = 'DELETE FROM mgsadmin WHERE Status = "Read"';
    $rundelquery = mysqli_query($connection, $delquery);
    if($rundelquery){
        echo '<script>alert("All read messages deleted successfully!")</script>';
    } else {
        echo '<script>alert("Failed to delete messages. Try again!")</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Message Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #f4f4f9);
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            max-width: 1200px;
            width: 100%;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        h1 {
            text-align: center;
            color: #1a2a6c;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .message-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .message-table th, .message-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .message-table th {
            background: linear-gradient(90deg, #1a2a6c, #3b4cca);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        .message-table td {
            color: #333;
            font-size: 1rem;
        }
        .message-table tr {
            transition: background-color 0.2s ease;
        }
        .message-table tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .message-table tr:hover {
            background-color: #eef2ff;
        }
        .message-text {
            max-width: 600px;
            word-wrap: break-word;
            line-height: 1.5;
        }
        .read {
            padding: 10px; 
            border-radius: 10px; 
            background-color: #007bff; 
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        .delete-btn-container {
            display: flex;
            justify-content: end;
            margin-top: 20px;
        }

        .delete-btn {
            padding: 12px 20px;
            background-color: #dc2626; /* Tailwind's red-600 */
            color: #f8fafc;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #b91c1c; /* Darker red */
            transform: scale(1.03);
        }

        .delete-btn:active {
            transform: scale(0.98);
        }   


        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 1.5rem;
            }
            .message-table th, .message-table td {
                font-size: 0.9rem;
                padding: 10px;
            }
            .message-text {
                max-width: 100%;
            }
            .back-btn {
                height: 50px;
                width: 50px;
                bottom: 20px;
                left: 20px;
            }
            .delete-btn-container {
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Messages</h1>
        <form action ="" method="post">
        <div class="delete-btn-container">
            <button class="delete-btn" name="delete">
                Delete Read Messages
            </button>
        </div>
        </form>
        <table class="message-table">
            <thead>
                <tr>
                    <th style="width: 40%;">Text</th>
                    <th style="width: 20%; text-align:center;">Sent On</th>
                    <th style="width: 20%; text-align:center;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM mgsadmin ORDER BY submittime DESC";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td class="message-text">
                        <?php echo htmlspecialchars($row['message']); ?>
                    </td>
                    <td style="text-align:center;">
                        <?php echo htmlspecialchars($row['submittime'] . ' - ' . $row['submitdate']); ?>
                    </td>
                    <td style="text-align:center;" class="status-cell" data-mgid="<?php echo htmlspecialchars($row['mgid']); ?>">
                        <?php 
                        if ($row['Status'] === 'Read') {
                            echo '<span style="color: green;">Read</span>';
                        } else {
                            echo '<button type="button" class="read mark-read-btn" data-mgid="' . htmlspecialchars($row['mgid']) . '">Mark as Read</button>';
                        }
                        ?>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                ?>
                <tr>
                    <td colspan="3" style="text-align: center; padding: 20px; color: #666;">
                        No messages found.
                    </td>
                </tr>
                <?php } ?>
            </tbody>
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

    <script>
        document.querySelectorAll('.mark-read-btn').forEach(button => {
            button.addEventListener('click', function() {
                const mgid = this.getAttribute('data-mgid');
                const statusCell = this.closest('.status-cell');

                // Send AJAX request to update status
                fetch('update_mgs_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'mgid=' + encodeURIComponent(mgid)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the UI without reloading
                        statusCell.innerHTML = '<span style="color: green;">Read</span>';
                    } else {
                        alert('Failed to mark message as read. Try again!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        });
    </script>
</body>
</html>