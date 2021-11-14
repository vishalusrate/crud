<?php
$conn = mysqli_connect("sql212.epizy.com","epiz_22449618","pcPUrS9U4NP","epiz_22449618_student") or die("connection problem check ineternet connection".mysqli_connect_error());
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
                    <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    <span id="namess"></span>
                    </div>
                    <div class="form-group">
                    <label for="dob">Date Of birth:</label>
                    <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob" required>
                    <span id="dobs"></span>

                    </div>
                    <div class="form-group">
                    <label for="doj">Date Of Joining:</label>
                    <input type="date" class="form-control" id="doj" placeholder="Enter doj" name="doj" required>
                    <span id="dojs"></span>

                    </div>
                   
                    <button type="submit" name="submitbtn" id="submit_btn" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-sm-3 innerdiv"></div>
<br>

        <div class="col-md-12 col-sm-12">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Student No</th>
        <th>Full Name</th>
        <th>Date Of Birth</th>
        <th>Date Of joining</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      
<?php 
$rs = "select * from student";
$qry = mysqli_query($conn,$rs);
if(mysqli_num_rows($qry)){
    while($row = mysqli_fetch_assoc($qry)){

    ?>
    <tr>
        <td><?php echo $row['STUDENT_NO']; ?></td>
        <td><?php echo $row['STUDENT_NAME']; ?></td>
        <td><?php echo $row['STUDENT_DOB']; ?></td>
        <td><?php echo $row['STUDENT_DOJ']; ?></td>
        <td><a href="edit.php?id=<?php echo $row['STUDENT_NO']; ?>"><i class="fa fa-edit" style="font-size:24px;color:white;"></i></a> </td>
        <td><a href="delete.php?id=<?php echo $row['STUDENT_NO']; ?>"><i class="fa fa-trash" style="font-size:24px;color:white;"></i></a></td>
           </tr>
<?php 
}
}
?>

   
      
    </tbody>
  </table>
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

$sql = "insert into student(STUDENT_NAME,STUDENT_DOB,STUDENT_DOJ)
        values('$name','$dob','$doj');";

if(mysqli_multi_query($conn,$sql)){
	
	 header("location:index.php");
}
else{
	echo "<div class='alert alert-danger'>not saved...</div>";
}


}

?>
