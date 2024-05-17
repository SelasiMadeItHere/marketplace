<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_certificate WHERE status = 'Pending'";
$certificates = $conn->query($sql);

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
    <title>Certificate Requests</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

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
                            <a href=" ./AdminCertificate.php">
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

        <div class='mt-24 grid col-span-8 col-start-2 w-[100%]'>
            <div class='my-6 '>
                <h1 class=' text-lg font-semibold text-center bg-sky-800 text-white p-6 '>Certificate Requests</h1>


                <table id="example" class="table table-striped text-xs">
                    <thead>
                        <tr>
                            <th class="border-1 text-center">SN</th>
                            <th class="border-1 text-center">REQUEST ID</th>
                            <th class="border-1 text-center">STUDENT ID</th>
                            <th class="border-1 text-center">NAME</th>
                            <!-- <th>LEVEL</th> -->
                            <th class="border-1 text-center">RECEIPT</th>
                            <th class="border-1 text-center">PROGRAM</th>
                            <!-- <th>EMAIL</th> -->
                            <th class="border-1 text-center">PHONE</th>
                            <th class="border-1 text-center">DELIVERY MODE</th>
                            <th class="border-1 text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $count = 1;
                        while ($certificate = $certificates->fetch_assoc()): ?>
                            <tr>
                                <td class="border-1"><?php echo $count ?></td>
                                <td class="border-1"><?php echo $certificate['rqst_id'] ?></td>
                                <td class="border-1"><?php echo $certificate['stuid'] ?></td>
                                <td class="border-1"><?php echo $certificate['name'] ?></td>
                                <!-- <td><?php echo $certificate['level'] ?></td> -->
                                <td class="border-1">
                                    <a href="
                                    <?php
                                    $path = $certificate['receipt'];
                                    $tmp = substr($path, 3);
                                    $new_path = '../../backend/' . $tmp;
                                    echo $new_path;
                                    ?>"><?php echo "View"; ?></a>
                                </td>
                                <td class="border-1"><?php echo $certificate['prog'] ?></td>
                                <!-- <td><?php echo $certificate['email'] ?></td> -->
                                <td class="border-1"><?php echo $certificate['phone'] ?></td>
                                <td class="border-1"><?php echo $certificate['delivery'] ?></td>
                                <td class="border-1" x>
                                    <button data-id="<?php echo $certificate['tblid'] ?>"
                                        class="btn btn-success approve">+</button>
                                    <button data-id="<?php echo $certificate['tblid'] ?>"
                                        class="btn btn-danger decline">-</button>
                                </td>
                            </tr>
                            <?php $count++; endwhile ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>REQUEST ID</th>
                            <th>STUDENT ID</th>
                            <th>NAME</th>
                            <th>RECEIPT</th>
                            <th>PROGRAM</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>DELIVERY MODE</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                </table>


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
                url: "../../backend/scripts/ajax.php?action=approve-request&id=" + id,
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
                url: "../../backend/scripts/ajax.php?action=decline-request&id=" + id,
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