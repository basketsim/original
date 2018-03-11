<?php
function rate($product_id,$member_id)
{
	global $global_rate_id, $global_rater_msg;
	if(empty($product_id))
		{
		echo "Error occured";
		exit();
		}
	$rater_id=$product_id;	
	// User settings
	$rater_ip_voting_restriction = true; // restrict ip address voting (true or false)
	$rater_ip_vote_qty=1; // how many times an ip address can vote
	$rater_already_rated_msg="You already rated this match.";
	$rater_not_selected_msg="You have not selected a rating value.";
	$rater_thankyou_msg="Thank you for voting.";
	$rater_generic_text="this match"; // generic item text
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
	$rater_ip_vote_count=0;
	
	
	// Get current rating
	if(is_file($rater_filename)){
	/* Checking whether existing user rated or not */
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
					if($rater_ip==$rater_oldip)
						$rater_ip_vote_count++;
				}
			}
		}
	 $rater_file=fopen($rater_filename,"r");
	 $rater_str="";
	 $rater_str = fread($rater_file, 1024*8);
	 if($rater_str!=""){
	  $rater_data=explode($rater_end_of_line_char,$rater_str);
	  $rater_votes=count($rater_data)-1;
	  $rater_sum=0;
	  foreach($rater_data as $d){
	   $d=explode("|",$d);
	   $rater_sum+=$d[0];
	  }
	  $rater_rating=number_format(($rater_sum/$rater_votes), 2, '.', '');
	 }
	 fclose($rater_file);
	}
	
	//assign star image
	if ($rater_rating <= 0){$rater_stars = "./img/00star.gif";$rater_stars_txt="";}
	if ($rater_rating >= 0.25){$rater_stars = "./img/05star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 0.75){$rater_stars = "./img/1star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 1.25){$rater_stars = "./img/15star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 1.75){$rater_stars = "./img/2star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 2.25){$rater_stars = "./img/25star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 2.75){$rater_stars = "./img/3star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 3.25){$rater_stars = "./img/35star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 3.75){$rater_stars = "./img/4star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 4.25){$rater_stars = "./img/45star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	if ($rater_rating >= 4.75){$rater_stars = "./img/5star.gif";$rater_stars_txt=round($rater_sum/$rater_votes,1);}
	
	
	//output
	echo '<div>';
	echo '<form method="post" id="form'.$rater_id.'" name="form'.$rater_id.'" action="'.$_SERVER['REQUEST_URI'].'">';
	$over='';
	if($rater_ip_vote_count<=0)
	$over='toggle(1,'.$rater_id.')';

if (is_numeric($rater_stars_txt) AND $rater_votes==1) {$rater_stars_txt="User rating: ".$rater_stars_txt." stars from 1 vote";}
elseif (is_numeric($rater_stars_txt) AND $rater_votes==2) {$rater_stars_txt="User rating: ".$rater_stars_txt." stars from 2 votes";}
elseif (is_numeric($rater_stars_txt) AND $rater_votes > 1) {$rater_stars_txt="User rating: ".$rater_stars_txt." stars from ".$rater_votes." votes";}

	echo '<div style="width:80px;" id="div'.$rater_id.'1" onmouseover="'.$over.';">';
	echo '<img src="'.$rater_stars.'?x='.uniqid((double)microtime()*1000000,1).'" title="'.$rater_stars_txt.'" alt="'.$rater_stars_txt.'" />';
	echo '</div>';
	echo '<div style="width:80px;display:none; cursor:pointer;" id="div'.$rater_id.'2" onmouseout="toggle(2,'.$rater_id.');" onclick="document.forms[\'form\' + '.$rater_id.'].submit();">';
	echo '<img src="img/star.gif" alt="Rate this match as terrible" title="Rate this match as terrible" id="star'.$rater_id.'1" onmouseover="setStar(1,'.$rater_id.')"/>';
	echo '<img src="img/star.gif" alt="Rate this match as poor" title="Rate this match as poor" id="star'.$rater_id.'2" onmouseover="setStar(2,'.$rater_id.')"/>';
	echo '<img src="img/star.gif" alt="Rate this match as average" title="Rate this match as average" id="star'.$rater_id.'3" onmouseover="setStar(3,'.$rater_id.')"/>';
	echo '<img src="img/star.gif" alt="Rate this match as good" title="Rate this match as good" id="star'.$rater_id.'4" onmouseover="setStar(4,'.$rater_id.')"/>';
	echo '<img src="img/star.gif" alt="Rate this match as excellent" title="Rate this match as excellent" id="star'.$rater_id.'5" onmouseover="setStar(5,'.$rater_id.')"/>';
	echo '<input type="hidden" name="rating_'.$rater_id.'[]" id="rating_'.$rater_id.'[]" value="" />';
	echo '<input type="hidden" name="rater_id" value="'.$rater_id.'" />';
	echo '<input type="hidden" name="member_id" value="'.$member_id.'" />';
	echo '<input type="submit" style="display:none" name="rate_submit" value="Rate" />';
	echo '</div>';
	if($global_rater_msg!="" && $global_rate_id==$rater_id) echo "<div>".$global_rater_msg."</div>";
	echo '</form>';
	echo '</div>';
	
}
?>
<script>
function setStar(star,rate_id){
document.getElementById('rating_' + rate_id + '[]').value=star;
	for(i=1;i<=star;i++)
		document.getElementById('star'+rate_id+i).src = '/img/star1.gif';
	if(star<5 || star==0){
		for(i=star+1;i<=5;i++)
			document.getElementById('star'+rate_id+i).src = "img/star.gif";
	}
}

function toggle(type,rate_id)
	{
	if(type==1)
		{
		document.getElementById('div' + rate_id + '1').style.display='none';
		document.getElementById('div' + rate_id + '2').style.display='inline';
		}
	else
		{
		document.getElementById('div' + rate_id + '1').style.display='inline';
		document.getElementById('div' + rate_id + '2').style.display='none';
		}
	}
</script>
