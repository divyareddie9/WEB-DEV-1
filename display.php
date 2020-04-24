<html>
<head>
<title>Display</title>
<style type="text/css">
input{
margin:0px 0px 0px 150px;
}
#total{
font-size:20px;
color:red;
text-align:center;
}
</style>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","products");
$r=mysqli_query($con,"SELECT * FROM products_fetch");
echo "<form method='post' action=''>";
echo "<table width='640' cellpadding='12' bordercolor='black' border='2' id='a' align='center'>";
echo "<thead>";
echo "<th>Sno</th>";
echo "<th>Product-Name</th>";
echo "<th>Price</th>";
echo "</thead>";

$res1=mysqli_query($con,"SELECT SUM(Price) FROM products_fetch");
$sum=mysqli_fetch_assoc($res1);

while($d=mysqli_fetch_assoc($r))
{
echo "<tr>";
echo "<td>".$d['Sno']."</td>";
echo "<td>".$d['Name']."</td>";
echo "<td>".$d['Price']."</td>";
echo "</tr>";
}
echo "<tr>";
echo "<td colspan='2' id='total'>Total Cost</td>";
echo "<td>Rs ".implode(',',$sum)."/-</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='3'>
<input type='button' value='print Bill' onclick='window.print()'>
<input type='submit' value='Enter new bill' name='Next'>
</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
if(isset($_POST['Next']))
{
mysqli_query($con,"DELETE FROM products_fetch");
header('Location:products_fetch.php');
}
?>
</body>
</html>