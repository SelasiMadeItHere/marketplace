<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_introductory_requests WHERE status = 'Verified'";
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Introductory Letter Approval</title>
</head>

<body>
    <div class=' grid grid-cols-9 h-screen pb-12 min-h-screen'>
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
            <!-- {/* <Lpane class='col-span-2' /> */} -->
        </div>

        <div class=' col-span-7 mx-6'>


        </div>

        <div class=' grid col-span-9 w-[100%] px-36 mt-24'>
            <div class='drop-shadow-sm pb-36'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6'>Transcripts Requests</h1>

                <table id="example" class="overflow-y-auto drop-shadow-md w-full border-1 table table-striped text-xs py-24">
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
                        while ($introductory = $introductorys->fetch_assoc()): ?>
                            <tr key={trans.rqst_id} class=' border p-12'>
                                <td> <?php echo $count ?></th>
                                <td class=' text-left p-3 border'><?php echo $introductory['stuid'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['rqst_id'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['name'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['pnumber'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['email'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['phone'] ?></td>
                                <td class=' text-left p-3 border'><?php echo $introductory['purpose'] ?></td>
                                <td class="border">
                                    <a href="
                                    <?php
                                    $path = $transcript['receipt_path'];
                                    $tmp = substr($path, 3);
                                    $new_path = '../../backend/' . $tmp;
                                    echo $new_path;
                                    ?>"><?php echo "View"; ?></a>

                                    <button data-id="<?php echo $introductory['rqst_id'] ?>"
                                        class="btn btn-success RegIntroApprove">+</button>

                                    <button data-id="<?php echo $introductory['rqst_id'] ?>"
                                        class="btn btn-danger RegIntroReject">-</button>
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


        $(".RegIntroApprove").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=RegIntroApprove&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('REQUEST HAS BEEN APPROVED')
                        location.reload();
                    } else {
                        console.log("Failed to approve: ", response);
                    }
                }
            });

        });

        $(".RegIntroReject").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=RegIntroReject&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('REQUEST HAS BEEN REJECTED')
                        location.reload();
                    } else {
                        console.log("Failed to approve: ", response);
                    }
                }
            });

        });
    </script>
</body>

</html>