<!DOCTYPE html>
<html>
<body style="background-color:#E3E3E3">
</body>
</html>
<?php 
    session_start();
	header("Content-Type: text/html; charset=utf-8");
	include "connmysql.php";
    $acc=$_POST['sAcc'];
    $pass=$_POST['sPass'];
    $pwdHash=password_hash($pass, PASSWORD_DEFAULT); //hash 密碼
    $_SESSION['hash']=$pwdHash; //hash
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
        foreach ($datas as $key => $row) { //檢查帳號是否和其他會員重複
            if ($row['sAcc']==$acc) {
                $check+=1;
                echo '<h1>這組帳號有人有了，請再換一組~</h1>'; //重複則重新申請
                $again='<h1><span> &#x1F449; &#x1F449; &#x1F449 </span><a href="joinform.html">重新申請</a></h1>';
                echo $again;
                break;
            }
            else {
                $check+=0;
            }
            
        }
        if ($check==0) { //沒有重複,成功加入會員
            $_SESSION['oldpwd']=$row['sPass']; //密碼hash
            echo '<h1>恭喜你成為我們的會員!</h1>';
            $login='<h1><span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="loginform.html">登入</a></h1>';
            echo $login;
            //將值加入資料庫
            $sql_query = "INSERT INTO `member` (`sName` ,`sSex` ,`sBirthday` ,`sMail` ,`sPhone` ,`sAddr`,`sdrama`,`sStyle`,`sAcc`,`sPass`) VALUES (";
	        $sql_query .= "'".$_POST["sName"]."',";
	        $sql_query .= "'".$_POST["sSex"]."',";
	        $sql_query .= "'".$_POST["sBirthday"]."',";
	        $sql_query .= "'".$_POST["sMail"]."',";
	        $sql_query .= "'".$_POST["sPhone"]."',";
	        $sql_query .= "'".$_POST["sAddr"]."',";
            $sql_query .= "'".$_POST["sdrama"]."',";
	        $sql_query .= "'".$_POST["sStyle"]."',";
            $sql_query .= "'".$_POST["sAcc"]."',";
	        $sql_query .= "'".$pwdHash."')"; 
	        mysqli_query($db_link, $sql_query);
            
        }
    } else { //資料庫無資料,帳號不會重複,直接加入成功
        $_SESSION['oldpwd']=$row['sPass']; //密碼hash
        echo '<h1>恭喜你成為我們的會員!</h1>';
        $login='<h1><span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="loginform.html">登入</a></h1>';
        echo $login;
        $sql_query = "INSERT INTO `member` (`sName` ,`sSex` ,`sBirthday` ,`sMail` ,`sPhone` ,`sAddr`,`sdrama`,`sStyle`,`sAcc`,`sPass`) VALUES (";
	    $sql_query .= "'".$_POST["sName"]."',";
	    $sql_query .= "'".$_POST["sSex"]."',";
	    $sql_query .= "'".$_POST["sBirthday"]."',";
	    $sql_query .= "'".$_POST["sMail"]."',";
	    $sql_query .= "'".$_POST["sPhone"]."',";
	    $sql_query .= "'".$_POST["sAddr"]."',";
        $sql_query .= "'".$_POST["sdrama"]."',";
	    $sql_query .= "'".$_POST["sStyle"]."',";
        $sql_query .= "'".$_POST["sAcc"]."',";
	    $sql_query .= "'".$pwdHash."')"; 
	    mysqli_query($db_link, $sql_query);
    }
    
?>