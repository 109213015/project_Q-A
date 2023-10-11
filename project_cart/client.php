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
<h2 align="center">現有庫存</h2>
<table class="dataTable">
<?php
    include "conndb.php";
    //檢查資料庫內的值
    $sql_query3 = "SELECT * FROM `list2`";
    $sql3 = "SELECT * FROM `list2`";
    $result3=mysqli_query($db_link,$sql3);
    if (mysqli_num_rows($result3)>0) {
        while ($row=mysqli_fetch_assoc($result3)) {
            $datas[]=$row;
        }
        mysqli_free_result($result3);  
        
		echo "<tr><td><b>編號</b></td><td><b>商品名稱</b></td><td><b>庫存數量</b></td><td><b>價格</b></td></tr>";
        foreach ($datas as $key => $row) { 
		    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["number"]."</td><td>".$row["price"]."</td></tr>";
		    
            
        }
    } 
?>
</table></br>

<font size="4"><b>選擇我要購買的商品</b></font>
<form action="addcart.php" method="POST" >
<select id='choose' name="choose">
<?php
    include "conndb.php";
    //檢查資料庫內的值
    $sql_query3 = "SELECT * FROM `list2`";
    $sql3 = "SELECT * FROM `list2`";
    $result3=mysqli_query($db_link,$sql3);
	
    if (mysqli_num_rows($result3)>0) {
        while ($row=mysqli_fetch_assoc($result3)) {
            $data[]=$row;
        }
        mysqli_free_result($result3);  
        
        foreach ($data as $key => $row) { 
		    echo "<option>".$row["name"]."</option>";   
        }
    } 
?>
</select></br>
<font size="4"><b>選擇數量</b></font>
<input type="number" id="num" min="1" name="num" step="1" value="1" onkeyup="check(this)" >
<input type='submit' name="add" value='加入購物車' /></br></form>

<script type="text/javascript">
function check(el) {
	if(el.value != ""){
        if(parseInt(el.value) < parseInt(el.min)){
            el.value = el.min;
        }
		if(el.value.length==1){
			el.value=el.value.replace("/[^1-9]/g",'0')
		}else{
			el.value=el.value.replace("/\D/g",'')
		}
    }
}

function $(id) {
   return document.getElementById(id);
}
</script>
<table><tr><td><b>商品名稱</b></td><td><b>購買數量</b></td><td><b>單價</b></td><td><b>合計</b></td></tr>
<?php
    include "conndb.php";
    //檢查資料庫內的值
    $sql_query2 = "SELECT * FROM `list1`";
    $sql2 = "SELECT * FROM `list1`";
    $result2=mysqli_query($db_link,$sql2);
	
    if (mysqli_num_rows($result2)>0) {
        while ($row=mysqli_fetch_assoc($result2)) {
            $data2[]=$row;
        }
        mysqli_free_result($result2);  
        
        foreach ($data2 as $key => $row) { 
		    echo "<tr><td>".$row["pName"]."</td><td>".$row["pNum"]."</td><td>".$row["pPrice"]."</td><td>".$row["pPrice"]*$row["pNum"]."</td></tr>";
        }
	} 
?>
</br>
<font size="4"><b>選擇我要更改的商品 </b></font>
<form action="updatecart.php" method="POST" ><select id='change' name="change">
<?php
function updatecart() {
    include "conndb.php";
    //檢查資料庫內的值
    $sql_query4 = "SELECT * FROM `list1`";
    $sql4 = "SELECT * FROM `list1`";
    $result4=mysqli_query($db_link,$sql4);
	
    if (mysqli_num_rows($result4)>0) {
        while ($row=mysqli_fetch_assoc($result4)) {
            $data4[]=$row;
        }
        mysqli_free_result($result4);  
        
        foreach ($data4 as $key => $row) { 
		    echo "<option>".$row["pName"]."</option>";   
        }
    } 
}	
echo updatecart();
?>

</select></br>
<font size="4"><b>選擇數量 </b></font>
<input type="number" id="num2" min="1" name="num2" step="1" value="1" onkeyup="check(this)" >
<input type='submit' name="update" value='更新購物車' /></br></form>
<font size="4"><b>選擇我要刪除的商品 </b></font>
<form action="deletecart.php" method="POST" ><select id='delete' name="delete">
<?php 
echo updatecart();
?>
</select>
<input type='submit' name="del" value='刪除' /></br></form>
</br>
<form action="pay.php" method="POST">
<font size="4"><b>我已經挑選完商品 </b></font>
<input type='submit' name="pay" value='結帳' /></br></form>

<h2 align="center">我的購物車</h2>

</body>
</html>

