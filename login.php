<?php
$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("192.168.1.13", "studybuddynew","studybuddynew", "studybuddynew");
if($con->connect_error){
    die("Failed to connect: ".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from student where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows>0){
        $data = $stmt_result->fetch_assoc();
        if($data['pw']===$password){
            header('Location: homepage.php?username='.$email);
            exit;
        }
        else{
            echo "<h2>Invalid Email or password</h2>";
        }
    }
}
