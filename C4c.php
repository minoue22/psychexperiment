

<!DOCTYPE html>
<html lang="en">
<head>C4c</head>

<body>
	<?php
include('header.php');

 $iOption = array (["inventors","&nbsp"],
                 [0,"airplanes"],
                 [1, "coffee filters"],
                 [2, "light bulbs"],
                 [3, "semiconductors"],
                 [4,"steam engines"],
                 [5, "the internet"],
                 [6,"the Landlord's Game"]);

$name =array ("Melitta","Thomas Edison", "Edward Jenner","Lizzie Magie","James Watt");
   
?>
<h>For each statement, please select the most accurate option.</h>


<form action="myData.php" mehod="post">
<select name="Inventor[]" required>
	<?php
	  for ($i=0; $i< count($iOption); $i++){
	  	echo '<option value"', $iOption[$i][0],'">', $iOption[i][1],'</option>';}

	  	for ($m=0; $m<count($name); $m++){
	  		echo '<p>', $name[$m],'is acknowledged as the inventor of',"Inventor[]",'</p>';}

	 ?>
	
	
<input type="submit" value="Submit Answers">
</select>

</form>
</body>
</html>






<?php
include('footer.php')
?>