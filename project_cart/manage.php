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
<title>manage</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<h2 align="center">商品清單</h2>
<table class="dataTable">
<?php
function newlist() {
    include "conndb.php";
    //檢查資料庫內的值
    $sql3 = "SELECT * FROM `list2`";
    $result3=mysqli_query($db_link,$sql3);
    if (mysqli_num_rows($result3)>0) {
        while ($row=mysqli_fetch_assoc($result3)) {
            $datas[]=$row;
        }
        mysqli_free_result($result3);  
		echo "<tr><td><b>編號</b></td><td><b>商品名稱</b></td><td><b>庫存數量</b></td><td><b>價格</b></td><td><b>訂單數量</b></td></tr>";
        foreach ($datas as $key => $row) { 
		    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["number"]."</td><td>".$row["price"]."</td><td>".$row["orders"]."</td></tr>";
		    
            
        }
    } 
}
echo newlist();	
?>
</table></br>

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

<form action="newproduct.php" method="POST" >
<font size="4"><b>增加新品項</b></font></br>
<font size="4"><b>輸入編號</b></font>
<input type="number" id="id" min="0" name="id" onkeyup="check(this)"></br>
<font size="4"><b>輸入品項</b></font>
<input type="text" id="new" name="name"></br>
<font size="4"><b>輸入數量</b></font>
<input type="number" id="num" min="1" name="num" step="1" onkeyup="check(this)" ></br>
<font size="4"><b>輸入價格</b></font>
<input type="number" id="price" min="0" name="price" onkeyup="if(parseInt(this.value) < parseInt(this.min)){
this.value = this.min}">
<input type='submit' name="pnew" value='新增' /></form></br>

<form action="updatelist.php" method="POST">
<font size="4"><b>修改商品項目</b></font></br>
<font size="4"><b>選擇品項</b></font>
<select id="update" name="update">
<?php
function update() {
    include "conndb.php";
    //檢查資料庫內的值
    $sql4 = "SELECT * FROM `list2`";
    $result4=mysqli_query($db_link,$sql4);
	
    if (mysqli_num_rows($result4)>0) {
        while ($row=mysqli_fetch_assoc($result4)) {
            $data4[]=$row;
        }
        mysqli_free_result($result4);  
        
        foreach ($data4 as $key => $row) { 
		    echo "<option>".$row["name"]."</option>";   
        }
    } 
}	
echo update();
?>
</select></br> 
<font size="4"><b>修改商品名稱</b></font>
<input type="text" id="newname" name="newname">
<input type='submit' name="nname" value='更改' /></br>
<font size="4"><b>修改價格</b></font>
<input type="number" id="newprice" min="0" name="newprice" onkeyup="if(parseInt(this.value) < parseInt(this.min)){
this.value = this.min}">
<input type='submit' name="nprice" value='更改' /></br>
<font size="4"><b>修改庫存</b></font>
<input type="number" id="newnum" min="1" name="newnum" step="1" onkeyup="check(this)" >
<input type='submit' name="nnum" value='更改' /></br>
<font size="4"><b>刪除品項</b></font>
<select id="del" name="del">
<?php
echo update();
?>
</select>
<input type='submit' name="delp" value='刪除' /></br>
</form>

</br>
<form action="addproduct.php" method="POST" >
<font size="4"><b>商品入庫</b></font></br>
<font size="4"><b>選擇品項</b></font>
<select id="addname" name="addname">
<?php
echo update();
?>
</select></br>
<font size="4"><b>進貨數量</b></font>
<input type="number" id="addnum" min="1" name="addnum" step="1" onkeyup="check(this)" >
<input type='submit' name="addnumber" value='新增' /></br>
</form></br>

<form action="order.php" method="POST" >
<font size="4"><b>商品出貨</b></font></br>
<font size="4"><b>選擇品項</b></font>
<select id="ordername" name="ordername">
<?php
   include "conndb.php";
    //檢查資料庫內的值
    $sql = "SELECT * FROM `list2`";
    $result=mysqli_query($db_link,$sql);
	
    if (mysqli_num_rows($result)>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            $data[]=$row;
        }
        mysqli_free_result($result);  
        
        foreach ($data as $key => $row) { 
		    if ($row["orders"]>0) {
		        echo "<option>".$row["name"]."</option>";   
            }
		}
    } 

?>
</select>
<input type='submit' name="order" value='出貨' /></br>
</form>
<a href="UI1.html"><font size='4' color="snow" align="center"><b>回首頁</b></font></a></br>
</body>
</html>

