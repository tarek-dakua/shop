<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"dakua_project");
$sql="DELETE FROM product WHERE id='$_GET[id]'";
if(mysqli_query($link,$sql))
{
    header("refresh:1; url=product.php");
}
else
    echo "query is not executed";
?>