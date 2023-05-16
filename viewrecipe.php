<!doctype html>
<html lang="en">
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
  
session_start();
// include_once '../connection/server.php';
include_once 'partials/_dbconnect.php';
if (!isset($_SESSION['sno'])) {
  header("Location: index.php");
}
$recid = $_GET['recipeid'];
$res = mysqli_query($conn, "SELECT * FROM users WHERE id=" . $_SESSION['sno']);
$res2 = mysqli_query($conn, "SELECT * FROM recipe WHERE sno=" . $recid);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
$userRow2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);

?>
<?php
if (isset($_POST['submit'])) {
	//variables
	$Name = $_POST['RecipeName'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	$tag = $_POST['tag'];
	$instructions = $_POST['instructions'];
	$res = mysqli_query($conn, "UPDATE recipe SET name='$Name', description='$description', category='$category', tag='$tag', instruction='$instructions' WHERE sno=" .$recid);
	// $userRow=mysqli_fetch_array($res);
	// header('Location: view.php');
}
?>
<?php
$Veg = "";
$Non_veg = "";
if ($userRow2['category'] == 'Veg') {
	$Veg = "checked";
} elseif ($userRow2['instructions'] == 'Non-Veg') {
	$Non_veg = "checked";

}?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Recipe</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="features.css" rel="stylesheet">
</head>

<body>
  <?php include 'partials/_header.php'; ?>
  <main>
    <div class="container px-4 pt-5" id="custom-cards">
      <h2 class="pb-2 border-bottom">Your exquisite Cuisine</h2>

      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('card-1.jpg');">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
              <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"><?php echo $userRow2['name']?></h3>
              <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                  <?php if ($Veg=="checked") {
                    echo '<img src="green-circle-icon.svg" alt="Veg" style="background-color: white;" width="32" height="32" class="rounded-circle border border-white">';
                  }
                  else {
                    echo '<img src="red-circle-icon.svg" alt="Non-Veg" style="background-color: white;" width="32" height="32" class="rounded-circle border border-white">';
                    
                  }
                  ?>
                </li>
              </ul>
            </div>
          </div>
        </div>


      </div>
    </div>
    <div class="container px-4 pt-5" id="icon-grid">
      <div class="col d-flex align-items-start">
        <img src="recipe-book-icon.svg" width="25px" class="mt-1 mx-2">
        </img>
        <div>

          <h2 class="pb-2 border-bottom">Ingredients Required</h2>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-1 g-4 py-5">

        <div class="col d-flex align-items-start">
          <div>
            <h3 class="fw-bold mb-0 fs-4">
              <?php
              echo $userRow2['ingredients']
              ?>
            </h3>
          </div>
        </div>

      </div>
    </div>
    <div class="container px-4 pt-5" id="icon-grid">
      <div class="col d-flex align-items-start">
        <img src="file-text.svg" width="25px" class="mt-2 mx-2">
        </img>
        <div>
          <h2 class="pb-2 border-bottom"> Instruction</h2>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-1 g-4 py-5">

        <div class="col d-flex align-items-start">
          <div>
            <h3 class="fw-bold mb-0 fs-4">
              <?php
              echo $userRow2['instruction'];
              ?>
            </h3>
          </div>
        </div>

      </div>
    </div>



    <div class="container px-4 pb-5">
      <h2 class="pb-2 border-bottom">Know more about the dish</h2>

      <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
        <div class="d-flex flex-column align-items-start gap-2">
          <h3 class="fw-bold">Description</h3>
          <p class="text-muted"><?php echo $userRow2['description'] ?></p>
          <a href="" data-bs-toggle="modal" data-bs-target="#recipeModal2" class="btn btn-primary btn-lg">Edit Dish</a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 g-4">
          <div class="d-flex flex-column gap-2">
            <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
              <img class="bi" src="hash.svg" width="20px" height="20px">

              </img>
            </div>
            <h4 class="fw-semibold mb-0"><?php echo $userRow2['tag'] ?></h4>
          </div>

          <div class="d-flex flex-column gap-2">
            <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
              <img src="clock.svg" width="20px" height="20px" alt="">
            </div>
            <h4 class="fw-semibold mb-0"><?php echo $userRow2['timestamp'] ?></h4>
          </div>

        </div>
      </div>
    </div>
  </main>
  <div class="modal fade" id="recipeModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">Update Dish</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<!-- form start -->
									<form action="<?php $_PHP_SELF ?>" method="post">
										<table class="table table-hover table-bordered">
											<tbody>
												
												<tr>
													<td>Recipe Name:</td>
													<td><input type="text" class="form-control" name="RecipeName" value="<?php echo $userRow2['name']; ?>" /></td>
												</tr>
												<tr>
													<td>Description</td>
													<td><input type="text" class="form-control" name="description" value="<?php echo $userRow2['description']; ?>" /></td>
												</tr>
												<tr>
													<td>Category:</td>
													<td>
														<div class="radio">
															<label><input type="radio" name="category" value="Veg" <?php echo $Veg; ?>>Veg</label>
														</div>
														<div class="radio">
															<label><input type="radio" name="category" value="Non-Veg" <?php echo $Non_veg; ?>>Non-Veg</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>Tag</td>
													<td><input type="text" class="form-control" name="tag" value="<?php echo $userRow2['tag']; ?>" /></td>
												</tr>
												<tr>
													<td>Instructions</td>
													<td><textarea class="form-control" name="instructions"><?php echo $userRow2['instruction']; ?></textarea></td>
												</tr>
											</tbody>
										</table>
										<input type="submit" name="submit" class="btn btn-success my-2 ms-2" value="Update Dish">
									</form>
								</div>
							</div>
						</div>
					</div>


  <script src="css/bootstrap.bundle.min.js"></script>

  <?php include 'partials/_footer.php'; ?>
</body>

</html>