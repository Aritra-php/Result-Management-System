<!-----------------start php code for database connection--------------->
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
<!-----------------End php code for database connection----------------->

<!-------------------start php code for data insert--------------------->
<?php
if(isset($_REQUEST['rSubmit']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPhy']=="")||($_REQUEST['rChem']=="")||($_REQUEST['rBio']=="")||($_REQUEST['rMaths']=="")||($_REQUEST['rComp']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please fill all the fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPhy=$_REQUEST['rPhy'];
$rChem=$_REQUEST['rChem'];
$rBio=$_REQUEST['rBio'];
$rMaths=$_REQUEST['rMaths'];
$rComp=$_REQUEST['rComp'];
$sql="INSERT INTO marks(rName,rEmail,rPhy,rChem,rBio,rMaths,rComp)
VALUES('$rName','$rEmail','$rPhy','$rChem','$rBio','$rMaths','$rComp')";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Entered Successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable to enter data</div>';
}
}
}
?>
<!------------------End php code for data insert------------------->

<!----------------------start html form---------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>AdminMarksEnter.com</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="POST" class="shadow-lg p-5">

<?php
if(isset($_REQUEST['Edit']))
{
$Srno=$_REQUEST['Srno'];
$sql="SELECT *FROM marks WHERE Srno=$Srno";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>

<h5>Enter Student Marks Here</h5>

<label for="Name">Name</label>
<input type="text" placeholder="Type student name here" name="rName" class="form-control"
value="<?php if(isset($row['rName'])) {echo $row['rName'];} ?>">

<label for="Email">Email</label>
<input type="text" placeholder="Type student email here" name="rEmail" class="form-control"
value="<?php if(isset($row['rEmail'])) {echo $row['rEmail'];}?>">


<label for="Physics">Physics</label>
<input type="text" placeholder="Type marks here" name="rPhy" class="form-control"
value="<?php if(isset($row['rPhy'])) {echo $row['rPhy'];}?>">


<label for="Chemistry">chemistry</label>
<input type="text" placeholder="Type marks here" name="rChem" class="form-control"
value="<?php if(isset($row['rChem'])) {echo $row['rChem'];}?>">


<label for="Biology">Biology</label>
<input type="text" placeholder="Type marks here" name="rBio" class="form-control"
value="<?php if(isset($row['rBio'])) {echo $row['rBio'];}?>">

<label for="Maths">Maths</label>
<input type="text" placeholder="Type marks here" name="rMaths" class="form-control"
value="<?php if(isset($row['rMaths'])) {echo $row['rMaths'];}?>">

<label for="Computer">Computer</label>
<input type="text" placeholder="Type marks here" name="rComp" class="form-control"
value="<?php if(isset($row['rComp'])) {echo $row['rComp'];}?>">

<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">

<input type="submit" value="Submit" name="rSubmit" class="btn btn-info">

<input type="submit" value="Update" name="Update" class="btn btn-info">
</form>    
    
</div>
</div>
</div>
<a href="Adminprofile.php" class="btn btn-info">Back To Profile</a>

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
<!-------------------------End html form---------------------------->

<!-------------------start php code for fetch data------------------>
<?php
$sql="SELECT *FROM marks";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo '<table border="1">';
echo "<tr>";
echo "<thead>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Physics</th>";
echo "<th>Chemistry</th>";
echo "<th>Biology</th>";
echo "<th>Maths</th>";
echo "<th>Computer</th>";
echo "<th>Delete</th>";
echo "<th>Edit</th>";
echo "</thead>";
echo "</tr>";
echo "<tbody>";
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>".$row['rName']."</td>";
echo "<td>".$row['rEmail']."</td>";
echo "<td>".$row['rPhy']."</td>";
echo "<td>".$row['rChem']."</td>";
echo "<td>".$row['rBio']."</td>";
echo "<td>".$row['rMaths']."</td>";
echo "<td>".$row['rComp']."</td>";
echo '<td><form action="" method="POST">
<input type="hidden" name="Srno" value='.$row['Srno'].'>
<input type="submit" value="Delete" name="Delete">
</form></td>';
    
echo '<td><form action="" method="POST">
<input type="hidden" name="Srno" value='.$row['Srno'].'>
<input type="submit" value="Edit" name="Edit">
</form></td>';
    
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}
else
{
echo "Data not found";
}
?>
<!-------------------End php code for fetch data-------------------->

<!------------------start php code for delete button----------------->
<?php
if(isset($_REQUEST['Delete']))
{
$Srno=$_REQUEST['Srno'];
$sql="DELETE FROM marks WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Deleated successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Delete Data</div>';
}
}
?>
<!------------------End php code for delete button------------------->

<!------------------start php code for update button----------------->
<?php
if(isset($_REQUEST['Update']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPhy']=="")||($_REQUEST['rChem']=="")||($_REQUEST['rBio']=="")||($_REQUEST['rMaths']=="")||($_REQUEST['rComp']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please fill all the fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPhy=$_REQUEST['rPhy'];
$rChem=$_REQUEST['rChem'];
$rBio=$_REQUEST['rBio'];
$rMaths=$_REQUEST['rMaths'];
$rComp=$_REQUEST['rComp'];
$sql="UPDATE marks SET rName='$rName',rEmail='$rEmail',rPhy='$rPhy',rChem='$rChem',rBio='$rBio',rMaths='$rMaths',
rComp='$rComp' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Updated Successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable to Update Data</div>';
}
}
}
?>
<!------------------End php code for update button------------------->