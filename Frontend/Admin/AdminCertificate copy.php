<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_deferments";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Certificate Requests</title>

</head>

<body>
    <div class=' grid grid-cols-4 md:h-screen lg:h-full   '>
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


            <nav class=' z-10 mt-24 h-screen left-0 w-[20%] fixed '>
                <div class='h-screen bg-gray-900 drop-shadow-md rounded'>

                    <ul class=' text-white px-4  cursor-pointer '>
                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="./AdminDash.php">
                                <DashboardIcon fontSize='large' class=' ' />
                                DASHBOARD
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2 ' to="/cardrenewal">
                            <a href="./AdminCardRenewal.php">
                                <CreditCardIcon fontSize='large' class=' ' />
                                ID CARD RENEWALS
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="./AdminTranscript.php">
                                <CardMembershipRounded fontSize='large' class='' />
                                TRANSCRIPT APPLICATIONS
                            </a>
                        </li>


                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="./AdminCertificate.php">
                                <MilitaryTechIcon fontSize='large' class=' ' />
                                CERTIFICATE APPLICATION
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="./AdminDeferment.php">
                                <ExitToAppIcon fontSize='large' class=' ' />
                                DEFERMENT APPLICATION
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="./AdminIntroductory.php">
                                <ExitToAppIcon fontSize='large' class=' ' />
                                INTRODUCTORY LETTER
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="#">
                                <Settings fontSize='large' class=' pr-2' />
                                SETTINGS
                            </a>
                        </li>
                    </ul>

                    {/* LOGOS FOR FAQs OR POSING QUESTIONS */}
                    <div class=''>
                        <ul class=' inline-flex'>
                            <li>
                                <ChatBubbleLeftIcon class='text-white w-12' />
                            </li>
                            <li>
                                <HomeIcon class='text-white w-12' />
                            </li>
                            <li>
                                <TicketIcon class='text-white w-10' />
                            </li>
                            <li>
                                <UserIcon class='text-white w-12' />
                            </li>
                            <li>
                                <UserGroupIcon class='text-white w-12' />
                            </li>
                            <li>
                                <BoltIcon class='text-white w-12' />
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>
        </div>

        <div class='mt-24 grid '>
            <div class='my-6'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6 '>Certificate Requests</h1>
                <table>
                    <thead class='text-center'>
                        <tr>
                            <th class='text-center border-2 mx-12'></th>
                            <th class='text-center border-2'>REQUEST ID</th>
                            <th class='text-center border-2'>STUDENT ID</th>
                            <th class='text-center border-2'>LEVEL</th>
                            <th class='text-center border-2'>CURRENT SEMESTER</th>
                            <th class='text-center border-2 flex-wrap'>DEF. SEMESTER</th>
                            <th class='text-center border-2'>REASON</th>
                            <th class='text-center border-2'>STATUS</th>
                            <th class='border grid grid-cols-2'>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $index => $fdef) {
                            echo "<tr class='border p-12'>";
                            echo "<th scope='row'>" . ($index + 1) . "</th>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['rqst_id']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['stuid']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['clevel']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['csem']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['defsem']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['reason']}</td>";
                            echo "<td class='text-center p-3 border-2'>{$fdef['status']}</td>";
                            echo "<td class='text-center p-3 border-y'>";
                            echo "<div style='display: flex; justify-content: center;'>";
                            echo "<button onclick='handleRequest(\"approve\", \"{$fdef['rqst_id']}\")'>Approve</button>";
                            echo "<button onclick='handleRequest(\"reject\", \"{$fdef['rqst_id']}\")'>Reject</button>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <TablePagination class=' bottom-0' rowsPerPageOptions={[10, 15, 25, 100]} component="div"
                    count={data.length} rowsPerPage={rowsPerPage} page={page} onPageChange={handleChangePage}
                    onRowsPerPageChange={handleChangeRowsPerPage} /> -->
            </div>
        </div>

    </div>
</body>

</html>