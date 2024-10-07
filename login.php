<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Login</title>
</head>
<body>
    <body>
        <form action="controlLogin.php" method="post">
            <div class="box">
                <div class="container">
                    <div class="top-header">
                        <header>Login</header>
                    </div>

                    <?php if (isset($_GET['error'])) { ?>
     		            <p style="color: red; font-size: small" class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>

                    <div class="input-field">
                        <input type="text" class="input" placeholder="Username" name="username" >
                        <i class="bx bx-user"></i>
                    </div>
                    
                    <div class="input-field">
                        <input type="password" class="input" placeholder="Password" name="password" >
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    
                    <div class="input-field">
                        <!-- <a class="sign" type="submit">Submit</a> -->
                        <button class="sign" type="submit">Submit</button>
                    </div>
                    
                    <div class="bottom">
                        <div class="right">
                            <label><a href="RegisterPage.php">Register now</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </body>
</body>
</html>