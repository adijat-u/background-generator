<?php 

session_start();

function ErrorMessage(){

if(isset($_SESSION["ErrorMessage"])){

$Output = "<div class=\"alert  alert-danger\">";
$Output .= htmlentities($_SESSION["ErrorMessage"]);
$Output  .= "</div>";
//clear the error msg not to show all the time
$_SESSION["ErrorMessage"] = null;
return $Output;

}

}

//for sucess  msg
function SuccessMessage(){

if(isset($_SESSION["SuccessMessage"])){

$Output = "<div class=\"alert  alert-success\">";
$Output .= htmlentities($_SESSION["SuccessMessage"]);
$Output .= "</div>";
//clear the error msg not to show all the time
$_SESSION["SuccessMessage"] = null;
return $Output;

}

}
 ?>