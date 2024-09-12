<?php
$usrname = $_POST['usrname']
$email = $_POST['email']
$pswd = $_POST['pswd']

if (!empty($usrname) || !empty($email) || !empty($pswd))
{
    $host = "localhost";
    $dbusername = "root":
    $dbpassword = "";
    $dbname = "";
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('connnection Error ('. mysqli_connect_error() .') ' . mysqli_connect_error());
    }

    else{
        $SELECT = "SELECT email from regiser Where email = ? Limit 1";
        $INSERT = "INSERT Into register (usrname, email, pswd) values(?,?,?)";


        $stmt = $conn->prepare($select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $usrname,$email,$pswd);
            $stmt->execute();
            echo "New Record inserted successfully";

        } else {
            echo"Someone already register using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}

?>