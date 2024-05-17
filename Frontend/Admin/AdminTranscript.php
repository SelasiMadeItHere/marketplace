<!DOCTYPE html>
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

        <div class='mt-24 grid col-span-8 col-start-3 w-[95%]'>
            <Card class='my-12 drop-shadow-2xl'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6'>Transcripts Requests</h1>
                <TableContainer>
                    <table>
                        <th class=" w-full ">
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
                                <th class=' border-2 text-bold p-2'>STATUS
                                </th>
                                <th class=' border-2 text-bold p-2'>ACTION
                                </th>
                            </tr>
                        </th>

                        <TableBody class='text-sm'>
                            <!-- {data.map((trans, index) => {
                            return ( -->
                            <tr key={trans.rqst_id} class=' border p-12'>
                                <th scope="row"> {index + 1}</th>
                                <td class=' text-center p-3 border-2'>{trans.stuid}</td>
                                <td class=' text-center p-3 border-2'>{trans.rqst_id}</td>
                                <td class=' text-center p-3 border-2'>{trans.phone}</td>
                                <td class=' text-center p-3 border-2'>{trans.prog}</td>
                                <td class=' text-center p-3 border-2'>{trans.level}</td>
                                <td class=' text-center p-3 border-2'>{trans.deliv_mode}</td>
                                <td class=' text-center p-3 border-2'>{trans.status}</td>
                                <td class=' text-center p-3 border-y'>
                                    <!-- <Stack direction='row' class=''>
                                        <TranscriptModal trans={trans} />
                                        <Iconbutton onClick={()=> fintoregtrans(trans.rqst_id)}>
                                            <ThumbUpIcon variant='contained' color='primary' />
                                        </Iconbutton>
                                        <Iconbutton onClick={()=> finrejtoregtrans(trans.rqst_id)}>
                                            <ThumbDown color='error' />
                                        </Iconbutton>
                                    </Stack> -->
                                </td>
                            </tr>
                            <!-- )
                            })} -->
                        </TableBody>
                    </table>
                </TableContainer>
                <!-- <TablePagination class=' bottom-0' rowsPerPageOptions={[10, 15, 25, 100]} component="div"
                    count={data.length} rowsPerPage={rowsPerPage} page={page} onPageChange={handleChangePage}
                    onRowsPerPageChange={handleChangeRowsPerPage} /> -->
            </Card>
        </div>
        <div class=' col-span-6'></div>
        <!-- <div class=' col-span-2 m-6'>
            {showAlert && (
            <Alert variant="filled" severity={alertSeverity} onClose={()=> setShowAlert(false)}>
                {alertMessage}
            </Alert>
            )}
        </div> -->
    </div>
</body>

</html>