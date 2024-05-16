<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
    <title>New Request</title>
</head>

<body>
    <div>
        <div class='w-full h-[80px] bg-white drop-shadow-xl z-50 fixed top-0'>
            <div class='px-2 flex justify-between fdefs-center w-full h-full'>
                <div class=' items-start'>
                    <h1 class=' inline-flex items-center'>
                        <img src="../src/AIT_CREST.png" alt='crest' class=' h-16 w-16' />
                    </h1>
                </div>

                <p class=' pt-4 text-center lg:text-3xl font-bold '>AIT MARKETPLACE</p>

                <div class='my-6'>
                    <Bars3Icon class='w-7 font-extrabold flex mx-5 lg:hidden' />
                </div>
            </div>
        </div>
    </div>
    <div class=' text-center text-5xl pt-28 bg-slate-200 '>
        What can we help you with?
    </div>

    <div class=' bg-slate-200 h-auto py-12 grid lg:grid-cols-3 justify-self-center'>

        <div class='grid lg:grid-cols-3 lg:col-span-12 gap-6 mt-12 mx-12'>

            <div
                class=' bg-white shadow-xl rounded-xl py-5 grid h-auto w-full place-items-center md:max-w-md sm:max-w-sm'>
                <div>
                    <img class=' rounded-lg' src="../src/idcards.jpg" style="width: 100%; max-height: 120px;
                        max-width: 180" alt='holder' />
                </div>

                <div class='text-center'>
                    <p class=" text-2xl font-bold p-2">ID Cards</p>
                    <button type="button" class="btn btn-primary shadow-md" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        Apply Now!
                    </button>

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <Modal hideBackdrop open={open} onClose={handleClose}
                                    aria-labelledby="child-modal-title" aria-describedby="child-modal-description">
                                    <div>
                                        <h2 id="child-modal-title" class=' text-center text-2xl font-bold p-6'>ID Card
                                            Renewal</h2>
                                        <hr class=' shadow-3xl' />
                                        <div id="child-modal-description">
                                            <form class=' p-6 drop-shadow-12 ' encType='multipart/form-data'
                                                action="../../backend/scripts/forms.php?action=IDCardRenewal"
                                                method="POST">
                                                <div class=' gap-3 p-6 text-left'>

                                                    <label class=' font-bold'> ENTER YOUR ID NUMBER</label><br />
                                                    <input placeholder='Enter Your ID Number'
                                                        class=' border-sky-800 border-2 rounded w-[100%] p-2'
                                                        name='stuid' required /><br />

                                                    <label class=' font-bold'> ENTER YOUR EMAIL</label><br />
                                                    <input type='email' placeholder='Enter a Valid Email Address'
                                                        class=' border-sky-800 border-2 rounded w-[100%] p-2'
                                                        name='email' required /><br />

                                                    <label class=' font-bold p-2'>CAMPUS OF COLLECTION</label><br />
                                                    <select class=' border-sky-800 border-2 rounded p-2 w-[100%]'
                                                        name='campus'>
                                                        <option>--Select--</option>
                                                        <option>SEAVIEW</option>
                                                        <option>KCC Campus</option>
                                                    </select><br />

                                                    <label class=' font-bold p-2'>I AM REQUESTING FOR A </label><br />
                                                    <select class=' border-sky-800 border-2 rounded p-2 w-[100%]'
                                                        name='service'>
                                                        <option>--Select--</option>
                                                        <option>Replacement</option>
                                                        <option>Renewal</option>
                                                    </select><br />



                                                </div>

                                                <div class=' text-center my-6'>
                                                    <label class=' font-bold p-2'>UPLOAD YOUR RECEIPT </label>
                                                    <input type="file" name="image" class=' p-2 btn btn-primary'
                                                        required />
                                                </div>


                                                <div class=' grid grid-cols-4 gap-3'>
                                                    <button
                                                        class=' text-center col-start-2 btn btn-danger'>Cancel</button>
                                                    <button class=' text-center btn btn-primary' id="image"
                                                        name="Submit">SUBMIT</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </Modal>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div
                    class=' bg-white shadow-xl rounded-xl py-5 grid h-auto w-full place-items-center md:max-w-md sm:max-w-sm'>
                    <div>
                        <img class=' rounded-lg' src="../src/3d-signing-contract.png" style=" width: 100%; max-height: 120px;
                            max-width: 180" alt='holder' />
                    </div>

                    <div class='text-center'>
                        <p class=" text-2xl font-bold p-2">Deferment Application</p>
                        <a href="./DefermentRequest.php">
                            <button class='btn btn-primary shadow-md' variant="contained">Apply Now!</button>
                        </a>

                    </div>
                </div>
            </div>

            <div>
                <div
                    class=' bg-white shadow-xl rounded-xl py-5 grid h-auto w-full place-items-center md:max-w-md sm:max-w-sm'>
                    <div>
                        <img class=' rounded-lg' src="../src/Certificate.png"
                            style=" width: 100%; max-height: 120px; max-width: 180" alt='holder' />
                    </div>

                    <div class='text-center'>
                        <p class=" text-2xl font-bold p-2">Certificate Application</p>
                        <a href="./CertificateRequest.php">
                            <button class='btn btn-primary shadow-md' variant="contained">Apply Now!</button>
                        </a>

                    </div>
                </div>
            </div>

            <div>
                <div
                    class=' bg-white shadow-xl rounded-xl py-5 grid h-auto w-full place-items-center md:max-w-md sm:max-w-sm'>
                    <div>
                        <img class=' rounded-lg' src="../src/apply-paper.jpg"
                            style=" width: 100%; max-height:120px; max-width: 180" alt='holder' />
                    </div>

                    <div class='text-center'>
                        <p class=" text-2xl font-bold p-2"> Introductory Letter Application</p>
                        <a href="./transcriptApplication.php">
                            <button class='btn btn-primary'>Apply Now!</button>
                        </a>

                    </div>
                </div>
            </div>

            <div>
                <div
                    class=' bg-white shadow-xl rounded-xl py-5 grid h-auto w-full place-items-center md:max-w-md sm:max-w-sm'>
                    <div>
                        <img class=' rounded-lg' src="../src/apply-paper.jpg"
                            style=" width: 100%; max-height:120px; max-width: 180" alt='holder' />
                    </div>

                    <div class='text-center'>
                        <p class=" text-2xl font-bold p-2"> Transcript Application</p>
                        <button class='btn btn-primary'>Apply Now!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- {/* Would have to create a loop here to determine number of question.Same goes for announcement */} -->
    <div class=' text-center text-3xl font-bold bg-slate-200 p-4'>
        <h1>Frequently Asked Questions (FAQs)</h1>
        <ol class=' justify-around'>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 1</li>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 2</li>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 3</li>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 4</li>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 5</li>
            <li class='bg-white rounded-xl text-lg m-12'>#QUESTION 6</li>
        </ol>
    </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>