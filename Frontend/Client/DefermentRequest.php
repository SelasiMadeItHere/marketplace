<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
    <title>Deferment Application</title>
</head>

<body>

    <div class=' bg-slate-200 sm:min-w-full lg:h-full'>
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

        <div class=' lg:mx-24 pt-36 pb-28 text-center text-sky-800 text-3xl font-semibold'>
            FILL OUT THE FORM BELOW TO APPLY FOR DEFERMENT
        </div>

        <div>
            <form name='deferment' class='bg-white rounded-xl drop-shadow-md lg:mx-24 p-12' enctype="multipart/form-data"
                action="../../backend/scripts/forms.php?action=defermentApplication" method="post">
                <p class=' font-bold text-sky-800 p-8'>PERSONAL IDENTIFICATION</p>

                <div class='grid text-lg'>

                    <div class='grid lg:grid-cols-3 px-12'>
                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>
                                <label>ID Number:</label>
                            </div>
                            <div class='grid-rows-2'>
                                <input name='stuid' placeholder='ADSXXXXXXXXXXY'
                                    class=' border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2' />
                            </div>
                        </div>


                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>
                                <label>Phone Number</label>
                            </div>
                            <div class='grid-rows-2'>
                                <input type='tel' name="phone" placeholder="+233 123 456 7890"
                                    class=' border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2' />
                            </div>
                        </div>

                    </div>

                </div>

                <p class=' font-bold text-sky-800 p-8'>CURRENT ACADEMIC PROGRESS</p>
                <div class='grid text-md'>

                    <div class='grid lg:grid-cols-3 px-12'>
                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>
                                <label>Current Level:</label>
                            </div>
                            <div class='grid-rows-2'>
                                <select name='clevel' class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%]
                                    focus:outline-blue-800 py-1 px-2 '>
                                    <option> --Select--</option>
                                    <option name='l100'> 100 </option>
                                    <option name='l200'> 200 </option>
                                    <option name='l300'> 300 </option>
                                    <option name='l400'> 400 </option>
                                    <option name='masters'> Masters </option>
                                    <option name='phd'> PhD </option>
                                </select>
                            </div>
                        </div>


                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>
                                <label>Current Semester/Trimester</label>
                            </div>
                            <div class='grid-rows-2'>
                                <select name='csem' value={csem} class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%]
                                    focus:outline-blue-800 py-1 px-2 '>
                                    <option> --SELECT--</option>
                                    <option name='Sem1' value='1'> Semester 1</option>
                                    <option name='Sem2' value='2'> Semester 2 </option>
                                </select>
                            </div>
                        </div>


                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>
                                <label> Email</label>
                            </div>
                            <div class='grid-rows-2'>
                                <input name='mail' placeholder="idnumber@ait.edu.gh" class='
                                border-2 border-gray-700 rounded-md focus:outline-blue-800 py-1 px-2' />
                            </div>
                        </div>
                    </div>

                </div>



                <p class=' font-bold text-sky-800 p-8'>DEFERMENT INFORMATION</p>

                <div class='grid lg:grid-cols-3 px-12'>

                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>I am deferring semester/trimester</label>
                        </div>
                        <div class='grid-rows-2'>
                            <select name='defsem' class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%]
                                focus:outline-blue-800 py-1 px-2 '>
                                <option> --SELECT--</option>
                                <option name='Sem1' value='1'> Semester 1</option>
                                <option name='Sem2' value='2'> Semester 2 </option>
                            </select>
                        </div>
                    </div>

                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>of Academic Year</label>
                        </div>
                        <div class='grid-rows-2'>
                            <!-- <input type="year" name="academicyear" placeholder='2023/2024'
                                class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%] focus:outline-blue-800 py-1 px-2 ' /> -->

                                <input type="number" name="academicyear" 
                                class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%] focus:outline-blue-800 py-1 px-2 text-center' min='2024' value='2024'/>
                        </div>
                    </div>

                    <div></div>

                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>I am planning to return in semester/trimester:</label>
                        </div>
                        <div class='grid-rows-2'>
                            <select name='retsem' class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%]
                                focus:outline-blue-800 py-1 px-2 '>
                                <option> --SELECT--</option>
                                <option name='Sem1' value='1'> Semester 1</option>
                                <option name='Sem2' value='2'> Semester 2 </option>
                            </select>
                        </div>
                    </div>


                    <div class=' grid-rows-2 pb-6'>
                        <div class='grid-rows-1'>
                            <label>of Academic Year</label>
                        </div>
                        <div class='grid-rows-2'>
                            <input type='number' name="retyear" min='2024' value='2024'
                                class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[60%] focus:outline-blue-800 py-1 px-2 text-center' />
                        </div>
                    </div>
                </div>
                <!-- {/*
                <div>

                </div> */} -->



                <div class=' grid-rows-2 pb-12 '>
                    <div class='grid-rows-1'>
                        <p class=' font-bold text-sky-800 p-8'>REASON FOR DEFERMENT</p>



                        <div class=' grid-rows-2'>
                            <div class='grid-rows-1'>


                                <div class='grid-rows-2 px-12'>
                                    <div>
                                        <label>Reason for Deferment</label>
                                    </div>

                                    <select name='reason' value={reason} class=' border-b-2 pr-12 border-2 border-gray-700 rounded-md min-w-[40%]
                                        focus:outline-blue-800 py-1 '>
                                        <option> --SELECT--</option>
                                        <option name='financial'> Financial</option>
                                        <option name='travel'> Travel </option>
                                        <option name='academdifficult'> Academic Difficulties </option>
                                        <option name='acade'> Academic Difficulties </option>
                                        <option name='family'> Family </option>
                                        <option name='illness'> Illness </option>
                                        <option name='workcommitment'> Work Commitments </option>
                                        <option name='person'> Personal </option>
                                        <option name='other'> other(s) </option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class='grid-rows-3 pl-12'>

                    </div>
                </div>
                <div class=' grid-rows-2 pb-12 '>
                    <div class='grid-rows-1'>
                        <p class=' font-bold text-sky-800 p-8'>PROOF OF PAYMENT</p>



                        <div class=' grid-rows-2 pb-6'>
                            <div class='grid-rows-1'>


                                <div class='grid-rows-2 px-12'>
                                    <input type="file" class=" border rounded-md bg-sky-700 text-white p-2"
                                        name="receipt_path">
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class=' text-center'>
                    <button name='submit' class=' bg-sky-700 p-2 text-white rounded-md'>SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>