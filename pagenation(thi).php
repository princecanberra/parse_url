<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<style type="text/css">

  .empty{
		width: 500px;
		background-color: green;
		height: 10px;
		
		
	
	}



</style>
</head>
<body>
<?
$objConnect = mysql_connect("localhost","root","n") or die("Error Connect to Database");
$objDB = mysql_select_db("WEB");
$strSQL = "SELECT * FROM line ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 2;   // Per Page

$Page = mysql_real_escape_string($_GET["Page"]);
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL ="SELECT * FROM line LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);

while($objResult = mysql_fetch_array($objQuery))
{
	$name = $objResult['name'];
	
	echo "$name <br/>";
}
?>
</table>

<br>

<?
if($Prev_Page)
{
	echo "<a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'> Back</a> &nbsp&nbsp;&nbsp; ";
}

if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next</a> ";
}
mysql_close($objConnect);
?>
</body>
</html>
