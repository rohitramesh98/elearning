<?php
include_once("config.php");
session_start();
if(isset($_POST['submit'])){
 $username = $_POST['username']; 
 $username = mysqli_real_escape_string($mysqli, $username);
 $password = $_POST['password'];
 $password = mysqli_real_escape_string($mysqli, $password);	
 $cpass = $_POST['confirm_password'];
 $cpass = mysqli_real_escape_string($mysqli, $cpass);	
    if(empty($username) || empty($password) || empty($cpass)){
        echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Some fields are empty!
				  </div>';
    }
    else{
		if($password!=$cpass)
		{
			echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Passwords do not match!
				  </div>';
		}
		else{
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
			if($mysqli->query($sql)){
				echo "data inserted successfully...";
				echo "<script>window.location.href='index.php';</script>";
			}
			elseif(($mysqli->error) == "Duplicate entry '$username' for key 'PRIMARY'"){
				echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Username already taken!
				  </div>';
			}
			else{
				echo "Error....".$mysqli->error;
			}
		}
    }
}

?>
<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="icon" type="image/ico" href="favicon.ico" />
</head>
<body background="login.png">

  


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" ><img src="log.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav ">
          <li class="active"><a href="index.php"><font color="white">Home</font></a></li>
          <li><a href="videos.php"><font color="white">Videos</font></a></li>
          <li><a href="pdfs.php"><font color="white">PDFs</font></a></li>
          <li><a href="images.php"><font color="white">Images</font></a></li>
		     <li><a href="about.html"><font color="white">About</font></a></li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-user"></span><font color="white">YOUR ACCOUNT</font>
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="account.php"><span class="glyphicon glyphicon-user"></span>Your Account</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
		  </li>
          
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center headi">
    <font color="white"><h1>READER'S PARADISE</h1>      
        <p>Sign-up and learn for free</p></font>
  </div><br><br>
<div class="container clipp">    
	<form action="signup.php" method="post">
	  <div class="form-group col">
		<label for="email">Username:</label>
		<input name="username" type="text" class="form-control" id="email">
	  </div>
	  <div class="form-group col">
		<label for="pwd">Password:</label>
		<input name="password" type="password" class="form-control" id="pwd">
	  </div>
	  <div class="form-group col">
		<label for="pwd">Confirm Password:</label>
		<input name="confirm_password" type="password" class="form-control" id="pwd2">
	  </div>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</div>
<script>
	var password = document.getElementById("pwd")
		 , confirm_password = document.getElementById("pwd2");

	function validatePassword(){
		 if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

<footer class="container-fluid text-center">
  <p>Knowledge Seekers Platform</p>
</footer>

</body>
</html>
