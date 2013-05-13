<?php

	// connect
	
	$con = mysql_connect("localhost","root","n");
	 mysql_select_db("WEB");


	$sql = "SELECT @rownum:=@rownum+1 as rownum, t.*FROM (SELECT @rownum:=0) r, (select * from line) t order by name";
	
	$result = mysql_query($sql);
	while($out = mysql_fetch_assoc($result)){
	
		$name = $out['name'];
		$row = $out['rownum'];
	
		echo "$row $name<br/>";
	
	}



?>