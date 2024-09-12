<?php
$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("localhost","root","text");
if($con->connect_error) {
    die("Failed to connnect : ".$con->connect_error);

} else {
    $stmt = $conn->prepare("select * from registration where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>login successfully</h2>";
        }else{echo "<h2>Invalid Email or Password</h2>";
        }
    } else {
        echo "<h2>Invalid email and password</h2>";

    }
}