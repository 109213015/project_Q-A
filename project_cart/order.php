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
<title>order</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<?php
include("conndb.php");
if (isset($_POST["order"])) {  
	$orinum="SELECT number FROM `list2` WHERE name=\"".$_POST["ordername"]."\""; 
    $checknum=mysqli_query($db_link,$orinum);
    $numori=mysqli_fetch_assoc($checknum);
    $odrnum="SELECT orders FROM `list2` WHERE name=\"".$_POST["ordername"]."\""; 
    $checknum2=mysqli_query($db_link,$odrnum);
    $numodr=mysqli_fetch_assoc($checknum2); 
    if ($numori["number"]>=$numodr["orders"]) { 	
        $sql1="UPDATE `list2` SET `number`=\"".$numori["number"]-$numodr["orders"]."\" where name=\"".$_POST["ordername"]."\"";
        mysqli_query($db_link, $sql1);
        $sql2="UPDATE `list2` SET `orders`=\"".$numodr["orders"]-$numodr["orders"]."\" where name=\"".$_POST["ordername"]."\"";
        mysqli_query($db_link, $sql2);	
		echo "<script type='text/javascript'>
            window.location.href='manage.php';
            </script>";
	} else {
		echo '<font size="4"><b>很抱歉,庫存不足,請盡快補貨</b></font></br>';
        echo '<a href="manage.php"><font size="4" color="snow" align="center"><b>回前頁補貨</b></a></br>';
	}
}
?>
</body>
</html>

