<?php 

require_once './config.php';

$action = $_GET['action'];

if($action == 'staffLogin'){
   
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
                        header("Location: ../../Frontend/Admin/AdminCardRenewal.html");
                        exit();
                    case 'DFA':
                        echo "Redirecting to Finance page";
                        header("Location: ../../Frontend/Admin/AdminDash.html");
                        exit();
                    case 'REG':
                        echo "Redirecting to Registrar page";
                        header("Location: ../../Frontend/Admin/registrar.html");
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

// if($action == 'staffLogin'){
//     extract($_POST);
    
//     $user = $conn->query("SELECT * FROM tbl_requests_officers WHERE username='$username'");
//     if($user->num_rows > 0){
//         $row = $user->fetch_assoc();
//         if(password_verify($password, $row['password'])){
//             echo 'success';
//         } else {
//            echo  "Password do not match!";
//         }
//     } else {
//         echo "Invalid Username";
//     }

//     // $p = "11111";
//     // $hp = '$2y$10$RO0cjiACXYYPo51sNQAUMumnb.qYvqxcbDETpLzbxi0dKGanZyVZu';
//     // echo !password_verify($p, $hp);

// }

if($action == 'staffRegister'){
    extract($_POST);


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tbl_requests_officers (officer_name, role, mail, username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    // Assuming $officer_name, $role, $mail, $username, and $hashedPassword are already defined
    $stmt->bind_param("sssss", $officer_name, $role, $mail, $username, $hashedPassword);
    
    if ($stmt->execute()) {
        echo '
            <script>
                alert("User created successfully.")
                location.href="../../Frontend/Admin/Register.php";
            </script>
        ';
    } else {
        echo "Error creating user.";
    }
    
    $stmt->close();
    $conn->close();

}

if($action == 'IDCardRenewal'){
    extract($_POST);

    //ID Generation
    $customText = 'Card-';
    $rqst_id = $customText . substr(uniqid(), 0, 6);

    //Mailing







    //Inserting Data
    $query = "INSERT INTO card_tbl (stuid, rqst_id, campus, service, email, image, DateApplied, status) VALUES (?,?,?,?,?,?,?, 'pending')";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("sssssss", $stuid, $rqst_id, $campus, $service, $email, $image, (new DateTime())->format('Y-m-d'));

    if ($stmt->execute()){
        echo '
        <script>
            alert("Info has successfully been added");
            location.href="../../Frontend/Client/NewRequest.html";
        </script>';

    } else {
        echo "Error: " . $stmt->error;
    }
}

if($action == 'defermentApplication'){

}


if($action == 'defermentApplication'){

}

