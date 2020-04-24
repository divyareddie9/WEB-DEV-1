<html>
<head>
<title>Products</title>
<style type="text/css">
td{
font-size:22px;
}
input{
font-size:22px;
border-radius:9px;
text-align:center;
padding:12px;
}

</style>
</head>
<body bgcolor="olive">
<form method="post" action="">
<table width="600" border="2" bordercolor="white" align="center" cellpadding="12" bgcolor="salmon">
<tr>
<td><b>Product_code</b></td>
<td>
<input type="text" placeholder="enter product code" required autofocus name="code">
</td>
</tr>
<tr>
<td><b>Product_name</b></td>
<td>
<input type="text" placeholder="enter product" required name="name">
</td>
</tr>
<tr>
<td><b>Product_price</b></td>
<td>
<input type="text" placeholder="enter price" required name="price">
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="submit" name="submit">
<input type="reset" value="clear">
</td>
</tr>
</table>
</form>
<?php

if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","root","");
mysqli_query($con,"CREATE DATABASE products");
mysqli_select_db($con,"products");
mysqli_query($con,"CREATE TABLE divya(product_code VARCHAR(10) PRIMARY KEY UNIQUE,product_name VARCHAR(30),price INTEGER(50))");

if(mysqli_query($con,"INSERT INTO divya VALUES('$_POST[code]','$_POST[name]','$_POST[price]')"))
{
echo "<script>alert('inserted succesfully')</script>";
}
else
{
echo "<script>alert('not yet inserted')</script>";
}
}
?>
</body>
</html>