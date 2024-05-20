<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM card_tbl WHERE status = 'Rejected'";
$cards = $conn->query($sql);



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
    <title>Rejected Card Requests</title>
</head>

<body>
    <div>
        <div class=' bg-white grid grid-cols-9 h-full   '>
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


                <nav class=' z-10 mt-24 h-screen left-0 fixed '>
                    <div class='h-screen bg-gray-900 drop-shadow-sm rounded'>

                        <ul class=' text-white px-4  cursor-pointer '>
                            <li class=' py-5 border-gray-500 border-b-2'>
                                <a href="#">
                                    <DashboardIcon fontSize='large' class=' pr-3' />
                                    DASHBOARD
                                </a>
                            </li>

                            <li class=' py-5 border-gray-500 border-b-2 ' to="/cardrenewal">
                                <a href="./AdminCardRenewal.php">
                                    <CreditCardIcon fontSize='large' class=' pr-3' />
                                    ALL REQUESTS
                                </a>
                            </li>

                            <li class=' py-5 border-gray-500 border-b-2'>
                                <a href="./AdminCardApproved.php">
                                    <CardMembershipRounded fontSize='large' class=' pr-2' />
                                    PROCESSED REQUESTS
                                </a>
                            </li>


                            <li class=' py-5 border-gray-500 border-b-2'>
                                <a href="./AdminCardRejected.php">
                                    <MilitaryTechIcon fontSize='large' class=' pr-3' />
                                    REJECTED REQUESTS
                                </a>
                            </li>

                        </ul>
                    </div>

                </nav>
            </div>


            <div class='mt-24 grid col-span-8 col-start-3 w-[95%]'>
                <div class='my-12'>
                    <h1 class=' text-2xl font-semibold text-center bg-red-600 text-white p-6 '> Rejected Card Requests
                    </h1>
                    <table class=' overflow-y-auto drop-shadow-md w-full border-1 table table-striped text-xs' id="example">
                        <thead class=' text-center'>
                            <tr class=" text-center">
                                <th class=' border'> </th>
                                <th class=' border'>ID NO.</th>
                                <th class=' border'>CAMPUS</th>
                                <th class=' border'>SERVICE</th>
                                <th class=' border'>TRACKING ID</th>
                                <!-- <th class=' border'>Status</th> -->
                                <th class=' border grid grid-cols-2'>ACTION
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1;
                            while ($card = $cards->fetch_assoc()): ?>
                                <tr class=' border p-12'>
                                    <td class=" font-semibold"><?php echo $count ?></td>
                                    <td class="border"><?php echo $card['stuid'] ?></td>
                                    <td class="border"><?php echo $card['campus'] ?></td>
                                    <td class="border"><?php echo $card['service'] ?></td>
                                    <td class="border"><?php echo $card['rqst_id'] ?></td>
                                    <td class="border">
                                        <a href="
                                    <?php
                                    $path = $card['image'];
                                    $tmp = substr($path, 0);
                                    $new_path = '../../backend/uploads/' . $tmp;
                                    echo $new_path;
                                    ?>"><?php echo "View"; ?></a>

                                        <button data-id="<?php echo $card['rqst_id'] ?>"
                                            class="btn btn-success dfaCardapprove">RESTORE</button>

                                        <!-- <button data-id="<?php echo $card['rqst_id'] ?>"
                                            class="btn btn-danger dfaCardReject">-</button> -->
                                    </td>
                                </tr>
                                <!-- )
                            })} -->

                                <?php $count++; endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class=' col-span-4'></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

    <script>
        $('#example').DataTable();



        $(".dfaCardapprove").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaCardApprove&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('ID HAS BEEN VERIFIED')
                        location.reload();
                    } else {
                        console.log("Failed to approve: ", response);
                    }
                },
                // error: function (xhr, status, error) {
                //     console.error("AJAX Error: ", status, error);
                // }
            });
        });




        $(".dfaCardReject").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=dfaCardReject&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('ID HAS BEEN REJECTED')
                        location.reload();
                    } else {
                        console.log("Failed to approve: ", response);
                    }
                },
                // error: function (xhr, status, error) {
                //     console.error("AJAX Error: ", status, error);
                // }
            });
        });
    </script>
</body>

</html>