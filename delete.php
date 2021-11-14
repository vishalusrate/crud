<?php
$conn = mysqli_connect("localhost","root","","student") or die("connection problem check ineternet connection".mysqli_connect_error());
$id= $_GET['id'];

$sql = "delete from student where STUDENT_NO  = $id";
$result = mysqli_query($conn,$sql);
if($result){
    header("location: index.php");

}

?>