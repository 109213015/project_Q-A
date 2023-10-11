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
<title>end</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<h2 align="center">感謝您的購買</h2>
<h2 align="center">歡迎再次光臨</h2>
<?php 
include "conndb.php";
    $sql = "SELECT * FROM `list1`";
    $result=mysqli_query($db_link,$sql);
    if (mysqli_num_rows($result)>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        mysqli_free_result($result);  
        foreach ($data as $key => $row) { 		
		    echo update($row["pName"],$row["pNum"]);
        }
	} 
function update($name,$num) {
	include "conndb.php";
	$sql2 = "SELECT * FROM `list2`";
	$result2=mysqli_query($db_link,$sql2);
    if (mysqli_num_rows($result2)>0) {
        while ($row2=mysqli_fetch_assoc($result2)) {
            $data2[]=$row2;
        }
        mysqli_free_result($result2);  
        foreach ($data2 as $key => $row2) { 	
		    if ($row2["name"]==$name) {
				$sql3="UPDATE `list2` SET `orders`=\"".$row2["orders"]+$num."\" where name=\"".$name."\"";
				mysqli_query($db_link,$sql3);
			}
        }
	}	
}	

$sqlempty="truncate list1";
mysqli_query($db_link,$sqlempty);

?>
<a href="client.php"><font size='4' color="snow" align="center"><b>再回商城逛逛</b></font></a></br>
<a href="UI1.html"><font size='4' color="snow" align="center"><b>回首頁</b></font></a></br>
</body>
</html>