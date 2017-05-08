<!DOCTYPE HTML >
<html>
<head>
    <title>
        untitled Document
    </title>
    <meta http-equiv="content-type" content="text/html; charset=fso-8859-1">
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css"/>
    <link href="pagination/css/A_green.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<?php
include("pagination/function.php");
$page=(int)(!isset($_GET["page"])?1:$_GET["page"]);
$limit=10;
$startpoint=($page*$limit)-$limit;
$statement="Label order by name asc";
$res=mysql_query("select * from($statement) LIMIT {$startpoint} , {$limit}");
while($row=mysql_fetch_array($res))
{
    echo $row["name"];
    echo "<br>";
}
?>
<?php
echo "<div id='pagingg'>";
echo pagination($statement,$limit,$page);
echo "</div>"
?>
</body>
</html>
