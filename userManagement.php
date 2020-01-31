<?php

class userManagement{
	//properties
	public $userName;
	public $userPassword;
	public $email;
	public $con;

	//methods
	function __construct($serverName,$dbuser,$dbpassword,$dbname){
		$this -> con = new mysqli($serverName,$dbuser,$dbpassword,$dbname); //open db connection
		if ($this->con->connect_error)
			die("Connection failed: " . $conn->connect_error);
	}
	
	function createUser($c_userName,$c_userPassword,$c_email){		//create user
		session_start();
		$sql = "SELECT user_id FROM users WHERE userName ='$c_userName'"; //query username input 
		$result = $this->con->query($sql);		
		$sql2 = "SELECT user_id FROM users WHERE email ='$c_email'";
		$result2 = $this->con->query($sql2);				//query email input 
		if (empty($c_userName)==true)	//check if username is empty
			echo "Username Cannot be Empty";
		else if(strlen($c_userName)<4) 	//check if username less than 4 characters
			echo "Username Cannot less than 4 characters";
		else if ($result->num_rows == 1)	//check if username used or not
			echo "Username '$c_userName' is used, try another username!";
		else if (empty($c_userPassword)==true)	//check if password is empty
			echo "Password Cannot be Empty!<br/>";

		else if (strlen($c_userPassword)<8)	//check password length
			echo "Password should not be less than 8 characters!<br/>";

		else if (preg_match('@[A-Z]@', $c_userPassword)==false||preg_match('@[a-z]@', $c_userPassword)==false)	//check if password contain  uppercase & lowercase
			echo "Password Should include Uppercase and Lowercase letters!<br/>";
		else if (empty($c_email==true))	//check if email is empty
			echo "Email Cannot be Empty!";

		else if (filter_var($c_email, FILTER_VALIDATE_EMAIL)==false)	//check email format
			echo "Check Email Format! <br/>";
		else if($result2->num_rows == 1)		//check if email used or not
			echo "This email: $c_email is already in use, try another email address!";
		else{	//successful criteria to be insrted in db
			$sql = "INSERT INTO users (userName, userPassword, email) VALUES ('$c_userName','$c_userPassword','$c_email')";
			$result = $this->con->query($sql);
			echo "Your Account Created Successfully";
			$sql3 = "SELECT user_id, userName FROM users WHERE email = '$c_email' && userPassword = '$c_userPassword'"; //validate customer credentials 
			$result = $this->con->query($sql3);	
			if($result->num_rows == 1){		//update session with customer data
				$_SESSION['user_id'];
				$_SESSION['userName'];
				$_SESSION['email'];
				while($row = $result->fetch_assoc()) {
					$_SESSION['user_id']=$row['user_id'];
					$_SESSION['userName']=$row['userName'];
				}
				$_SESSION['email']=$c_email;
				header( "refresh:1.5;url=index.php" );
			}
		}
	}
	


	
	function loginUser($c_email,$c_userPassword){
		session_start();

		if (empty($c_email)==true)	//check if username is empty
			echo "Username Cannot be Empty";
		else if (filter_var($c_email, FILTER_VALIDATE_EMAIL)==false)	//check email format
			echo "Check Email Format! <br/>";
		else if (empty($c_userPassword)==true)	//check if password is empty
			echo "Password Cannot be Empty!<br/>";
		else{
			$sql = "SELECT user_id, userName FROM users WHERE email = '$c_email' && userPassword = '$c_userPassword'"; //validate customer credentials 
			$result = $this->con->query($sql);	
			if($result->num_rows == 1){		//update session with customer data
				$_SESSION['user_id'];
				$_SESSION['userName'];
				$_SESSION['email'];
				while($row = $result->fetch_assoc()) {
					$_SESSION['user_id']=$row['user_id'];
					$_SESSION['userName']=$row['userName'];
				}
				$_SESSION['email']=$c_email;
				header('Location: index.php');	//redirect customer to homepage
			}
			else 
				echo "Check Username or Password<br/>"; //error try again
		}
	}	
	
	function __destruct(){
		$this->con->close();	//disconnect from db
	}
}



?>