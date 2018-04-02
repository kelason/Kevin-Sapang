<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin() != ""){
	$login->redirect("index.php");
}

if(isset($_POST['submit'])){
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);

	if($login->doLogin($uname,$umail,$upass)){
		$login->redirect("home.php");
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  	<link rel="stylesheet" href="/css/styles.css">	
	<title>Blog</title>
</head>
<body>
<?php include 'header.php'; ?>
	<div class="content">
		<div class="container">
			<form action="#" method="POST">
				<div class="row">
					<div class="col-lg-4 col-md-offset-4">
				        <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
				        
				        <div id="error">
				        <?php
							if(isset($error))
							{
								?>
				                <div class="alert alert-danger">
				                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
				                </div>
				                <?php
							}
						?>
				        </div>
						<div class="form-group">
							<input type="text" name="txt_uname" class="form-control" placeholder="Username"><br>
							<input type="email" name="txt_umail" class="form-control" placeholder="Email"><br>
							<input type="password" name="txt_upass" class="form-control" placeholder="Password"><br>
							<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password"><br>
							<input type="submit" name="submit" value="Submit" class="btn btn-primary">
						</div>
					</div>
				</div>
			</form>
		</div>	
	</div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>