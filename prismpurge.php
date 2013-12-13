<?php
//IP of server where DB is located, for local use "localhost"
$db_server = "localhost or IP";
//Username of Database
$db_user = "USERNAME";
//Password for user
$db_pass = "PASSWORD";
//Name of Database
$db_name = "DATABASE_NAME";

//Insert DAY/MONTH/YEAR if you wish to purge EVERYTHING older than that.
$oldest_entry = "2 YEAR";

//Enter options here: uneven entries corelate to action, even entries specify time interval in DAYS/MONTH/YEAR for the action
$cleanup = array(
"water-flow","7 DAY",
"lava-flow","7 DAY",
"item-drop","2 MONTH",
"item-pickup","2 MONTH",
"xp-pickup","7 DAY",
"lava-ignite","7 DAY",
"container-access","2 MONTH",
"item-remove","2 MONTH",
"item-insert","2 MONTH",
"block-shift","2 MONTH",
"fire-spread","2 MONTH",
"entity-spawn","7 DAY",
"entity-follow","1 MONTH",
"block-spread","2 DAY",
"entity-kill","2 MONTH",
"player-kill","2 MONTH",
"tree-grow","7 DAY",
"water-break","7 DAY",
"block-shift","7 DAY",
"world-edit","2 MONTH"
);
$i = count($cleanup);
$thedate = date("r");

//Check if number of items in array is even, if not => Line 71
if(($i % 2) == 0){

	$db = mysql_connect($db_server, $db_user, $db_pass);
	$db_select = mysql_select_db($db_name);
	if(!$db)
	{
	  die("Connection error: ".mysql_error());
	}
	else{
		echo "\r\n\r\nLog from " . $thedate . ": \r\n";
			for($x=0, $y=1;$x<$i;$x+=2, $y+=2){
			$query = "DELETE FROM `prism_actions` WHERE `action_type` = '".$cleanup[$x]."' AND `action_time` < DATE_SUB(NOW(), INTERVAL ".$cleanup[$y] . ");";
			$sql = mysql_query($query);
			echo "Deleted " . mysql_affected_rows() . " for " . $cleanup[$x] . "\r\n";
			}
	
// This runs a purge for everything that is older than $oldest_entry
		if(!$oldest_entry){
		}
		else {
		$query2 = "DELETE FROM `prism_actions` WHERE `action_time` < DATE_SUB(NOW(), INTERVAL " . $oldest_entry . ");";
		$sql2 = mysql_query($query2);
		echo "Deleted " . mysql_affected_rows() . "entries older than 2 years.\r\n";
		} //END Else
	
	} //END Else
	mysql_close($db);
	echo "\r\n\r\n ##############################";
	}
	
else{
	echo "The Array is not configured correctly.";
	} //END Else

?>