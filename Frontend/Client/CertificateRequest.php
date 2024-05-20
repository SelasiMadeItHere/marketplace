<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
    <title>Certificate Applications</title>
</head>

<body>
    <div class=' bg-slate-200 w-full'>
        <div>
            <!-- <Navbar /> -->
            <div class='w-full h-[80px] bg-white drop-shadow-xl z-50 fixed top-0 '>
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

        <div class=' lg:mx-24 pt-36 pb-28 text-center text-sky-800 text-3xl font-semibold'>
            FILL OUT THE FORM TO APPLY FOR CERTIFICATE
        </div>

        <div>
            <!-- <form action="../../backend/scripts/forms.php?action=certificateApplication"
                class='bg-white rounded-xl shadow-md mx-4 md:mx-8 lg:px-32 p-4 md:p-12'> -->

            <form action="../../backend/scripts/forms.php?action=certificateApplication" enctype="multipart/form-data"
                method="post" class="bg-white rounded-xl drop-shadow-md lg:mx-24 p-12">
                <p class=' font-bold text-sky-800 p-8 text-md'>PERSONAL IDENTIFICATION</p>

                <div class='grid text-md'>

                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 px-4'>
                        <div class='pb-4'>
                            <label>ID Number:</label>
                            <input name='stuid' type="text"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='ADSXXXXXXXXXY' required/>
                        </div>

                        <div class='pb-4'>
                            <label>Name</label>
                            <input name='name' type="text"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='JOHN DOE' required/>
                        </div>
                    </div>


                    <p class=' font-bold text-sky-800 p-8'>CONTACT INFORMATION</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 px-4'>
                        <div class='pb-4'>
                            <label>Phone Number</label>
                            <input name='phone' type="tel"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='+123 456 789 10' required/>
                        </div>

                        <div class='pb-4'>
                            <label>Email</label>
                            <input name='email' type="email"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='youremail@email.com' />
                        </div>

                        <!-- <div class='pb-4'>
                            <label>Email</label>
                            <input name='phone'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='youremail@email.com' />
                        </div> -->

                    </div>




                </div>


                <!-- {/* Reminder: Request for deferment form form DFA*/} -->
                <p class=' font-bold text-sky-800 p-8'>ACADEMIC INFORMATION</p>

                <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 px-4'>

                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>Program of Study</label>
                        </div>

                        <div class='grid-rows-2'>
                            <select class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                name="prog">
                                <option> --SELECT--</option>
                                <option value='Business'> Business</option>
                                <option value='Civil Engineering'> Civil Engineering</option>
                                <option value='Computer Engineering'> Computer Engineering</option>
                                <option value='Computer Science'> Computer Science</option>
                                <option value='Information Technology'> Information Technology</option>
                                <option value='Electronic and Electrical Engineering'>Electronic and Electrical
                                    Engineering </option>
                            </select>
                        </div>
                    </div>


                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>Level</label>
                        </div>

                        <div class='grid-rows-2'>
                            <select class=' w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2
                                ' name="level">
                                <option> --SELECT--</option>
                                <option value='100'> 100 </option>
                                <option value='200'> 200 </option>
                                <option value='300'> 300 </option>
                                <option value='400'> 400 </option>
                                <option value='Masters'> Masters </option>
                                <option value='PhD'> PhD </option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>Purpose of application</label>
                        </div>

                        <div class='grid-rows-2'>
                            <select class=' w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1
                                px-2' name="">
                                <option> --SELECT--</option>
                                <option name='kcc'>Job application </option>
                                <option name='seaview'>Application to another school</option>
                                <option name='kcc'>Personal</option>
                            </select>
                        </div>
                    </div> -->
                </div>

                <div class=' grid-rows-2 pb-12 '>

                    <div class='grid-rows-1'>
                        <p class=' font-bold text-sky-800 pb-8'>ADDITIONAL INFORMATION</p>
                    </div>

                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 px-4'>
                        <div class='pb-4 grid-cols-1 '>
                            <label>Proof of payment:</label>
                            <input name='receipt_path' type='file'
                                class='border rounded-md bg-sky-700 text-white p-2 w-full md:w-full'
                                placeholder='Organization Name' required/>
                        </div>

                        <div class='pb-4 grid-cols-2 '>
                            <label>Delivery mode</label>
                            <select name='delivery'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 p-2'
                                placeholder=' +233 123 456 7890' id="delivery-mode">
                                <option>--SELECT--</option>
                                <option value='post'>Post</option>
                                <option value='email'>Email </option>
                                <option value='campus'>Campus</option>
                            </select>
                        </div>

                        <div class='pb-4 grid-cols-3 hidden' id="postal-address-field">
                            <label>Postal Address</label>
                            <input name='postal'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='Postal address' />
                        </div>
                    </div>
                </div>


                <div class=' text-center'>
                    <button class=' bg-sky-700 p-3 text-white rounded-md'>SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>


<script>
        document.getElementById('delivery-mode').addEventListener('change', function() {
            var postalAddressField = document.getElementById('postal-address-field');
            if (this.value === 'post') {
                postalAddressField.classList.remove('hidden');
            } else {
                postalAddressField.classList.add('hidden');
            }
        });
</script>

</html>