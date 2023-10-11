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
<title>pay</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<h2 align="center">我的購物車</h2>

<table><tr><td><b>商品名稱</b></td><td><b>購買數量</b></td><td><b>單價</b></td><td><b>合計</b></td></tr>
<?php
include "conndb.php";
    //檢查資料庫內的值
    $sql_query2 = "SELECT * FROM `list1`";
    $sql2 = "SELECT * FROM `list1`";
    $result2=mysqli_query($db_link,$sql2);
	$sum=0;
    if (mysqli_num_rows($result2)>0) {
        while ($row=mysqli_fetch_assoc($result2)) {
            $data2[]=$row;
        }
        mysqli_free_result($result2);  
        foreach ($data2 as $key => $row) { 
			$sum+=$row["pPrice"]*$row["pNum"];
		    echo "<tr><td>".$row["pName"]."</td><td>".$row["pNum"]."</td><td>".$row["pPrice"]."</td><td>".$row["pPrice"]*$row["pNum"]."</td></tr>";
        }
	} 
	if ($sum>=500) { //助教更改需求:滿500元折100元
		echo "<font size='4'><b>滿500元折100元</b></font></br>";
		echo "<font size='4'><b>應付金額 : </b></font>".$sum-100 ." 元";
	} else {
	    echo "<font size='4'><b>應付金額 : </b></font>".$sum." 元";
	}	
	
?>
</br>
<a href="client.php"><font size='4' color="snow"><b>回去更改購物車</b></font></a></br>
<a href="end.php"><font size='4' color="snow"><b>確認結帳</b></font></a></br>

</body>
</html>