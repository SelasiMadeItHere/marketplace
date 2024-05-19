<?php
include './config.php';

$action = $_GET['action'];

//**********************DFA CERTIFICATE */
if($action == 'approveCert'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Verified' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


if($action == 'declineCert'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//************************DFA CARD REQUESTS */
if($action == 'dfaCardApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE card_tbl SET status = 'Verified' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }   

    
}


if($action == 'dfaCardReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE card_tbl SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }   
}


//************************DFA DEFERMENT REQUEST */
if($action == 'dfaDefapprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Verified' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaDefReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//**************************DFA INTRODUCTORY REQUESTS */
if($action == 'dfaIntroApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Verified' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaIntroReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//***************************DFA TRANSCRIPT REQUESTS */
if($action == 'dfaTransApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbltranscript_requests SET status = 'Verified' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaTransReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbltranscript_requests SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//**************************** */