<?php
class injector{
	//properties
	public $url;
	public $tinyUrl;
	public $user_id;
	public $con;

	//methods
	function __construct($serverName,$dbuser,$dbpassword,$dbname){
		$this -> con = new mysqli($serverName,$dbuser,$dbpassword,$dbname); //connect to db
		if ($this->con->connect_error)	
			die("Connection failed: " . $conn->connect_error);
	}
	
	function getData(){	
			if(isset($_POST['url'])){
			// Initialize an URL to the variable 
			$this->url=$_POST['url']; 
			  
			// Use curl_init() function to initialize a cURL session 
			$curl = curl_init($this->url); 
			  
			// Use curl_setopt() to set an option for cURL transfer 
			curl_setopt($curl, CURLOPT_NOBODY, true); 
			  
			// Use curl_exec() to perform cURL session 
			$result = curl_exec($curl); 
			  
			if ($result !== false) { 
				  
				// Use curl_getinfo() to get information 
				// regarding a specific transfer 
				$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  
				
				if ($statusCode == 404) { 
					echo "URL Doesn't Exist"; //url is fake reject transaction
				} 
				else { 
					$this->url=$_POST['url']; //store url input
					$this->tinyUrl = "https://sho.rt/".substr(strrev(str_shuffle(preg_replace('/[^a-zA-Z0-9_ -]/s','',$this->url))),3,7); //apply shorten logic
					$this->user_id = $_SESSION['user_id']; //store user id
					$sql = "INSERT INTO table_1 (t_input_url, t_output_url, user_id) VALUES ('$this->url','$this->tinyUrl',$this->user_id)"; //inject db with instance detials "url, tiny url, user id, transaction id(auto), transaction timestamp(auto)
					$result2 = $this->con->query($sql);
					echo "Shorten URL: <br/> <a href='$this->url'>$this->tinyUrl</a>";
				} 
			} 
			else { 
				echo "URL Doesn't Exist"; //url is fake reject transaction
			} 	
		}	
	}
	
	function displayHistory(){
		$id=$_SESSION['user_id'];
		$sql = "SELECT * FROM table_1 WHERE user_id = $id"; //query for user shorten instances
		$result= $this->con->query($sql);
		if ($result->num_rows != 0) { //if result found
			echo "<thead><tr>
				<th>Transaction ID</th>
				<th>Input URL</th>
				<th>Short URL</th>
				<th>Timestamp</th>
			  </tr></thead><tbody>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row['transaction_id']."</td>";
				echo "<td>".$row['t_input_url']."</td>";
				echo "<td><a href='".$row['t_input_url']."'>".$row['t_output_url']."</a></td>";
				echo "<td>".$row['t_timestamp']."</td>";					
				echo "</tr>";
			}
			echo "</tbody>";
		}
		else
			echo "No transactions yet!";
	}
	function __destruct(){
		$this->con->close();	//disconnect from db
	}
}



?>