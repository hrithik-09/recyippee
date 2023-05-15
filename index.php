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


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">Some delicious Recipe</h2>
        <div class="row my-4">
          <?php 
         $sql = "SELECT * FROM `recipe`"; 
         $result = mysqli_query($conn, $sql);
        //  $num=0;
         while($row = mysqli_fetch_assoc($result)){
           $id = $row['sno'];
           $cat = $row['name'];
           $desc = $row['description'];
          //  $num=$num+1;
          //  if ($id<=3) {
            # code...
            echo '<div class="col-md-4 my-2">
            <div class="card" style="width: 18rem; height:25rem;">
            <img src="images/card-1.jpg" class="card-img-top" style="height: 214px;"alt="image for this category">
            <div class="card-body">
            <h5 class="card-title"><a href="'.$id.'.php">' . $cat . '</a></h5>
            <p class="card-text">' . substr($desc, 0, 90). '... </p>
           <a href="'.$id.'.php" class="btn btn-primary">Learn more</a>
           </div>
           </div>
           </div>';
          // }
          } 
          ?>
        </div>
    </div>


    

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">Increase the flavor. <span class="text-muted">It’ll blow your mind.</span></h2>
        <!-- <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p> -->
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="images/card-1.jpg" width="500" height="500"  role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">Try it once.</span></h2>
        <!-- <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p> -->
      </div>
      <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="images/card-1.jpg" width="500" height="500"  role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <!-- <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p> -->
      </div>
      <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="images/card-1.jpg" width="500" height="500"  role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

      </div>
    </div>

    <hr class="featurette-divider">


  </div><!-- /.container -->


  <!-- FOOTER -->
</main>
<?php include 'partials/_footer.php';?>


    <script src="css/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

</body>
</html>