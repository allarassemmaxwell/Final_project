<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password || FEM</title>
    <link rel="stylesheet" href="css/style.css">
    
    <!-- IMPORT FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="reset-password">
        <div class="reset-password-content">
            <p class="reset-password-title">Reset password</p>
            <form class="reset-password-form" method="POST" action="index.php">
                <div>
                    <input class="reset-password-input" name="email" type="email" placeholder="Email">
                </div><br><br>
                <div class="space"></div>
                <div>
                    <button class="reset-password-submit" type="submit">Reset Password</button>
                </div>
                
                <p class="create-account">Already have account?<a href="index.php"> Login</p>
            </form>             
        </div>
    </div> 


    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>