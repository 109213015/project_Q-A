<?php
include("conndb.php");
if (isset($_POST["del"])) {    
    $sql="DELETE FROM `list1` where `pName`=\"".$_POST["delete"]."\"" ;
    mysqli_query($db_link, $sql);	
}
?>
<script type="text/javascript">
    window.location.href='client.php';
</script>