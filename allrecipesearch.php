<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recyippee</title>
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
    <link href="index.css" rel="stylesheet">
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    
    <?php include 'partials/_header.php';?>
    
    <main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="100%" src="images/slide-1.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="true"></img>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Showcase your recipe.</h1>
            <p>Share your creativity with the world.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Add Recipe</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img" width="100%" height="100%" src="images/slide-2.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="true"></img>

        <div class="container">
          <div class="carousel-caption">
          <h1>Showcase your recipe.</h1>
            <p>Share your creativity with the world.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Add Recipe</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img" width="100%" height="100%" src="images/slide-3.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="true"></img>

        <div class="container">
          <div class="carousel-caption text-end">
           <h1>Showcase your recipe.</h1>
            <p>Share your creativity with the world.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Add Recipe</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




  <div class="container marketing">
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">All delicious Recipe</h2>
        <form class="d-flex my-4" role="search" method="get" action="recipesearch.php">
                     <input class="form-control me-2" type="search" id="search" class="search" name="search" placeholder="Search Recipe" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
        <div class="row my-4">
          <?php 
         $sql = "SELECT * FROM `recipe`"; 
         $result = mysqli_query($conn, $sql);
         $num=0;
         while($row = mysqli_fetch_assoc($result)){
           $id = $row['sno'];
           $cat = $row['name'];
           $desc = $row['description'];
           $num=$num+1;
           if ($num<=3) {
            # code...
            echo '<div class="col-md-4 my-2">
            <div class="card" style="width: 18rem; height:25rem;">
            <img src="images/card-1.jpg" class="card-img-top" style="height: 214px;"alt="image for this category">
            <div class="card-body">
            <h5 class="card-title"><a href="viewrecipe2.php?recipeid=' . $id . '">' . $cat . '</a></h5>
            <p class="card-text">' . substr($desc, 0, 90). '... </p>
           <a href="'.$id.'.php" class="btn btn-primary">Learn more</a>
           </div>
           </div>
           </div>';
          }
          } 
          ?>
        </div>
    </div>

  </div><!-- /.container -->


  <!-- FOOTER -->
</main>
<?php include 'partials/_footer.php';?>


    <script src="css/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

</body>
</html>