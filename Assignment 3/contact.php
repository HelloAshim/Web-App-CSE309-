<?php
$fname=$_POST['fName'];
$lname=$_POST ['lName'];
$email=$_POST ['email'];
$phonenumber=$_POST ['phoneNumber'];
$message=$_POST ['message'];
echo $fname;
echo $lname;
echo $email;
echo $phonenumber;
echo $message;

$link = mysqli_connect("localhost", "root", "", "assignment3_contactusform");

if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO contactus (firstName, lastName, email, phoneNumber, message ) VALUES ('$fname', '$lname', '$email', '$phonenumber', '$message')";
if(mysqli_query($link, $sql)){
echo "Records added successfully.";
}
else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

?>