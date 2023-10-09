<?php
	// Database connection
	$conn = new mysqli('localhost','root','','sanim');

if (isset($_POST["btnSubmit"])) {
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$message_text = $_POST['message_text'];
	
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(full_name, email, message_text) values(?, ?, ?)");
		$stmt->bind_param("sss", $full_name, $email, $message_text);
		$execval = $stmt->execute();
		// echo $execval;
		echo '<h2 style="background-color: #292739; color:white; padding: 50px;">Your information is submited successfully!</h2>';
		
		$stmt->close();
		$conn->close();
	}
}
?>