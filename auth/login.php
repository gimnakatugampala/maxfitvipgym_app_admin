<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Login</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="../img/logo.jpeg" width="200" height="200" /></h1>

            </div>
            <h3>Maxfit VIP Gym</h3>
            <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views. -->
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <!-- <p>Login in. To see it in action.</p> -->
             <div id="login-message" class="alert d-none mt-3"></div>

             <form id="login-form" class="m-t" role="form">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required id="password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary toggle-password" type="button">
                            <i class="fa fa-eye-slash"></i>
                        </button>
                    </div>
                </div>
            </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
            </form>
            <p class="m-t"> <small>Maxfit VIP Gym &copy; <?php echo date("Y"); ?></small> </p>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../scripts/login.js"></script>

</body>

</html>
