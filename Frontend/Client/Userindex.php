<?php
include "../../backend/scripts/config.php";
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Track or Make a Request</title>
</head>

<body>
    <div>
        <div class='grid lg:grid-cols-2 h-screen sm:flex-1'>
            <!-- {/* New Request card */} -->
            <!-- {/* <div class='grid-cols-1 bg-slate-200 pt-[20%] text-center' > */} -->

            <div class='flex items-center justify-center bg-slate-200 text-center '>
                <div class='bg-white outline-blue-500 md:w-[50%] m-auto rounded-2xl px-6 border-solid py-20'>

                    <img src='../src/AIT_CREST.png' alt='Logo' class='w-24 h-24 m-auto p-auto' />
                    <br />
                    <h1 class='font-bold text-lg'>NEW REQUEST</h1>
                    <div class='text-red-500 text-center text-xs pb-6'>
                        PLEASE MAKE SURE TO KEEP OR TAKE NOTE OF THE TRACKING ID GENERATED FOR YOUR REQUEST AFTER A
                        SUCCESSFUL
                        SUBMISSION. IT WOULD BE REQUIRED IN THE EVENT OF TRACKING YOUR REQUEST(S)'S STATUS
                    </div>
                    <a href='../Client/NewRequest.php'>
                        <button class=" btn btn-primary" variant='contained'>APPLY</button>
                    </a>
                </div>
            </div>

            <!-- {/* <div class='grid-cols-2 bg-blue-700 pt-[20%] text-center'> */} -->
            <div class='flex items-center justify-center bg-blue-700 text-center'>
                <div class='bg-white outline-blue-500 md:w-[50%] m-auto rounded-2xl px-6 border-solid py-12'>
                    <img src='../src/AIT_CREST.png' alt='Logo' class='w-24 h-24 m-auto p-auto' />
                    <br />
                    <h1 class='font-bold'>TRACK REQUEST STATUS</h1>
                    <br />

                    <form onSubmit={handleStatusCheck}>
                        <input placeholder='Enter Your ID Number' type='text' name='id'
                            class=" border-1 border-black p-2 rounded-lg outline-blue-600" />
                        <br />
                        <br />

                        <input placeholder='Enter Request Tracking ID' type='text' name='trackId'
                            class=" border-1 border-black p-2 rounded-lg outline-blue-600" />
                        <br />
                        <br />
                        <button type="button" class="btn btn-primary shadow-md" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            Submit
                        </button>
                    </form>

                    <Modal open={open} onClose={handleCloseModal}>

                        <Box sx="position: 'absolute' , top: '50%' , left: '50%' , transform: 'translate(-50%, -50%)'
                            , width: 1000, height: 400, bgcolor: 'background.paper' , boxShadow: 24, p: 4 ">

                        </Box>
                    </Modal>

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <Modal hideBackdrop open={open} onClose={handleClose}
                                    aria-labelledby="child-modal-title" aria-describedby="child-modal-description">
                                    <div>
                                        <h2 id='modal-title' class=' text-center text-2xl font-bold p-2'>Request Status
                                        </h2>
                                        <hr />


                                        <!-- {error && <p>{error}</p>}
                                            {status && ( -->

                                        <!-- <div id="stepper" class="my-20">
                                                    <div class="step" data-step="1">
                                                        <h3>Pending</h3>
                                                        <p>Your request is yet to be attended to by an officer</p>
                                                    </div>
                                                    <div class="step" data-step="2">
                                                        <h3>Verified</h3>
                                                        <p>Your payment for this service or request has been approved by the DFA</p>
                                                    </div>
                                                    <div class="step" data-step="3">
                                                        <h3>Approved</h3>
                                                        <p>The Registrar has approved of your request and has been assigned to an officer</p>
                                                    </div>
                                                    <div class="step" data-step="4">
                                                        <h3>Being Worked</h3>
                                                        <p>An officer is currently working on your request</p>
                                                    </div>
                                                    <div class="step" data-step="5">
                                                        <h3>Ready</h3>
                                                    </div>
                                                </div> -->

                                        <div class="py-4 px-5">
                                            <?php
                                            $status = 'Pending'; // Replace with actual status
                                            $activeStep = 1; // Default active step
                                            if ($status === 'Ready' || $status === 'worked_on') {
                                                $activeStep = 5;
                                            } elseif ($status === 'Approved') {
                                                $activeStep = 3;
                                            } elseif ($status === 'verified') {
                                                $activeStep = 2;
                                            } elseif ($status === 'rejected') {
                                                $activeStep = -1;
                                            } else {
                                                $activeStep = 1;
                                            }
                                            ?>

                                            <div class="my-20">
                                                <div class="stepper">
                                                    <div class="step <?php echo $activeStep === 1 ? 'active' : ''; ?>">
                                                        <div class="step-label">Pending</div>
                                                        <p>Your request is yet to be attended to by an officer</p>
                                                    </div>
                                                    <div class="step <?php echo $activeStep === 2 ? 'active' : ''; ?>">
                                                        <div class="step-label">Verified</div>
                                                        <p>Your payment for this service or request has been approved by
                                                            the DFA</p>
                                                    </div>
                                                    <div class="step <?php echo $activeStep === 3 ? 'active' : ''; ?>">
                                                        <div class="step-label">Approved</div>
                                                        <p>The Registrar has approved your request and it has been
                                                            assigned to an officer</p>
                                                    </div>
                                                    <div class="step <?php echo $activeStep === 4 ? 'active' : ''; ?>">
                                                        <div class="step-label">Being Worked</div>
                                                        <p>An officer is currently working on your request</p>
                                                    </div>
                                                    <div class="step <?php echo $activeStep === 5 ? 'active' : ''; ?>">
                                                        <div class="step-label">Ready</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <style>
                                                .stepper {
                                                    display: flex;
                                                    flex-direction: column;
                                                }

                                                .step {
                                                    margin: 10px 0;
                                                }

                                                .step-label {
                                                    font-weight: bold;
                                                }

                                                .step.active .step-label {
                                                    color: blue;
                                                }
                                            </style>

                                        </div>


                                    </div>

                                    <!-- <button class='btn btn-danger mb-4' {handleCloseModal} sx=" left: 50%" data-dismiss="modal"
                                        variant='contained'>Close</button> -->

                                    <button type="button" class="btn btn-danger" data-dismiss="#myModal">Close</button>
                            </div>
                            </Modal>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>