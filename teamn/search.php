

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

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search recipes by name</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Enter recipe name">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Recipe Name</th>
                                    <th>Recipe Country</th>
                                    <th>Recipe Difficulty</th>
                                    <th>Recipe Preparation Time (in minutes)</th>
                                    <th>Recipe Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
// Include config file
require_once "config.php";

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM recipes WHERE rec_name LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['rec_name']; ?></td>
                                                    <td><?= $items['rec_country']; ?></td>
                                                    <td><?= $items['rec_difficulty']; ?></td>
                                                    <td><?= $items['rec_prep_time']; ?></td>
                                                    <td><?= $items['rec_desc']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Recipes Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
