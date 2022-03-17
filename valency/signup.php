<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$first_name = $last_name = $username  = $email = $password = $phone =  $confirm_password = "";
$first_name_err = $last_name_err = $username_err = $email_err = $password_err = $phone_err =  $confirm_password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate firstname
    if(empty(trim($_POST["first_name"]))){
        $first_name_err = "Please enter your first name.";
    } elseif(!preg_match('/^[a-zA-Z_]+$/', trim($_POST["first_name"]))){
        $first_name_err = "Firstname can only contain letters.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE first_name = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_firstname);
            
            // Set parameters
            $param_firstname = trim($_POST["first_name"]);
            
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            $first_name = trim($_POST["first_name"]);
            }
                // Close statement
        mysqli_stmt_close($stmt);
    }
}

    // Validate lastname
    if(empty(trim($_POST["last_name"]))){
        $last_name_err = "Please enter your first name.";
    } elseif(!preg_match('/^[a-zA-Z_]+$/', trim($_POST["last_name"]))){
        $last_name_err = "Username can only contain letters, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE last_name = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_lastname);
            
            // Set parameters
            $param_firstname = trim($_POST["last_name"]);
            
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            $last_name = trim($_POST["last_name"]);
            }
                // Close statement
        mysqli_stmt_close($stmt);
    }
}

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email id.";
    } elseif(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', trim($_POST["email"]))){
        $email_err = "Please enter a valid email id";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_firstname = trim($_POST["email"]);
            
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            $email = trim($_POST["email"]);
            }
                // Close statement
        mysqli_stmt_close($stmt);
    }
}

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number.";
    } elseif(!preg_match('/^[0-9_]+$/', trim($_POST["phone"]))){
        $phone_err = "Phone number can only contain numbers.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE phone = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);
            
            // Set parameters
            $param_firstname = trim($_POST["phone"]);
            
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            $phone = trim($_POST["phone"]);
            }
                // Close statement
        mysqli_stmt_close($stmt);
    }
}

    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($last_name_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, username, email, password, phone) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_firstname, $param_lastname, $param_username, $param_email, $param_password, $phone);
            
            // Set parameters
            $param_firstname = $first_name;
            $param_lastname = $last_name;
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_phone = $phone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
                // echo "Data sent";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
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
    <!-- Additional CSS -->
    <link rel="stylesheet" href="styles/page.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@700&family=Short+Stack&display=swap"
        rel="stylesheet">
        <style>
          /* .wrapper{ width: 400px; height:100px; padding: 20px; justify-content: center; } */
          .wrapper{display:flex; justify-content:center; font-family: 'Short Stack', cursive}
    
    </style>
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

    <h3>Sign Up</h3>
        <h5>Please fill this form to create an account.</h5>
    <div class="wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label style="color:white;" >First Name</label>
                <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
            </div>  
            <div class="form-group">
                <label style="color:white;" >Last Name</label>
                <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
            </div>  
            <div class="form-group">
                <label style="color:white;" >Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color:white;" >Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group">
                <label style="color:white;" >Phone Number</label>
                <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>  
            <div class="form-group">
                <label style="color:white;" >Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label style="color:white;" >Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-primary ml-2" value="Reset">
            </div>
            <p style="color:white;" >Already have an account? <a style="color:white;" href="login.php">Login here</a>.</p>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>
</html>