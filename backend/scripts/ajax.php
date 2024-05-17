<?php
include './config.php';

$action = $_GET['action'];

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

    $sql = ("UPDATE tbl_certificate SET status = 'Rejected' WHERE tblid = $id ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}











?>