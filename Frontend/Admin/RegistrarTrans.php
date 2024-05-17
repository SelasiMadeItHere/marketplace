<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Transcript Approval</title>
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
            <!-- <div class=' grid grid-cols-4 gap-3 pt-3 text-black col-span-full'>
                <Breadcrumbs arial-label='breadcrumb' separator=">">
                    <a href='/registrar' underline='hover'>Home</a>
                    <a href='#' underline='hover'>Transcripts</a>
                </Breadcrumbs>


                <div class=' inline-flex col-start-4 gap-3 col-end-8'>
                    <button color='primary' variant='contained'>
                        Approved
                    </button>
                    <button color='error' variant='contained'>
                        Rejected
                    </button>

                </div>
            </div> -->
            <!-- 
            {/* <div class=' grid col-span-3'></div> */} -->


        </div>

        <div class=' grid col-span-8 col-start-3 w-[90%]'>
            <div class='drop-shadow-sm'>
                <h1 class=' text-2xl font-semibold text-center bg-sky-800 text-white p-6'>Transcripts Requests</h1>
                <!-- <TableContainer> -->
                <table class=" w-full">
                    <th>
                        <tr>
                            <td class=' border-2'>SN</td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>ID NO.
                            </td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>REQUEST
                                ID</td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>CONTACT
                            </td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>PROGRAM
                            </td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>LEVEL
                            </td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>
                                DELIVERY</td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>STATUS
                            </td>
                            <td class=' p-2 font-bold text-center border-2' class=' border-2'>ACTION
                            </td>
                        </tr>
                    </th>

                    <tbody class='text-sm'>
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
                                        <Iconbutton>
                                            <ThumbDown color='error' />
                                        </Iconbutton>
                                    </Stack> -->
                            </td>
                        </tr>
                        <!-- )
                            })} -->
                    </tbody>
                </table>
                <!-- </TableContainer> -->
                <!-- <TablePagination class=' bottom-0' rowsPerPageOptions={[10, 15, 25, 100]} component="div"
                    count={data.length} rowsPerPage={rowsPerPage} page={page} onPageChange={handleChangePage}
                    onRowsPerPageChange={handleChangeRowsPerPage} /> -->
            </div>
        </div>
        <div class=' col-span-6'></div>
        <!-- <div class=' col-span-2 m-6'>
            {showAlert && (
                <Alert variant="filled" severity={alertSeverity} onClose={() => setShowAlert(false)}>
                    {alertMessage}
                </Alert>
            )}
        </div> -->
    </div>
</body>

</html>