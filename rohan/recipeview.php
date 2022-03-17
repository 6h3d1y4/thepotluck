<?php
// Check existence of id parameter before processing further
if(isset($_GET["rec_name"]) && !empty(trim($_GET["rec_name"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM recipes WHERE rec_name = ?";
    
    if($stmt = mysqli_prepare($connection, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_rec_name);
        
        // Set parameters
        $param_rec_name = trim($_GET["rec_name"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $rec_name = $row["rec_name"];
                $rec_country = $row["rec_country"];
                $rec_difficulty = $row["rec_difficulty"];
                $rec_prep_time = $row["rec_prep_time"];
                $rec_desc = $row["rec_desc"];
                $rec_ing = $row["rec_ing"];
                $rec_prep = $row["rec_prep"];
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($connection);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
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
    <title>The Pot Luck</title>
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
                            <a style="color:white;" href="international.php" class="nav-link" data-toggle="modal" data-target="international.php"><span
                                    class="fa fa-user"></span><span
                                    class="d-none d-sm-inline d-xl-block px-1 fw-bolder">International Recipes
                                    </span></a>
                        <!-- Signup & Login -->
                    <li class="nav-item text-center" id="search-btn">
                            <a style="color:white;" href="search.php" class="nav-link" data-toggle="modal" data-target="search.php"><span
                                    class="fa fa-user"></span><span
                                    class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Search Recipes
                                    </span></a>
                        <li class="nav-item text-center" id="signup-btn">
                            <a style="color:white;" href="signup.php" class="nav-link" data-toggle="modal" data-target="signup.php"><span
                                    class="fa fa-user"></span><span
                                    class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Sign
                                    Up</span></a>
                        </li>
                        <li class="nav-item text-center" id="login-btn">
                            <a style="color:white;" href="login.php" class="nav-link" data-toggle="modal" data-target="#"><span
                                    class="fa fa-sign-in"></span><span
                                    class="d-none d-sm-inline d-xl-block px-1 fw-bolder">Log In</span></a>
                        </li>
                </div>
            </nav>
        </ul>
    </div>
</div>

</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3" >Here is your recipe!</h1>
                    <div class="form-group">
                        <label style="color:white;">Recipe Name</label>
                        <p><b><?php echo $row["rec_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Country</label>
                        <p><b><?php echo $row["rec_country"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Difficulty</label>
                        <p><b><?php echo $row["rec_difficulty"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Preparation Time </label>
                        <p><b><?php echo $row["rec_prep_time"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Description</label>
                        <p><b><?php echo $row["rec_desc"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Ingredients </label>
                        <p><b><?php echo $row["rec_ing"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Recipe Preparation Instructions</label>
                        <p><b><?php echo $row["rec_prep"]; ?></b></p>
                    </div>
                    <p><a href="international.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>