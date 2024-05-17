<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_certificate WHERE status = 'Pending'";
$certificates = $conn->query($sql);



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
    <title>IDU</title>
</head>

<body>
    <div>
        <div class=' bg-white grid grid-cols-4 h-full   '>
            <div>
                <div class='grid-cols-1 fixed'>
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


                <!-- <IDLpane class='col-span-2' /> -->
                <nav class=' z-10 mt-24 h-screen left-0 fixed '>
                    <div class='h-screen bg-gray-900 drop-shadow-md rounded w-[70%]'>

                        <ul class=' text-white px-4 cursor-pointer '>
                            <li class=' py-5 border-gray-500 border-b-2'>
                                <a href="./AdminCardRenewal.php">
                                    <DashboardIcon fontSize='large' class=' pr-3' />
                                    VIEW ALL REQUESTS
                                </a>
                            </li>

                            <li class=' py-5 border-gray-500 border-b-2 ' to="/cardrenewal">
                                <a href="AdminCardApproved.php">
                                    <CreditCardIcon fontSize='large' class=' pr-3' />
                                    APPROVED REQUESTS
                                </a>
                            </li>

                            <li class=' py-5 border-gray-500'>
                                <a href="./AdminCardRejected.php">
                                    <CardMembershipRounded fontSize='large' class=' pr-2' />
                                    REJECTED REQUESTS
                                </a>
                            </li>
                        </ul>

                        {/* LOGOS FOR FAQs OR POSING QUESTIONS */}
                        <div class=' hidden'>
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


            <div class='mt-24 grid col-span-8 col-start-2 w-full'>
                <div class=' m-6'>
                    <!-- {showAlert && (
                        <Alert variant="filled" severity={alertSeverity} onClose={() => setShowAlert(false)}>
                            {alertMessage}
                        </Alert>
                    )} -->
                </div>
                <div class='my-12 drop-shadow-md mr-12'>
                    <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6 '> Card Requests</h1>
                    <table class=' overflow-y-auto w-full'>
                        <th class=' text-center'>
                            <tr class="  text-center">
                                <th class=' border p-2'></th>
                                <th class=' border p-2'>ID NO.</th>
                                <th class=' border p-2'>CAMPUS</th>
                                <th class=' border p-2'>SERVICE</th>
                                <th class=' border p-2'>TRACKING ID</th>
                                <th class=' border p-2'>Status</th>
                                <th class=' border grid grid-cols-2 p-2'>ACTION
                                </th>
                            </tr>
                        </th>

                        <tbody>
                            <!-- {data.map((card, index) => {
                                return ( -->
                            <tr key={card.stuid} class=' border p-12'>
                                <th scope="row"> {index + 1}</th>
                                <td class=' text-left p-3 border'>{card.stuid}</td>
                                <td class=' text-left p-3 border'>{card.campus}</td>
                                <td class=' text-left p-3 border'>{card.service}</td>
                                <td class=' text-left p-3 border'>{card.rqst_id}</td>
                                <td class=' text-left p-3 border'>{card.status}</td>

                                <td class=' text-center p-3 border-y'>
                                    <!-- <Stack direction='row'>
                                        <IDCardView card={card} />
                                        <IconButton onClick={()=> approved(card.rqst_id)}>
                                            <ThumbUpIcon variant='contained' color='success' />
                                        </IconButton>

                                        <IconButton variant='contained' color='error' onClick={()=>
                                            rejected(card.rqst_id)}>
                                            <ThumbDownIcon />
                                        </IconButton>
                                    </Stack> -->
                                </td>
                            </tr>


                        </tbody>
                    </table>
                    <!-- <TablePagination class=' bottom-0'
                        rowsPerPageOptions={[2, 15, 25]}
                        component="div"
                        count={data.length}
                        rowsPerPage={rowsPerPage}
                        page={page}
                        onPageChange={handleChangePage}
                        onRowsPerPageChange={handleChangeRowsPerPage} /> -->
                </div>
            </div>


        </div>

        <!-- {/* <div class=' col-span-4'></div> */} -->

    </div>
</body>

</html>