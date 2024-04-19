<?php
$username = $_POST['username'];
$password = $_POST['age'];
$email = $_POST['email'];
$Subjects = $_POST['subjects'];
echo $username;
echo $password;
echo $email;
echo $Subjects;
/*
if(!empty($username)|| !empty($password)|| !empty($email)|| !empty($subjects)){
   $host = "192.168.1.13";
   $dbUsername = "studybuddynew";
   $dbPassword = "studybuddynew";
   $dbname = "studybuddynew";
   
   $conn = new mysqli($host, $dbusername, $dbPassword, $dbname);

   if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
   }
   else{
    $SELECT = "SELECT email From register Where email = ? Limit 1";
    $INSERT = "INSERT Into register(username, password, email, subjects) values(?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssii", $username, $password, $email, $subjects);
        $stmt->execute();
        echo "New record inserted successfully";
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
*/
?>