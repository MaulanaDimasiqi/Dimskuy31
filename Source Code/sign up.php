<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, inital">
    <title>Register</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap);

        body
        {
            background: #e4e9f7;
            font-family: 'Montserrat', bold;
        }
        
        .container
        {   
            display: flex;
            align-items: center;
            justify-content: center ;
            min-height: 90vh;
        }

        .box
        {
            background: #fdfdff;
            flex-direction: column;
            padding: 25px 25px;
            border-radius: 20px ;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0, 1),
                        0 32px 64px -48px rgba(0, 0, 0, 0, 5);
        }

        .form-box
        {
            width: 450px;
            margin: 0 10px ;
        }

        .form-box header
        {
            font-size:25px;
            font-weight:600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }

        .form-box form .field
        {
            display: flex;
            margin-bottom: 10px;
            flex-direction: column;
        }

        .form-box form .input input
        {
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0;
            padding-left: 10px;
            border-radius: 5px;
            border: 1px solid#ccc;
            outline: none;
        }

        .btn
        {
            height: 35px;
            background: rgba( 76, 68, 182, 0.808);
            border: 0;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: all .3s;
            margin-top: 10px;
            padding: 0px 10px;
        }
        
        .btn:hover
        {
            opacity: 0.85;
        }

        .submit
        {
            width: 100%;

        }

        .links
        {
            margin-bottom: 15px;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="age" name="age" id="age" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Already have an account? <a href="log in.php"> Sign Up Now</a>
                </div>
        </div>
    </div>
</body>
</html>