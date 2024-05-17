<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_introductory_requests WHERE status = 'Pending'";
$introductorys = $conn->query($sql);

// $data = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
// }

$conn->close();
?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Card Renewal</title>
</head>

<body>
    <div class=' bg-white h-full relative'>
        <div>
            <!-- <Navbar /> -->
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
                            <a href="AdminIntroductory.php">
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

                    <!-- {/* LOGOS FOR FAQs OR POSING QUESTIONS */} -->
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


        <div class='grid grid-cols-9'>
            <div class='mt-24 grid col-span-8 col-start-3 w-[95%]'>
                <div class=' col-span-full grid'>

                    <div class=' col-span-4'></div>
                    <div class=' col-span-3 m-2'>

                    </div>
                </div>



                <div class='my-12 drop-shadow-sm'>
                    <h1 class=' text-white text-2xl font-semibold text-center w-full bg-sky-800 p-6'>Introductory
                            Letter Requests</h1>
                    <table id="example"  class=' overflow-y-auto drop-shadow-md w-full table table-striped text-xs'>
                       
                        <thead class=' text-center'>
                            <tr class=" w-[100%]">
                                <th class=" text-bold border p-2" class=' border'>SN</th>
                                <th class=" text-bold border p-2" class=' border'>ID NO.</th>
                                <th class=" text-bold border p-2" class=' border'>REQUEST ID</th>
                                <th class=" text-bold border p-2" class=' border'>NAME</th>
                                <th class=" text-bold border p-2" class=' border'>PASSPORT NUMBER</th>
                                <th class=" text-bold border p-2" class=' border text-center'>E-MAIL</th>
                                <th class=" text-bold border p-2" class=' border text-center'>PHONE</th>
                                <th class=" text-bold border p-2" class=' border text-center'>PURPOSE</th>
                                <th class=" text-bold border p-2" class=' border text-center'>ACTION</th>

                            </tr>
                        </thead>

                        <tbody>
                            
                        <?php $count = 1; while ($introductory = $introductorys->fetch_assoc()) :?>
                            <tr class=' border p-12'>
                                <td> <?php echo $count ?></th>
                                <td class=' text-left p-3 border'><?php echo $introductory['stuid'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['rqst_id'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['name'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['email'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['phone'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['purpose'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['name'] ?></td>
                                <!-- <td class=' text-left p-3 border'><?php echo $introductory['name'] ?></td> -->
                                <!-- <td class=' text-left p-3 border'><?php echo $introductory['name'] ?></td> -->

                                <td class=' text-center p-3 border-y'>
                                    
                                </td>
                            </tr>
                            <?php $count++; endwhile ?>
                        </tbody>
                    </table>
                            </div>
            </div>

        </div>


    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

    <script>
        $('#example').DataTable();

        // $("#btn").click(function (e) {
        //     e.preventDefault();

        //     alert("cliced")
        // });


        $(".approve").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaIntroApprove&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        location.reload();
                    }
                }
            });

        });

        $(".decline").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaTransReject&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        location.reload();
                    }
                }
            });

        });
    </script>
</body>


</html>