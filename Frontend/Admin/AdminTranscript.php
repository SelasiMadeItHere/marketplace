<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbltranscript_requests WHERE status = 'Pending'";
$transcripts = $conn->query($sql);

// $data = array();
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
// }

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
    <title>Transcript Requests</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
</head>

<body>
    <div class=' grid grid-cols-4 h-screen pb-12 min-h-screen'>
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
                            <a href="./AdminIntroductory.php">
                                <ExitToAppIcon fontSize='large' class=' ' />
                                INTRODUCTORY LETTER
                            </a>
                        </li>

                        <li class=' py-4 border-gray-500 border-b-2'>
                            <a href="/admindeferment">
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

        <div class='mt-24 grid col-span-8 col-start-2 w-[95%]'>
            <div class='my-12 drop-shadow-2xl'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6'>Transcripts Requests</h1>
                <table id="example" class="overflow-y-auto drop-shadow-md w-full border-1 table table-striped text-xs">
                    <thead class=" w-full ">
                        <tr class=" text-center">
                            <th class=' border-2 text-bold p-2'></th>
                            <th class=' border-2 text-bold p-2'>ID NO.
                            </th>
                            <th class=' border-2 text-bold p-2'>REQUEST
                                ID</td>
                            <th class=' border-2 text-bold p-2'>CONTACT
                            </th>
                            <th class=' border-2 text-bold p-2'>PROGRAM
                            </th>
                            <th class=' border-2 text-bold p-2'>LEVEL
                            </th>
                            <th class=' border-2 text-bold p-2'>
                                DELIVERY</th>
                            <th class=' border-2 text-bold p-2'>PURPOSE
                            </th>
                            <th class=' border-2 text-bold p-2'>ACTION
                            </th>
                        </tr>
                    </thead>

                    <tbody class='text-sm'>
                        <?php $count = 1;
                        while ($transcript = $transcripts->fetch_assoc()): ?>
                            <tr key={trans.rqst_id} class=' border p-12'>
                                <th scope="row"><?php echo $count ?></th>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['stuid'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['rqst_id'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['phone'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['prog'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['level'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['deliv_mode'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $transcript['purpose'] ?></td>
                                <td class="border-1" >
                                <a href="
                                    <?php
                                    $path = $transcript['receipt_path'];
                                    $tmp = substr($path, 3);
                                    $new_path = '../../backend/' . $tmp;
                                    echo $new_path;
                                    ?>"><?php echo "View"; ?></a>

                                    <button data-id="<?php echo $transcript['rqst_id'] ?>"
                                        class="btn btn-success dfaTransApprove">+</button>

                                    <button data-id="<?php echo $transcript['rqst_id'] ?>"
                                        class="btn btn-danger dfaTransReject">-</button>
                                </td>
                            </tr>
                            <?php $count++; endwhile ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class=' col-span-6'></div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

    <script>
        $('#example').DataTable();

        $("#btn").click(function (e) {
            e.preventDefault();

            alert("cliced")
        });


        $(".dfaTransApprove").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaTransApprove&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('REQUEST HAS BEEN VERIFIED')
                        location.reload();
                    }else {
                        console.log("Failed to approve: ", response);
                    }
                }
            });

        });

        $(".dfaTransReject").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaTransReject&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('REQUEST HAS BEEN REJECTED')
                        location.reload();
                    }else {
                        console.log("Failed to approve: ", response);
                    }
                }
            });

        });
    </script>
</body>

</html>