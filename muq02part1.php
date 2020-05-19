<?php
session_start();
include('header.php');
include('commonSrc.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'):

	//handle from data,e.g.,validation, storage, ect.
	$h = validate_INT_array($_POST['Hour']);
	$m = validate_INT_array($_POST['Minute']);
	if (is_null($h) or is_null($m) or count($h) != count($m)){
		echo $thankYou;
	}else{

		//do some computations
		for ($i=0; $i<count($h); $i++){

			$useTime[$i] = $h[$i]*60 +$m[$i]*10;
			$usedM= array();
			if($useTime[$i]>0){
				array_push($usedM, $i);
			}
		}

		$_SESSION['useTime']=$useTime;
		$_SESSION['usedM'] = $usedM;

		$n = count($media);
		$rating = array_fill(0,$n,9);
		$_SESSION['freqRate'] = array_fill(0,$n, $rating);
		$_SESSION['usedM_cnt']=0;

		$nextPage = 'muq03Part2.php';

		if (count($usedM)<2){
			$nextPage='muq04RecordDebrief.php';

		}
		header('Location:'. $nextPage); 

	}
else:	
?>

<h3>
For each item below,use the drop-down lists to indicate how much time (in Hours and Minutes) you use it on a typical WEEKDAY.
</h3>


<form action="#" method="post">
  <table>
  <tr><th rowspan="2">Item<th rowspan="2">Media<th colspan ="2">total time
  <tr><th>Hours<th>Minutes

  <!--row1-12までを自動的に作成する-->
  <?php 
  for ($i=0; $i<count($media); $i++){
  	$k=$i+1;
  	echo "<tr><td>$k<td>$media[$i]<td>$hDDL<td>$mDDL";
  }
  ?>

  </table>

   <div class="center">
   	  <input class="myButton" type="submit" value="To continue">
   	</div>
  
  </form>


<?php
endif;
include('footer.php');


?>