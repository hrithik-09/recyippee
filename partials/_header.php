<?php
session_start();
$uid="";
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $uid=$_SESSION['sno'];
}
echo'

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
<div class="container-fluid">
<a class="navbar-brand" href="#" style="font-family: "Roboto", sans-serif;"><strong>Recyippee</strong></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link text-light" href="index.php">Home <span class="sr-only"></span></a>
</li>
<li class="nav-item">
<a class="nav-link text-light" href="add.php">All Recipe</a>
</li>
<li class="nav-item">
<a class="nav-link text-light" href="about.php">About</a>
</li>

<li class="nav-item">
<a class="nav-link text-light" href="contact.php">Contact Us</a>
        </li>
        </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo'
                <a href="user.php" class="btn btn-outline-light me-4">'.$_SESSION['useremail'].'</a>';
                echo '<a href="/recyippee/addrecipe.php" class="btn btn-outline-light me-4" data-bs-toggle="modal" data-bs-target="#recipeModal">Add Recipe</a>';
                echo'
                <a href="partials/_logout.php" class="btn btn-outline-light">Logout</a>';
              }
              else{
                echo'
                <button class="btn btn-outline-light ms-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-light mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
        }
        echo'
        </div>
        </div>
        </nav>
        
        ';
        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
                echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Success!</strong> You can now login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div>';
              }
              else if (isset($_GET['signupsuccess'])){
                echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> '.$_GET['error'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div> ';
              }
              if(isset($_GET['loginsuccess'])){
                echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> '.$_GET['error'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div> ';
              }
              if(isset($_GET['addrecipewlgn'])){
                echo ' <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> Only logged in Chef can proceed to add recipe page.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                </div> ';
              }
        include 'partials/_loginModal.php';
        include 'partials/_recipeModal.php';
        include 'partials/_signupModal.php';
        ?>