<?php
include './config.php';

$action = $_GET['action'];

//**********************DFA CERTIFICATE */
if($action == 'approve-request'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Verified' WHERE tblid = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


if($action == 'decline-request'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Rejected' WHERE index = $id ");
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

    $sql = ("UPDATE card_tbl SET status = 'Verified' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


if($action == 'dfaCardReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE card_tbl SET status = 'Rejected' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//************************DFA DEFERMENT REQUEST */
if($action == 'dfaDeferApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Verified' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaDeferReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Rejected' WHERE index = $id ");
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

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Verified' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaIntroReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Rejected' WHERE index = $id ");
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

    $sql = ("UPDATE tbltranscript_requests SET status = 'Verified' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'dfaTransReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbltranscript_requests SET status = 'Rejected' WHERE index = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//**************************** */