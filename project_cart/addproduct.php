<?php
include("conndb.php");

if (isset($_POST["addnumber"])) { 
    $num="SELECT number FROM `list2` WHERE name=\"".$_POST["addname"]."\""; 
    $checknum=mysqli_query($db_link,$num);
    $nums=mysqli_fetch_assoc($checknum);  
    $sql="UPDATE `list2` SET `number`=\"".$nums["number"]+$_POST["addnum"]."\" where name=\"".$_POST["addname"]."\"";
    mysqli_query($db_link, $sql);	
}
?>
<script type="text/javascript">
    window.location.href='manage.php';
</script>