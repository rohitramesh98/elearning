<!--<?php 
	session_start();
	include_once("config.php"); 
	if(!isset($_SESSION['username'])){
   header("Location:login.php");
   }
?>-->

<html>
<head>
  <title>E-Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="icon" type="image/ico" href="favicon.ico" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
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
    
    <div class="w3-content col" style="max-width:700px; margin-left:450px">
        <div class="mySlides w3-container cli">
      <span style="font-family:ALGERIAN; padding:30px">
<i><font size="+8">WELCOME TO</font></i><br>
          <i><font size="+8">LEARNER'S PARADISE</font></i>
      </span> 
           
  </div>
        
  <div class="mySlides w3-container cli">
      <span style="padding:20px">
          <p><b><font size="+2">You only have to know one thing :</font></b></p>
          <h2><font size="+6">You can learn anything.</font></h2>
      </span>  
  </div>
        
       
  <div class="mySlides w3-container cli">
      <span style="padding:20px">
          <p><b><font size="+2">Upload files.....</font></b></p>
          <h2><font size="+6">So that others can learn</font></h2>
      </span>   
  </div>
            
  <div class="mySlides w3-container cli">
      <span style="padding:20px">
          <p><b><font size="+2">Download files.....</font></b></p>
          <h2><i><font size="+6">And continue learning</font></i></h2>
      </span>
  </div>
   
</div>
        
    <br><br>

    

<div class="container">   
<div class="alert alert-info" style="text-align:center">
    <strong>YOUR CONTRIBUTIONS</strong><br>Click on the below buttons to see your contribution.
  </div>
    <div class="disp">
  <a class="btn btn-danger" data-toggle="collapse" href="#vid" role="button" aria-expanded="false" aria-controls="vid" style="margin-left:400px; margin-right:50px">
  Videos
  </a>
  <a class="btn btn-danger" data-toggle="collapse" href="#pdf" role="button" aria-expanded="false" aria-controls="pdf" style="margin-right:50px"> PDFs
  </a>
 <a class="btn btn-danger" data-toggle="collapse" href="#imgs" role="button" aria-expanded="false" aria-controls="imgs" > Images
  </a>
    </div>
  <br>
  
  <div class="collapse" id="vid">
  <div class="card card-body">
  <div class="row">
    <?php
      echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<strong>VIDEOS</strong> 
				  </div>'."<br>";
          $rows=$mysqli->query("select uploaded_by,name,type from files");
      
        while(list($user,$name,$type)=$rows->fetch_row()){
              if($user == $_SESSION['username']){
                if($type == 'video/mp4'){  
	?>
					<div class="col-sm-4">				
                    
                    <video width="100%" controls>
                    <source src="<?php echo "uploads/videos/".$name; ?>">
                    </video>
					<button type="button" class="btn btn-primary btn-block"><?php echo "$name"; ?></button>
					</div>
        <?php 
                }
              }
        }
        ?>
	</div>
  </div>
</div>
<br>

  <br>
<div class="collapse" id="pdf">
	<div class="card card-body">
		<div class="row">
			<?php
             echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<strong>PDF FILES</strong> 
				  </div>'."<br>";
				  $rows=$mysqli->query("select uploaded_by,name,type from files");
				  while(list($user,$name,$type)=$rows->fetch_row()){
				if($user == $_SESSION['username']){
				if($type == 'application/pdf'){  
			?>
			<div class="col-sm-4">
			<embed width="360" height="400" src=<?php echo "uploads/pdfs/".$name; ?>>
			<button type="button" class="btn btn-primary btn-block"><?php echo "$name"; ?></button>
			<br><br>
			</div>
			<?php
				}
			  }
			}
			?>
		</div>
	</div>
</div>
<br>

  <br>
<div class="collapse" id="imgs">
	<div class="card card-body">
		<div class="row">
			<?php
             echo '<div class="alert alert-danger alert-dismissible fade in" style="text-align:center">
					<strong>IMAGES</strong> 
				  </div>'."<br>";
				$rows=$mysqli->query("select uploaded_by,name,type from files");	
				  while(list($user,$name,$type)=$rows->fetch_row()){
				if($user == $_SESSION['username']){
				if($type == 'image/jpeg'){    
			?>
			<div class="col-sm-4">
			<img width="360" height="260" src=<?php echo "uploads/images/".rawurlencode($name); ?>>
			<button type="button" class="btn btn-primary btn-block"><?php echo "$name"; ?></button>
			</div>
			<?php
				}
			  }
			}
	      ?>
		</div>
	</div>
</div>		

<br><br>

    </div>
<br><br>

<footer class="container-fluid text-center">
    <h5><font color="BLACK"><b>WELCOME KNOWLEDGE SEEKERS</b></font></h5>
</footer>
<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); 
}
</script>

</body>
</html>
