<?php
session_start();
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $recipe_name = $_POST['RecipeName'];
    $recipe_description = $_POST['Description'];
    $recipe_ingredients = $_POST['Ingredients'];
    $recipe_category = $_POST['Category'];
    $recipe_tag=$_POST['Tag'];
    $Instructions = $_POST['Instructions'];
    $uid=$_SESSION['sno'];
    $sql = "INSERT INTO `recipe` (`name`,`description`,`ingredients`,`category`,`tag`,`instruction`,`id`) VALUES ('$recipe_name','$recipe_description','$recipe_ingredients','$recipe_category', ' $recipe_tag','$Instructions', '$uid')";
    $result = mysqli_query($conn, $sql);        
    if($result){
        $showAlert = true;
        header("Location: /recyippee/index.php");
        exit();
    }
}
?>
