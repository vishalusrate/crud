<?php
 $conn = mysqli_connect("localhost","root","","student") or die("connection problem check ineternet connection".mysqli_connect_error());
$id= $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application Simple</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 innerdiv">
                Simple Students Application
            </div>
           

            <div class="col-sm-3 innerdiv" ></div>
            <div class="col-md-6 innerdiv">
            <form action="" method="post">
            <?php 
$rs = "select * from student where STUDENT_NO = $id";
$qry = mysqli_query($conn,$rs);
if(mysqli_num_rows($qry)){
    while($row = mysqli_fetch_assoc($qry)){

    ?>
        

                    <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row['STUDENT_NAME']; ?>" placeholder="Enter name" name="name" required>
                    <span id="namess"></span>
                    </div>
                    <div class="form-group">
                    <label for="dob">Date Of birth:</label>
                    <input type="date" class="form-control" id="dob" placeholder="Enter dob" value="<?php echo $row['STUDENT_DOB']; ?>" name="dob" required>
                    <span id="dobs"></span>

                    </div>
                    <div class="form-group">
                    <label for="doj">Date Of Joining:</label>
                    <input type="date" class="form-control" id="doj" placeholder="Enter doj" value="<?php echo $row['STUDENT_DOJ']; ?>" name="doj" required>
                    <span id="dojs"></span>

                    </div>
                   
                    <button type="submit" name="submitbtn" id="submit_btn" class="btn btn-default">Update</button>
            </form>
        </div>
        <?php 
}
}else{
    ?>
<script>
    alert("no record Found.... ");
    window.location ="index.php"; 
</script>

<?php
}
?>
        <div class="col-sm-3 innerdiv"></div>
<br>

        <div class="col-md-12 col-sm-12">
        

     
        </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submitbtn'])){
   

$name = mysqli_real_escape_string($conn,$_POST["name"]);
$dob = mysqli_real_escape_string($conn,$_POST["dob"]);
$doj = mysqli_real_escape_string($conn,$_POST["doj"]);
echo $doj; 

$sql = "UPDATE `student` SET `STUDENT_NAME`='$name',`STUDENT_DOB`='$dob',`STUDENT_DOJ`='$doj' WHERE STUDENT_NO = $id ";

if(mysqli_multi_query($conn,$sql)){
	
	 header("location:index.php");
}
else{
	echo "<div class='alert alert-danger'>not Updated...</div>";
}


}

?>