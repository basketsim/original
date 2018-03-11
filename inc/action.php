<?PHP
if($_POST && isset($_POST['rater_id']))
{
	global $global_rate_id, $global_rater_msg;

	$product_id=$_POST['rater_id'];	
	$member_id=$_POST['member_id'];	
	if(empty($product_id))
		{
		echo "Error occured";
		exit();
		}
	if(empty($member_id))
		{
		echo "You are not logged in";
		exit();
		}
	$rater_id=$product_id;	
	// User settings
	$rater_ip_voting_restriction = true; // restrict ip address voting (true or false)
	$rater_ip_vote_qty=1; // how many times an ip address can vote
	$rater_already_rated_msg="You have already rated this item.";
	$rater_not_selected_msg="You have not selected a rating value.";
	$rater_thankyou_msg="Thank you for voting.";
	$rater_generic_text="this item"; // generic item text
	$rater_end_of_line_char="\n"; // may want to change for different operating systems
	
	
	
	if(!isset($rater_id)) $rater_id=1;
	if(!isset($rater_item_name)) $rater_item_name=$rater_generic_text;
	
	
	// DO NOT MODIFY BELOW THIS LINE
	$rater_filename='files/item_'.$rater_id.".rating";
	$rater_rating=0;
	$rater_stars="";
	$rater_stars_txt="";
	$rater_rating=0;
	$rater_votes=0;
	$rater_msg="";
	
	// Rating action
	if(!isset($_REQUEST["rate".$rater_id])){
	 if(isset($_REQUEST["rating_".$rater_id])){
	  while(list($key,$val)=each($_REQUEST["rating_".$rater_id])){
	   $rater_rating=$val;
	  }
	  $rater_ip = $member_id; 
	  $rater_file=fopen($rater_filename,"a+");
	  $rater_str="";
	  $rater_str = rtrim(fread($rater_file, 1024*8),$rater_end_of_line_char);
	  if($rater_str!=""){
	   if($rater_ip_voting_restriction){
		$rater_data=explode($rater_end_of_line_char,$rater_str);
		$rater_ip_vote_count=0;
		foreach($rater_data as $d){
		 $rater_tmp=explode("|",$d);
		 $rater_oldip=str_replace($rater_end_of_line_char,"",$rater_tmp[1]);
		 if($rater_ip==$rater_oldip){
		  $rater_ip_vote_count++;
		 }
		}
		if($rater_ip_vote_count > ($rater_ip_vote_qty - 1)){
		 $rater_msg=$rater_already_rated_msg;
		}else{
		 fwrite($rater_file,$rater_rating."|".$rater_ip.$rater_end_of_line_char);
		 $rater_msg=$rater_thankyou_msg;
		}
	   }else{
		fwrite($rater_file,$rater_rating."|".$rater_ip.$rater_end_of_line_char);
		$rater_msg=$rater_thankyou_msg;
	   }
	  }else{
	   fwrite($rater_file,$rater_rating."|".$rater_ip.$rater_end_of_line_char);
	   $rater_msg=$rater_thankyou_msg;
	  }
	  fclose($rater_file);
	 }else{
	  $rater_msg=$rater_not_selected_msg;
	 }
	}
}
$global_rate_id=$rater_id;
$global_rater_msg=$rater_msg;
?>