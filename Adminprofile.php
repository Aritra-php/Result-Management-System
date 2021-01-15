<!---------------start php code for database connection----------->
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="db1";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("Connection Failed");
}
?>
<!--------------End php code for database connection-------------->

<!------------------start profile code---------------------------->
<?php
session_start();
if(isset($_SESSION['alogin']))
{
$aEmail=$_SESSION['aEmail'];
}
else
{
echo '<script>location.href="Adminlogin.php"</script>';
}
$sql="SELECT *FROM admin WHERE aEmail='".$aEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$aEmail=$row['aEmail'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>
<!-----------------End profile code--------------------------->

<!----------------------start profile form-------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>AdminProfile.com</title>
</head>
<body>

<?php
if(isset($_SESSION['alogin']))
{
$aEmail=$_SESSION['aEmail'];
}
else
{
echo '<script>location.href="Adminlogin.php"</script>';
}
$sql="SELECT *FROM admin WHERE aEmail='".$aEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$aEmail=$row['aEmail'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>

<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" class="shadow-lg p-5">
<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName; ?>">

<label for="Email">Email</label>
<input type="text" name="aEmail" class="form-control"
value="<?php if(isset($aEmail)) {echo $aEmail;} ?>">

<label for="Phone Number">Phone Number</label>
<input type="text" name="rPhno" class="form-control"
value="<?php echo $rPhno; ?>">

<img src="<?php if(isset($rImage)) {echo "images/".$row['rImage'];}?>" style="border-radius:150px;">

<input type="submit" value="Update" name="Update" class="btn btn-success">
<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">
</form>

</div>
</div>
</div>

<a href="Adminlogout.php" class="btn btn-info">Logout</a>
<a href="Adminchangepass.php" class="btn btn-info">Change Password</a>
<a href="Adminmarksenter.php" class="btn btn-info">Enter Marks</a>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<!-------------------End profile form----------------------->

<!-------------------start php code for update button---------------->
<?php
if(isset($_REQUEST['Update']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['aEmail']=="")||($_REQUEST['rPhno']==""))
{
echo '<div class="alert alert-warning mt-3 text-center>Please fill all the fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rName=$_REQUEST['rName'];
$aEmail=$_REQUEST['aEmail'];
$rPhno=$_REQUEST['rPhno'];
$sql="UPDATE admin SET rName='$rName',aEmail='$aEmail',rPhno='$rPhno' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Updated successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Update Data</div>';
}
}
}
?>
<!-------------------End php code for update button---------------->