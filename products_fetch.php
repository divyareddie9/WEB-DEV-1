<html>
<head>
<title>Fetch</title>
<style type="text/css">
table{
position:absolute;
top:120px;
left:750px;
}
th{
text-align:center;
font-size:22px;
}
input{
text-align:center;
border-radius:15px;
font-size:22px;
}

#a{
position:absolute;
top:300px;
left:750px;
}
#b{
padding:12px;
margin:0px 0px 0px 250px;
}
</style>
</head>
<body>
<form method="post" action="" autocomplete="off">
<table width="500" align="center" cellpadding="12" border="0">
<thead>
<th>Product Code</th>
<th><input type="text" name="pcode" placeholder="Enter Product Code" required</th>
</thead>
<thead>
<th>Quantity</th>
<th><input type="text" name="quantity" placeholder="Enter quantity" required</th>
</thead>
<thead>
<th colspan="2">
<input type="submit" value="Enter" name="Enter">
<input type="reset" value="Clear">
</th>
</thead>
</table>
</form>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"products");
mysqli_query($con,"CREATE TABLE products_fetch(Sno INTEGER(10) UNIQUE AUTO_INCREMENT,Pcode INTEGER(20) UNIQUE,Name VARCHAR(30),Price INTEGER(20))");

if(isset($_POST['Enter']))
{
$res=mysqli_query($con,"SELECT * FROM divya WHERE product_code='$_POST[pcode]'");
$data=mysqli_fetch_assoc($res);
if($data)
{
$result=$data['price'] * $_POST['quantity'];
mysqli_query($con,"INSERT INTO products_fetch VALUES('','$data[product_code]','$data[product_name]','$result')");
$r=mysqli_query($con,"SELECT * FROM products_fetch");
echo "<form method='post' action=''>";
echo "<table width='640' cellpadding='12' bordercolor='black' border='2' id='a'>";
echo "<thead>";
echo "<th>Sno</th>";
echo "<th>Product-Name</th>";
echo "<th>Price</th>";
echo "</thead>";
while($d=mysqli_fetch_assoc($r))
{
echo "<tr>";
echo "<td>".$d['Sno']."</td>";
echo "<td>".$d['Name']."</td>";
echo "<td>".$d['Price']."</td>";
echo "</tr>";
}
echo "<tr>";
echo "<td colspan='3'><input type='submit' value='Submit' name='submit' id='b'></td>";
echo "</tr>";
echo "</table>";



echo "</form>";
}
else
{
echo "<script>alert('Product Not Found');</script>";
}
}

if(isset($_POST['submit']))
{
header('Location:display.php');
}
?>
</body>
</html>