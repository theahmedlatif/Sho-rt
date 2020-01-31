<?php
	session_start();

	include 'userManagement.php'; //import user management class
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<a class="vglnk" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="nofollow">
 
    <title>Sho.rt: Shorten any URL</title>
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	.link {
	float: right;
	}
</style>
  </head>

<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <h3 class="text-center text-info">Login</h3>

							<div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="userPassword" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!--<label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label>--><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
								<a class="link" href="signup.php">Create a New Account!</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="alert alert-info">
	<?php
		error_reporting(0);
		if(isset(_POST['email'])||isset($_POST['userPassword'])){
			$login = new userManagement("localhost","root","","tinyurl"); //call userManagement class
			$login->loginUser($_POST['email'],$_POST['userPassword']); //call create user function
		}
		else if(isset($_SESSION['userName']))
			header('Location: index.php'); //redirect logged in user to 
			
	?>
	</div>

</body>

</html>