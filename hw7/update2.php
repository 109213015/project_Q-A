<?php 
include("connmysql.php");
$sql_db = "SELECT * FROM `member` WHERE `sID`=".$_GET["id"];
$result = mysqli_query($db_link,$sql_db);
$row_result=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>會員管理系統</title>
</head>
<body style="background-color:#C9C9C9">
<h2 align="center">修改資料</h2>
<form action="updateCheck.php" method="post" name="formFix" id="formFix">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>欄位</th><th>資料</th>
    </tr>
    <tr>
      <td>姓名</td><td><input type="text" name="sName" id="sName" value="<?php echo $row_result["sName"];?>"></td>
    </tr>
    <tr>
      <td>性別</td><td>
      <input type="radio" name="sSex" id="radio" value="男" <?php if($row_result["sSex"]=="男") echo "checked";?>>男
      <input type="radio" name="sSex" id="radio" value="女" <?php if($row_result["sSex"]=="女") echo "checked";?>>女
      <input type="radio" name="sSex" id="radio" value="其他" <?php if($row_result["sSex"]=="其他") echo "checked";?>>其他
      </td>
    </tr>
    <tr>
      <td>生日</td><td><input type="text" name="sBirthday" id="sBirthday" value="<?php echo $row_result["sBirthday"];?>"></td>
    </tr>
    <tr>
      <td>電子郵件</td><td><input type="text" name="sMail" id="sMail" value="<?php echo $row_result["sMail"];?>"></td>
    </tr>
    <tr>
      <td>電話</td><td><input type="text" name="sPhone" id="sPhone" value="<?php echo $row_result["sPhone"];?>"></td>
    </tr>
    <tr>
      <td>住址</td><td><input name="sAddr" type="text" id="sAddr" size="40" value="<?php echo $row_result["sAddr"];?>"></td>
    </tr>
     <tr>
      <td>我喜歡</td><td>
      <input type="radio" name="sdrama" id="radio" value="電影" <?php if($row_result["sdrama"]=="電影") echo "checked";?>>電影
      <input type="radio" name="sdrama" id="radio" value="韓劇" <?php if($row_result["sdrama"]=="韓劇") echo "checked";?>>韓劇
      <input type="radio" name="sdrama" id="radio" value="動漫" <?php if($row_result["sdrama"]=="動漫") echo "checked";?>>動漫
      </td>
    </tr>
      <tr>
      <td>喜歡的類型</td><td>
      <input type="radio" name="sStyle" id="radio" value="愛情" <?php if($row_result["sStyle"]=="愛情") echo "checked";?>>愛情
      <input type="radio" name="sStyle" id="radio" value="奇幻" <?php if($row_result["sStyle"]=="奇幻") echo "checked";?>>奇幻
      <input type="radio" name="sStyle" id="radio" value="懸疑" <?php if($row_result["sStyle"]=="懸疑") echo "checked";?>>懸疑
      <input type="radio" name="sStyle" id="radio" value="驚悚" <?php if($row_result["sStyle"]=="驚悚") echo "checked";?>>驚悚
      <input type="radio" name="sStyle" id="radio" value="搞笑" <?php if($row_result["sStyle"]=="搞笑") echo "checked";?>>搞笑
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      更改密碼
      </td>
    </tr>  
    <tr><td>輸入舊密碼</td><td><input name="old" type="text" id="old" size="40"></td></tr>
    <tr><td>輸入新密碼</td><td><input name="new1" type="text" id="new1" size="40"></td></tr>
    <tr><td>確認新密碼</td><td><input name="new2" type="text" id="new2" size="40"></td></tr>
    <tr>
      <td colspan="2" align="center">
      <input name="sID" type="hidden" value="<?php echo $row_result["sID"];?>">
      <input name="action" type="hidden" value="update">
      <input type="submit" name="button" id="button" value="更新資料">
      <input type="reset" name="button2" id="button2" value="重新填寫">
      </td>
    </tr>
  </table>
</form>
</body>
</html>