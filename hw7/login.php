<?php
    session_start();
    include "connmysql.php";
    $acc2=$_POST["sAcc2"]; //loginform.html表單輸入的帳號
    $pass2=$_POST["sPass2"]; //loginform.html保單輸入的密碼
    //檢查資料庫內的值
    $sql_query3 = "SELECT * FROM `member`";
    $sql3 = "SELECT * FROM `member`";
    $result3=mysqli_query($db_link,$sql3);
    if (mysqli_num_rows($result3)>0) {
        while ($row=mysqli_fetch_assoc($result3)) {
            $datas[]=$row;
        }
        mysqli_free_result($result3);  
        $check=0;
        foreach ($datas as $key => $row) { //檢查登入的帳密是否正確,找到資料庫內對應的帳號即可停止迴圈
            if ($row["sAcc"]==$acc2 && password_verify($pass2, $row["sPass"])) {
                $check+=1;
                $_SESSION['login']='yes';
                $_SESSION['account']=$row["sAcc"];
                echo '<h1>登入成功~</h1><br/>'; //登入成功->查看資料
                $look='<h1><span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="alldata.php">查看資料</a></h1>';
                echo $look;
                break;
            }
            else {
                $check+=0;
            }
            
        }
        if ($check==0) { //找不到帳號或輸入有錯
            $_SESSION['login']='no';
            $_SESSION['account']=$row["sAcc"];
            echo '<h1>輸入有誤，請重新登入</h1><br/>'; //登入失敗->重新登入
            $login='<h1><span> &#x1F449; &#x1F449; &#x1F449 </span><a href="loginform.html">重新登入</a></h1>';
            echo $login;
        }
    }    
?><!DOCTYPE html>
<html>
<body style="background-color:#E3E3E3">
</body>
</html>