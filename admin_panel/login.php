<?php
include_once("../server.php");
?>


<?php
if(!$_POST){
?>
<!doctype html>
<html lang="en">
  	<head>
		<title>Admin Paneli</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	
						<form action="" class="signin-form" method="POST">
							<div class="form-group">
								<input name="name" type="text" class="form-control" placeholder="Admin Adı" required>
							</div>
							<div class="form-group">
							<input name="password" id="password-field" type="password" class="form-control" placeholder="Şifre" required>
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button name="login_button" type="submit" class="form-control btn btn-primary submit px-3">Giriş Yap</button>
							</div>
						
						</form>
					</div>
	          </div>
	          
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/main.js"></script>

	</body>
</html>

<?php 
}else{
	ob_start();
	session_start();

	$adminName = $_POST['name'];
	$adminPassword = $_POST['password'];

	$sql = "SELECT * FROM admins A WHERE A.name='$adminName' AND A.password=MD5('$adminPassword')";
	$result = $DBconn->query($sql);
	$row = mysqli_fetch_assoc($result);

	if(isset($row)){
		$_SESSION["login"] = true;
		$_SESSION["name"] = $adminName;
		$_SESSION["password"] = md5($adminPassword);

		header("Location:admin_panel.php");
	}else{

		
		header("Location:../sessionError.html");
	}
}
?>



