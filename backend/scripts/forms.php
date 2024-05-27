<?php
error_reporting(E_ALL);
// PHPMailer('display_errors', 1);
require '../vendor/autoload.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once './config.php';
// require_once 'mailer.php';

$action = $_GET['action'];

if ($action == 'staffLogin') {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve user with the provided username
        $query = "SELECT * FROM tbl_requests_officers WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // No user found with the provided username
            echo json_encode(["state" => 0, "message" => "Invalid username."]);
        } else {
            $user = $result->fetch_assoc();
            // Compare password
            if (password_verify($password, $user['password'])) {
                // Passwords match
                // Redirect user based on role
                switch ($user['role']) {
                    case 'IDU':
                        echo "Redirecting to IDU page";
                        header("Location: ../../Frontend/Admin/AdminCardRenewal.php");
                        exit();
                    case 'DFA':
                        echo "Redirecting to Finance page";
                        header("Location: ../../Frontend/Admin/AdminDash.php");
                        exit();
                    case 'Registrar':
                        echo "Redirecting to Registrar page";
                        header("Location: ../../Frontend/Admin/registrar.php");
                        exit();
                    default:
                        // Handle default case
                        echo json_encode(["state" => 0, "message" => "Invalid role."]);
                }

            }
            // else {
            //     // Passwords do not match
            //     echo json_encode(["state" => 0, "message" => "Incorrect password."]);
            // }

            // print_r($user);
            // echo '<script>alert("' . password_verify($password, $user['password']) . '")</script>';

        }
        $stmt->close();
    }
}

if ($action == 'staffRegister') {
    extract($_POST);


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tbl_requests_officers (officer_name, role, mail, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Assuming $officer_name, $role, $mail, $username, and $hashedPassword are already defined
    $stmt->bind_param("sssss", $officer_name, $role, $mail, $username, $hashedPassword);

    if ($stmt->execute()) {
        echo '
            <script>
                alert("User created successfully here.")
                location.href="../../Frontend/Admin/Register.php";
            </script>
        ';
    } else {
        echo "Error creating user.";
    }

    $stmt->close();
    $conn->close();

}

// if ($action == 'IDCardRenewal') {

//     extract($_POST);
//     //image upload
//     $uploadDirectory = '../uploads/'; // Directory to save uploaded files
//     $uploadedFileName = $_FILES['image']['name'];
//     $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-h-m-s') . $uploadedFileName;

//     if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath)) {
//         //ID Generation
//         $customText = 'Card-';
//         $rqst_id = $customText . substr(uniqid(), 0, 6);


//         $DateApplied = (new DateTime())->format('Y-m-d');


//         $mail = new PHPMailer(true);
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'devselasi@gmail.com';
//         $mail->Password = '$<l@$!2001';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;
//         $mail->to = $email;
//         // $mail->from = "devselasi@gmail.com";


//         $mail->setFrom('devselasi@gmail.com', 'AIT marketplace');
//         $mail->addAddress($email);

//         //Mailing





//         $mail->subject = 'Your Request ID';
//         $mail->Body = 'Dear user, <br><br>Your request ID is: ' . $rqst_id . '<br><br>Thank you for your request.';
//         $mail->headers = "From: agbesipreciousselasi@gmail.com\r\n";
//         // $headers .= "Content-type: text/html\r\n";





//         //Inserting Data
//         $query = "INSERT INTO card_tbl (stuid, rqst_id, campus, service, email, image, DateApplied, status) VALUES (?,?,?,?,?,?,?, 'pending')";
//         $stmt = $conn->prepare($query);

//         $stmt->bind_param("sssssss", $stuid, $rqst_id, $campus, $service, $email, $uploadedFilePath, $DateApplied);

//         if ($stmt->execute()) {
//             // Send the email only if the data is inserted successfully
//             if ($mail->send()) {
//                 echo '
//             <script>
//             alert("Info has been added and your Request ID has been sent to your email.");
//             location.href="../../Frontend/Client/NewRequest.php";
//             </script>';
//             } else {
//                 echo "Error: " . $stmt->error;
//             }

//             $stmt->close();
//             $conn->close();

//         }

//     }
// }



if ($action == 'IDCardRenewal') {
    extract($_POST);

    // Check if image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDirectory = '../uploads/'; // Directory to save uploaded files
        $uploadedFileName = $_FILES['image']['name'];
        $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-H-i-s') . '-' . $uploadedFileName;

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath)) {
            // ID Generation
            $customText = 'Card-';
            $rqst_id = $customText . substr(uniqid(), 0, 6);

            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'devselasi@gmail.com'; // SMTP username
                $mail->Password = 'oriqgvrzzoecjmtc'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption
                $mail->Port = 587; // TCP port to connect to

                // Recipients
                $mail->setFrom('devselasi@gmail.com', 'AIT marketplace');
                $mail->addAddress($email);
                // $mail->to = $email;

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Your Request ID';
                $mail->Body = 'Dear user, <br><br>Your request ID is: ' . $rqst_id . '<br><br>Thank you for your request.';
                $mail->AltBody = 'Dear user, \n\nYour request ID is: ' . $rqst_id . '\n\nThank you for your request.';

                // Inserting Data into Database
                $query = "INSERT INTO card_tbl (stuid, rqst_id, campus, service, email, image, DateApplied, status) VALUES (?,?,?,?,?,?,?, 'pending')";
                $stmt = $conn->prepare($query);

                $stmt->bind_param("sssssss", $stuid, $rqst_id, $campus, $service, $email, $uploadedFilePath, $DateApplied);

                if ($stmt->execute()) {
                    // Send the email only if the data is inserted successfully
                    if ($mail->send()) {
                        echo '<script>
                        alert("Info has been added and your Request ID has been sent to your email.");
                        location.href="../../Frontend/Client/NewRequest.php";
                        </script>';
                    } else {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                } else {
                    echo "Database Error: " . $stmt->error;
                }

                $stmt->close();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }

    $conn->close();
}





if ($action == 'introductoryLetter') {
    $uploadDirectory = '../uploads/';
    $uploadedFileName = $_FILES['receipt_path']['name'];
    $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-h-m-s') . $uploadedFileName;

    extract($_POST);
    if (move_uploaded_file($_FILES['receipt_path']['tmp_name'], $uploadedFilePath)) {
        // File successfully uploaded, proceed with database insertion
        $customText = '-INTRO-';
        $rqst_id = $stuid . $customText . substr(uniqid(), 0, 6);

        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'devselasi@gmail.com'; // SMTP username
            $mail->Password = 'oriqgvrzzoecjmtc'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('devselasi@gmail.com', 'AIT marketplace');
            $mail->addAddress($email);

            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Your Request ID';
            $mail->Body = 'Dear user, <br><br>Your request ID is: ' . $rqst_id . '<br><br>Thank you for your request.';
            $mail->AltBody = 'Dear user, \n\nYour request ID is: ' . $rqst_id . '\n\nThank you for your request.';


            $query = "INSERT INTO tbl_introductory_requests (rqst_id, stuid, name, phone, email, purpose, raddress, bname, pnumber, eaddress, receipt_path, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
            $stmt = $conn->prepare($query);


            if ($stmt->execute()) {
                // Send the email only if the data is inserted successfully
                if ($mail->send()) {
                    echo '<script>
                alert("Info has been added and your Request ID has been sent to your email.");
                location.href="../../Frontend/Client/NewRequest.php";
                </script>';
                } else {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
            } else {
                echo "Database Error: " . $stmt->error;
            }


            // Generating rqst ID
            function generateRandomString($length)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                return $randomString;
            }
            $rqst_id = $stuid . '-INTRO-' . generateRandomString(5);



            // Bind parameters
            $stmt->bind_param('sssissssssss', $rqst_id, $stuid, $name, $phone, $email, $purpose, $raddress, $bname, $pnumber, $eaddress, $uploadedFilePath, $created_at);

            if ($stmt->execute()) {
                echo '<script>alert("Request made successfully.")</script>';
            } else {
                echo "Error creating request.";
            }

            $stmt->close();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }{
            echo "Error uploading file.";
        }

        $conn->close();
    }
}

if ($action == 'defermentApplication') {
    // Processing uploaded file
    $uploadDirectory = '../uploads/'; // Directory to save uploaded files
    $uploadedFileName = $_FILES['receipt_path']['name'];
    $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-h-m-s') . $uploadedFileName;

    if (move_uploaded_file($_FILES['receipt_path']['tmp_name'], $uploadedFilePath)) {
        // File uploaded successfully, continue with database insertion



        // Extracting form data
        extract($_POST);

        $created_at = (new DateTime())->format('Y-m-d');

        $query = "INSERT INTO tbl_deferments (rqst_id, stuid, phone, clevel, csem, mail, defsem, academicyear, retsem, retyear, reason, created_at, receipt_path, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Generating request ID
        function generateRandomString($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
        $rqst_id = $stuid . '-DEF-' . generateRandomString(5);

        // Function to generate random string of specified length


        $stmt->bind_param('ssssisisisssss', $rqst_id, $stuid, $phone, $clevel, $csem, $mail, $defsem, $academicyear, $retsem, $retyear, $reason, $created_at, $uploadedFilePath, $status);

        if ($stmt->execute()) {
            echo '
            <script>
                alert("Info has successfully been added");
                location.href="../../Frontend/Client/NewRequest.php";
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

if ($action == 'certificateApplication') {
    // Processing uploaded file
    $uploadDirectory = '../uploads/'; // Directory to save uploaded files
    $uploadedFileName = $_FILES['receipt_path']['name'];
    $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-h-m-s') . $uploadedFileName;

    if (move_uploaded_file($_FILES['receipt_path']['tmp_name'], $uploadedFilePath)) {
        // File uploaded successfully, continue with database insertion



        // Extracting form data
        extract($_POST);

        $created_at = (new DateTime())->format('Y-m-d');

        $query = "INSERT INTO tbl_certificate (rqst_id, stuid, name, prog, level, phone, delivery, email, postal, created_at, receipt) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = $conn->prepare($query);

        // Generating request ID
        function generateRandomString($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
        $rqst_id = $stuid . '-CERT-' . generateRandomString(5);

        // Function to generate random string of specified length


        $stmt->bind_param('sssssssssss', $rqst_id, $stuid, $name, $prog, $level, $phone, $delivery, $email, $postal, $created_at, $uploadedFilePath);

        if ($stmt->execute()) {
            echo '
            <script>
                alert("Info has successfully been added");
                location.href="../../Frontend/Client/NewRequest.php";
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

if ($action == 'transcriptApplication') {
    // Processing uploaded file
    $uploadDirectory = '../uploads/'; // Directory to save uploaded files
    $uploadedFileName = $_FILES['receipt_path']['name'];
    $uploadedFilePath = $uploadDirectory . (new DateTime())->format('Y-m-d-h-m-s') . $uploadedFileName;

    if (move_uploaded_file($_FILES['receipt_path']['tmp_name'], $uploadedFilePath)) {
        // File uploaded successfully, continue with database insertion



        // Extracting form data
        extract($_POST);

        $created_at = (new DateTime())->format('Y-m-d');

        $query = "INSERT INTO tbltranscript_requests (rqst_id, stuid, name, email, level, prog, phone, purpose, ogname, ogcontact, ogphone, ogemail, ogpostal, created_at, deliv_mode, receipt_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        // Generating request ID
        function generateRandomString($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
        $rqst_id = $stuid . '-TRANS-' . generateRandomString(5);

        // Function to generate random string of specified length


        $stmt->bind_param('ssssssssssssssss', $rqst_id, $stuid, $name, $email, $level, $prog, $phone, $purpose, $ogname, $ogcontact, $ogphone, $ogemail, $ogpostal, $created_at, $deliv_mode, $uploadedFilePath);

        if ($stmt->execute()) {
            echo '
            <script>
                alert("Info has successfully been added");
                location.href="../../Frontend/Client/NewRequest.php";
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

?>