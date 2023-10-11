<!DOCTYPE html>
<html>
<body style="background-color:#E3E3E3">
</body>
</html>
<?php
session_start();
include("connmysql.php");
$old=$_POST["old"]; //輸入的舊密碼
$new1=$_POST["new1"]; //輸入的新密碼
$new2=$_POST["new2"]; //再次輸入的新密碼
$acc=$_SESSION["account"]; //帳號
if ($old=="" && $new1=="" && $new2=="") { //如果修改密碼這三欄是空的,代表沒有要修改密碼,直接修改其他所有值
    $sql_query = "UPDATE `member` SET ";
	$sql_query .= "`sName`='".$_POST["sName"]."',";
	$sql_query .= "`sSex`='".$_POST["sSex"]."',";
	$sql_query .= "`sBirthday`='".$_POST["sBirthday"]."',";
	$sql_query .= "`sMail`='".$_POST["sMail"]."',";
	$sql_query .= "`sPhone`='".$_POST["sPhone"]."',";
	$sql_query .= "`sAddr`='".$_POST["sAddr"]."',";
    $sql_query .= "`sdrama`='".$_POST["sdrama"]."',";
    $sql_query .= "`sStyle`='".$_POST["sStyle"]."' ";
	$sql_query .= "WHERE `sAcc`='".$acc."' ";	
    mysqli_query($db_link, $sql_query);
    echo "<h1>修改完成</h1>"; //修改完成->登入查看資料
    $look='<h1>查看資料 <span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="loginform.html">登入</a></h1>';
    echo $look;
} else { //有修改密碼
    if (password_verify($old,$_SESSION['oldpwdhash']) && $new1!= "" && $new2!="" && $new1==$new2) { //修改正確,更新所有值
        $newhash=password_hash($new1, PASSWORD_DEFAULT);
        $sql_query = "UPDATE `member` SET ";
	    $sql_query .= "`sName`='".$_POST["sName"]."',";
	    $sql_query .= "`sSex`='".$_POST["sSex"]."',";
	    $sql_query .= "`sBirthday`='".$_POST["sBirthday"]."',";
	    $sql_query .= "`sMail`='".$_POST["sMail"]."',";
	    $sql_query .= "`sPhone`='".$_POST["sPhone"]."',";
	    $sql_query .= "`sAddr`='".$_POST["sAddr"]."',";
        $sql_query .= "`sdrama`='".$_POST["sdrama"]."',";
        $sql_query .= "`sStyle`='".$_POST["sStyle"]."',";
        $sql_query .= "`sPass`='".$newhash."' "; 
        $sql_query .= "WHERE `sAcc`='".$acc."' ";	
        mysqli_query($db_link, $sql_query);
        echo "<h1>修改完成</h1>"; //修改完成->用新密碼登入查看資料
        $look='<h1>查看資料 <span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="loginform.html">用新密碼登入</a></h1>';
        echo $look;
    } else { //修改錯誤->重新登入修改
        echo '<h1>輸入密碼有誤，請重新輸入</h1>';
        $update='<h1>重新修改 <span> &#x1F449; &#x1F449; &#x1F449 </span> <a href="loginform.html">登入</a></h1>';
        echo $update;
    }
}
?>