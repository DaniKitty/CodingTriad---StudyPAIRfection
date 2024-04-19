<?php
$username = $_POST['username'];
$age = $_POST['age'];
$email = $_POST['email'];
$subjects = $_POST['subjects'];
echo $username;
echo $age;
echo $email;
echo $subjects;
if(!empty($username)|| !empty($age)|| !empty($email)|| !empty($subjects)){
   
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

   if(mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
   }
   else{
    $SELECT = "SELECT email From student Where email = ? Limit 1";
    $INSERT = "INSERT Into student(username, age, email, subjects) values(?, ?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("siss", $username, $age, $email, $subjects);
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
?>