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
if (isset($_POST["update"])) { 
    $n="SELECT number FROM `list2` WHERE name=\"".$_POST["change"]."\"";
    $checkn=mysqli_query($db_link, $n);
    $num=mysqli_fetch_assoc($checkn);
    if ($_POST["num2"]>$num["number"]) {
	    echo '<font size="4"><b>很抱歉,您買的數量超過庫存,我們無法提供</b></font></br>';
        echo '<a href="client.php"><font size="4" color="snow" align="center"><b>回前頁繼續購買</b></a></br>';
    } else {
        $sql="UPDATE `list1` SET `pNum`=\"".$_POST["num2"]."\" where pName=\"".$_POST["change"]."\"";
        mysqli_query($db_link, $sql);	
		echo "<script type='text/javascript'>
            window.location.href='client.php';
            </script>";	
	}
}
?>
</body>
</html>