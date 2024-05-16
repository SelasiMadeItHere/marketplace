<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="./AIT_CREST.png" type="image/x-icon">
    <title>Transcript Application</title>
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

        <div class=' text-center text-sky-800 text-2xl font-semibold py-12 md:pt-36 lg:pt-36'>
            FILL OUT THE FORM TO APPLY FOR TRANSCRIPT
        </div>

        <div>
            <form action="../../backend/scripts/forms.php?action=transcriptApplication" 
            class='bg-white rounded-xl drop-shadow-md lg:mx-24 p-12' method='post' enctype="multipart/form-data">
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

                        <div class='pb-4'>
                            <label>Email</label>
                            <input name='email'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='youremail@email.com' />
                        </div>

                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>
                                <label>Level</label>
                            </div>
    
                            <div class='grid-rows-2'>
                                <select
                                    class=' w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2 ' name="level">
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

                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>
                                <label>Program</label>
                            </div>
    
                            <div class='grid-rows-2'>
                                <select name='prog' class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'>
                                    <option> --SELECT--</option>
                                    <option value='Business'> Business</option>
                                    <option value='Civil Engineering'> Civil Engineering</option>
                                    <option value='Computer Engineering'> Computer Engineering</option>
                                    <option value='Computer Science'> Computer Science</option>
                                    <option value='Information Technology'> Information Technology</option>
                                    <option value='Electrical Engineering'> Electrical Engineering </option>
                                </select>
                            </div>
                        </div>


                        <div class='pb-4'>
                            <label>Telephone</label>
                            <input name='phone' type="tel"
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='+233 123 456 7890' />
                        </div>
                    </div>

                    <p class=' font-bold text-sky-800 p-8'> PURPOSE OF INTRODUCTORY LETTER</p>
                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>

                        <div class='pb-4'>
                            <label>Purpose of Introductory Letter</label>
                            <input name = "purpose" class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'/>
                        </div>
                    </div>
                </div>



<!-- 
                <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>

                    
                </div> -->


                <div class=' grid-rows-2 pb-12 '>

                    <div class='grid-rows-1 pt-6'>
                        <p class=' text-center text-red-700 font-semibold'>*****MAKE SURE TO PROVIDE VERY ACCURATE INFORMATION FROM HERE ON OUT*****</p>
                        <p class=' font-bold text-sky-800 p-8'>ORGANIZATION'S INFORMATION</p>
                    </div>

                    <div class='grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 px-4'>
                        <div class='pb-4 grid-cols-1 '>
                            <label>Organization's Name:</label>
                            <input name='ogname'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='Organization Name' />
                        </div>

                        <div class='pb-4 grid-cols-2 '>
                            <label>Contact Person in the Organization</label>
                            <input name='ogcontact'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder="Contact's Name" />
                        </div>

                        <div class='pb-4 grid-cols-2 '>
                            <label>Organization's Telephone</label>
                            <input name='ogphone'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder=' +233 123 456 7890' />
                        </div>

                        <div class='pb-4 grid-cols-3 '>
                            <label>Organization's Email</label>
                            <input name='ogemail'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='organizaation@email.com' />
                        </div>

                        <div class='pb-4 grid-cols-3'>
                            <label>Organization's Post Address</label>
                            <input name='ogpostal'
                                class=' w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'
                                placeholder='Post address' />
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
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2 bg-sky-800 text-white' />
                        </div>

                        <div class='pb-4 grid-cols-2 '>
                            <label>Delivery mode</label>
                            <select name='delivery_mode'
                                class='w-full border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2'>
                                <option>--SELECT--</option>
                                <option name='post' id='post'>Post</option>
                                <option name='deliverymail' id='deliverymail'>Email </option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class=' text-center'>
                    <button class=' bg-sky-700 p-2 text-white rounded-md'>SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>