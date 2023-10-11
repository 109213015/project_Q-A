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
<title>會員管理系統</title>
<link href="table.css" rel="stylesheet" type="text/css" />
</style>
</head>
<body>
<h2 align="center">我的資料</h2>
<table class="dataTable">
<?php
    session_start();
    $acc2=$_SESSION['account']; //帳號
    include "connmysql.php";
    //檢查資料庫內的值
    $sql_query3 = "SELECT * FROM `member`";
    $sql3 = "SELECT * FROM `member`";
    $result3=mysqli_query($db_link,$sql3);
    if (mysqli_num_rows($result3)>0) {
        while ($row=mysqli_fetch_assoc($result3)) {
            $datas[]=$row;
        }
        mysqli_free_result($result3);  
        
        foreach ($datas as $key => $row) { //找出這筆帳號的會員,將資料顯示
            if ($row['sAcc']==$acc2) {
                $_SESSION['oldpwdhash']=$row["sPass"]; //密碼hash
		        echo "<tr><td><b>姓名</b></td><td>".$row["sName"]."</td></tr>";
		        echo "<tr><td><b>性別</b></td><td>".$row["sSex"]."</td></tr>";
		        echo "<tr><td><b>生日</b></td><td>".$row["sBirthday"]."</td></tr>";
		        echo "<tr><td><b>電子郵件</b></td><td>".$row["sMail"]."</td></tr>";
		        echo "<tr><td><b>電話</b></td><td>".$row["sPhone"]."</td></tr>";
		        echo "<tr><td><b>住址</b></td><td>".$row["sAddr"]."</td></tr>";
                echo "<tr><td><b>我喜歡</b></td><td>".$row["sdrama"]."</td></tr>";
                echo "<tr><td><b>喜歡的類型</b></td><td>".$row["sStyle"]."</td></tr>";
                echo "<tr><td><b>我的帳號</b></td><td>".$row["sAcc"]."</td></tr>";
                echo "<tr><td><b>我的密碼</b></td><td>****</td></tr>";
		        echo "<tr><td><b>編輯</b></td><td><a href='update2.php?id=".$row["sID"]."'><img src=\"icon-update.png\" title=\"修改\" /></a></td></tr>";
                break;
            }
        }
    } 
?>
</table>
</body>
</html>