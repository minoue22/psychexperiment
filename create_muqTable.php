<?php

include('../shareCode/mysqlLink.php');

$link = connectDB();
if(!$link){
	exit("no connection to the server.")
	;
}else{
 $sql = "CREATE TABLE IF NOT EXISTS muq(
 	muqID INT AUTO_INCREMENT PRIMARY KEY,
 	dataTime DATETIME,
 	taskTime FLOAT(4,2),
 	useTime VARCHAR(60),
 	usedM  VARCHAR(40),
 	freqRate VARCHAR(200),
 	gender CHAR(1),
 	age TINYINT UNSIGNED,
 	email VARCHAR(100),
 	comment VARCHAR(300)
"


 );


$table = @mysqli_query($link, $sql);
if($table){
	echo 'Table has been created';

}else{
	echo 'table has not been created';
}

@mysqli_close($link);
}
?>


