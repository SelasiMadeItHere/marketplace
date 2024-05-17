<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Registrar's Portal</title>
</head>

<body>
    <div class=' bg-slate-200 min-h-screen'>
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

        <div class=' grid grid-cols-4 pt-24 ml-6'>
            <div class=' col-span-4 mx-6 text-2xl font-semibold'>
                <h2>Stats</h2>
            </div>

            <!-- {/* <div class=' col-start-5'>
                <Badges />
            </div> */} -->
        </div>


        <div class='px-5'>
            <div class='grid grid-cols-2 lg:grid-cols-3 gap-3 py-3 px-6'>
                <ActivityCard Icon={ChartBarIcon} text="Pending Requests" number={totalPending} />
                <ActivityCard Icon={ChartPieIcon} text="Verified Requests" number={totalVerified} />
                <ActivityCard Icon={ChartBarSquareIcon} text="Processed Requests" number={totalProcessed} />
                <!-- {/* <ActivityCard Icon={DocumentChartBarIcon} text="Total-Earning" number={1000} /> */} -->
            </div>
        </div>

        <!-- {/* <div class=' grid grid-cols-4 pt-24 ml-6'> */} -->
        <div class=' grid grid-cols-4 pt-24 ml-6'>
            <div class='  col-span-4 mx-6 text-2xl font-semibold'>
                <h2>Charts</h2>
            </div>
            <!-- {/* <div class=' flex grid-cols-2 lg:grid-cols-3 gap-3 py-3 px-6'> */} -->
            <div class=' flex overflow-auto gap-3 rounded-4xl p-6'>
                <!-- <Charts />
                <PieChart />
                <LineChart />
                <RadialChart /> -->
            </div>
        </div>



        <div class=' grid grid-cols-4 pt-12 ml-6'>
            <div class='  col-span-4 mx-6 text-2xl font-semibold'>
                <h2>Services</h2>
            </div>
        </div>

        <div class=' px-28 grid lg:grid-cols-4 gap-4 rounded-lg md:grid-cols-2 '>
            <div class=' hover:shadow-xl delay-200'>
                <!-- <RegistrarDash image={require('../../assets/imgs/messages.png')} title='INTRODUCTORY LETTER REQUESTS'
                    badge={'VIEW'} link={'/introductoryapproval'} /> -->
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <!-- <RegistrarDash image={require('../../assets/imgs/3d-documents.png')} title='CERTIFICATE REQUESTS'
                    badge={'VIEW'} link={'/certapproval'} /> -->
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <!-- <RegistrarDash image={require('../../assets/imgs/no-pic.png')} title='TRANSCRIPT REQUESTS'
                    badge={'VIEW'} link={'/transcriptapproval'} /> -->
            </div>

            <div class=' hover:shadow-xl delay-150'>
                <!-- <RegistrarDash image={require('../../assets/imgs/3d-megaphone.png')} title='DEFERMENT REQUESTS'
                    badge={'VIEW'} link={'/registrardeferment'} /> -->
            </div>
        </div>
    </div>
</body>

</html>