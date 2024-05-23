<?php
// chart.php

header('Content-Type: text/html');

// Database connection settings
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'requests';

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Define the SQL queries
$sqlStatusCounts = "
    SELECT status, COUNT(*) AS count
    FROM card_tbl
    GROUP BY status
";

$sqlCardTypeDistribution = "
    SELECT status, COUNT(*) AS count
    FROM tbl_deferments
    GROUP BY status
";

$sqlRequestsOverTime = "
    SELECT status, COUNT(*) AS count
    FROM tbl_certificate
    GROUP BY status
";

// Function to execute query and return the results
function getResults($conn, $sql) {
    $result = $conn->query($sql);
    if ($result === false) {
        return false;
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

// Execute the queries and fetch the results
$statusCounts = getResults($conn, $sqlStatusCounts);
if ($statusCounts === false) {
    echo "An error occurred while fetching status counts";
    $conn->close();
    exit;
}

$cardTypeDistribution = getResults($conn, $sqlCardTypeDistribution);
if ($cardTypeDistribution === false) {
    echo "An error occurred while fetching card type distribution";
    $conn->close();
    exit;
}

$requestsOverTime = getResults($conn, $sqlRequestsOverTime);
if ($requestsOverTime === false) {
    echo "An error occurred while fetching requests over time";
    $conn->close();
    exit;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
        }
        .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .chart-container {
            margin: 50px auto;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="chart-container mdl-card mdl-shadow--2dp">
        <div class="card-header">ID Cards Requests by Status - Bar Chart</div>
        <canvas id="barChart"></canvas>
    </div>

    <div class="chart-container mdl-card mdl-shadow--2dp">
        <div class="card-header">Card Type Distribution - Pie Chart</div>
        <canvas id="pieChart"></canvas>
    </div>

    <div class="chart-container mdl-card mdl-shadow--2dp">
        <div class="card-header">Requests Over Time - Line Chart</div>
        <canvas id="lineChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Data for the bar chart (Status Counts)
            const statusCounts = <?= json_encode($statusCounts) ?>;
            const statusLabels = statusCounts.map(item => item.status);
            const statusValues = statusCounts.map(item => item.count);
            const statusColors = ['red', '#FFC714', '#3B82F6']; // Adjust as needed

            // Data for the pie chart (Card Type Distribution)
            const cardTypeDistribution = <?= json_encode($cardTypeDistribution) ?>;
            const typeLabels = cardTypeDistribution.map(item => item.card_type);
            const typeValues = cardTypeDistribution.map(item => item.count);
            const typeColors = ['#FF6384', '#36A2EB', '#FFCE56']; // Adjust as needed

            // Data for the line chart (Requests Over Time)
            const requestsOverTime = <?= json_encode($requestsOverTime) ?>;
            const timeLabels = requestsOverTime.map(item => item.date);
            const timeValues = requestsOverTime.map(item => item.count);

            // Bar Chart
            const barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: statusLabels,
                    datasets: [{
                        label: 'ID Cards Requests by Status',
                        data: statusValues,
                        backgroundColor: statusColors,
                        borderColor: statusColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: typeLabels,
                    datasets: [{
                        label: 'Card Type Distribution',
                        data: typeValues,
                        backgroundColor: typeColors,
                        borderColor: typeColors,
                        borderWidth: 1
                    }]
                }
            });

            // Line Chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: timeLabels,
                    datasets: [{
                        label: 'Requests Over Time',
                        data: timeValues,
                        backgroundColor: '#3B82F6',
                        borderColor: '#3B82F6',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
