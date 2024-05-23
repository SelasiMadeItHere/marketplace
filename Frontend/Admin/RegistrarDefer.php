<?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_deferments WHERE status = 'Verified'";
$deferments = $conn->query($sql);



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
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
    <title>Deferment Requests Approval</title>
</head>

<body>
    <div class=' bg-white grid h-full   '>
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

        <div class='mt-24 w-[100%] px-12'>
            <div class='my-12'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6 '>Deferment Requests</h1>
                <table id="example" class='  overflow-y-auto drop-shadow-md table table-striped text-xs'>
                    <thead class=' text-center '>
                        <tr>
                            <th class=' text-center border-2 mx-12'>sdc
                            </th>
                            <th class=' text-center border-2'>REQUEST ID
                            </th>
                            <th class=' text-center border-2'>STUDENT ID
                            </th>
                            <th class=' text-center border-2'>LEVEL</th>
                            <th class=' text-center border-2'>CUR. SEMESTER
                                </td>
                            <th class=' text-center border-2 flex-wrap'>DEF. SEMESTER</th>
                            <th class=' text-center border-2'>REASON</th>
                            <th class=' text-center border-2'>PHONE</th>

                            <th class=' text-center border-2'>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = 1;
                        while ($deferment = $deferments->fetch_assoc()): ?>
                            <tr class=' border p-6'>
                                <td scope="row"><?php echo $count ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['rqst_id'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['stuid'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['clevel'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['csem'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['defsem'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['reason'] ?></td>
                                <td class=' text-center p-3 border-2'><?php echo $deferment['phone'] ?></td>

                                <td class="border">
                                    <a href="
                                    <?php
                                    $path = $deferment['receipt_path'];
                                    $tmp = substr($path, 0);
                                    $new_path = '../../backend/uploads/' . $tmp;
                                    echo $new_path;
                                    ?>"><?php echo "View"; ?></a>

                                    <button id="btn" data-id="<?php echo $deferment['rqst_id'] ?>"
                                        class="btn btn-success RegDefapprove">+</button>

                                    <button id="btn" data-id="<?php echo $deferment['rqst_id'] ?>"
                                        class="btn btn-danger RegDefReject">-</button>
                                </td>

                            </tr>
                            <?php $count++; endwhile ?>
                    </tbody>
                </table>
            </d>

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

        // $(".btn").click(function (e) {
        //     e.preventDefault();

        //     alert("cliced");
        // });


        $(".RegDefapprove").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=RegDefapprove&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('ID HAS BEEN VERIFIED')
                        location.reload();
                    }
                }
            });

        });

        $(".RegDefReject").click(function (e) {
            e.preventDefault();
            let id = $(this).data('id')

            $.ajax({
                type: "post",
                url: "../../backend/scripts/ajax.php?action=RegDefReject&id=" + id,
                success: function (response) {
                    // alert(response)
                    if (response == 1) {
                        alert('ID HAS BEEN REJECTED')
                        location.reload();
                    }
                }
            });

        });
    </script>
</body>

</php>