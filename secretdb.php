<?php
@$name = $_POST['name'];
@$password = $_POST['password'];
 
if((!isset($name))||(!isset($password))){
	//방문자는 이름과 비밀번호를 써야 한다.
?>
<h1>Please Log In</h1>
<p>This page is secret.</p>
<form method="post" action="secretdb.php">
	<p>Username: <input type="text" name="name" /></p>
	<p>Password: <input type="password" name="password" /></p>
	<p><input type="submit" name="submit" value="Log In" /></p>
</form>
<?php
}else{
	$host = 'localhost';
	$user = 'webauth';
	$pass = 'webauth';
	$database = 'auth';
	
	$db = new mysqli($host, $user, $pass, $database);
	
	if (mysqli_connect_error($db)) 
	{
		echo "Error: Could not connect to datbase. Please try again later.";
		exit;	
	}
	
	$query = "select count(*) from authorized_users where
			 name = '".$name."'and password = sha1('".$password."')";
	
	$result = $db->query($query);
	
	if(!$result){
		echo "Cannot run query";
		exit;
	}
	
	$row = $result->fetch_row();
	$count = $row[0];
	if($count>0){
		echo "<h1>Here it is!</h1>
		 	  <p>I bet you are glad you can see this secret page.</p>";
	}else{
		echo "<h1>Go Away!</h1>
			  <p>You are not authoriaed to use this resource.</p>";
	}
		
}

?>