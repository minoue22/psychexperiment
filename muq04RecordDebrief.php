
<?php
session_start();

include('header.php');
include('commonSrc.php');
include('../shareCode/mysqlLink.php');

$gender = $age= $email = $comment = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  if ( isset($_POST['email']))
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

	if(isset($_POST['comment']))
		$comment = strip_tags($_POST['comment'], FILTER_SANITIZE_STRING);


$sql = "UPDATE muq SET gender= '' WHERE muqID";
$sql = "UPDATE muq SET age = '' WHERE muqID";
$sql = "UPDATE muq SET  email = '' WHERE muqID";
$sql = "UPDATE muq SET  comment = '' WHERE muqID";

$link = connectDB();
  @mysqli_query( $link, $sql);
  $_SESSION['currID'] = @mysqli_insert_id($link);
  @mysql_close($link);
  echo $thankyou;
}


  ?>

