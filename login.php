<?php 
include_once("config.php");
session_start();
if(isset($_SESSION['username'])){
   header("Location:index.php");
}

if(isset($_POST['commit'])){
		$username = $_POST['username'];
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = $_POST['password'];
		$password = mysqli_real_escape_string($mysqli, $password);
		$sql = "SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			header("Location:index.php");
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Invalid username or password!
				  </div>';
		}
	}		
?>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    <font color="white"><h1>LEARNER'S PARADISE</h1>      
        <p>A Shared e-Learning Platform</p></font>
  </div>
<br><br><br><br><br>

<div class="container">    
	<form action="login.php" method="post">
         <div class="headi">
	  <div class="form-group">
          <label for="email"><font color="white">Username :</font></label>
		<input type="text" name="username" class="form-control" id="email">
	  </div>
       
	  <div class="form-group">
          <label for="pwd"><font color="white">Password:</font></label>
		<input type="password" name="password" class="form-control" id="pwd">
	  </div>
	  <button type="submit" class="btn btn-primary" name="commit">Log In</button>
	  <input type="button" class="btn btn-primary" onclick="window.location.href = 'signup.php';" value="Sign Up">
        </div>
    </form>
</div>


<footer class="container-fluid text-center">
    <p><font color="BLACK"><b>WELCOME KNOWLEDGE SEEKERS</b></font></p>
</footer>

</body>
</html>
