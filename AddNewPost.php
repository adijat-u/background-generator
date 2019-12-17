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
    <link rel="stylesheet" href="Css/Styles.css">
    <title>Categories</title>
</head><!DOCTYPE html>
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
      <a href="#" class="navbar-brand"> Adijatbuhari.COM</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"> <i class="fas fa-user text-success"></i>  your sProfile</a>
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
          <h1><i class="fas fa-edit" style="color:#27aae1;"></i> Add New Post</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->


    <!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10"  style= "min-height:400px;">

      <form class=""  action="AddNewPost.php" method="POST"  enctype="multipart/form-data">
       <div class="card bg-secondary text-light  mb-3">
         <div class="card-body bg-dark">
          <div class="form-group">
            <label for="Categorytitle" > <span class="FieldInfo"> Post Title </span></label>
<input  class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
          </div>
<div class="form-group">
              <label for="CategoryTitle"> <span class="FieldInfo"> Chose Categroy </span></label>
               <select class="form-control" id="CategoryTitle"  name="Category">
                    //<option >1</option>

       </div> 






      </form>










<?php 

echo ErrorMessage();
echo SuccessMessage();

  ?>
<form class="" action="category.php" method="POST">
        <div class="card ">
         

<div class="card-body bg-dark" >
<div class="form-group">	
<label for="title"><span class="fieldinfo"> Post Title:  </span> </label>

 <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
            </div>
 <div class="form-group">	
<label for="title"><span class="fieldinfo"> Chose Category :  </span> </label>
<select class="form-control"  id="CategoryTitle" name="Category">
  <option value=""> 1</option>
  <option value=""> 2</option>
  <option value=""> 3</option>

</select>
            </div>
<div class="form-group  mb-1">
   <div class="custom-file">
   <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
    <label for="imageSelect" class="custom-file-label">Select Image </label>
              </div>
    <div class="form-group">
  <label for="Post"> <span class="fieldinfo">Post:</span></label>
  <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
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
          <div class="col">
          <p class="lead text-center">Theme By | Adijat Buhari | <span id="year"></span> &copy; ----All right Reserved.</p>
          <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" href="">  <br>>
           </div>
         </div>
      </div>
    </footer>
        <div style="height:10px; background:#27aae1;"></div>
    <!-- FOOTER END-->

  
  

</body>
</html>
