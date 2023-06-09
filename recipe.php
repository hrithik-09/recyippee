<?php
session_start();
include_once 'partials/_dbconnect.php';
if (!isset($_SESSION['sno'])) {
    header("Location: index.php");
}
$usersession = $_SESSION['sno'];
$res = mysqli_query($conn, "SELECT * FROM `users` WHERE id ='$usersession'");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<?php

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql2 = "DELETE FROM `recipe` WHERE sno = '$sno'";
    $results = mysqli_query($conn, $sql2);
    header('Location: recipe.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Welcome  <?php echo $userRow['FirstName']; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="recipe.php">Welcome
            <?php echo $userRow['FirstName']; ?>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Home
                            </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="user.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="recipe.php">
                                <span data-feather="coffee" class="align-text-bottom"></span>
                                Manage Recipe
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-uppercase">
                        <span>More options</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle" class="align-text-bottom"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="partials/_logout.php">
                                <span data-feather="log-out"></span>
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Your Recipe</h1>
                </div>

                <h2 class="my-4">View / Delete Recipe</h2>
                <div class="col-md-12 col-sm-9  user-wrapper">
                    <div class="description">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="container my-4" id="ques">
                                    
                                    <div class="row my-4">
                                        <?php
                                        $sql = "SELECT * FROM `recipe` WHERE id ='$usersession'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['sno'];
                                            $name = $row['name'];
                                            $cat = $row['category'];
                                            $tag = $row['tag'];
                                            echo '<div class="col-md-4 my-2">
                                                    <div class="card" style="width: 20rem; height:auto;">
                                                          <div class="card-body">
                                                            <h5 class="card-title"><strong>Recipe:</strong><br>' . $name . '</h5>
                                                            <img src="images/card-1.jpg" class="card-img-top mb-3" style="height: 214px;"alt="image for this category">
                                                            <h6 class="card-title"><strong>Category:</strong> ' . $cat . '</h6>
                                                            <h6 class="card-title"><strong>Tag:</strong> ' . $tag . '</h6>
                                                            <p class="text-muted">Time: '.$row['timestamp'].'</p>
                                                            <a href="viewrecipe.php?recipeid=' . $id . '" class="btn btn-primary mt-4">View Details</a>
                                                            <a href="recipe.php?delete=' . $id . '"id="d' . $id . '" class="delete mt-4 btn btn-sm btn-danger">Delete</a>
                                                          </div>
                                                    </div>
                                                  </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </main>
        </div>

    </div>
    <!-- Bootstrap Core JavaScript -->

    <script src="feather.min.js"></script>
    <script src="css/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
    </script>
</body>

</html>