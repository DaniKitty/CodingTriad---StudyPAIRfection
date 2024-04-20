<?php
$username = $_POST['username'];
$pw = $_POST['password'];
$age = $_POST['age'];
$email = $_POST['email'];
$subjects = $_POST['subjects'];
$moc = $_POST['moc'];
if(!empty($username)||!empty($pw)|| !empty($age)|| !empty($email)|| !empty($subjects) || !empty($moc)){
   $host = "192.168.1.13";
   $dbUsername = "studybuddynew";
   $dbPassword = "studybuddynew";
   $dbname = "studybuddynew";

   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

   if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
   }
   else{
    $SELECT = "SELECT email From student Where email = ? Limit 1";
    $INSERT = "INSERT Into student(username, pw, age, email, subjects, moc) values(?, ?, ?, ?, ?, ?)";
    // $INSERT = "INSERT Into student(username, password) values('Danica', 'Pass')";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssisss", $username, $pw, $age, $email, $subjects, $moc);
        $stmt->execute();
        header('Location: login-form.html');
        exit;
    }
    else{
        echo "Someone already registered with these credentials";
    }
    
    $stmt->close();
    $conn->close();
   }
}
else{
    echo "All field are required";
    die();
}
?>
