<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
    <title>Register Staff</title>
</head>

<body>
    <div class='bg-blue-600 h-screen justify-items-center-'>
        <div>
            <!-- Supposed to carry the Navigation bar -->
        </div>

        <div class=' py-6'>
            <div class=' justify-center rounded-md m-auto w-fit items-center bg-white'>
                <img src="../src/AIT_CREST.png" alt='Logo' class='w-24 h-24 m-auto pt-2' />
                <br />
                <h1 class='font-bold px-12 text-3xl'>Officer Registration Portal</h1>
                <br />

                <div class=' pb-6'>
                    <form class=" pl-6 w-full" action="../../backend/scripts/forms.php?action=staffRegister"  method="post">

                        <input placeholder='Enter Full Name' type='text' name='officer_name' label="Officer's Name"
                            variant="outlined" class='p-2  rounded-lg border-2 border-black w-[75%]' />
                        <br />
                        <br />


                        <input placeholder='Enter the e-mail address' type='text' name='mail' label="Email"
                            variant="outlined" class='p-2  rounded-lg border-2 border-black w-[75%]' />
                        <br /> <br />

                        <label class=' text-left font-semibold'>Assign Role</label><br>
                        <select id="outlined-select-currency-native" placeholder='Role' label="Select" name="role"
                            defaultValue="Select" class='  p-2 rounded-lg border-2 border-black w-[75%]'>
                            <option defaultValue="Select" placeholder="Select the Role Assigned to the Officer"></option>
                            <option value="Registrar">Registrar</option>
                            <option value="IDU">IDU</option>
                            <option value="DFA">DFA</option>
                        </Select>
                        <br /> <br />


                        <input placeholder='Enter the Staff Username' type='mail' name='username' label="Username"
                            variant="outlined" class='p-2  rounded-lg border-2 border-black w-[75%]' />
                        <br />
                        <br />


                        <input placeholder='Enter the designated Password' type='password' name='password'
                            label="Password" variant="outlined" class='p-2  rounded-lg border-2 border-black w-[75%]' />
                        <br /> <br />


                        <button type='submit' class='justify-end mb-2 btn btn-primary' name="submit">
                            SUBMIT
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</body>

</html>