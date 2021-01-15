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

<!-------------start php code for fetching------------------------>
<?php
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="userlogin.php"</script>';
}
?>
<?php
$sql="SELECT *FROM marks WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rPhy=$row['rPhy'];
$rChem=$row['rChem'];
$rBio=$row['rBio'];
$rMaths=$row['rMaths'];
$rComp=$row['rComp'];
?>

<!-------------End php code for fetching-------------------------->

<!--------------------start result form--------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>UserCheckResult.com</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" class="shadow-lg p-5">

<h5>Please Check Your Result Here</h5>

<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName; ?>">

<label for="Email">Email</label>
<input type="text" name="rEmail" class="form-control"
value="<?php echo $rEmail; ?>">

<label for="Physics">Physics</label>
<input type="text" name="rPhy" class="form-control"
value="<?php echo $rPhy; ?>">

<label for="Chemistry">Chemistry</label>
<input type="text" name="rChem" class="form-control"
value="<?php echo $rChem; ?>">

<label for="Biology">Biology</label>
<input type="text" name="rBio" class="form-control"
value="<?php echo $rBio; ?>">

<label for="Maths">Maths</label>
<input type="text" name="rMaths" class="form-control"
value="<?php echo $rMaths; ?>">

<label for="Computer">Computer</label>
<input type="text" name="rComp" class="form-control"
value="<?php echo $rComp; ?>">
</form>

<a href="userprofile.php" class="btn btn-info">Back To Profile Page</a>

</div>
</div>
</div>

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

<!--------------------End result form----------------------------->