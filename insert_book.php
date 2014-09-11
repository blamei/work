<!DOCTYPE html>
<html>
	<head>
		<title>Book-O-Rama Book Entry Results</title>
	</head>
	<body>
		<h1>Book-O-Rama Book Entry Results</h1>
		<?php
			$isbn = $_POST['isbn'];
			$author = $_POST['author'];
			$title = $_POST['title'];
			$price = $_POST['price'];

			//echo $isbn;
			//echo $author;
			//echo $title;
			//echo $price;
			
			//exit;
			
			if(!$isbn || !$author || !$title || !$price)
			{
				echo "You have not entered all the required details.<br />"
					."Please go back and try again.";
				exit;	
			}
			
			if(!get_magic_quotes_gpc())
			{
				$isbn = addslashes($isbn);
				$author = addslashes($author);
				$title = addslashes($title);
				$price = addslashes($price);
			}
			
			//데이터베이스 접속 시작
			$host = 'localhost';
			$user = 'root';
			$password = 'ghkdtlstjd';
			$database = 'books';
			
			$db = new mysqli($host, $user, $password, $database);
			
			if (mysqli_connect_error($db)) 
			{
				echo "Error: Could not connect to datbase. Please try again later.";
				exit;	
			}
			//데이터베이스 접속 끝
			
			//$query = "insert into books values('".$isbn."','".$author."','".$title."','".$price."')";
			$query = "insert into books values(?, ?, ?, ?)";
			$stmt = $db->prepare($query);
			$stmt->bind_param("sssd",$isbn, $author, $title, $price);
			$stmt->execute();
			$stmt->bind_result($isbn, $author, $title, $price);
			echo $stmt->affected_rows.' book inserted into database.';
			$stml->close();
			
						
			
			//echo $query;
			//exit;
			
			$result = $db->query($query);
			
			if($result)
			{
				echo $db->affected_rows."book inserted into database.";
			}else{
				echo "An error has occurred. The item was not added.";
			}
			
			$db->close();
		?>
	</body>
</html>