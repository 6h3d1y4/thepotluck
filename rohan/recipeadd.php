<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$rec_name = $rec_country = $rec_difficulty = $rec_prep_time = $rec_added_by = $rec_desc = $rec_ing = $rec_prep = "";
$rec_name_err = $rec_country_err = $rec_difficulty_err = $rec_prep_time_err = $rec_added_by_err = $rec_desc_err = $rec_ing_err = $rec_prep_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate recipe name
    $input_name = trim($_POST["rec_name"]);
    if(empty($input_name)){
        $rec_name_err = "Please enter the recipe name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $rec_name_err = "Please enter a valid recipe name.";
    } else{
        $rec_name = $input_name;
    }
        // Validate recipe country name
        $input_country = trim($_POST["rec_country"]);
        if(empty($input_country)){
            $rec_country_err = "Please enter the country name.";
        } elseif(!filter_var($input_country, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $rec_country_err = "Please enter a valid country name.";
        } else{
            $rec_country = $input_country;
        }

    // Validate recipe difficulty
    $input_difficulty = trim($_POST["rec_difficulty"]);
    if(empty($input_difficulty)){
        $rec_difficulty_err = "Please enter the recipe difficulty.";
    } elseif(!filter_var($input_difficulty, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $rec_difficulty_err = "Please enter a valid recipe difficulty.";
    } else{
        $rec_difficulty = $input_difficulty;
    }

        // Validate recipe preparation time
        $input_prep_time = trim($_POST["rec_prep_time"]);
        if(empty($input_prep_time)){
            $rec_prep_time_err = "Please enter the recipe difficulty.";
        } elseif(!filter_var($input_prep_time, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9\s]+$/")))){
            $rec_prep_time_err = "Please enter a valid recipe difficulty.";
        } else{
            $rec_prep_time = $input_prep_time;
        }
    // Validate recipe difficulty
    $input_added_by = trim($_POST["rec_added_by"]);
    if(empty($input_added_by)){
        $rec_added_by_err = "Please enter the name of the person submitting the recipe.";
    } elseif(!filter_var($input_added_by, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $rec_added_by_err = "Please enter a valid name.";
    } else{
        $rec_added_by = $input_added_by;
    }

    // Validate recipe description
    $input_rec_desc = trim($_POST["rec_desc"]);
    if(empty($input_rec_desc)){
        $rec_desc_err = "Please enter a short recipe description.";     
    } else{
        $rec_desc = $input_rec_desc;
    }

  // Validate recipe ingredients
  $input_rec_ing = trim($_POST["rec_ing"]);
  if(empty($input_rec_ing)){
      $rec_ing_err = "Please enter ingredients list.";     
  } else{
      $rec_ing = $input_rec_ing;
  }

    // Validate recipe preparation instructions
    $input_rec_prep = trim($_POST["rec_prep"]);
    if(empty($input_rec_prep)){
        $rec_prep_err = "Please enter a short recipe description.";     
    } else{
        $rec_prep = $input_rec_prep;
    }

    // Check input errors before inserting in database
    if(empty($rec_name_err) && empty($rec_country_err) && empty($rec_difficulty_err) && empty($rec_prep_time_err) && empty($rec_added_by_err) && empty($rec_ing_err) && empty($rec_desc_err) && empty($rec_prep_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO recipes (rec_name, rec_country, rec_difficulty, rec_prep_time, rec_added_by, rec_desc, rec_ing, rec_prep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_rec_name ,$param_rec_country ,$param_rec_difficulty ,$param_rec_prep_time ,$param_rec_added_by ,$param_rec_desc, $param_rec_ing, $param_rec_prep);
            
            // Set parameters
            $param_rec_name = $rec_name;
            $param_rec_country = $rec_country;
            $param_rec_difficulty = $rec_difficulty;
            $param_rec_prep_time = $rec_prep_time;
            $param_rec_added_by = $rec_added_by;
            $param_rec_desc = $rec_desc;
            $param_rec_ing = $rec_ing;
            $param_rec_prep = $rec_prep;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: international.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
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
                                    <a style="color:white;" href="ingredients.php" class="nav-link" data-toggle="modal" data-target="ingredients.php"><span
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

    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h2 class="mt-5" style="color:white;">Create a new Recipe</h2>
                    <p style="color:white;">Please fill this form and submit to add a new recipe to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label style="color:white;">Recipe Name</label>
                            <input type="text" name="rec_name" class="form-control <?php echo (!empty($rec_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rec_name; ?>">
                            <span class="invalid-feedback"><?php echo $rec_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Country</label>
                            <input type="text" name="rec_country" class="form-control <?php echo (!empty($rec_country_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rec_country; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Difficulty</label>
                            <input type="text" name="rec_difficulty" class="form-control <?php echo (!empty($rec_difficulty_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rec_difficulty; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Preparation Time</label>
                            <input type="text" name="rec_prep_time" class="form-control <?php echo (!empty($rec_prep_time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rec_prep_time; ?>">
                            <span class="invalid-feedback"><?php echo $rec_prep_time_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Added By</label>
                            <input type="text" name="rec_added_by" class="form-control <?php echo (!empty($rec_added_by_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rec_added_by; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Description</label>
                            <textarea name="rec_desc" class="form-control <?php echo (!empty($rec_desc_err)) ? 'is-invalid' : ''; ?>"><?php echo $rec_desc; ?></textarea>
                            <span class="invalid-feedback"><?php echo $rec_desc_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Ingredients</label>
                            <textarea name="rec_ing" class="form-control <?php echo (!empty($rec_ing_err)) ? 'is-invalid' : ''; ?>"><?php echo $rec_ing; ?></textarea>
                            <span class="invalid-feedback"><?php echo $rec_ing_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="color:white;">Recipe Preparation Instructions</label>
                            <textarea name="rec_prep" class="form-control <?php echo (!empty($rec_prep_err)) ? 'is-invalid' : ''; ?>"><?php echo $rec_prep; ?></textarea>
                            <span class="invalid-feedback"><?php echo $rec_prep_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>