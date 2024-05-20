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





//*********************************************************************REGISTRAR REQUEST HANDLER */

//**********************REGISTRAR CERTIFICATE */
if($action == 'RegapproveCert'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Approved' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


if($action == 'RegdeclineCert'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_certificate SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//************************REGISTRAR CARD REQUESTS */
if($action == 'RegCardApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE card_tbl SET status = 'Approved' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }   

    
}


if($action == 'RegCardReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE card_tbl SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }   
}


//************************REGISTRAR DEFERMENT REQUEST */
if($action == 'RegDefapprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Approved' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'RegDefReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_deferments SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//**************************REGISTRAR INTRODUCTORY REQUESTS */
if($action == 'RegIntroApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Approved' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'RegIntroReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbl_introductory_requests SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}


//***************************REGISTRAR TRANSCRIPT REQUESTS */
if($action == 'RegTransApprove'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbltranscript_requests SET status = 'Approved' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}

if($action == 'RegTransReject'){
    $id = $_GET['id'];
    // echo "ID $id received!";

    $sql = ("UPDATE tbltranscript_requests SET status = 'Rejected' WHERE rqst_id = '$id' ");
    if($conn->query($sql)){
        echo 1;
    } else {
        echo 0;
    }
}





// ********************************REPORTS
// INTRO
function DashIntroReport($conn, $id){
    $sqlReportPending = ("SELECT COUNT(*) AS count FROM tbl_introductory_requests WHERE status='pending'");
    $sqlReportVerified = ("SELECT COUNT(*) AS count FROM tbl_introductory_requests WHERE status='verified'");
    $sqlReportApproved = ("SELECT COUNT(*) AS count FROM tbl_introductory_requests WHERE status='worked_on'");

    
}

function DashCertReport($conn, $id){
    $sqlReportPending = ("SELECT COUNT(*) AS count FROM tbl_certificate WHERE status='pending'");
    $sqlReportVerified = ("SELECT COUNT(*) AS count FROM tbl_certificate WHERE status='verified'");
    $sqlReportApproved = ("SELECT COUNT(*) AS count FROM tbl_certificate WHERE status='worked_on'");
}

function DashDeferReport($conn, $id){
    $sqlReportPending = ("SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='pending'");
    $sqlReportVerified = ("SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='verified'");
    $sqlReportApproved = ("SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='worked_on'");
}

function DashCardsReport($conn, $id){
    $sqlReportPending = ("SELECT COUNT(*) AS count FROM card_tbl WHERE status='pending'");
    $sqlReportVerified = ("SELECT COUNT(*) AS count FROM card_tbl WHERE status='verified'");
    $sqlReportApproved = ("SELECT COUNT(*) AS count FROM card_tbl WHERE status='worked_on'");

    function getCount($conn, $sql) {
        $result = $conn->query($sql);
        if ($result === false) {
            return false;
        }
        $row = $result->fetch_assoc();
        return $row['count'];
    }
    
    // Execute the queries and fetch the results
    $pendingCount = getCount($conn, $sqlReportPending);
    if ($pendingCount === false) {
        echo json_encode(['success' => false, 'message' => 'An error occurred while fetching pending count']);
        $conn->close();
        exit;
    }
    
    $verifiedCount = getCount($conn, $sqlReportVerified);
    if ($verifiedCount === false) {
        echo json_encode(['success' => false, 'message' => 'An error occurred while fetching verified count']);
        $conn->close();
        exit;
    }
    
    $approvedCount = getCount($conn, $sqlReportApproved);
    if ($approvedCount === false) {
        echo json_encode(['success' => false, 'message' => 'An error occurred while fetching approved count']);
        $conn->close();
        exit;
    }
    
    // Prepare the data to be returned as JSON
    $data = [
        'pending' => $pendingCount,
        'verified' => $verifiedCount,
        'approved' => $approvedCount
    ];
    
    echo json_encode(['success' => true, 'data' => $data]);
    
    // Close the connection
    $conn->close();
}

function DashTransReport($conn, $id){
    $sqlReportPending = ("SELECT COUNT(*) AS count FROM tbltranscript_requests WHERE status='pending'");
    $sqlReportVerified = ("SELECT COUNT(*) AS count FROM tbltranscript_requests WHERE status='verified'");
    $sqlReportApproved = ("SELECT COUNT(*) AS count FROM tbltranscript_requests WHERE status='worked_on'");
}


