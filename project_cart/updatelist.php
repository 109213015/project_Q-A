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
<title>list</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<?php
include("conndb.php");

if (isset($_POST["nname"])) { 
    $name="SELECT name FROM `list2` WHERE name=\"".$_POST["newname"]."\""; 
    $checkname=mysqli_query($db_link,$name);
    $oldname=mysqli_fetch_assoc($checkname);
	if ($oldname>0) {
		echo '<font size="4"><b>清單內已經有這一個商品名稱了，無法更改為此名稱</b></font></br>';
        echo '<a href="manage.php"><font size="4" color="snow" align="center"><b>回前頁</b></a></br>';
	} else {
        $sqln="UPDATE `list2` SET `name`=\"".$_POST["newname"]."\" where name=\"".$_POST["update"]."\"";
        mysqli_query($db_link, $sqln);
		echo "<script type='text/javascript'>
            window.location.href='manage.php';
            </script>";
    }	
}

if (isset($_POST["nprice"])) {    
    $sqlp="UPDATE `list2` SET `price`=\"".$_POST["newprice"]."\" where name=\"".$_POST["update"]."\"";
    mysqli_query($db_link, $sqlp);
    echo "<script type='text/javascript'>
            window.location.href='manage.php';
            </script>";	
}

if (isset($_POST["nnum"])) {     
    $sqlnum="UPDATE `list2` SET `number`=\"".$_POST["newnum"]."\" where name=\"".$_POST["update"]."\"";
    mysqli_query($db_link, $sqlnum);
    echo "<script type='text/javascript'>
            window.location.href='manage.php';
            </script>";	
}

if (isset($_POST["delp"])) {     
    $sqldel="DELETE FROM `list2` where `name`=\"".$_POST["del"]."\"" ;
    mysqli_query($db_link, $sqldel);
    echo "<script type='text/javascript'>
            window.location.href='manage.php';
            </script>";	
}

?>

</body>
</html>