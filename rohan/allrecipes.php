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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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

    <style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
        }
        /* .wrapper{display:flex; justify-content:center; font-family: 'Short Stack', cursive} */
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="clearfix">
                        <h2>International Recipes</h2>
                        <a href="recipeadd.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Recipe</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM recipes";
                    if($result = mysqli_query($connection, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Recipe Name</th>";
                                        echo "<th>Recipe Country</th>";
                                        echo "<th>Recipe Difficulty</th>";
                                        echo "<th>Recipe Preparation Time</th>";
                                        echo "<th>Recipe Description</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['rec_name'] . "</td>";
                                        echo "<td>" . $row['rec_country'] . "</td>";
                                        echo "<td>" . $row['rec_difficulty'] . "</td>";
                                        echo "<td>" . $row['rec_prep_time'] . "</td>";
                                        echo "<td>" . $row['rec_desc'] . "</td>";
                                        echo "<td>";
                                        echo '<a style="color:black;" href="recipeview.php?rec_name='. $row['rec_name'] .'" class="mr-3" title="View Recipe"><span>View Recipe</span></a>';
                                        // echo '<a style="color:black;" href="recipeupdate.php?rec_name='. $row['rec_name'] .'" class="mr-3" title="Update Recipe"><span>Update </span></a>';
                                        // echo '<a style="color:black;" href="recipedelete.php?rec_name='. $row['rec_name'] .'" title="Delete Recipe"><span>Delete</span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($connection);
                    ?>
                </div>
            </div>        
        </div>
    </div>



           <!-- Bootstrap Javascript and Jquery Bundle -->
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
        
</body>

</html>
