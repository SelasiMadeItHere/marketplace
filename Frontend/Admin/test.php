<?php
// chart.php

// header('Content-Type: text/html');

// Database connection settings
include '../../Backend/Scripts/config.php';


// Define the SQL queries
$sqlCardPending = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='pending'";
$sqlCardVerified = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='verified'";
$sqlCardApproved = "SELECT COUNT(*) AS count FROM card_tbl WHERE status='worked_on'";

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
$pendingCount = getCount($conn, $sqlCardPending);
if ($pendingCount === false) {
    echo "An error occurred while fetching pending count";
    $conn->close();
    exit;
}

$verifiedCount = getCount($conn, $sqlCardVerified);
if ($verifiedCount === false) {
    echo "An error occurred while fetching verified count";
    $conn->close();
    exit;
}

$approvedCount = getCount($conn, $sqlCardApproved);
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

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Cards Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mui/material@latest/dist/material.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="card">
        <div class="card-header">ID Cards Requests</div>
        <canvas id="barChart" width="50" height="50"></canvas>
    </div>

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
</body>

</html>