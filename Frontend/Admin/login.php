<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="../src/AIT_CREST.png" type="image/x-icon">
</head>

<title>
    Login
</title>

<body>
    <div class=' bg-blue-600 h-screen'>
        <div class=' p-24'>
            <div class=' text-center justify-center p-6 bg-white mx-96 rounded-lg ' >

                <img src="../src/AIT_CREST.png" alt='Logo' class=' m-auto' />
                <br />
                <h1 class='font-bold text-xl'>Login with your assigned credentials</h1>
                <br />
                
                <form action="../../backend/scripts/forms.php?action=staffLogin" method="Post">
                    <input placeholder='Enter your username' type='text' name='username' label="Username"
                        style="padding: 12px; border-radius: 12px; width: auto" class=" border border-black outline-blue-600" />

                    <br />
                    <br />

                    <input placeholder='Enter your password' type='password' name='password' label="Password"
                        style="padding: 12px; border-radius: 12px; width: auto;" class=" border border-black outline-blue-600" />
                    <br />
                    <br />

                    <button type='submit' class='justify-center btn btn-primary' name='submit'>
                        SUBMIT
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>