<!-- <?php
include '../../backend/scripts/config.php';

// Fetch data
$sql = "SELECT * FROM tbl_certificate WHERE status = 'Pending'";
$certificates = $conn->query($sql);



$conn->close();
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Dashboard</title>
</head>

<body class=' bg-gray-200 h-full'>
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
                    <a href="AdminCertificate.php">
                        <MilitaryTechIcon fontSize='large' class=' ' />
                        CERTIFICATE APPLICATION
                    </a>
                </li>

                <li class=' py-4 border-gray-500 border-b-2'>
                    <a href="./admindeferment.php">
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
        </div>

    </nav>


    <div>

        <div class=' grid grid-cols-5 sm:grid-cols-1'>
            <div class='justify-center inline-flex p-12 mt-20 col-start-3'>
                <!-- <Input class=' w-[100%]' placeholder='Search Student by ID' />
                <MagnifyingGlassIcon class=' w-8 text-sm mx-12 hover:text-blue-600 cursor-pointer text-blue-600' /> -->
            </div>
        </div>


        <div class=" grid grid-cols-4 gap-4 p-6">
            <!-- <div class=' col-start-2'> -->
            <div class=' bg-white rounded-3xl p-6 gap-3 col-start-2 inline-flex hover:drop-shadow-xl '>
                <div class='grid grid-cols-1 w-[50%]'>
                    <img src="../src/Certificate.png" class='w-48 h-24 self-center' />
                </div>

                <div class=' text-center'>
                    <p class='grid-cols-2 text-center text-xl font-bold'>Certificate Portal</p>
                    <p class=' text-2xl'>100</p>
                    <a href="../Admin/AdminCertificate.php">
                        <button color='primary' class=' m-4 btn btn-primary'>VIEW</button>
                    </a>
                </div>
            </div>

            <div class=' bg-white rounded-3xl p-6 gap-3 col-start-3 inline-flex hover:drop-shadow-xl'>
                <div class='grid col-start-2 w-[50%]'>
                    <!-- <NewspaperIcon class='w-20 inline text-green-700' /> -->
                    <img src="../src/apply-paper.jpg" class='w-20' />
                </div>

                <div class=' block text-center'>
                    <p class='grid-cols-2 text-center text-xl font-bold'>Deferment Portal</p>
                    <p class=' text-2xl'>100</p>
                    <a href="../Admin/AdminDeferment.php">
                        <button variant='contained' color='primary' class=' m-6 btn btn-primary'>VIEW</button>
                    </a>

                </div>
            </div>

            <div class=' bg-white rounded-3xl p-6 gap-3 col-start-4 inline-flex hover:drop-shadow-xl'>
                <div class='grid grid-cols-1'>
                    <ClipboardDocumentIcon class='w-20 inline text-yellow-400' />
                </div>
                <div class=' block text-center'>
                    <p class='grid-cols-2 text-center text-xl font-bold'>Transcript Portal</p>
                    <p class=' text-2xl'>100</p>
                    <a href="../Admin/AdminTranscript.php">
                        <button variant='contained' color='primary' class=' m-6 btn btn-primary'>VIEW</button>
                    </a>
                </div>

            </div>

            <div class=' bg-white rounded-3xl p-6 gap-3 col-start-2 inline-flex hover:drop-shadow-xl'>
                <div class='grid grid-cols-1'>
                    <UserIcon class='w-20 inline text-sky-700' />
                </div>
                <div class=' block text-center'>
                    <p class='grid-cols-2 text-center text-xl font-bold'>Introductory Letter</p>
                    <p class=' text-2xl'>100</p>
                    <a href="../Admin/AdminIntroductory.php">
                        <button variant='contained' color='primary' class=' m-6 btn btn-primary'>VIEW</button>
                    </a>
                </div>

            </div>
            <!-- </div> -->
        </div>



        <!-- </div> -->


    </div>
</body>

</php>