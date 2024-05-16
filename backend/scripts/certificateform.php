<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './config.php';

$action = $_POST['action']; // Change $_GET to $_POST to retrieve form data

if ($action == 'certificateApplication') {
    // Processing uploaded file
    $uploadDirectory = '../uploads/'; // Directory to save uploaded files
    $uploadedFileName = $_FILES['receipt_path']['name'];
    $uploadedFilePath = $uploadDirectory . $uploadedFileName;

    if (move_uploaded_file($_FILES['receipt_path']['tmp_name'], $uploadedFilePath)) {
        // File uploaded successfully, continue with database insertion

        // Extracting form data
        extract($_POST);

        $created_at = date('Y-m-d'); // Change the way date is formatted

        $query = "INSERT INTO tbl_certificate (rqst_id, stuid, phone, mail, retyear, reason, created_at, receipt_path, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Generating request ID
        function generateRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
        $rqst_id = $stuid . '-CERT-' . generateRandomString(5);

        // Bind parameters for database insertion
        $status = 'Pending'; // Assuming status is 'Pending' by default
        $stmt->bind_param('sssssssss', $rqst_id, $stuid, $phone, $mail, $retyear, $reason, $created_at, $uploadedFilePath, $status);

        if ($stmt->execute()) {
            echo '
            <script>
                alert("Info has successfully been added");
                location.href="../../Frontend/Client/NewRequest.html";
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Failed to move uploaded file
        echo "Error: Failed to upload file.";
    }

    $conn->close();
}


