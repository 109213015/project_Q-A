<!DOCTYPE html>
<style type="text/css">
body {
background-color:#6E6E6E;
width: 600px; 
margin:10px auto;
padding: 20px;
margin-top:20px;
border: 5px solid Thistle;
width: 600px;
line-height: 28px;
color:snow;
font-family:標楷體;
}
h1 {color:snow; text-align:center;}
table {margin: 15px auto; border: 4px solid Thistle; width:420px;margin-top:30px;}
td {text-align:left; padding:5px 10px;border:2px solid Thistle;}
th {padding:5px 10px; color:ivory;}
</style>
<html>
<head>
<style>
<meta charset="UTF-8" />
<title>shopping</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<?php
include("conndb.php");
if (isset($_POST["add"])) { 
    $again="SELECT pName FROM `list1` WHERE pName=\"".$_POST["choose"]."\"";
    $checkagain=mysqli_query($db_link, $again);
    $ag=mysqli_fetch_assoc($checkagain);
    if ($ag>0) {
		echo '<font size="4"><b>您已買過此商品</b></font></br>';
		echo '<a href="client.php"><font size="4" color="snow" align="center"><b>回前頁繼續購買</b></a></br>';
	} else {  
	    $n="SELECT number FROM `list2` WHERE name=\"".$_POST["choose"]."\"";
        $checkn=mysqli_query($db_link, $n);
        $num=mysqli_fetch_assoc($checkn);
		if ($_POST["num"]>$num["number"]) {
			echo '<font size="4"><b>很抱歉,您買的數量超過庫存,我們無法提供</b></font></br>';
			echo '<a href="client.php"><font size="4" color="snow" align="center"><b>回前頁繼續購買</b></a></br>';
		} else {
        $check="SELECT id FROM `list2` WHERE name=\"".$_POST["choose"]."\"";
        $checkid=mysqli_query($db_link, $check);
        $id=mysqli_fetch_assoc($checkid);
        $sql="INSERT INTO `list1`(`pId`, `pName`, `pNum`, `pPrice`) VALUES (";
        $sql.="'".$id["id"]."',";
        $sql.="'".$_POST["choose"]."',";
        $price="SELECT price FROM `list2` WHERE name=\"".$_POST["choose"]."\"";
        $checkprice=mysqli_query($db_link,$price);
        $prices=mysqli_fetch_assoc($checkprice);
        $sql.="'".$_POST["num"]."',";
        $sql.="'".$prices["price"]."')";

        mysqli_query($db_link, $sql);
        echo "<script type='text/javascript'>
            window.location.href='client.php';
            </script>";	
		}	
    }
}
?>
</body>
</html>