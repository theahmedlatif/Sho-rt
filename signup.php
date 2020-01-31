<?php
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
                            <h3 class="text-center text-info">Sign Up</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="userName" id="username" class="form-control">
                            </div>
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
								<a class="link" href="login.php">Already have an Account!</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="alert alert-info">
	<?php
		error_reporting(0); //clear errors due to empty sessions 
		if(isset(_POST['email'])||isset($_POST['userPassword'])){ //start the following functions if email & password set successfully
			$newUser = new userManagement("localhost","root","","tinyurl"); //call userManagement class
			$newUser->createUser($_POST['userName'],$_POST['userPassword'],$_POST['email']); //call create user function
		}
		else if(isset($_SESSION['userName'])&&isset($_SESSION['user_id']))
			header('Location: index.php'); //if user is logged in user redirect him to index
			
	?>
	</div>

</body>

</html>