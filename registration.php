<!--AHMAD ARIF AIMAN B. AHMAD FAUZI | 2113419
INFO4345/S1 WEB APP SECURITY -->

<?php 
    require 'security_config.php'; 
    startSecureSession();  
    generateCsrfToken();   
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <!--css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/function.js"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 20px 0;" >Sign up</h1>
        <header style="text-align: center;margin: 20px 0;" >Please register to continue</header>
        <div class="form-container">
            <form action="register.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="form-floating mb-3">
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="name@example.com" 
                        name="email" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        placeholder="Enter password" 
                        name="password" required>
                    <label for="password">Password</label>
                    <span id="togglePassword" onclick="togglePasswordVisibility()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);cursor:pointer;">👁️</span>
                </div><br>
                <div class="mb-3">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <label for="rememberMe"> Remember Me</label>
                </div><br>
                <button type="signup" name="signup" id="signup" class="btn btn-primary w-100">Register</button>
                <p class="mt-3 text-center">Already have an account? <a href="index.php">Login</a></p>     
            </form>
        </div>
    </section>

</body>
</html>