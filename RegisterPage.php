<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Register</title>
</head>
<body>
    <body>
        <form action="controlRegister.php" method="post">
            <div class="box">
                <div class="container">
                    <div class="top-header">
                        <header>Sign Up</header>
                    </div>

                    <?php if (isset($_GET['error'])) { ?>
     		            <p style="color: red; font-size: small" class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                        <p style="color: green; font-size: small" class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <div class="input-field">
                        <?php if (isset($_GET['username'])) { ?>
                            <input type="text" class="input" name="username" placeholder="Username" value="<?php echo $_GET['username']; ?>" >
                        <?php }else{ ?>
                            <input type="text" class="input" name="username" placeholder="Username">
                            <i class="bx bx-user"></i>
                        <?php }?>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input" name="full_name" placeholder="Fullname" >
                        <i class="bx bx-user"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input" name="email" placeholder="Email" >
                        <i class="bx bx-user"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input" name="phone" placeholder="Phone" >
                        <i class="bx bx-user"></i>
                    </div>

                    <div class="input-field">
                        <input type="text" class="input" name="address" placeholder="Address" >
                        <i class="bx bx-user"></i>
                    </div>
                    
                    <div class="input-field">
                        <input type="password" class="input" name="password" placeholder="Password" >
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    
                    <div class="input-field">
                        <input type="password" class="input" name="REpassword" placeholder="Re_Password" >
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    
                    <div class="input-field">                   
                        <button class="sign" type="submit"> Submit </button>
                    </div>
                    
                    <div class="input-field">
                        <a href="login.php" style="font-size: 13px; display: inline-block; padding: 10px; text-decoration: none; color: white;">Already have an account?</a>
                    </div>
                </div>
            </div>
        </form>
      </body>
</body>
</html>