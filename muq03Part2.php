<?php
session_start();
include('header.php');
include('commonSrc.php');
$usedM= $_SESSION['usedM'];

if($_SERVER['REQUEST_METHOD']=='POST'):


    $r=validate_INT_array($_POST);
    $r= null; //reset $r to show the code from the following if-block.
    if(is_null($r)){
     echo $thankYou;
    }else{
     $p= $_SESSION['primary'];
     foreach($r as $key =>$v){
          $_SESSION['freqRate'][$p][$key]= $v;
     }
     $nextPage= 'muq03Part2.php';
     if(count($usedM)==$_SESSION['usedM_cnt']){
          $nextPage= 'muq04RecordDebrif.php';
     }
     header('Location:'.$nextPage);
    }


else:
	$k=$_SESSION['usedM_cnt'];

	$_SESSION['usedM_cnt']+=1;

	$primary =$usedM [$k];

     echo $primary;

	$otherArr=array();

	for($i=0; $i<count($usedM); $i++){
		if($i != $k){
			array_push ($otherArr,$usedM[$i]);
                
		}
	}
	$_SESSION['primary'] =$primary;
	$_SESSION['otherArr']=$otherArr;

?>


<form action="#" method="post">
     <table>
     	<tr><th colspan=6 style="text-align:left;">
     		when<?php echo $primaryAct[$primary]; ?>
     		is your primary activity, how often do you concurrently use each of the following media?
     	<tr><th>Item<th>Media<th>Never<th>A little of the time<th>Some of the time<th>Most of the time
     	<?php
     	for ($i=0; $i<count($otherArr); $i++){
     		$k = $i+1;
     		$v = $otherArr[$i];
     		echo"<tr><td>$k<td>", $media[$v];
     		for ($j=0; $j<4; $j++){
     			echo "<td class='center'><input type='radio' name='$v'
     			value='$j' required>";
     		}
     	}
          ?>	
     </table>
     <div class= "center">
     <!--muq03part2の送信ボタン-->
       <input class="myButton" type="submit" value="To continue">
     </div>
</form>


<?php
endif;

include('footer.php');
?>

