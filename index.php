<!DOCTYPE html>
<?php 
session_start(); 
$_SESSION['pagename'] = "phpform_index";
include 'db/db.php';
//include 'db/error.php'; 
//include '../db/pushhits.php';
?> 
<title> Comments </title>
<link rel="shortcut icon" href="/https/html/IMG/favicon.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=10">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Lobster|Palanquin:700" rel="stylesheet">
<style>
body {
margin: 0; padding: 0;
font-size: 40px;
background-color: #ffffff;
color:#996633;
font-family:"Arial","sans-serif";color:#700070;font-size:14px;}
pre{margin: 0; padding: 0;font-family:"Arial","sans-serif";color:#000000;font-size:14px;}


#content{
font-family: Arial, Helvetica, sans-serif;
font-size: 25px;
color: #7F7F7F;
background-color:white;	
position:absolute;
right:100px;
left:100px;
top:200px;
}

</style>



<body>
	<div class="w3-top">
<nav class="navbar navbar-default" style="font-family: 'Palanquin', sans-serif;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
         <a class="navbar-brand" href="/index.html">Hi I'm Keegan.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
          <li><a href="/index.html#About Me">about me</a></li>
          <li><a href="/index.html#Portfolio">portfolio</a></li>   
          	<li><a href="/https">https</a></li>
           <li><a href="/html">html</a></li> 
          <li><a href="/index.html#Let's get in touch">let's get in touch</a></li>
      </ul>
    </div>
  </div>
</nav>


</div>

<div id = "content">




<?php  
if(empty($_POST['name'])){  $name_input = "Name";  } 
	else {	$name_input = 	$_POST['name'];	}
	
if(empty($_POST['comment'])){  $comment_input = "Comment";  } 
	else {	$comment_input = 	$_POST['comment'];	}

?>


<P><Center><font color="#7E7E7E" size="20">Leave a Comment</font></Center></P>
<div id = "comment-box"></div>
<form  method="post">
<br>
<center>
&nbsp;	NAME <input type="text" name="name" maxlength="20"> 
<br>
<br>

&nbsp;  COMMENT <input type="text" name="comment" maxlength="64"> 

<button type="submit">Submit</button>
</form>
<br>
<br>
<a href = "select.php" target = "_blank">comment logs</a>
</div>
</center>

<?php

if ( $name_input != "Name" ){
//sql input	*******************************	


if (!($connection = mysqli_connect($hostname,$username, $password))) die("Could not connect to database");
 mysqli_select_db( $connection,"stream");



	#$result = mysqli_query( $conn,$sql) or die('Could not look up user information; ' . mysqli_error($conn));
	$result = mysqli_query ( $connection, "SELECT CURDATE();");
	$row = mysqli_fetch_row($result);$date = $row[0];
   
	$result = mysqli_query ($connection,"SELECT CURTIME();" );
	$row = mysqli_fetch_row($result);$time = $row[0];

	$str0 = '';
	$str1 = $_SERVER['REMOTE_ADDR'];
	$str2 = $time;
	$str3 = $date;
	$str4 = $name_input;  
	$str5 =  $comment_input;
//echo " $str1 : $date : $time <br>"; 
$query = "INSERT INTO stream.contact (`id`, `ip`, `time`, `date`, `name`, `comment`) VALUES ('' ,'$str1','$str2','$str3','$str4','$str5');";

 #$result = mysqli_query ($connection,$query)  or showerror();	
 $result = mysqli_query ($connection,$query);		
	mysqli_close($connection);
} // end if  $name_input != "Name"


// ******************************************

//<?php
//require("constants.php");

// 1. Create a database connection
//$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
//if (!$connection) {
//    die("Database connection failed: " . mysqli_error());


// 2. Select a database to use 
//$db_select = mysqli_select_db($connection, DB_NAME);
//if (!$db_select) {
//    die("Database selection failed: " . mysqli_error());
//}
//


// *******************************************		

?>
</div>
</body>
</html>
