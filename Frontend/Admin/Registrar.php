<?php
header('Content-Type: text/html');

include '../../Backend/Scripts/config.php';



// Define the SQL queries

// CARDS
$sqlReportPending = "SELECT COUNT(*) AS count FROM requests.tbl_deferments WHERE status='pending'
UNION ALL
SELECT COUNT(*) AS count FROM requests.card_tbl WHERE status='pending'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbl_certificate WHERE status='pending'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbltranscript_requests WHERE status='pending'";





$sqlReportVerified = "SELECT COUNT(*) AS count FROM requests.tbl_deferments WHERE status='verified'
UNION ALL
SELECT COUNT(*) AS count FROM requests.card_tbl WHERE status='verified'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbl_certificate WHERE status='verified'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbltranscript_requests WHERE status='verified'";





$sqlReportApproved = "SELECT COUNT(*) AS count FROM requests.tbl_deferments WHERE status='Approved'
UNION ALL
SELECT COUNT(*) AS count FROM requests.card_tbl WHERE status='Approved'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbl_certificate WHERE status='Approved'
UNION ALL
SELECT COUNT(*) AS count FROM requests.tbltranscript_requests WHERE status='Approved'";





// Function to execute query and return the count
function getPendingCounts($conn, $sql)
{
    $result = $conn->query($sql);
    if ($result === false) {
        return false;
    }
    $totalCount = 0;
    while ($row = $result->fetch_assoc()) {
        $totalCount += $row['count'];
    }
    return $totalCount;
}
// Fetch the total pending count
$totalPendingRequests = getPendingCounts($conn, $sqlReportPending);


if ($totalPendingRequests === false) {
    echo "An error occurred while fetching pending counts";
    $conn->close();
    exit;
}




function getVerifiedCounts($conn, $sql)
{
    $result = $conn->query($sql);
    if ($result === false) {
        return false;
    }
    $totalCount = 0;
    while ($row = $result->fetch_assoc()) {
        $totalCount += $row['count'];
    }
    return $totalCount;
}
// Fetch the total pending count
$totalVerifiedRequests = getVerifiedCounts($conn, $sqlReportVerified);


if ($totalVerifiedRequests === false) {
    echo "An error occurred while fetching Verified counts";
    $conn->close();
    exit;
}





function getApprovedCounts($conn, $sql)
{
    $result = $conn->query($sql);
    if ($result === false) {
        return false;
    }
    $totalCount = 0;
    while ($row = $result->fetch_assoc()) {
        $totalCount += $row['count'];
    }
    return $totalCount;
}
// Fetch the total pending count
$totalApprovedRequests = getApprovedCounts($conn, $sqlReportApproved);


if ($totalApprovedRequests === false) {
    echo "An error occurred while fetching Verified counts";
    $conn->close();
    exit;
}










// Prepare the data for Chart.js
$data = [
    ['label' => 'Pending', 'value' => $sqlReportPending, 'fill' => 'red'],
    ['label' => 'Verified', 'value' => $sqlReportVerified, 'fill' => '#FFC714'],
    ['label' => 'Approved', 'value' => $sqlReportVerified, 'fill' => '#3B82F6']
];






//DEFERMENT REPORTS
$sqlDefReportPending = "SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='pending'";
$sqlDefReportVerified = "SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='verified'";
$sqlDefReportApproved = "SELECT COUNT(*) AS count FROM tbl_deferments WHERE status='worked_on'";

// Function to execute query and return the count
function getCountDef($conn, $sql)
{
    $result = $conn->query($sql);
    if ($result === false) {
        return false;
    }
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Execute the queries and fetch the results
$DefpendingCount = getCountDef($conn, $sqlDefReportPending);
if ($DefpendingCount === false) {
    echo "An error occurred while fetching pending count";
    $conn->close();
    exit;
}

$DefverifiedCount = getCountDef($conn, $sqlDefReportVerified);
if ($DefverifiedCount === false) {
    echo "An error occurred while fetching verified count";
    $conn->close();
    exit;
}

$DefapprovedCount = getCountDef($conn, $sqlDefReportApproved);
if ($DefapprovedCount === false) {
    echo "An error occurred while fetching approved count";
    $conn->close();
    exit;
}

// Prepare the data for Chart.js
$dataDef = [
    ['label' => 'Pending', 'value' => $DefpendingCount, 'fill' => 'red'],
    ['label' => 'Verified', 'value' => $DefverifiedCount, 'fill' => '#FFC714'],
    ['label' => 'Approved', 'value' => $DefapprovedCount, 'fill' => '#3B82F6']
];











// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mui/material@latest/dist/material.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Registrar's Portal</title>

    <style>
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>


</head>

<body>
    <div class=' bg-slate-200 min-h-screen'>
        <div>
            <div class='w-full h-[80px] bg-white drop-shadow-xl z-50 fixed top-0'>
                <div class='px-2 flex justify-between fdefs-center w-full h-full'>
                    <div class=' items-start'>
                        <h1 class=' inline-flex items-center'>
                            <img src='../src/AIT_CREST.png' alt='crest' class=' h-16 w-16' />
                        </h1>
                    </div>

                    <p class=' pt-4 text-center lg:text-3xl font-bold '>AIT MARKETPLACE</p>

                    <div class='my-6'>
                        <Bars3Icon class='w-7 font-extrabold flex mx-5 lg:hidden' />
                    </div>
                </div>
            </div>
        </div>

        <div class=' grid grid-cols-4 pt-24 ml-6'>
            <div class=' col-span-4 mx-6 text-2xl font-bold'>
                <h2>Stats</h2>
            </div>
        </div>

        <div class='px-5'>
            <div class='grid grid-cols-2 lg:grid-cols-3 py-3 px-6 gap-3'>
                <div
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <img class=" text-blue-500 h-16 w-16" src="../src/pending.png" />
                        <h2 class=' text-lg font-bold'>Total Pending Requests</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-6xl font-bold'><?php echo $totalPendingRequests ?> </h1>
                    </div>
                </div>


                <div
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <img class=" text-blue-500 h-16 w-16" src="../src/chart.png" />
                        <h2 class=' text-lg font-bold'>Total Verified Request</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-6xl font-bold'><?php echo $totalVerifiedRequests ?></h1>
                    </div>
                </div>



                <div onClick={onClick}
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <img class=" text-blue-500 h-16 w-16" src="../src/approved.png" />
                        <h2 class=' text-lg font-bold'>Total Approved Request</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-6xl font-bold'><?php echo $totalApprovedRequests ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class=' grid grid-cols-4 ml-6 pb-12 gap-3'>
            <div class='  col-span-4 mx-6 text-2xl font-bold p-8'>
                <h2>Charts</h2>
            </div>


            <div class="card">
                <div class="card-header">ID Cards Requests</div>
                <canvas id="barChart" width="50" height="30">
                </canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Data for Chart.js
                        const data = {
                            labels: <?= json_encode(array_column($data, 'label')) ?>,
                            datasets: [{
                                label: 'ID Cards Requests',
                                data: <?= json_encode(array_column($data, 'value')) ?>,
                                backgroundColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderWidth: 1
                            }]
                        };

                        const ctx = document.getElementById('barChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            <div class="card">
                <div class="card-header">Deferments Requests</div>
                <canvas id="barChart" width="50" height="30">
                </canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Data for Chart.js
                        const data = {
                            labels: <?= json_encode(array_column($data, 'label')) ?>,
                            datasets: [{
                                label: 'ID Cards Requests',
                                data: <?= json_encode(array_column($data, 'value')) ?>,
                                backgroundColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderWidth: 1
                            }]
                        };

                        const ctx = document.getElementById('barChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            <div class="card">
                <div class="card-header">Transcripts Requests</div>
                <canvas id="barChart" width="50" height="30">
                </canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Data for Chart.js
                        const data = {
                            labels: <?= json_encode(array_column($data, 'label')) ?>,
                            datasets: [{
                                label: 'ID Cards Requests',
                                data: <?= json_encode(array_column($data, 'value')) ?>,
                                backgroundColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderWidth: 1
                            }]
                        };

                        const ctx = document.getElementById('barChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            <div class="card">
                <div class="card-header">Introductory Requests</div>
                <canvas id="barChart" width="50" height="30">
                </canvas>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Data for Chart.js
                        const data = {
                            labels: <?= json_encode(array_column($data, 'label')) ?>,
                            datasets: [{
                                label: 'ID Cards Requests',
                                data: <?= json_encode(array_column($data, 'value')) ?>,
                                backgroundColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderColor: <?= json_encode(array_column($data, 'fill')) ?>,
                                borderWidth: 1
                            }]
                        };

                        const ctx = document.getElementById('barChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div> -->



        <div class=' grid grid-cols-4 '>
            <div class='col-span-4 mx-6 text-2xl font-bold p-8'>
                <h2>Services</h2>
            </div>
        </div>

        <div class=' px-12 grid lg:grid-cols-4 gap-4 rounded-lg md:grid-cols-2 pb-12'>
            <div class=' hover:shadow-xl delay-200'>
                <div
                    class=' bg-white shadow-xl rounded-xl p-6 grid h-auto place-items-center md:max-w-md lg:max-w-lg sm:max-w-sm'>
                    <div>
                        <img class='rounded-lg w-60 h-40' src="../src/manutilities.png" alt='logos' />
                    </div>

                    <div class=' text-center'>
                        <h2 class=" text-lg font-bold">Deferment Requests</h2>
                    </div>

                    <div>
                        <a href="./RegistrarDefer.php">
                            <button class=' gap-3 btn btn-primary' variant="contained">VIEW</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <div
                    class=' bg-white shadow-xl rounded-xl p-6 grid h-auto place-items-center md:max-w-md lg:max-w-lg sm:max-w-sm'>
                    <div>
                        <img class='rounded-lg w-60 h-40' src="../src/system network.png" alt='logos' />
                    </div>

                    <div class=' text-center'>
                        <h2 class=" text-lg font-bold">Transcripts Requests</h2>
                    </div>

                    <div>
                        <a href="./RegistrarTrans.php">
                             <button class=' gap-3 btn btn-primary' variant="contained">VIEW</button>
                        </a>
                       
                    </div>
                </div>
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <div
                    class=' bg-white shadow-xl rounded-xl p-6 grid h-auto place-items-center md:max-w-md lg:max-w-lg sm:max-w-sm'>
                    <div>
                        <img class='rounded-lg w-60 h-40' src="../src/calendar.png" alt='logos' />
                    </div>

                    <div class=' text-center'>
                        <h2 class=" text-lg font-bold">Introductory Letter Requests</h2>
                    </div>

                    <div>
                        <a href="./RegistrarIntro.php">
                            <button class=' gap-3 btn btn-primary' variant="contained">VIEW</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <div
                    class=' bg-white shadow-xl rounded-xl p-6 grid h-auto place-items-center md:max-w-md lg:max-w-lg sm:max-w-sm'>
                    <div>
                        <img class='rounded-lg w-60 h-40' src="../src/certificate.png" alt='logos' />
                    </div>

                    <div class=' text-center'>
                        <h2 class=" text-lg font-bold">Certificate Requests</h2>
                    </div>

                    <div>
                        <a href="./RegistrarCert.php">
                            <button class=' gap-3 btn btn-primary' variant="contained">VIEW</button>
                        </a>
                        
                </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data for Chart.js
        const data = {
            labels: <?= json_encode(array_column($data, 'label')) ?>,
            datasets: [{
                label: 'ID Cards Requests',
                data: <?= json_encode(array_column($data, 'value')) ?>,
                backgroundColor: <?= json_encode(array_column($data, 'fill')) ?>,
                borderColor: <?= json_encode(array_column($data, 'fill')) ?>,
                borderWidth: 1
            }]
        };

        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

</html>