<?php 
include_once("config.php");
session_start();
if(!isset($_SESSION['username'])){
   header("Location:login.php");
}
$username = $_SESSION['username'];
if(isset($_POST['upload'])){
	$_FILES['file']['name'] = $_POST['file_name'];
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
  $file_tem_loc = $_FILES['file']['tmp_name'];
  if($file_type == 'video/mp4'){
    $file_store = "uploads/videos/".$file_name;
  }elseif($file_type == 'application/pdf'){
    $file_store = "uploads/pdfs/".$file_name;
  }else{
    $file_store = "uploads/images/".$file_name;
  }
	
	if($file_type == 'video/mp4' or $file_type == 'application/pdf' or $file_type == 'image/jpeg'){
		move_uploaded_file($file_tem_loc, $file_store);
		$sql = "insert into files values('$file_name', '$username', '$file_type')";
		if($mysqli->query($sql)){
			echo '<div class="alert alert-success alert-dismissible fade in" style="text-align:center;">
					<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> File Uploaded Successfully.
				  </div>';
		}
				elseif(($mysqli->error) == "Duplicate entry '$file_name' for key 'PRIMARY'"){
				echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> File name already taken!
				  </div>';
			}
	}
	else{
    echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> Unsupported file type! <br>
					Only mp4 videos, PDFs and jpeg images can be uploaded.</div>';
	}
}
if(isset($_POST['delete'])){
	$fileD = $_POST['fileDel'];
	$rows=$mysqli->query("select uploaded_by,name,type from files");
	while(list($user,$name,$type)=$rows->fetch_row()){
              if($user == $_SESSION['username']){
                if($type == 'video/mp4'){ 
					if($name==$fileD){
					 $sql = "delete from files where name='$name'";
                      $mysqli->query($sql); 
					  unlink("uploads/videos/".$name);
					  echo '<div class="alert alert-success alert-dismissible fade in" style="text-align:center;">
					<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> File Deleted Successfully.
				  </div>';
					}
				}
				else if($type == 'application/pdf'){ 
					if($name==$fileD){
					 $sql = "delete from files where name='$name'";
                      $mysqli->query($sql); 
					  unlink("uploads/pdfs/".$name);
					  echo '<div class="alert alert-success alert-dismissible fade in" style="text-align:center;">
					<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> File Deleted Successfully.
				  </div>';
					}
				}
				else if($type == 'image/jpeg'){ 
					if($name==$fileD){
					 $sql = "delete from files where name='$name'";
                      $mysqli->query($sql); 
					  unlink("uploads/images/".$name);
					  echo '<div class="alert alert-success alert-dismissible fade in" style="text-align:center;">
					<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> File Deleted Successfully.
				  </div>';
					}
				}
			}
	}
}
?>
<html>
<head>
  <title>Account</title>
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
<br><br><br>
<div class="container-fluid text-center">    
	<div class="well">
		<p style="font-size:20px; text-align: center"><b>Username : </b><?php echo"".$username;?></p>
		Upload mp4 video file/PDF/jpeg image so that others can learn as well.
	</div>
	  <a href="#demo" class="btn btn-danger" data-toggle="collapse">Upload file</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="#demo2" class="btn btn-danger" data-toggle="collapse">Delete file</a>
			<div id="demo" class="collapse upload">
			<form action="account.php" method="post" enctype="multipart/form-data">
                <font color="black">ENTER FILE NAME:</font> <input type="text" name="file_name" placeholder="Enter File Name *" required><br>
				<input type="file" name="file" required><br>
				<input type="submit" name="upload" value="Upload" >
			</form>	  
	</div>
            <div id="demo2" class="collapse">
			<form method="post" action="account.php" class="upload">	
				<select name="fileDel">
				<?php
				$rows=$mysqli->query("select uploaded_by,name,type from files");
				while(list($users,$names,$types)=$rows->fetch_row()){
					if($users == $_SESSION['username']){
					?>
					<option value="<?php echo $names?>"><?php echo $names?></option>
				<?php
					}
				}
				?>
				</select>
				<input type="submit" name="delete" value="Delete">
			</form>    
	
    </div>

</div>
    

<footer class="container-fluid text-center">
    <h5><font color="BLACK"><b>WELCOME KNOWLEDGE SEEKERS</b></font></h5>
</footer>

</body>
</html>
