<?php
session_start(); //open session
if(!isset($_SESSION['userName'])){
	header('Location: login.php');	//redirect customer to login page if not logged in
	Exit; //stop excuting 
}
include 'injector.php'; //call data injector class
include 'userManagement.php';	//call user management class

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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style> 
body {
  background-color: #72bfbe;
}

body * {
  font-family: 'Montserrat' sans-serif;
}

.wrap {
  width: 450px;
  margin: 0 auto;
}

.mat-label {
  display: block;
  font-size: 16px;
  transform: translateY(25px);
  color: #e2e2e2;
  transition: all 0.5s;
}

.mat-input {
  position: relative;
  background: transparent;
  width: 100%;
  border: none;
  outline: none;
  padding: 8px 0;
  font-size: 16px;
}

.mat-div {
  padding: 30px 0 0 0;
  position: relative;
}

.mat-div:after, .mat-div:before {
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: 2px;
  background-color: #e2e2e2; 
  bottom: 0;
  left: 0;
  transition: all 0.5s;
}

.mat-div::after {
  background-color: #FFFFFF;
  transform: scaleX(0);
}

.is-active::after {
  transform: scaleX(1);
}

.is-active .mat-label {
  color: #8E8DBE;
}

.is-completed .mat-label {
  font-size: 12px;
  transform: translateY(0);
}

button {
  background-color: #e3e5f9;
  border: none;
  display: block;
  margin: 35px auto;
  padding: 15px 30px;
  border-radius: 10px;
  cursor: pointer;
}
.urlresult{
	 text-align: center;
	 font-size: 30px;
}
</style>
</head>
<body>

<!--Main Navigation-->
<header>

  <nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="#"><strong>Sho.rt</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="history.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>


      </ul>
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </nav>

</header>
<!--Main Navigation-->

<div class="jumbotron text-center">
  <h1>Welcome <?php if(isset($_SESSION['userName']))echo $_SESSION['userName'];else error_reporting(0);?> to Sho.rt!</h1>
  <p>Make any URL shorter...</p>
</div>

<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div class="mat-div">
		<label for="address" class="mat-label">Enter your URL...</label>
		<input type="url" name="url" class="mat-input" id="address">
	  </div>
		<button type="submit" >Shorten!</button>
	</form>
</div>
<div class="urlresult">
	<div class="alert alert-info">
		<?php
		//if (!isset($url))
			//session_start();
		//else if (isset($url)){
			$newInjec = new injector("localhost","root","","tinyurl"); 
			$newInjec->getData(); //shorten URL actions
			

			
		//}
		?>
	</div>
</div>

<script>
    $(".mat-input").focus(function(){
  $(this).parent().addClass("is-active is-completed");
});

$(".mat-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("is-completed");
  $(this).parent().removeClass("is-active");
})
</script>
</body>
</html>


