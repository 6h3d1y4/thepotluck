<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Additional CSS -->
    <link rel="stylesheet" href="styles/page.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@700&family=Short+Stack&display=swap"
        rel="stylesheet">
</head>
<body>
    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-dark navbar-expand-sm justify-content-between">

        <!-- Container wrapper -->

        <div class="container-fluid">

            <!-- Navbar brand -->

            <nav class="navbar navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logo.svg" alt="logo" width="60" height="45"
                            class="d-inline-block align-text-top">
                        the pot luck
                    </a>
                </div>
            </nav>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-fill w-100">

                    <!-- First Tab -->
                    <li class="nav-item text-center" id="search-btn">
                                    <a style="color:white;" href="ingredients.php" class="nav-link" data-toggle="modal" data-target="ingredeints.php"><span
                                            class="fa fa-user"></span><span
                                            class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Recipe from Ingredients
                                            </span></a>
                        <!-- Second Tab -->
                        <li class="nav-item text-center" id="search-btn">
                                    <a style="color:white;" href="allrecipes.php" class="nav-link" data-toggle="modal" data-target="international.php"><span
                                            class="fa fa-user"></span><span
                                            class="d-none d-sm-inline d-xl-block px-1 fw-bolder">All Recipes
                                            </span></a>
                                <!-- Signup & Login -->
                            <li class="nav-item text-center" id="search-btn">
                                    <a style="color:white;" href="search.php" class="nav-link" data-toggle="modal" data-target="search.php"><span
                                            class="fa fa-user"></span><span
                                            class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Search Recipes
                                            </span></a>
                                <li class="nav-item text-center" id="signup-btn">
                                    <a style="color:white;" href="logout.php" class="nav-link" data-toggle="modal" data-target="logout.php"><span
                                            class="fa fa-user"></span><span
                                            class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Logout</span></a>
                                </li>
                                <li class="nav-item text-center" id="login-btn">
                                    <a style="color:white;" href="resetpwd.php" class="nav-link" data-toggle="modal" data-target="resetpwd"><span
                                            class="fa fa-sign-in"></span><span
                                            class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Reset Password</span></a>
                                </li>
                        </div>
                    </nav>
                </ul>
            </div>
        </div>

    </nav>
    <h5 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to the pot luck! You can now view all the recipes! Have fun cooking!</h5>


</body>
</html>

</body>
</html>