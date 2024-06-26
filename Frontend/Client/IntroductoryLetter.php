<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Introductory Letter Application</title>
</head>

<body>
    <div class=' bg-slate-200 w-full'>
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
        </div>

        <div class=' text-center text-sky-800 text-2xl font-semibold py-6 md:pt-36 lg:pt-36'>
            FILL OUT THE FORM TO APPLY FOR AN INTRODUCTORY LETTER </div>

        <div class=" pt-12">
            <form class='bg-white rounded-xl drop-shadow-md lg:mx-24 p-12' method="post" enctype="multipart/form-data"
                action="../../backend/scripts/forms.php?action=introductoryLetter">
                <p class=' font-bold text-sky-800 p-8'>PERSONAL IDENTIFICATION</p>

                <div class='grid text-md'>

                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>
                        <div class='pb-4'>
                            <label>ID Number:</label>
                            <input name='stuid'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='ADSXXXXXXXXXY' />
                        </div>

                        <div class='pb-4 '>
                            <label>Name</label>
                            <input name='name'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='JOHN DOE' />
                        </div>
                    </div>


                    <p class=' font-bold text-sky-800 p-8'>CONTACT INFORMATION</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>
                        <div class='pb-4'>
                            <label>Email</label>
                            <input name='email'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='youremail@email.com' />
                        </div>

                        <div class='pb-4 '>
                            <label>Phone</label>
                            <input name='phone' type="tel"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='JOHN DOE' />
                        </div>
                    </div>

                    <p class=' font-bold text-sky-800 p-8'> PURPOSE OF INTRODUCTORY LETTER</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>

                        <div class='pb-4'>
                            <Select name='purpose'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                >
                                <option name='For Bank'>For Bank</option>
                                <option name='Resident Permit'>For Resident Permit</option>
                                <option name='Visa'>For VISA Application</option>
                            </Select>
                        </div>
                    </div>
                </div>






                <!-- {/* Reminder: Request for deferment form form DFA*/} -->
                <div id="bankinfo">
                    <p class=' font-bold text-sky-800 p-8'>BANK INFORMATION</p>

                    <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4">
                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>
                                <label>Residential Address</label>
                            </div>

                            <div class='grid-rows-2'>
                                <input type="text" name="raddress" id="raddress"
                                    class=" w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2">
                            </div>
                        </div>

                        <div>
                            <label for="">Bank Name</label>
                            <input type="text" name="bname"
                                class=" w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2">
                        </div>
                    </div>
                </div>





                <div id="residencypermit">
                    <p class=' font-bold text-sky-800 p-8'>RESIDENCY PERMIT</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>

                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>
                                <label>Passport Number</label>
                            </div>

                            <div class='grid-rows-2'>
                                <input type="text" name="pnumber" id="pnumber"
                                    class=" w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2">
                            </div>
                        </div>
                    </div>
                </div>


                <div id="visa_application">
                    <p class=' font-bold text-sky-800 p-8'>VISA APPLICATION</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>

                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>
                                <label>Embassy or High Commision Address</label>
                            </div>

                            <div class='grid-rows-2'>
                                <input type="text" name="eaddress" id="eaddress"
                                    class=" w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2">
                            </div>
                        </div>
                    </div>
                </div>




                <div class=' grid-rows-2 pb-12 '>

                    <div class='grid-rows-1'>
                        <p class=' font-bold text-sky-800 p-8'>ADDITIONAL INFORMATION</p>
                    </div>

                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>
                        <div class='pb-4 grid-cols-1 '>
                            <label>Proof of payment:</label>
                            <input name='receipt_path' type='file'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='Organization Name' />
                        </div>

                        <div class='pb-4 grid-cols-2 '>
                            <label>Delivery mode</label>
                            <select name='delivery_mode' onSelect={address}
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder=' +233 123 456 7890'>
                                <option>--SELECT--</option>
                                <option name='post' id='post'>Post</option>
                                <option name='email' id='eaddress'>Email </option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class='pb-4 grid-cols-3 hidden'>
                            <label>Postal Address</label>
                            <input name='post'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='Postal address' />
                        </div>

                        <div class='pb-4 grid-cols-3 hidden'>
                            <label>Provide E-mail address</label>
                            <input name='ogemail'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='E-mail address to be delivered to' />
                        </div>

                        <!-- {/* <div class='pb-4 grid-cols-3 '>
                                <label></label>
                                <input name='ogemail'
                                    class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                    placeholder='organization@email.com' />
                            </div> */} -->
                    </div>
                </div>


                <div class=' text-center'>
                    <button class=' bg-sky-700 p-3 text-white rounded-md' type="submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>