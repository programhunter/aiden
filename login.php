<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aidengayasfuck</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/nav-sticky-top.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form.css">
    <link rel="stylesheet" href="assets/css/OcOrato---Login-form1.css">
</head>

<body>



    <div id="cats" style="background-image:url(&quot;assets/img/football.jpg&quot;);height:1000px;"></div>
	

	
	
	<?php
		require('db.php');
		session_start();
		// If form submitted, insert values into the database.
		if (isset($_POST['username'])){
			// removes backslashes
			$username = stripslashes($_REQUEST['username']);
			//escapes special characters in a string
			$username = mysqli_real_escape_string($con,$username);
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($con,$password);
			//Checking is user existing in the database or not
			$query = "SELECT * FROM `users` WHERE username='$username'
							and password='".md5($password)."'";
			$result = mysqli_query($con,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			
					if($rows==1){
							$_SESSION['username'] = $username;
							// Redirect user to index.php
							header("Location: user_profile.php");
         
					}
					
					else
					{
							echo "<div class='form'>
									<h3>Username/password is incorrect.</h3>
									<br/>Click here to <a href='login.php'>Login</a></div>";
					}
							}
							else
							{
	?>
	
	
		<div class="form-group">

		
		<form id="form" action="" method="post" name="login" style="font-family:Quicksand, sans-serif;background-color:rgba(44,40,52,0.73);width:320px;padding:40px;">
		<h1 id="head" style="color:#ffffff;font-family:Roboto, sans-serif;">Log In</h1>
		
		<div>
				<img class="img-rounded img-responsive" src="assets/img/logo.png" id="image" style="width:auto;height:auto;">
		</div>
		
		<input class= "form-control" type="text" name="username" placeholder="Username" required />
		<input class= "form-control" type="password" name="password" placeholder="Password" required />
		<input name="submit" type="submit" value="Login" style="width:100%;height:100%;margin-bottom:10px;background-color:#1485ee;"  />
		</form>
		<!--<p>Not registered yet? <a href='sign_up.php'>Register Here</a></p>-->
		</div>

		
		<?php } ?>
	
	
	
	
	
	
	
	
	
    <nav class="navbar navbar-default navbar-fixed-top navigation-clean-button"
    style="font-family:Quicksand, sans-serif;">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="index.php"><span><img src="assets/img/logo.png">Victory Bets</span> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav nav-right" style="font-family:Quicksand, sans-serif;">
                    <li role="presentation"><a href="index.php" style="font-family:Quicksand, sans-serif;">home </a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color:#ffffff;font-family:Quicksand, sans-serif;">Bets <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="services.php">Price Packages</a></li>
                            <li role="presentation"><a href="#">Order Services</a></li>
                            <li role="presentation"><a href="#">Custom Request</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a href="faq.php" style="color:#eeeeee;font-family:Quicksand, sans-serif;">Spreads </a></li>
                    
                </ul>
                <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="login.php" style="font-family:Quicksand, sans-serif;">Log In</a> <a class="btn btn-default action-button" role="button" href="sign_up.php" style="font-family:Quicksand, sans-serif;">Sign Up</a></p>
            </div>
        </div>
    </nav>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>