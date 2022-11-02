<?php
	$Name = $_POST['Name'];
	$gender = $_POST['gender'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, gender, number, email, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $gender, $number, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
