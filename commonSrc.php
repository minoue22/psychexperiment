 <?php
$toShow =array(0,2,7); /*これはテスト用。12の多分全て指定してテストするのはめんどくさいため*/
//$toShow =range(0,11,1);/*こっちが本番*/
//range($start,$end,[,$step=1])

/*muqに記載するメディア*/
$media= array( 
	      'Print media(e.g., newspaper,magazines,leaflets)',
          'Television',
          'Computer-based video(e.g.,YouTube, online TV episode)',
          'Music(e.g., mp3 players, iPod, CDs, radio)',
          'Non-music audio(e.g., audio-books, radio talk shows)',
          'Video or computer games',
          'Web surfing or internet social networking',
          'Other computer-based applications(e.g., Word Excel, PhotoShop)',
          'Telephone and mobile phone voice calls',
          'Instant messaging',
          'SMS(text messaging)',
          'Email');

/*パート２で出てくるやつ*/
$primaryAct = array(
'reading or browsing a <em>print medium</em>(e.g., newspaper,magazines,leaflets)',
'watching <em>television<em>',
'warching <em> computer-based video</em>(e.g., YouTube, online TV episode)',
'listening to <em>music</em>(e.g., mp3 players, iPod, CDs, radio)',
'listening to <em>non-music audio</em>(e.g., audio-books,radio,talk shows)',
'playing <em>video or computer games</em>',
'<em>Web surfing or Internert social networking</em>',
'using <em>other computer-based applications</em>(e.g., Word,Excel,Photoshop)',
'using <em>telephone and mobile phone voice calls</em>',
'using <em>instant messaging</em>',
'using <em>SNS</em>(text messaging)',
'using <em>email</em>'
);


/*case-sensitiveであることに注意 $toShow*/
for ($i=0; $i< count($toShow); $i++){
	$tmp[$i] = $media[$toShow[$i]];
	$x[$i] =$primaryAct[$toShow[$i]];
}



$media=$tmp;
$primaryAct =$x;

$mOption= array (["","Minutes"],
                 [0,"0"],
                 [1,"1-10"],
                 [2,"11-20"],
                 [3,"21-30"],
                 [4,"31-40"],
                 [5,"41-50"]
);

$hOption =array(["","Hours"]);
/*arrayを使って$hoptionに数字を入れてる*/
for($i=0; $i<18; $i++){
	array_push($hOption,array($i,$i));
}
/*なんでここarray([$i,$i])じゃないの？*/

function dropDown($nameValue,$option){
	$str = "<select name='$nameValue' required>";

	for($i= 0; $i<count($option); $i++){
		$str .= '<option value="'.$option[$i][0]. '">'.$option[$i][1].'</option>';
	}
	$str .= '</select>';
	return $str;
}

 //end of dropdown()
  
 $hDDL= dropDown("Hour[]", $hOption);
 $mDDL= dropDown("Minute[]", $mOption);

 function validate_INT_array($arr){

 	$v = null;
 	if (isset($arr)){
 		$v= filter_var_array($arr, FILTER_VALIDATE_INT);
 	}

 	foreach($v as $key => $value){
		if(is_bool($value)){
			return null;
		}
	}



 	return $v;
 }


$thankYou ='<div class=center>
            <h2>Thank you.</h2>
            <p>This is the end of the survey.</p>
            </div>';


//やること validate_INT_array  index.php blankpageがいいってどういうこと　

 ?>


