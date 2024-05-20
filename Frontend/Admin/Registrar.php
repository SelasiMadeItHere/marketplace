<?php
header('Content-Type: text/html');

include '../../Backend/Scripts/config.php';



// Define the SQL queries

//CARDS
$sqlReportPending = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='pending'";
$sqlReportVerified = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='verified'";
$sqlReportApproved = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='worked_on'";

// Function to execute query and return the count
function getCount($conn, $sql)
{
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
    echo "An error occurred while fetching pending count";
    $conn->close();
    exit;
}

$verifiedCount = getCount($conn, $sqlReportVerified);
if ($verifiedCount === false) {
    echo "An error occurred while fetching verified count";
    $conn->close();
    exit;
}

$approvedCount = getCount($conn, $sqlReportApproved);
if ($approvedCount === false) {
    echo "An error occurred while fetching approved count";
    $conn->close();
    exit;
}

// Prepare the data for Chart.js
$data = [
    ['label' => 'Pending', 'value' => $pendingCount, 'fill' => 'red'],
    ['label' => 'Verified', 'value' => $verifiedCount, 'fill' => '#FFC714'],
    ['label' => 'Approved', 'value' => $approvedCount, 'fill' => '#3B82F6']
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
$DefpendingCount = getCount($conn, $sqlDefReportPending);
if ($DefpendingCount === false) {
    echo "An error occurred while fetching pending count";
    $conn->close();
    exit;
}

$DefverifiedCount = getCount($conn, $sqlDefReportVerified);
if ($DefverifiedCount === false) {
    echo "An error occurred while fetching verified count";
    $conn->close();
    exit;
}

$DefapprovedCount = getCount($conn, $sqlDefReportApproved);
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
            <div class=' col-span-4 mx-6 text-2xl font-semibold'>
                <h2>Stats</h2>
            </div>
        </div>


        <div class='px-5'>
            <div class='grid grid-cols-2 lg:grid-cols-3 gap-3 py-3 px-6'>
                <div
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <Icon class=" text-blue-500" />
                        <h2 class=' text-lg'>{text}</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-3xl font-bold'>{number}</h1>
                    </div>
                </div>


                <div
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <Icon class=" text-blue-500" />
                        <h2 class=' text-lg'>{text}</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-3xl font-bold'>{number}</h1>
                    </div>
                </div>



                <div onClick={onClick}
                    class="bg-white shadow-sm rounded-xl hover:shadow-lg cursor-pointer flex items-center justify-between  py-5 px-10 ">
                    <div>
                        <Icon class=" text-blue-500" />
                        <h2 class=' text-lg'>{text}</h2>
                    </div>
                    <Divider variant="middle" orientation="vertical" class=' font-extrabold' />
                    <div>
                        <h1 class='text-3xl font-bold'>{number}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- {/* <div class=' grid grid-cols-4 pt-24 ml-6'> */} -->
        <div class=' grid grid-cols-4 pt-24 ml-6'>
            <div class='  col-span-4 mx-6 text-2xl font-semibold'>
                <h2>Charts</h2>
            </div>

            <div class="card">
                <div class="card-header">ID Cards Requests</div>
                <canvas id="barChart" width="50" height="30"></canvas>
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
                <div class="card-header">ID Cards Requests</div>
                <canvas id="barChart" width="50" height="30"></canvas>
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





            <div class=' grid grid-cols-4 pt-12 ml-6'>
                <div class='  col-span-4 mx-6 text-2xl font-semibold'>
                    <h2>Services</h2>
                </div>
            </div>

            <div class=' px-28 grid lg:grid-cols-4 gap-4 rounded-lg md:grid-cols-2 '>
                <div class=' hover:shadow-xl delay-200'>
                    <!-- <RegistrarDash image={require('../../assets/imgs/messages.png')} title='INTRODUCTORY LETTER REQUESTS'
                    badge={'VIEW'} link={'/introductoryapproval'} /> -->
                </div>

                <div class=' hover:shadow-xl delay-150'>

                </div>

                <div class=' hover:shadow-xl delay-150'>

                </div>

                <div class=' hover:shadow-xl delay-150'>

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