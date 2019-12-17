<?php  require_once("include/DB.php");  ?>

<?php  require_once("include/function.php"); ?>
<?php  require_once("include/session.php"); ?>


<?php
if(isset($_POST["Submit"])){
$Category  = $_POST["CategoryTitle"];
$Admin="jazeb";
$dateTime="";
if(empty($Category )){
$_SESSION["ErrorMessage"] = "All Field Must Be Filled Out";
	Redirect_to("category.php");
	
}elseif(strlen($Category )<3){

$_SESSION["ErrorMessage"] = "Category title should be greater than 2 charaters";
Redirect_to("category.php");

}elseif(strlen($Category)>49){

$_SESSION["ErrorMessage"] = "Category title should be greater than 50 charaters";
Redirect_to("category.php");

}else{
  $ConnectingDB;
  
$sql = "INSERT INTO category(title,author,datetime)";
$sql .= "VALUES(:catagoryName,:adminName,:dataTime)";
$stmt = $ConnectingDB->prepare($sql);
$stmt->bindValue(':catagoryName',$Category);
$stmt->bindValue(':adminName',$Admin);
$stmt->bindValue(':dataTime',$dateTime);
$Execute=$stmt->execute();

if($Execute){

$_SESSION["SuccessMessage"] = "Category with id:".$ConnectingDB->lastInsertId(). "Added Successfull";
Redirect_to("category.php");

}else{

$_SESSION["SuccessMessage"] = "Something went wrong .Try Again !";

Redirect_to("category.php");

}


}



}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/Style.css">
    <title>Categories</title>
</head>
<body>

	<!-- NAVBAR -->
  <div style="height:10px; background:#27aae1;"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand"> JAZEBAKRAM.COM</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i> My Profile</a>
        </li>
        <li class="nav-item">
          <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="Posts.php" class="nav-link">Posts</a>
        </li>
        <li class="nav-item">
          <a href="Categories.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
          <a href="Admins.php" class="nav-link">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a href="Comments.php" class="nav-link">Comments</a>
        </li>
        <li class="nav-item">
          <a href="Blog.php?page=1" class="nav-link" target="_blank">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="Logout.php" class="nav-link text-danger">
          <i class="fas fa-user-times"></i> Logout</a></li>
      </ul>
      </div>
    </div>
  </nav>
    <div style="height:10px; background:#27aae1;"></div>
    <!-- NAVBAR END -->
    <!-- HEADER -->
    <header class="bg-dark text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Manage Categories</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->


    <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10"  style="min-height:400px;">

<?php 

echo ErrorMessage();
echo SuccessMessage();

  ?>
<form class="" action="category.php" method="POST">
        <div class="card ">
          <div class="card-header bg-secondary text-light mb-3 ">
            <h1>Add New Category</h1>
  </div>

<div class="card-body bg-dark" >
<div class="form-group">	
<label for="title"><span class="fieldinfo"> Categroy Title:  </span> </label>

 <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here" value="">
            </div>
          
<div class="row" >
<div class="col-lg-6 mb-2 ">                  <!--btn-lg, btn-sm,btn-block for button -->
<a href="Dashboard" class=" btn btn-warning btn-block" > <i class="  fas fa-arrow-left"></i>Back To Dashboard </a>
</div>
<div class="col-lg-6 mb-2b ">                 
<button type="submit"  name="Submit" class="btn btn-success btn-block">
<i class="  fas fa-check"></i>Publish  </a>
</button>
</div>
      </div>
</div>
</section>


   <!-- End Main Area -->
    <!-- FOOTER -->
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <p class="lead text-center">Theme By | Adijat Buhari | <span id="year"></span> &copy; ----All right Reserved.</p>
          <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href="">  <br>>
           </div>
         </div>
      </div>
    </footer>
        <div style="height:10px; background:#27aae1;"></div>
    <!-- FOOTER END-->

  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
